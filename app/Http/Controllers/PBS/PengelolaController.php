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
        // Izinkan akses tanpa login ke halaman browse dan stores
        $this->middleware('auth')->except(['browse', 'stores']);

        // Middleware role-based hanya diterapkan jika pengguna telah login
        $this->middleware(function ($request, $next) {
            if (Auth::check() && !in_array(Auth::user()->role, ['pengelola', 'admin', 'superadmin', 'nasabah'])) {
                return redirect('/')->with('error', 'Unauthorized access');
            }
            return $next($request);
        })->except(['browse', 'stores']);
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
        $pengelolaId = auth()->id();
        // Card stats
        $totalTransaksi = \App\Models\Transaksi::whereHas('produk', function($q) use ($pengelolaId) {
            $q->where('user_id', $pengelolaId);
        })->count();
        $totalSelesai = \App\Models\Transaksi::whereHas('produk', function($q) use ($pengelolaId) {
            $q->where('user_id', $pengelolaId);
        })->where('status', 'selesai')->count();
        $totalPendapatan = \App\Models\Transaksi::whereHas('produk', function($q) use ($pengelolaId) {
            $q->where('user_id', $pengelolaId);
        })->where('status', 'selesai')->where('pay_method', 'transfer')->sum('harga_total');
        $totalPoinTerkirim = \App\Models\PointHistory::where('user_id', $pengelolaId)
            ->where('transaction_type', 'debit')->sum('amount');

        // Activity feed
        $poinActivities = \App\Models\PointHistory::with('user')
            ->where('user_id', $pengelolaId)
            ->where('transaction_type', 'debit')
            ->latest()->take(5)->get();
        $transaksiActivities = \App\Models\Transaksi::with(['produk', 'user'])
            ->whereHas('produk', function($q) use ($pengelolaId) {
                $q->where('user_id', $pengelolaId);
            })
            ->where('status', 'selesai')
            ->latest('tanggal')->take(5)->get();

        // Transaction statistics (last 30 days)
        $startDate = now()->subDays(29)->startOfDay();
        $endDate = now()->endOfDay();
        $dateRange = collect(range(0, 29))->map(function($i) use ($startDate) {
            return $startDate->copy()->addDays($i)->format('Y-m-d');
        });
        $completedStats = \App\Models\Transaksi::whereHas('produk', function($q) use ($pengelolaId) {
                $q->where('user_id', $pengelolaId);
            })
            ->where('status', 'selesai')
            ->whereBetween('tanggal', [$startDate, $endDate])
            ->get()
            ->groupBy(function($trx) { return $trx->tanggal->format('Y-m-d'); });
        $pendingStats = \App\Models\Transaksi::whereHas('produk', function($q) use ($pengelolaId) {
                $q->where('user_id', $pengelolaId);
            })
            ->whereNotIn('status', ['selesai', 'dibatalkan'])
            ->whereBetween('tanggal', [$startDate, $endDate])
            ->get()
            ->groupBy(function($trx) { return $trx->tanggal->format('Y-m-d'); });
        $chartData30 = $dateRange->map(function($date) use ($completedStats, $pendingStats) {
            return [
                'date' => $date,
                'completed' => isset($completedStats[$date]) ? $completedStats[$date]->count() : 0,
                'pending' => isset($pendingStats[$date]) ? $pendingStats[$date]->count() : 0,
            ];
        });

        // Transaction statistics (all time)
        $allDates = \App\Models\Transaksi::whereHas('produk', function($q) use ($pengelolaId) {
                $q->where('user_id', $pengelolaId);
            })
            ->orderBy('tanggal')
            ->pluck('tanggal')->map(function($d) { return \Carbon\Carbon::parse($d)->format('Y-m-d'); })->unique()->values();
        $completedStatsAll = \App\Models\Transaksi::whereHas('produk', function($q) use ($pengelolaId) {
                $q->where('user_id', $pengelolaId);
            })
            ->where('status', 'selesai')
            ->get()
            ->groupBy(function($trx) { return $trx->tanggal->format('Y-m-d'); });
        $pendingStatsAll = \App\Models\Transaksi::whereHas('produk', function($q) use ($pengelolaId) {
                $q->where('user_id', $pengelolaId);
            })
            ->whereNotIn('status', ['selesai', 'dibatalkan'])
            ->get()
            ->groupBy(function($trx) { return $trx->tanggal->format('Y-m-d'); });
        $chartDataAll = $allDates->map(function($date) use ($completedStatsAll, $pendingStatsAll) {
            return [
                'date' => $date,
                'completed' => isset($completedStatsAll[$date]) ? $completedStatsAll[$date]->count() : 0,
                'pending' => isset($pendingStatsAll[$date]) ? $pendingStatsAll[$date]->count() : 0,
            ];
        });

        return view('pengelola.dashboard', compact(
            'totalTransaksi',
            'totalSelesai',
            'totalPendapatan',
            'totalPoinTerkirim',
            'poinActivities',
            'transaksiActivities',
            'chartData30',
            'chartDataAll'
        ));
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
        // ----------------------
        // PRODUCTS QUERY
        // ----------------------
        $productsQuery = \App\Models\Produk::with('user');

        // Pencarian berdasarkan nama / deskripsi produk
        if ($request->filled('search')) {
            $keyword = $request->search;
            $productsQuery->where(function ($q) use ($keyword) {
                $q->where('nama_produk', 'like', "%{$keyword}%")
                  ->orWhere('deskripsi', 'like', "%{$keyword}%");
            });
        }

        // Pastikan produk "Available" muncul lebih dulu
        $productsQuery->orderByRaw("CASE WHEN LOWER(status_ketersediaan) = 'available' THEN 0 ELSE 1 END");

        // Pertahankan urutan asli (populer / terbaru) di dalam masing-masing kelompok
        if ($request->sort === 'populer') {
            $productsQuery->orderByDesc('suka');
        } else { // default terbaru
            $productsQuery->orderByDesc('created_at');
        }

        $products = $productsQuery->paginate(15, ['*'], 'product_page')->withQueryString();

        // Tandai apakah produk sudah dilike oleh user saat ini
        $products->getCollection()->transform(function ($product) {
            $product->likedByCurrentUser = auth()->check() && \DB::table('product_likes')
                ->where('user_id', auth()->id())
                ->where('produk_id', $product->produk_id)
                ->exists();
            return $product;
        });

        // ----------------------
        // SHOPS QUERY
        // ----------------------
        $shopsQuery = \App\Models\User::where('role', 'pengelola');

        if ($request->filled('search')) {
            $keyword = $request->search;
            $shopsQuery->where(function ($q) use ($keyword) {
                $q->where('nama', 'like', "%{$keyword}%")
                  ->orWhere('deskripsi_toko', 'like', "%{$keyword}%");
            });
        }

        // Untuk toko, terpopuler dapat diartikan sebagai toko dengan total suka produk terbanyak
        if ($request->sort === 'populer') {
            $shopsQuery->withSum('produk as total_suka', 'suka')
                       ->orderByDesc('total_suka');
        } else {
            $shopsQuery->orderByDesc('created_at');
        }

        $shops = $shopsQuery->paginate(15, ['*'], 'shop_page')->withQueryString();

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
    public function pesananMasuk(Request $request)
    {
        $pengelolaId = auth()->id();
        $status = $request->get('status', 'menunggu konfirmasi');
        // Ambil keyword pencarian (jika ada)
        $search = $request->get('search');

        // Get statistics for cards
        $pesananBaru = Transaksi::whereHas('produk', function($q) use ($pengelolaId) {
            $q->where('user_id', $pengelolaId);
        })->where('status', 'menunggu konfirmasi')->count();

        $sedangDiproses = Transaksi::whereHas('produk', function($q) use ($pengelolaId) {
            $q->where('user_id', $pengelolaId);
        })->where('status', 'diproses')->count();

        // Hitung pesanan yang sedang dikirim
        $sedangDikirim = Transaksi::whereHas('produk', function($q) use ($pengelolaId) {
            $q->where('user_id', $pengelolaId);
        })->where('status', 'sedang dikirim')->count();

        $pesananSelesai = Transaksi::whereHas('produk', function($q) use ($pengelolaId) {
            $q->where('user_id', $pengelolaId);
        })->where('status', 'selesai')
          ->whereMonth('updated_at', now()->month)->count();

        $totalPendapatan = Transaksi::whereHas('produk', function($q) use ($pengelolaId) {
            $q->where('user_id', $pengelolaId);
        })->where('status', 'selesai')
          ->where('pay_method', 'transfer')
          ->sum('harga_total');

        // Build query pesanan dengan filter status & pencarian nama pembeli
        $pesananQuery = Transaksi::with(['user', 'produk'])
            ->whereHas('produk', function($q) use ($pengelolaId) {
                $q->where('user_id', $pengelolaId);
            })
            ->where('status', $status);

        // Jika ada kata kunci pencarian, filter berdasarkan nama pembeli
        if ($search) {
            $pesananQuery->where(function($query) use ($search) {
                // Cari berdasarkan nama pembeli
                $query->whereHas('user', function($q) use ($search) {
                    $q->where('nama', 'like', "%{$search}%");
                })
                // ATAU cari berdasarkan nama produk
                ->orWhereHas('produk', function($q) use ($search) {
                    $q->where('nama_produk', 'like', "%{$search}%");
                })
                // ATAU cari berdasarkan ID transaksi
                ->orWhere('transaksi_id', 'like', "%{$search}%");
            });
        }

        // Pagination & sorting
        $pesananMasuk = $pesananQuery
            ->orderBy('created_at', 'desc')
            ->paginate(5)
            ->withQueryString();

        return view('pengelola.pesanan', compact(
            'pesananMasuk',
            'pesananBaru',
            'sedangDiproses',
            'pesananSelesai',
            'totalPendapatan',
            'status',
            'sedangDikirim'
        ));
    }

    // Verifikasi pesanan (set status to sedang dikirim)
    public function verifikasi($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        if ($transaksi->status !== 'menunggu konfirmasi') {
            return back()->with('error', 'Status tidak valid');
        }

        // Validasi input estimasi_hari
        request()->validate([
            'estimasi_hari' => 'required|integer|min:1'
        ]);

        $transaksi->estimasi_hari = request('estimasi_hari');
        $transaksi->status = 'diproses';
        $transaksi->save();

        return back()->with('success', 'Pesanan telah diverifikasi dan diproses dengan estimasi '.request('estimasi_hari').' hari');
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

    // Tandai pesanan sebagai dikirim
    public function kirim($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        if ($transaksi->status !== 'diproses') {
            return back()->with('error', 'Status tidak valid');
        }
        $transaksi->status = 'sedang dikirim';
        $transaksi->save();
        return back()->with('success', 'Pesanan telah ditandai sebagai sedang dikirim');
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

    public function riwayat()
    {
        $pengelolaId = auth()->id();
        $riwayatTransaksi = \App\Models\Transaksi::with(['produk', 'user'])
            ->whereHas('produk', function($q) use ($pengelolaId) {
                $q->where('user_id', $pengelolaId);
            })
            ->orderByDesc('tanggal')
            ->paginate(10)
            ->withQueryString();
        return view('pengelola.riwayat', compact('riwayatTransaksi'));
    }
}