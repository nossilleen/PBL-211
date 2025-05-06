<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Produk;
use App\Models\Lokasi;
use Illuminate\Http\Request;

class TokoController extends Controller
{
    public function detail($id)
    {
        // Get toko data based on location ID
        $toko = Lokasi::findOrFail($id);
        
        // Get products for this store
        $products = Produk::where('lokasi_id', $id)
            ->with('gambar')
            ->get()
            ->groupBy('kategori');
        
        return view('toko.detail', compact('toko', 'products'));
    }
}