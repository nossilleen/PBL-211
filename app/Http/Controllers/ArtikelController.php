<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\ArtikelGambar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArtikelController extends Controller
{
    /**
     * Show the form for creating a new article.
     */
    public function create()
    {
        return view('admin.artikel.create');
    }

    /**
     * Tampilkan daftar artikel di dashboard admin.
     */
    public function index(Request $request)
    {
        $query = Artikel::withCount('feedback');

        // Search
        if ($request->search) {
            $query->where('judul', 'like', '%' . $request->search . '%')
                  ->orWhere('konten', 'like', '%' . $request->search . '%');
        }

        // Penentuan urutan: terbaru (default) atau terpopuler
        $sort = $request->input('sort', 'terbaru');

        if ($sort === 'populer') {
            // Urutkan berdasarkan jumlah feedback terbanyak
            $query->orderByDesc('feedback_count');
        } else {
            // Default urutkan berdasarkan tanggal publikasi terbaru
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

    /**
     * Simpan artikel baru ke database.
     */
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

        // Proses upload gambar jika ada
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

    /**
     * Show the form for editing the specified article.
     */
    public function edit($id)
    {
        $artikel = Artikel::with('gambar')->findOrFail($id);
        return view('admin.artikel.edit', compact('artikel'));
    }

    /**
     * Update the specified article in storage.
     */
    public function update(Request $request, $id)
    {
        \Log::info('Data yang diterima untuk update:', $request->all()); // Log data untuk debugging

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
            // Hapus gambar lama jika ada
            if ($artikel->gambar && $artikel->gambar->count()) {
                $oldImage = $artikel->gambar->first();
                if ($oldImage && file_exists(public_path($oldImage->file_path))) {
                    @unlink(public_path($oldImage->file_path));
                }
                $oldImage->delete();
            }

            // Simpan gambar baru
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

    /**
     * Tampilkan daftar artikel di landing page (publik) dengan pagination.
     */
    public function landing(Request $request)
    {
        $query = Artikel::query();

        // Filter berdasarkan kategori
        if ($request->kategori) {
            $query->where('kategori', $request->kategori);
        }

        // Search functionality
        if ($request->search) {
            $query->where('judul', 'like', '%' . $request->search . '%')
                  ->orWhere('konten', 'like', '%' . $request->search . '%');
        }

        // Sorting
        if ($request->sort === 'populer') {
            // Urutkan berdasarkan jumlah feedback (asumsi populer = banyak feedback)
            $query->withCount('feedback')->orderByDesc('feedback_count');
        } else { // default 'terbaru'
            $query->orderByDesc('tanggal_publikasi');
        }

        // Ambil artikel dengan pagination dan sertakan query string agar paginasi mempertahankan filter
        $artikels = $query->paginate(6)->withQueryString();

        return view('artikel', compact('artikels'));
    }

    /**
     * Hapus artikel beserta gambar terkait.
     */
    public function destroy($id)
    {
        $artikel = Artikel::with('gambar')->findOrFail($id);

        // Hapus semua gambar terkait
        foreach ($artikel->gambar as $gambar) {
            if ($gambar->file_path && file_exists(public_path($gambar->file_path))) {
                @unlink(public_path($gambar->file_path));
            }
            $gambar->delete();
        }

        // Hapus artikel
        $artikel->delete();

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil dihapus!');
    }

    /**
     * Display the specified article.
     */
    
public function show($id)
{
    $artikel = Artikel::with(['user', 'gambar', 'feedback.user'])->findOrFail($id);
    $relatedArticles = Artikel::where('artikel_id', '!=', $id)->latest()->take(4)->get();
    $feedback = $artikel->feedback()->latest()->get(); // semua feedback

    return view('article-detail', compact('artikel', 'relatedArticles', 'feedback'));
}
}