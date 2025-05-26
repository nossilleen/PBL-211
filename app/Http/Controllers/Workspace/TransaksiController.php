<?php

namespace App\Http\Controllers\Workspace;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
} 