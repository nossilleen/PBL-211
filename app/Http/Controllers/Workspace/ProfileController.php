<?php

namespace App\Http\Controllers\Workspace;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaksi;

class ProfileController extends Controller
{
    // ProfileController.php
    public function index()
    {
        $user = Auth::user();
        $artikelFavorit = $user->artikelFavorit()->latest()->get();

        return view('profil', compact('artikelFavorit'));
    }

    /**
     * Tampilkan halaman notifikasi untuk pengguna yang sedang login.
     */
    public function notifikasi(Request $request)
    {
        $user = Auth::user();

        // Ambil notifikasi terbaru, batasi 50
        $notifications = Notification::where('user_id', $user->user_id)
            ->orderByDesc('created_at')
            ->paginate(20);

        return view('components.profile.notifikasi', [
            'notifications' => $notifications,
        ]);
    }

    /**
     * Contoh method detail pesanan. (placeholder)
     */
    public function pesananDetail($id)
    {
        $tx = Transaksi::findOrFail($id);
        return view('profile.pesanan-detail', ['transaksi' => $tx]);
    }

    public function deleteNotification($id)
    {
        $notification = Notification::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $notification->delete();

        return response()->json(['success' => true]);
    }

    /**
     * Hapus semua notifikasi milik user yang sedang login.
     */
    public function clearNotifications()
    {
        Notification::where('user_id', Auth::id())->delete();

        return response()->json(['success' => true]);
    }
}
