<?php

namespace App\Http\Controllers\Workspace;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaksi;
use App\Models\Produk; // Pastikan untuk meng-import model Produk

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
        
        // For admin and pengelola, set a flag to show dashboard by default
        $showDashboard = in_array($user->role, ['admin', 'pengelola']);
        
        // Load pesanan aktif dan riwayat transaksi jika user adalah nasabah
        $pesananAktif = collect();
        $riwayatTransaksi = collect();
        
        if ($user->role == 'nasabah') {
            $pesananAktif = Transaksi::with('produk', 'lokasi')
                ->where('user_id', $user->user_id)
                ->whereIn('status', ['belum dibayar', 'menunggu konfirmasi', 'sedang dikirim'])
                ->orderBy('created_at', 'desc')
                ->get();
                
            $riwayatTransaksi = Transaksi::with('produk', 'lokasi')
                ->where('user_id', $user->user_id)
                ->whereIn('status', ['selesai', 'dibatalkan'])
                ->orderBy('created_at', 'desc')
                ->limit(10) // Ambil 10 transaksi terakhir saja untuk halaman profile
                ->get();
        }
        
        // Ambil 5 produk teratas berdasarkan likes untuk ditampilkan di halaman welcome
        $featuredProducts = Produk::orderBy('suka', 'desc')
                                 ->take(5)
                                 ->get();
        
        // Sekarang kita redirect semua user ke halaman profile 
        // yang sudah ter-integrated dengan dashboard masing-masing role
        return view('profile', compact('pesananAktif', 'riwayatTransaksi', 'showDashboard', 'featuredProducts'));
    }
}
