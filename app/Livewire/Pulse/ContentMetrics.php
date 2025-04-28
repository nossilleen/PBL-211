<?php

namespace App\Livewire\Pulse;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\DB;
use Laravel\Pulse\Facades\Pulse;
use Laravel\Pulse\Livewire\Card;
use Livewire\Attributes\Lazy;

#[Lazy]
class ContentMetrics extends Card
{
    /**
     * Render the component.
     */
    public function render(): Renderable
    {
        // Count total articles
        $totalArtikels = DB::table('artikel')->count();
        
        // Count artikels by category
        $artikelsByCategory = DB::table('artikel')
            ->select('kategori', DB::raw('COUNT(*) as count'))
            ->groupBy('kategori')
            ->get()
            ->pluck('count', 'kategori')
            ->toArray();
            
        // Count recent artikels (within last 30 days)
        $recentArtikels = DB::table('artikel')
            ->where('created_at', '>=', now()->subDays(30))
            ->count();
            
        // Count total feedback
        $totalFeedback = DB::table('feedback')->count();
        
        // Get top 5 articles by feedback count
        $popularArticles = DB::table('feedback')
            ->select('artikel_id', DB::raw('COUNT(*) as feedback_count'))
            ->groupBy('artikel_id')
            ->orderByDesc('feedback_count')
            ->limit(5)
            ->get();
            
        // Get article titles
        $articleTitles = [];
        foreach ($popularArticles as $article) {
            $title = DB::table('artikel')
                ->where('artikel_id', $article->artikel_id)
                ->value('judul');
                
            $articleTitles[$article->artikel_id] = $title ?? 'Unknown Article';
        }
        
        // Metrics for display
        $metrics = [
            'totalArtikels' => $totalArtikels,
            'artikelsByCategory' => $artikelsByCategory,
            'recentArtikels' => $recentArtikels,
            'totalFeedback' => $totalFeedback,
            'popularArticles' => $popularArticles,
            'articleTitles' => $articleTitles,
            'lastUpdated' => now()->format('Y-m-d H:i:s'),
        ];
        
        return view('livewire.pulse.content-metrics', [
            'metrics' => $metrics,
        ]);
    }
} 