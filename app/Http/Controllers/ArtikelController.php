<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\ArtikelGambar;
use App\Models\Notification;
use App\Models\ArtikelLike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArtikelController extends Controller
{
    public function create()
    {
        return view('admin.artikel.create');
    }

    public function index(Request $request)
    {
        $query = Artikel::withCount('feedback');

        if ($request->search) {
            $query->where('judul', 'like', '%' . $request->search . '%')
                  ->orWhere('konten', 'like', '%' . $request->search . '%');
        }

        $sort = $request->input('sort', 'terbaru');
        if ($sort === 'populer') {
            $query->orderByDesc('feedback_count');
        } else {
            $query->orderByDesc('tanggal_publikasi');
        }

        $artikels = $query->paginate(6)->withQueryString();
        
        // Event query dengan pagination
        $eventQuery = \App\Models\Event::query();
        
        // Search untuk events
        if ($request->event_search) {
            $eventQuery->where('title', 'like', '%' . $request->event_search . '%')
                      ->orWhere('description', 'like', '%' . $request->event_search . '%');
        }
        
        // Sorting untuk events
        $eventSort = $request->input('event_sort', 'terbaru');
        if ($eventSort === 'terlama') {
            $eventQuery->orderBy('created_at', 'asc');
        } else {
            $eventQuery->orderBy('created_at', 'desc');
        }
        
        $events = $eventQuery->paginate(6, ['*'], 'event_page')->withQueryString();

        return view('admin.artikel.index', compact('artikels', 'events'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required|string|max:100',
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $artikel = Artikel::create([
            'kategori' => $request->kategori,
            'judul' => $request->judul,
            'konten' => $request->konten,
            'tanggal_publikasi' => now(),
            'user_id' => Auth::id(),
        ]);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $path = $file->store('artikel_gambar', 'public');
            ArtikelGambar::create([
                'artikel_id' => $artikel->artikel_id,
                'file_path' => 'storage/' . $path,
                'judul' => $artikel->judul,
            ]);
        }

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil dibuat!');
    }

    public function edit($id)
    {
        $artikel = Artikel::with('gambar')->findOrFail($id);
        return view('admin.artikel.edit', compact('artikel'));
    }

    public function update(Request $request, $id)
    {
        \Log::info('Data yang diterima untuk update:', $request->all());

        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required',
            'kategori' => 'required|in:eco enzim,bank sampah,tips dan trik,berita',
            'tanggal_publikasi' => 'required|date',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $artikel = Artikel::findOrFail($id);
        $artikel->update($request->only(['judul', 'konten', 'kategori', 'tanggal_publikasi']));

        if ($request->hasFile('gambar')) {
            if ($artikel->gambar && $artikel->gambar->count()) {
                $oldImage = $artikel->gambar->first();
                if ($oldImage && file_exists(public_path($oldImage->file_path))) {
                    @unlink(public_path($oldImage->file_path));
                }
                $oldImage->delete();
            }

            $file = $request->file('gambar');
            $path = $file->store('artikel_gambar', 'public');
            ArtikelGambar::create([
                'artikel_id' => $artikel->artikel_id,
                'file_path' => 'storage/' . $path,
                'judul' => $artikel->judul,
            ]);
        }

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $artikel = Artikel::with('gambar')->findOrFail($id);

        foreach ($artikel->gambar as $gambar) {
            if ($gambar->file_path && file_exists(public_path($gambar->file_path))) {
                @unlink(public_path($gambar->file_path));
            }
            $gambar->delete();
        }

        $artikel->delete();

        // Hapus notifikasi terkait artikel ini (jika ada)
        Notification::where('type', 'artikel')
            ->where('url', '/artikel/' . $id)
            ->delete();

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil dihapus!');
    }

    public function landing(Request $request)
{
    $query = Artikel::with(['likes']);

    if ($request->kategori) {
        $query->where('kategori', $request->kategori);
    }

    if ($request->search) {
        $query->where(function ($q) use ($request) {
            $q->where('judul', 'like', '%' . $request->search . '%')
              ->orWhere('konten', 'like', '%' . $request->search . '%');
        });
    }

    if ($request->sort === 'populer') {
        $query->withCount('feedback')->orderByDesc('feedback_count');
    } else {
        $query->orderByDesc('tanggal_publikasi');
    }

    $artikels = $query->paginate(12)->withQueryString();

    return view('artikel', compact('artikels'));
}

    public function show($id)
    {
    $artikel = Artikel::with(['user', 'gambar', 'feedback.user', 'likes'])->findOrFail($id);

        $sort = request()->get('sort', 'terbaru');
        $sortedFeedback = $sort === 'terlama'
            ? $artikel->feedback->sortBy('created_at')
            : $artikel->feedback->sortByDesc('created_at');

        $relatedArticles = Artikel::where('artikel_id', '!=', $id)->latest()->take(4)->get();
        $artikel->feedback_count = $artikel->feedback->count();

        return view('article-detail', compact('artikel', 'relatedArticles', 'sortedFeedback'));
    }
    
public function like($id)
{
    $user = auth()->user();
    $artikel = Artikel::findOrFail($id);

    // Cek apakah user sudah like
    $existingLike = ArtikelLike::where('artikel_id', $id)
        ->where('user_id', $user->user_id)
        ->first();

    if ($existingLike) {
        // Kalau sudah like → unlike
        $existingLike->delete();
    } else {
        // Kalau belum like → like
        ArtikelLike::create([
            'artikel_id' => $id,
            'user_id' => $user->user_id,
        ]);
    }


    return redirect()->back();
}
public function showProfil()
{
    $user = Auth::user();

    // Pastikan relasi likedArtikels sudah didefinisikan di model User
    $favoritArtikels = $user->likedArtikels()->with('kategori')->latest()->get();

    return view('nasabah.profil', compact('favoritArtikels'));
}



}
