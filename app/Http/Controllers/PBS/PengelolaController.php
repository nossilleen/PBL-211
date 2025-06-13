<?php

namespace App\Http\Controllers\PBS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Import the User model
use App\Models\Product; // Import the Product model
use App\Models\Produk; // Import the Produk model
use App\Models\Transaksi; // Import the Transaksi model

class PengelolaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (!in_array(Auth::user()->role, ['pengelola', 'admin', 'nasabah'])) {
                return redirect('/')->with('error', 'Unauthorized access');
            }
            return $next($request);
        });
    }

    public function index()
    {
        // Main dashboard for pengelola
        return view('pengelola.dashboard');
    }

    public function alamat()
    {
        // Alamat page for pengelola
        return view('pengelola.alamat');
    }

    public function toko()
    {
        // Toko page for pengelola
        return view('pengelola.toko');
    }

    public function poin()
    {
        // Poin page for pengelola
        return view('pengelola.poin');
    }

    public function transaksi()
    {
        // Transaction management for pengelola
        return view('pengelola.transaksi');
    }

    public function nasabah()
    {
        // Nasabah management for pengelola
        return view('pengelola.nasabah');
    }

    public function laporan()
    {
        // Reports for pengelola
        return view('pengelola.laporan');
    }

    public function pesanan()
    {
        return view('pengelola.pesanan');
    }

    public function stores()
    {
        // Get all pengelola users (shop owners)
        $shops = \App\Models\User::where('role', 'pengelola')->paginate(8);
        return view('browse', compact('shops'));
    }

    public function browse()
    {
        $products = \App\Models\Produk::with('user')->paginate(12);

        // Add the likedByCurrentUser property for each product
        $products->getCollection()->transform(function ($product) {
            $product->likedByCurrentUser = \DB::table('product_likes')
                ->where('user_id', auth()->id())
                ->where('produk_id', $product->produk_id)
                ->exists();
            return $product;
        });

        $shops = \App\Models\User::where('role', 'pengelola')->get();
        return view('browse', compact('products', 'shops'));
    }

    public function storeProduct(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'deskripsi' => 'nullable|string',
            'kategori' => 'required|string',
            'status_ketersediaan' => 'required|boolean',
            'user_id' => 'required|exists:users,id',
        ]);

        // Change 'likes' to 'suka' in the data array
        $data = [
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'kategori' => $request->kategori,
            'status_ketersediaan' => $request->status_ketersediaan,
            'user_id' => $request->user_id,
            'suka' => 0  // Changed from 'likes' to 'suka' to match your database column
        ];

        $product = Produk::create($data);

        return redirect()->back()->with('success', 'Product created successfully');
    }

    // Show all pesanan for products owned by this pengelola
    public function pesananMasuk()
    {
        $pengelolaId = auth()->id();
        $pesananMasuk = Transaksi::with('produk')
            ->whereHas('produk', function($q) use ($pengelolaId) {
                $q->where('user_id', $pengelolaId);
            })
            ->whereIn('status', ['menunggu konfirmasi', 'sedang dikirim'])
            ->orderBy('created_at', 'desc')
            ->get();

        // Make sure the variable name matches what you use in the Blade
        return view('pengelola.pesanan', compact('pesananMasuk'));
    }

    // Verifikasi pesanan (set status to sedang dikirim)
    public function verifikasi($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        if ($transaksi->status !== 'menunggu konfirmasi') {
            return back()->with('error', 'Status tidak valid');
        }
        $transaksi->status = 'sedang dikirim';
        $transaksi->save();
        return back()->with('success', 'Pesanan telah diverifikasi dan diproses');
    }

    // Tandai selesai
    public function selesai($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        if ($transaksi->status !== 'sedang dikirim') {
            return back()->with('error', 'Status tidak valid');
        }
        $transaksi->status = 'selesai';
        $transaksi->save();
        return back()->with('success', 'Pesanan telah selesai');
    }

    // Tambahkan method tolak untuk menolak pesanan
    public function tolak($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->status = 'dibatalkan';
        $transaksi->save();

        return redirect()->back()->with('success', 'Pesanan ditolak');
    }
}