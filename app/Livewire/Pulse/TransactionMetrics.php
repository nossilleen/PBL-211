<?php

namespace App\Livewire\Pulse;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\DB;
use Laravel\Pulse\Facades\Pulse;
use Laravel\Pulse\Livewire\Card;
use Livewire\Attributes\Lazy;

#[Lazy]
class TransactionMetrics extends Card
{
    /**
     * Render the component.
     */
    public function render(): Renderable
    {
        // Get transaction counts and value for the last 7 days
        $transactionData = [];
        $totalValue = 0;
        
        // Count total transactions
        $totalTransactions = DB::table('transaksi')->count();
        
        // Calculate average transaction value
        $avgTransactionValue = DB::table('transaksi')->avg('total_harga') ?? 0;
        
        // Get daily transaction data for the last 7 days
        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i)->format('Y-m-d');
            $dayStart = now()->subDays($i)->startOfDay();
            $dayEnd = now()->subDays($i)->endOfDay();
            
            $count = DB::table('transaksi')
                ->whereBetween('created_at', [$dayStart, $dayEnd])
                ->count();
                
            $value = DB::table('transaksi')
                ->whereBetween('created_at', [$dayStart, $dayEnd])
                ->sum('total_harga');
                
            $totalValue += $value;
            
            $transactionData[] = [
                'date' => $date,
                'count' => $count,
                'value' => $value,
            ];
        }
        
        // Get point metrics
        $totalPoints = DB::table('poin')->sum('jumlah_poin');
        
        // Get top 5 locations with most points
        $topLocations = DB::table('poin')
            ->select('lokasi_id', DB::raw('SUM(jumlah_poin) as total_points'))
            ->groupBy('lokasi_id')
            ->orderByDesc('total_points')
            ->limit(5)
            ->get();
            
        // Get location names
        $locationNames = [];
        foreach ($topLocations as $location) {
            $name = DB::table('lokasi')
                ->where('lokasi_id', $location->lokasi_id)
                ->value('nama_lokasi');
                
            $locationNames[$location->lokasi_id] = $name ?? 'Unknown Location';
        }
        
        // Metrics for display
        $metrics = [
            'totalTransactions' => $totalTransactions,
            'totalValue' => $totalValue,
            'avgTransactionValue' => $avgTransactionValue,
            'dailyData' => $transactionData,
            'totalPoints' => $totalPoints,
            'topLocations' => $topLocations,
            'locationNames' => $locationNames,
            'lastUpdated' => now()->format('Y-m-d H:i:s'),
        ];
        
        return view('livewire.pulse.transaction-metrics', [
            'metrics' => $metrics,
        ]);
    }
} 