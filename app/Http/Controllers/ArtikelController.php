<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Notification;
use App\Models\ArtikelLike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArtikelController extends Controller
{
    public function create()
    {
        // Cek izin membuat artikel
        $user = Auth::user();
        if ($user->role === 'admin' && !$user->can_create_article) {
            abort(403, 'Anda tidak memiliki izin untuk membuat artikel');
        }
        return view('admin.artikel.create');
    }

    public function index(Request $request)
    {
        $query = Artikel::withCount(['feedback', 'likes']);

        if ($request->search) {
            $query->where('judul', 'like', '%' . $request->search . '%')
                  ->orWhere('konten', 'like', '%' . $request->search . '%');
        }

        // Dynamic ordering
        $orderBy = $request->input('order_by');
        $direction = $request->input('direction', 'asc');

        if ($orderBy) {
            switch ($orderBy) {
                case 'likes':
                    $query->orderBy('likes_count', $direction);
                    break;
                case 'penulis':
                    // Join users table for ordering by penulis (nama)
                    $query->join('user as u', 'u.user_id', '=', 'artikel.user_id')
                          ->select('artikel.*', 'u.nama')
                          ->orderBy('u.nama', $direction);
                    break;
                default:
                    $query->orderBy($orderBy, $direction);
            }
        } else {
            // Existing sort logic
            $sort = $request->input('sort', 'terbaru');
            if ($sort === 'populer') {
                $query->orderByDesc('feedback_count');
            } else {
                $query->orderByDesc('tanggal_publikasi');
            }
        }

        $artikels = $query->paginate(6)->withQueryString();
        
        // Event query dengan pagination
        $eventQuery = \App\Models\Event::query();
        
        // Search untuk events
        if ($request->event_search) {
            $eventQuery->where('title', 'like', '%' . $request->event_search . '%')
                      ->orWhere('description', 'like', '%' . $request->event_search . '%');
        }
        
        // Event ordering enhancements
        $orderByEvent = $request->input('event_order_by');
        $directionEvent = $request->input('event_direction', 'asc');

        if ($orderByEvent) {
            $eventQuery->orderBy($orderByEvent, $directionEvent);
        } else {
            $eventSort = $request->input('event_sort', 'terbaru');
            if ($eventSort === 'terlama') {
                $eventQuery->orderBy('created_at', 'asc');
            } else {
                $eventQuery->orderBy('created_at', 'desc');
            }
        }
        
        $events = $eventQuery->paginate(6, ['*'], 'event_page')->withQueryString();

        // Jika request AJAX, kembalikan hanya bagian yang diperlukan
        if ($request->ajax()) {
            if ($request->has('page')) {
                return view('admin.artikel.partials.artikel_table', compact('artikels'))->render();
            } elseif ($request->has('event_page')) {
                return view('admin.artikel.partials.event_table', compact('events'))->render();
            }
        }

        return view('admin.artikel.index', compact('artikels', 'events'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        if ($user->role === 'admin' && !$user->can_create_article) {
            abort(403, 'Anda tidak memiliki izin untuk membuat artikel');
        }

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
            $artikel->update(['gambar' => 'storage/' . $path]);
        }
        // Penanganan hasil crop gambar (base64)
        elseif ($request->filled('cropped_gambar')) {
            $data = $request->input('cropped_gambar');
            $data = preg_replace('/^data:image\/(\w+);base64,/', '', $data);
            $data = base64_decode($data);
            $filename = 'artikel_' . time() . '.jpg';
            $path = 'artikel_gambar/' . $filename;
            \Storage::disk('public')->put($path, $data);
            $artikel->update(['gambar' => 'storage/' . $path]);
        }

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil dibuat!');
    }

    public function edit($id)
    {
        $artikel = Artikel::findOrFail($id);
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
            // Delete old image if exists
            if ($artikel->gambar && file_exists(public_path($artikel->gambar))) {
                @unlink(public_path($artikel->gambar));
            }

            $file = $request->file('gambar');
            $path = $file->store('artikel_gambar', 'public');
            $artikel->update(['gambar' => 'storage/' . $path]);
        }
        // Penanganan hasil crop gambar (base64)
        elseif ($request->filled('cropped_gambar')) {
            // Delete old image if exists
            if ($artikel->gambar && file_exists(public_path($artikel->gambar))) {
                @unlink(public_path($artikel->gambar));
            }
            
            $data = $request->input('cropped_gambar');
            $data = preg_replace('/^data:image\/(\w+);base64,/', '', $data);
            $data = base64_decode($data);
            $filename = 'artikel_' . time() . '.jpg';
            $path = 'artikel_gambar/' . $filename;
            \Storage::disk('public')->put($path, $data);
            $artikel->update(['gambar' => 'storage/' . $path]);
        }

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $artikel = Artikel::findOrFail($id);

        // Delete image file if exists
        if ($artikel->gambar && file_exists(public_path($artikel->gambar))) {
            @unlink(public_path($artikel->gambar));
        }

        // Hapus likes terkait
        $artikel->likes()->delete();

        // Hapus feedback (termasuk balasan) terkait
        \App\Models\Feedback::where('artikel_id', $artikel->artikel_id)->delete();

        // Setelah relasi dihapus, hapus artikel
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
        // Tentukan sort order dari parameter request
        $sort = request('sort', 'terbaru');
        $direction = $sort === 'terlama' ? 'asc' : 'desc';

        // Eager load relasi replies secara rekursif
        $artikel = Artikel::with([
            'user', 
            'likes', 
            'feedback' => function ($query) use ($direction) {
                $query->whereNull('parent_id')->orderBy('created_at', $direction);
            }, 
            'feedback.user', 
            'feedback.replies' => function ($query) use ($direction) {
                $query->orderBy('created_at', $direction);
            },
            'feedback.replies.user'
        ])->findOrFail($id);
    
        $relatedArticles = Artikel::where('artikel_id', '!=', $id)->latest()->take(4)->get();
        $artikel->feedback_count = $artikel->feedback()->count(); // Menghitung semua feedback
    
        return view('article-detail', compact('artikel', 'relatedArticles'));
    }
    
    public function like($id)
    {
        $user = auth()->user();
        if (!$user) {
            return response()->json(['success' => false, 'message' => 'Unauthenticated'], 401);
        }

        $artikel = Artikel::findOrFail($id);

        // Cek apakah user sudah like
        $existingLike = ArtikelLike::where('artikel_id', $id)
            ->where('user_id', $user->user_id)
            ->first();

        if ($existingLike) {
            // Kalau sudah like → unlike
            $existingLike->delete();
            $isLiked = false;
        } else {
            // Kalau belum like → like
            ArtikelLike::create([
                'artikel_id' => $id,
                'user_id' => $user->user_id,
            ]);
            $isLiked = true;
        }

        // Hitung ulang jumlah suka
        $likesCount = ArtikelLike::where('artikel_id', $id)->count();

        if (request()->expectsJson() || request()->ajax()) {
            return response()->json([
                'success' => true,
                'isLiked' => $isLiked,
                'suka'    => $likesCount,
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
