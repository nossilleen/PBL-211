<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Notification;

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
        // Cek izin membuat event
        $user = auth()->user();
        if ($user->role === 'admin' && !$user->can_create_event) {
            abort(403, 'Anda tidak memiliki izin untuk membuat event');
        }

        // dd($request->all()); // untuk debug testing event ()
        $hasCropped = $request->filled('cropped_gambar');
        $rules = [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'link_form_acara' => 'nullable|url',
        ];
        if (!$hasCropped) {
            $rules['image'] = 'required|image|mimes:jpeg,png,jpg,gif|max:2048';
        }
        $request->validate($rules);

        try {
            if ($hasCropped) {
                $data = $request->input('cropped_gambar');
                $data = preg_replace('/^data:image\\/(png|jpg|jpeg);base64,/', '', $data);
                $data = str_replace(' ', '+', $data);
                $fileName = uniqid() . '.jpg';
                $destinationPath = public_path('storage/events');
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0777, true);
                }
                file_put_contents($destinationPath . '/' . $fileName, base64_decode($data));
                $imagePath = 'storage/events/' . $fileName;
            } else if ($request->hasFile('image')) {
                $file = $request->file('image');
                $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
                $destinationPath = public_path('storage/events');
                $file->move($destinationPath, $fileName);
                $imagePath = 'storage/events/' . $fileName;
            } else {
                $imagePath = null;
            }

            Event::create([
                'title' => $request->title,
                'description' => $request->description,
                'date' => $request->date,
                'location' => $request->location,
                'image' => $imagePath,
                'link_form_acara' => $request->link_form_acara,
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
            'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'link_form_acara' => 'nullable|url',
        ]);

        try {
            if ($request->filled('cropped_banner')) {
                $data = $request->input('cropped_banner');
                $data = preg_replace('/^data:image\\/\\w+;base64,/', '', $data);
                $data = str_replace(' ', '+', $data);
                $fileName = uniqid() . '.jpg';
                $destinationPath = public_path('storage/events');
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0777, true);
                }
                file_put_contents($destinationPath . '/' . $fileName, base64_decode($data));
                // Hapus banner lama jika ada
                if ($event->image && file_exists(public_path($event->image))) {
                    @unlink(public_path($event->image));
                }
                $event->image = 'storage/events/' . $fileName;
            } else if ($request->hasFile('banner')) {
                // Hapus banner lama jika ada
                if ($event->image && file_exists(public_path($event->image))) {
                    @unlink(public_path($event->image));
                }
                $file = $request->file('banner');
                $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
                $destinationPath = public_path('storage/events');
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0777, true);
                }
                $file->move($destinationPath, $fileName);
                $event->image = 'storage/events/' . $fileName;
            }

            $event->title = $request->title;
            $event->description = $request->description;
            $event->date = $request->date;
            $event->location = $request->location;
            $event->link_form_acara = $request->link_form_acara;
            $event->save();

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

            // Hapus notifikasi terkait event ini
            Notification::where('type', 'event')
                ->where('url', '/events/' . $event->id)
                ->delete();

            return redirect()->route('admin.artikel.index')
                ->with('success', 'Event berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
} 