<?php

namespace App\Http\Controllers\PBS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PointHistory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PoinController extends Controller
{
    public function index(Request $request)
    {
        $query = PointHistory::with('user')
                                    ->where('transaction_type', 'credit');
        
        if ($request->has('period')) {
            switch ($request->period) {
                case 'today':
                    $query->whereDate('created_at', today());
                    break;
                case 'this_week':
                    $query->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
                    break;
                case 'this_month':
                    $query->whereMonth('created_at', now()->month)->whereYear('created_at', now()->year);
                    break;
            }
        }
        
        if ($request->has('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        if ($request->has('search')) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->search . '%');
            });
        }

        $histories = $query->latest()->paginate(10);
                                    
        return view('pengelola.poin', compact('histories'));
    }

    public function searchUser(Request $request)
    {
        $query = $request->get('query');
        if (!$query) {
            return response()->json([]);
        }

        $users = User::where('role', 'nasabah')
             ->where(function ($q) use ($query) {
                 $q->where('nama', 'LIKE', "%{$query}%")
                   ->orWhere('user_id', 'LIKE', "%{$query}%");
             })
             ->select('user_id', 'nama', 'points')
             // Prioritaskan yang cocok di awal
             ->orderByRaw("CASE 
                WHEN nama LIKE '{$query}%' THEN 1
                WHEN user_id LIKE '{$query}%' THEN 2
                ELSE 3
             END")
             ->take(10)
             ->get();

        return response()->json($users);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:user,user_id',
            'wasteWeight' => 'required|numeric|min:0.1',
            'weightUnit' => 'required|in:kg,g',
        ]);

        $weightInKg = $request->weightUnit === 'g' ? $request->wasteWeight / 1000 : $request->wasteWeight;
        $points = floor($weightInKg * 100); // Aturan: 1 kg = 100 poin

        if ($points <= 0) {
            return back()->with('error', 'Jumlah poin yang dihasilkan harus lebih dari 0.');
        }

        DB::beginTransaction();
        try {
            $user = User::find($request->user_id);

            // 1. Catat riwayat
            PointHistory::create([
                'user_id' => $user->user_id,
                'transaction_type' => 'credit',
                'amount' => $points,
                'description' => "Konversi {$request->wasteWeight} {$request->weightUnit} sampah",
                'status' => 'berhasil',
            ]);

            // 2. Update poin pengguna
            $user->increment('points', $points);

            DB::commit();

            return back()->with('success', "Berhasil menambahkan {$points} poin kepada {$user->nama}.");

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Gagal konversi poin: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan pada server. Silakan coba lagi.');
        }
    }
} 