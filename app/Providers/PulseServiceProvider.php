<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Pulse\Facades\Pulse;
use Laravel\Pulse\Http\Middleware\Authorize;
use Illuminate\Http\Request;
use Closure;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Livewire\Livewire;
use App\Livewire\Pulse\UserActivity;
use App\Livewire\Pulse\TransactionMetrics;
use App\Livewire\Pulse\ContentMetrics;

class PulseServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Define gate untuk Pulse
        Gate::define('viewPulse', function ($user = null) {
            return true; // Izinkan akses untuk semua orang (development)
            // return $user !== null; // Hanya user yang login (production)
            // return $user && $user->isAdmin(); // Hanya admin (production)
        });

        // Override default authorize middleware
        $this->app->bind(Authorize::class, function ($app) {
            return new class($app->make(GateContract::class)) extends Authorize {
                public function handle(Request $request, Closure $next): mixed
                {
                    // Kita bisa langsung melewatinya dan tidak memanggil parent::handle
                    // yang akan memeriksa gate viewPulse
                    return $next($request);
                }
            };
        });
        
        // Register livewire components
        Livewire::component('pulse.user-activity', UserActivity::class);
        Livewire::component('pulse.transaction-metrics', TransactionMetrics::class);
        Livewire::component('pulse.content-metrics', ContentMetrics::class);
    }
}
