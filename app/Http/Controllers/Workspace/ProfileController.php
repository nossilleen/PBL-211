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

    public function update(Request $request)
    {
        $user = Auth::user();
        $validated = $request->validate([
            'nama' => 'required|string|max:50',
            'email' => 'required|email|max:100|unique:user,email,' . $user->user_id . ',user_id',
            'password' => 'nullable|string|min:6',
            'telepon' => 'nullable|string|max:20',
        ]);

        $user->nama = $validated['nama'];
        $user->email = $validated['email'];
        if (!empty($validated['password'])) {
            $user->password = bcrypt($validated['password']);
        }
        if (isset($validated['telepon'])) {
            $user->no_hp = $validated['telepon'];
        }
        $user->save();

        return redirect()->route('profile')->with('success', 'Profil berhasil diperbarui!');
    }
}
