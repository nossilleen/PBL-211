<?php

namespace App\Livewire\Pulse;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\DB;
use Laravel\Pulse\Facades\Pulse;
use Laravel\Pulse\Livewire\Card;
use Livewire\Attributes\Lazy;

#[Lazy]
class UserActivity extends Card
{
    /**
     * Render the component.
     */
    public function render(): Renderable
    {
        // Get user login and registration counts for the last 7 days
        $loginCount = DB::table('pulse_entries')
            ->where('type', 'user-login')
            ->where('timestamp', '>=', now()->subDays(7)->timestamp)
            ->count();
            
        $registrationCount = DB::table('pulse_entries')
            ->where('type', 'user-registered')
            ->where('timestamp', '>=', now()->subDays(7)->timestamp)
            ->count();
            
        $logoutCount = DB::table('pulse_entries')
            ->where('type', 'user-logout')
            ->where('timestamp', '>=', now()->subDays(7)->timestamp)
            ->count();
        
        // Count total users
        $totalUsers = DB::table('user')->count();
        
        // Count users by role
        $usersByRole = DB::table('user')
            ->select('role', DB::raw('COUNT(*) as count'))
            ->groupBy('role')
            ->get()
            ->pluck('count', 'role')
            ->toArray();
            
        // Metrics for display
        $metrics = [
            'totalUsers' => $totalUsers,
            'loginCount' => $loginCount,
            'registrationCount' => $registrationCount,
            'logoutCount' => $logoutCount,
            'usersByRole' => $usersByRole,
            'lastUpdated' => now()->format('Y-m-d H:i:s'),
        ];
        
        return view('livewire.pulse.user-activity', [
            'metrics' => $metrics,
        ]);
    }
} 