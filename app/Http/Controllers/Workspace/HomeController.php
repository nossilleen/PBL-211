<?php

namespace App\Http\Controllers\Workspace;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaksi;
use App\Models\Produk; // Pastikan untuk meng-import model Produk
use App\Models\PointHistory;
use App\Models\Lokasi; // Import the Lokasi model
use App\Models\Notification;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('landingPage'); // Exclude landingPage from auth middleware
    }

    /**
     * Show the application dashboard based on user role.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();
        $showDashboard = in_array($user->role, ['admin', 'pengelola']);

        $pesananAktif = collect();
        $riwayatTransaksi = collect();
        $notifications = collect();

        if ($user->role == 'nasabah') {
            // Pesanan aktif
            $pesananAktif = Transaksi::with('produk')
                ->where('user_id', $user->user_id)
                ->whereIn('status', ['belum dibayar', 'menunggu konfirmasi', 'sedang dikirim'])
                ->orderBy('created_at', 'desc')
                ->get();

            // Riwayat transaksi - pastikan ini mendapatkan status selesai dan dibatalkan
            $riwayatTransaksi = Transaksi::with('produk')
                ->where('user_id', $user->user_id)
                ->whereIn('status', ['selesai', 'dibatalkan'])
                ->orderBy('created_at', 'desc')
                ->get();

            // Notifikasi terbaru (batas 20)
            $notifications = Notification::where('user_id', $user->user_id)
                ->orderByDesc('created_at')
                ->paginate(5)
                ->withQueryString();

            // Pastikan link paginasi tetap di #notifikasi
            $notifications->fragment('notifikasi');

            \Log::info('Mengambil riwayat', [
                'user_id' => $user->user_id,
                'count' => $riwayatTransaksi->count(),
                'data' => $riwayatTransaksi
            ]);
        }

        return view('profile', compact(
            'pesananAktif',
            'riwayatTransaksi',
            'notifications',
            'showDashboard'
        ));
    }

    public function landingPage()
    {
        $locations = Lokasi::whereNotNull('latitude')
                            ->whereNotNull('longitude')
                            ->get();

        return view('welcome', compact('locations'));
    }
}
