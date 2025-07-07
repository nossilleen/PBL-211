<?php

namespace App\Http\Controllers\Workspace;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Lokasi;
use App\Models\Produk;
use App\Models\Artikel;
use App\Models\Poin;
use App\Models\Transaksi;
use App\Models\Feedback;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function index()
    {
        $data = [
            'users' => User::all(),
            'lokasi' => Lokasi::all(),
            'produk' => Produk::with('gambar')->get(),
            'artikel' => Artikel::all(),
            'poin' => Poin::with(['user', 'lokasi'])->get(),
            'transaksi' => Transaksi::with(['user', 'produk', 'lokasi'])->get(),
            'feedback' => Feedback::with(['user', 'artikel'])->get(),
        ];
        
        return response()->json($data);
    }
} 