<?php

namespace App\Http\Controllers\Workspace;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Produk;
use App\Models\Visit;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TokoController extends Controller
{
    public function detail($id)
    {
        $pengelola = User::findOrFail($id);
        $products = Produk::where('user_id', $id)
            ->with('gambar')
            ->get()
            ->groupBy('kategori');
            
        $lokasi = $pengelola->lokasi()->latest()->first();

        // Catat kunjungan ke halaman store detail
        Visit::create([
            'user_id' => $id, // ID pengelola yang dikunjungi
            'date' => now(),
        ]);

        // Hitung statistik real dari database
        $visitCount = Visit::where('user_id', $id)->count();
        
        // Hitung produk yang terjual (transaksi dengan status selesai)
        $productsSold = Transaksi::whereHas('produk', function($query) use ($id) {
            $query->where('user_id', $id);
        })->where('status', 'selesai')->sum('jumlah_produk');
        
        // Hitung total produk
        $totalProducts = $products->flatten()->count();

        return view('store-detail', compact(
            'pengelola', 
            'products', 
            'lokasi', 
            'visitCount', 
            'productsSold', 
            'totalProducts'
        ));
    }
}