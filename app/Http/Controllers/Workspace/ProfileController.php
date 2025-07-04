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
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telepon' => 'nullable|string|min:10|max:20', // Ubah: min 10 digit
            'alamat' => 'nullable|string|max:255',
            'kecamatan' => 'nullable|string|max:100',
            'kelurahan' => 'nullable|string|max:100',
            'kode_pos' => 'nullable|string|max:10',
            'jenis_kelamin' => 'nullable|in:Laki-laki,Perempuan',
            'tanggal_lahir' => 'nullable|date',
            'password' => 'nullable|string|min:8',
        ]);

        $user = Auth::user();
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->no_hp = $request->telepon;
        $user->alamat = $request->alamat;
        $user->kecamatan = $request->kecamatan;
        $user->kelurahan = $request->kelurahan;
        $user->kode_pos = $request->kode_pos;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->tanggal_lahir = $request->tanggal_lahir;
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
    }
}
