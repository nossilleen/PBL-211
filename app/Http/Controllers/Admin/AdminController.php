<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // Check if user is admin
        $this->middleware(function ($request, $next) {
            if (Auth::user()->role !== 'admin') {
                return redirect('/')->with('error', 'Unauthorized access');
            }
            return $next($request);
        });
    }

    public function index()
    {
        // This is the main dashboard/beranda page
        return view('admin.beranda.index');
    }

    public function artikel()
    {
        $events = Event::latest()->get();
        return view('admin.artikel.index', compact('events'));
    }

    public function pengajuan()
    {
        return view('admin.pengajuan.index');
    }

    public function user()
    {
        return view('admin.user.index');
    }
} 