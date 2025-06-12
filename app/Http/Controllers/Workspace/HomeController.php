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
        $user = Auth::user();
        $showDashboard = in_array($user->role, ['admin', 'pengelola']);

        $pesananAktif = collect();
        $riwayatTransaksi = collect();
        $pointHistories = collect();

        if ($user->role == 'nasabah') {
            $pesananAktif = \App\Models\Transaksi::with('produk')
                ->where('user_id', $user->user_id)
                ->whereIn('status', ['belum dibayar', 'menunggu konfirmasi', 'sedang dikirim'])
                ->orderBy('created_at', 'desc')
                ->get();

            $riwayatTransaksi = Transaksi::with('produk', 'lokasi')
                ->where('user_id', $user->user_id)
                ->whereIn('status', ['selesai', 'dibatalkan'])
                ->orderBy('created_at', 'desc')
                ->limit(10)
                ->get();

            $pointHistories = $user->pointHistories()
                ->orderBy('created_at', 'desc')
                ->limit(10)
                ->get();
        }

        $featuredProducts = Produk::orderBy('suka', 'desc')
            ->take(5)
            ->get();

        return view('profile', compact(
            'pesananAktif',
            'riwayatTransaksi',
            'showDashboard',
            'featuredProducts',
            'pointHistories'
        ));
    }
}
