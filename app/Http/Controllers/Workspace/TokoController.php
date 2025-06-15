<?php

namespace App\Http\Controllers\Workspace;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Produk;
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

        return view('store-detail', compact('pengelola', 'products', 'lokasi'));
    }
}