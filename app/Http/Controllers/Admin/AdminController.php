<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;
use App\Models\User;
use App\Models\Upgrade;

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
        $pengajuan = Upgrade::where('status', 'pending')->get();

        return view('admin.pengajuan.index', compact('pengajuan'));
    }
    public function approvePengajuan($id)
    {
        $pengajuan = Upgrade::findOrFail($id);

        // Update the user's role to 'pengelola'
        $user = User::findOrFail($pengajuan->user_id);
        $user->update(['role' => 'pengelola']);

        // Mark the submission as approved
        $pengajuan->update(['status' => 'approved']);

        return redirect()->route('admin.pengajuan')->with('success', 'Pengajuan berhasil disetujui.');
    }

        public function rejectPengajuan($id)
    {
        $pengajuan = Upgrade::findOrFail($id);

        // Mark the submission as rejected
        $pengajuan->update(['status' => 'rejected']);

        return redirect()->route('admin.pengajuan')->with('success', 'Pengajuan berhasil ditolak.');
    }
    
    public function user()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }
}