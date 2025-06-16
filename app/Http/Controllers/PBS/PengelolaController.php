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

    public function update(Request $request)
    {
    $request->validate([
        'latitude' => 'required|numeric',
        'longitude' => 'required|numeric',
    ]);

    $pengelola = auth()->user(); // atau model pengelola sesuai aplikasi Anda
    $pengelola->latitude = $request->latitude;
    $pengelola->longitude = $request->longitude;
    $pengelola->save();

    return back()->with('success', 'Lokasi berhasil disimpan!');
    }

    public function edit()
    {
    $pengelola = auth()->user(); // atau Pengelola::find($id)
    return view('pengelola.alamat', compact('pengelola'));
    }   

    public function index()
    {
        // Main dashboard for pengelola
        return view('pengelola.dashboard');
    }

    public function alamat()
    {
        $lokasi = \App\Models\Lokasi::where('user_id', auth()->id())->latest()->first();
        return view('pengelola.alamat', compact('lokasi'));
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

    public function browse(Request $request)
    {
        $search = $request->input('search');
        $sort   = $request->input('sort', 'terbaru');

        // ===== Produk =====
        $productQuery = \App\Models\Produk::with(['user', 'gambar']);

        // Pencarian produk
        if ($search) {
            $productQuery->where('nama_produk', 'like', "%{$search}%");
        }

        // Penyortiran produk
        if ($sort === 'populer') {
            $productQuery->orderByDesc('suka');
        } else {
            // Default terbaru berdasarkan created_at
            $productQuery->orderByDesc('created_at');
        }

        $products = $productQuery->paginate(12)->withQueryString();

        // Tandai apakah produk disukai oleh user saat ini
        $products->getCollection()->transform(function ($product) {
            $product->likedByCurrentUser = \DB::table('product_likes')
                ->where('user_id', auth()->id())
                ->where('produk_id', $product->produk_id)
                ->exists();
            return $product;
        });

        // ===== Shops =====
        $shopQuery = \App\Models\User::where('role', 'pengelola');

        if ($search) {
            $shopQuery->where('nama', 'like', "%{$search}%")
                      ->orWhere('alamat_toko', 'like', "%{$search}%");
        }

        // Saat ini, penyortiran toko berdasarkan popularitas belum tersedia,
        // jadi gunakan created_at untuk terbaru
        if ($sort === 'populer') {
            // Jika memiliki metrik popularitas toko, seperti jumlah produk atau transaksi,
            // tambahkan di sini. Untuk sementara, gunakan nama alfabet.
            $shopQuery->orderBy('nama');
        } else {
            $shopQuery->orderByDesc('created_at');
        }

        // Gunakan pagination 8 item per halaman
        $shops = $shopQuery->paginate(8)->withQueryString();

        return view('browse', compact('products', 'shops', 'search', 'sort'));
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
    public function pesananMasuk(Request $request)
    {
        $pengelolaId = auth()->id();
        $status = $request->get('status', 'menunggu konfirmasi');

        // Get statistics for cards
        $pesananBaru = Transaksi::whereHas('produk', function($q) use ($pengelolaId) {
            $q->where('user_id', $pengelolaId);
        })->where('status', 'menunggu konfirmasi')->count();

        $sedangDiproses = Transaksi::whereHas('produk', function($q) use ($pengelolaId) {
            $q->where('user_id', $pengelolaId);
        })->whereIn('status', ['diproses', 'sedang dikirim'])->count();

        $pesananSelesai = Transaksi::whereHas('produk', function($q) use ($pengelolaId) {
            $q->where('user_id', $pengelolaId);
        })->where('status', 'selesai')
          ->whereMonth('updated_at', now()->month)->count();

        $totalPendapatan = Transaksi::whereHas('produk', function($q) use ($pengelolaId) {
            $q->where('user_id', $pengelolaId);
        })->where('status', 'selesai')
          ->where('pay_method', 'transfer')
          ->sum('harga_total');

        // Update pesananMasuk query with proper pagination
        $pesananMasuk = Transaksi::with(['user', 'produk'])
            ->whereHas('produk', function($q) use ($pengelolaId) {
                $q->where('user_id', $pengelolaId);
            })
            ->where('status', $status)  // Filter by status
            ->orderBy('created_at', 'desc')
            ->paginate(5)  // Show 5 items per page
            ->withQueryString();  // Preserve other query parameters

        return view('pengelola.pesanan', compact(
            'pesananMasuk',
            'pesananBaru',
            'sedangDiproses',
            'pesananSelesai',
            'totalPendapatan',
            'status'
        ));
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

    public function updateAlamat(Request $request)
    {
        $request->validate([
            'nama_lokasi' => 'required|string|max:100',
            'alamat' => 'required|string|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        $data = [
            'nama_lokasi' => $request->nama_lokasi,
            'alamat' => $request->alamat,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'user_id' => auth()->id()
        ];

        // Cari lokasi yang sudah ada untuk pengguna yang sedang login
        $lokasi = \App\Models\Lokasi::where('user_id', auth()->id())->first();

        if ($lokasi) {
            // Jika lokasi sudah ada, perbarui datanya
            $lokasi->update($data);
        } else {
            // Jika belum ada lokasi, buat yang baru
            \App\Models\Lokasi::create($data);
        }

        return redirect()->route('pengelola.alamat')->with('success', 'Data lokasi berhasil disimpan!');
    }
}