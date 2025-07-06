<?php

namespace App\Http\Controllers\Workspace;

use App\Http\Controllers\Controller;
use App\Models\Upgrade;
use Illuminate\Http\Request;

class UpgradeController extends Controller
{
    public function UpgradeRequest(Request $request)
    {
        $userId = auth()->id();

        // Check for existing pending or in-review submission
        $existing = \App\Models\Upgrade::where('user_id', $userId)
            ->where('status', 'pending')
            ->first();

        if ($existing) {
            return redirect()->back()->with('error', 'Anda sudah mengajukan permohonan. Mohon tunggu verifikasi admin.');
        }

        $request->validate([
            'nama_bank_sampah' => 'required|string|max:255',
            'alasan_pengajuan' => 'required|string|max:1000',
        ]);

        try {
            Upgrade::create([
                'user_id' => auth()->id(),
                'nama_bank_sampah' => $request->nama_bank_sampah,
                'alamat_lengkap' => '-',
                'kota' => '-',
                'alasan_pengajuan' => $request->alasan_pengajuan,
                'status' => 'pending',
            ]);

            return redirect()->back()->with('success', 'Pengajuan upgrade berhasil dikirim.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}