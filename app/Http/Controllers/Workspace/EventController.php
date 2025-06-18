<?php

namespace App\Http\Controllers\Workspace;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Schema;

class EventController extends Controller
{
    // Menampilkan daftar event di dashboard admin
    public function index()
    {
        $events = Event::latest()->paginate(10);
        return view('admin.events.index', compact('events'));
    }

    // Menampilkan form pembuatan event
    public function create()
    {
        return view('admin.events.create');
    }

    // Menyimpan event baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'banner' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        try {
            if ($request->hasFile('banner')) {
                $bannerPath = $request->file('banner')->store('events', 'public');
                
                Event::create([
                    'title' => $request->title,
                    'description' => $request->description,
                    'date' => $request->date,
                    'location' => $request->location,
                    'image' => $bannerPath
                ]);

                return redirect()->route('admin.events.index')
                    ->with('success', 'Event berhasil dibuat');
            }
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    // Menampilkan form edit event
    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    // Mengupdate event
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        try {
            if ($request->hasFile('banner')) {
                // Hapus gambar lama jika ada
                if ($event->image) {
                    Storage::delete(str_replace('/storage', 'public', $event->image));
                }
                $bannerPath = $request->file('banner')->store('events', 'public');
                $event->image = $bannerPath;
            }

            $event->update([
                'title' => $request->title,
                'description' => $request->description,
                'date' => $request->date,
                'location' => $request->location
            ]);

            return redirect()->route('admin.events.index')
                ->with('success', 'Event berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    // Menghapus event
    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('admin.events.index')
            ->with('success', 'Event berhasil dihapus');
    }

    // Menampilkan event di landing page
    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('events.show', compact('event'));
    }

    // Menampilkan daftar event di landing page
    public function list(Request $request)
    {
        $eventsQuery = Event::query();

        // Pencarian judul / deskripsi
        if ($request->filled('search')) {
            $keyword = $request->search;
            $eventsQuery->where(function($q) use ($keyword) {
                $q->where('title', 'like', "%{$keyword}%")
                  ->orWhere('description', 'like', "%{$keyword}%");
            });
        }

        // Sorting
        if ($request->sort === 'populer') {
            // Asumsi populer = banyak peserta; untuk saat ini gunakan terbesar views jika ada kolom 'views', jika tidak gunakan created_at
            if (Schema::hasColumn('events', 'views')) {
                $eventsQuery->orderByDesc('views');
            } else {
                $eventsQuery->orderByDesc('created_at');
            }
        } else {
            $eventsQuery->orderByDesc('created_at');
        }

        $events = $eventsQuery->paginate(9)->withQueryString();

        return view('events.index', compact('events'));
    }
}
