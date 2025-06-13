<?php

namespace App\Http\Controllers\Workspace;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    /**
     * Menampilkan daftar pesanan aktif
     */
    public function pesananAktif()
    {
        $userId = Auth::id();
        $pesananAktif = Transaksi::with('produk')
            ->where('user_id', $userId)
            ->whereIn('status', ['belum dibayar', 'menunggu konfirmasi', 'sedang dikirim'])
            ->orderBy('created_at', 'desc')
            ->get();
    return view('pesanan.index', compact('pesananAktif'));
    }
    
    /**
     * Menampilkan riwayat transaksi (selesai/dibatalkan)
     */
    public function riwayatTransaksi()
    {
        $userId = Auth::id();
        $riwayatTransaksi = Transaksi::with('produk')
            ->where('user_id', $userId)
            ->whereIn('status', ['selesai', 'dibatalkan'])
            ->orderBy('created_at', 'desc')
            ->get();
            
        return view('pesanan.riwayat', compact('riwayatTransaksi'));
    }
    
    /**
     * Upload bukti transfer
     */
    public function uploadBukti(Request $request)
    {
        $request->validate([
            'transaksi_id' => 'required|exists:transaksi,transaksi_id',
            'bukti_transfer' => 'required|image|max:2048'
        ]);
        
        $transaksi = Transaksi::findOrFail($request->transaksi_id);
        
        // Periksa apakah transaksi milik user yang login
        if ($transaksi->user_id != Auth::id()) {
            return back()->with('error', 'Anda tidak memiliki akses ke transaksi ini');
        }
        
        // Periksa apakah status masih belum dibayar
        if ($transaksi->status != 'belum dibayar') {
            return back()->with('error', 'Status transaksi tidak valid untuk upload bukti');
        }
        
        // Upload file
        if ($request->hasFile('bukti_transfer')) {
            // Hapus bukti lama jika ada
            if ($transaksi->bukti_transfer) {
                Storage::delete('public/' . $transaksi->bukti_transfer);
            }
            
            // Simpan file baru
            $path = $request->file('bukti_transfer')->store('bukti_transfer', 'public');
            $transaksi->bukti_transfer = $path;
            $transaksi->status = 'menunggu konfirmasi';
            $transaksi->save();
            
            return redirect()->route('profile')->with('success', 'Bukti transfer berhasil diupload');
        }
        
        return back()->with('error', 'Terjadi kesalahan saat upload bukti transfer');
    }
    
    /**
     * Menampilkan detail transaksi
     */
    public function detail($id)
    {
        $transaksi = Transaksi::with('produk', 'lokasi')->findOrFail($id);
        
        // Periksa apakah transaksi milik user yang login
        if ($transaksi->user_id != Auth::id() && !Auth::user()->isAdmin()) {
            return redirect()->route('profile')->with('error', 'Anda tidak memiliki akses ke transaksi ini');
        }
        
        return view('pesanan.detail', compact('transaksi'));
    }
    
    /**
     * Membatalkan transaksi
     */
    public function cancel($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        
        // Periksa apakah transaksi milik user yang login
        if ($transaksi->user_id != Auth::id()) {
            return back()->with('error', 'Anda tidak memiliki akses ke transaksi ini');
        }
        
        // Periksa apakah status masih belum dibayar
        if ($transaksi->status != 'belum dibayar') {
            return back()->with('error', 'Transaksi tidak dapat dibatalkan');
        }
        
        $transaksi->status = 'dibatalkan';
        $transaksi->save();
        
        // Kembalikan poin jika metode pembayaran poin
        if ($transaksi->pay_method == 'poin' && $transaksi->poin_used > 0) {
            $user = $transaksi->user;
            $poin = $user->poin()->where('lokasi_id', $transaksi->lokasi_id)->first();
            
            if ($poin) {
                $poin->jumlah_poin += $transaksi->poin_used;
                $poin->save();
            }
        }
        
        return redirect()->route('profile')->with('success', 'Transaksi berhasil dibatalkan');
    }
    
    /**
     * Menandai transaksi sebagai selesai
     */
    public function complete($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        
        // Periksa apakah transaksi milik user yang login
        if ($transaksi->user_id != Auth::id()) {
            return back()->with('error', 'Anda tidak memiliki akses ke transaksi ini');
        }
        
        // Periksa apakah status sedang dikirim
        if ($transaksi->status != 'sedang dikirim') {
            return back()->with('error', 'Status transaksi tidak valid untuk diselesaikan');
        }
        
        $transaksi->status = 'selesai';
        $transaksi->save();
        
        return redirect()->route('profile')->with('success', 'Transaksi telah diselesaikan');
    }
    
    /**
     * Membeli produk
     */
    public function beli(Request $request)
    {
        $validated = $request->validate([
            'produk_id' => 'required|exists:produk,produk_id',
            'jumlah' => 'required|integer|min:1',
            'use_poin' => 'nullable|boolean',
        ]);

        $produk = Produk::where('produk_id', $validated['produk_id'])->first();
        if (!$produk) {
            return back()->with('error', 'Produk tidak ditemukan');
        }

        $user = auth()->user();
        $usePoin = $request->boolean('use_poin', false);

        if ($usePoin) {
            // Get points from correct column name
            $userTotalPoin = (int) DB::table('user')->where('user_id', $user->user_id)->value('points');
            $totalPoinNeeded = $produk->harga_points * $validated['jumlah'];

            \Log::info('Points debug', [
                'raw_points' => $userTotalPoin,
                'points_needed' => $totalPoinNeeded
            ]);

            if ($userTotalPoin < $totalPoinNeeded) {
                return back()->with('error', 'Poin tidak cukup');
            }

            try {
                DB::beginTransaction();

                $transaksi = Transaksi::create([
                    'user_id' => $user->user_id,
                    'produk_id' => $produk->produk_id,
                    'jumlah_produk' => $validated['jumlah'],
                    'harga_total' => 0,
                    'poin_used' => $totalPoinNeeded,
                    'tanggal' => now(),
                    'status' => 'sedang dikirim',
                    'pay_method' => 'poin',
                ]);

                // Update points using correct column name
                DB::table('user')
                    ->where('user_id', $user->user_id)
                    ->update(['points' => $userTotalPoin - $totalPoinNeeded]);

                DB::commit();
                return redirect()
                    ->route('profile')
                    ->with([
                        'success' => 'Pesanan berhasil dibuat',
                        'section' => 'pesanan'
                    ]);
            } catch (\Exception $e) {
                DB::rollBack();
                return back()->with('error', 'Gagal membuat pesanan: ' . $e->getMessage());
            }
        } else {
            try {
                $transaksi = Transaksi::create([
                    'user_id' => $user->user_id,
                    'produk_id' => $produk->produk_id,
                    'jumlah_produk' => $validated['jumlah'],
                    'harga_total' => $produk->harga * $validated['jumlah'],
                    'poin_used' => 0,
                    'tanggal' => now(),
                    'status' => 'belum dibayar',
                    'pay_method' => 'transfer',
                ]);

                return redirect()
                    ->route('profile')
                    ->with('success', 'Pesanan berhasil dibuat')
                    ->with('showSection', 'pesanan-section');
            } catch (\Exception $e) {
                return back()->with('error', 'Gagal membuat pesanan: ' . $e->getMessage());
            }
        }
    }
}