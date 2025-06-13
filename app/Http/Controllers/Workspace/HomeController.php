<?php

namespace App\Http\Controllers\Workspace;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaksi;
use App\Models\Produk; // Pastikan untuk meng-import model Produk
use App\Models\PointHistory;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
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

            \Log::info('Mengambil riwayat', [
                'user_id' => $user->user_id,
                'count' => $riwayatTransaksi->count(),
                'data' => $riwayatTransaksi
            ]);
        }

        return view('profile', compact(
            'pesananAktif',
            'riwayatTransaksi',
            'showDashboard'
        ));
    }
}
