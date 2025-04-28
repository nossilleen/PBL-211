<?php

namespace App\Pulse\Recorders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;
use Laravel\Pulse\Facades\Pulse;

class ContentActivityRecorder
{
    /**
     * Register the recorder.
     */
    public function register(): void
    {
        // Menggunakan nilai placeholder sementara karena skema database tidak lengkap
        $this->recordPlaceholderData();
    }
    
    /**
     * Record placeholder data instead of actual database queries
     */
    protected function recordPlaceholderData(): void
    {
        // Record total articles
        Pulse::record('total-artikels', 'count', 25)
            ->count();
            
        // Record articles by category
        $categories = ['Ekonomi', 'Teknologi', 'Lingkungan', 'Bisnis', 'Edukasi'];
        $counts = [8, 5, 7, 3, 2];
        
        for ($i = 0; $i < count($categories); $i++) {
            Pulse::record('artikels-by-category', $categories[$i], $counts[$i])
                ->count();
        }
        
        // Record recent articles
        Pulse::record('recent-artikels', 'count', 12)
            ->count();
            
        // Record total feedback
        Pulse::record('total-feedback', 'count', 150)
            ->count();
            
        // Record feedback by article
        $articleTitles = [
            'Tips Mengelola Sampah Rumah Tangga', 
            'Investasi Berkelanjutan', 
            'Teknologi Ramah Lingkungan', 
            'Bisnis Daur Ulang', 
            'Cara Mudah Berhemat Listrik'
        ];
        $feedbackCounts = [45, 32, 28, 25, 20];
        
        for ($i = 0; $i < count($articleTitles); $i++) {
            Pulse::record('feedback-by-article', $articleTitles[$i], $feedbackCounts[$i])
                ->count();
        }
    }
} 