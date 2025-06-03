<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $events = Event::latest()->get();
        return view('admin.artikel.index', compact('events'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        try {
            $bannerPath = $request->file('image')->store('public/events');

            Event::create([
                'title' => $request->title,
                'description' => $request->description,
                'date' => $request->date,
                'location' => $request->location,
                'image' => Storage::url($bannerPath)
            ]);

            return redirect()->route('admin.artikel.index')
                ->with('success', 'Event berhasil dibuat');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        try {
            if ($request->hasFile('image')) {
                // Delete old banner
                if ($event->image) {
                    Storage::delete(str_replace('/storage', 'public', $event->image));
                }
                $bannerPath = $request->file('image')->store('public/events');
                $event->image = Storage::url($bannerPath);
            }

            $event->update([
                'title' => $request->title,
                'description' => $request->description,
                'date' => $request->date,
                'location' => $request->location
            ]);

            return redirect()->route('admin.artikel.index')
                ->with('success', 'Event berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function destroy(Event $event)
    {
        try {
            if ($event->image) {
                Storage::delete(str_replace('/storage', 'public', $event->image));
            }
            $event->delete();

            return redirect()->route('admin.artikel.index')
                ->with('success', 'Event berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
} 