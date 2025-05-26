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
        $shop = \App\Models\User::findOrFail($id);
        $products = \App\Models\Produk::where('user_id', $id)->with('gambar')->get();
        return view('toko.detail', compact('shop', 'products'));
    }
}