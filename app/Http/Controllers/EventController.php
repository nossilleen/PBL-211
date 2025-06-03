<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        $bannerPath = $request->file('banner')->store('public/events');

        Event::create([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'location' => $request->location,
            'image' => Storage::url($bannerPath)
        ]);

        return redirect()->route('admin.events.index')
            ->with('success', 'Event berhasil dibuat');
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
        ]);

        $event->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.events.index')
            ->with('success', 'Event berhasil diperbarui');
    }

    // Menghapus event
    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('admin.events.index')
            ->with('success', 'Event berhasil dihapus');
    }

    // Menampilkan event di landing page
    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }

    // Menampilkan daftar event di landing page
    public function list()
    {
        $events = Event::latest()->paginate(9);
        return view('events.index', compact('events'));
    }
}
