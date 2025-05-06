<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event; // pastikan model Event sudah ada

class EventController extends Controller
{
    public function index()
    {
        $events = Event::latest()->get(); // ambil semua event, urut dari terbaru
        return view('events.index', compact('events')); // kirim data ke view

        
    }
}
