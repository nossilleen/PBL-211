<?php

namespace App\Pulse\Recorders;

use Illuminate\Support\Carbon;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Event;
use Laravel\Pulse\Facades\Pulse;

class UserActivityRecorder
{
    /**
     * Register the recorder.
     */
    public function register(): void
    {
        // Register listeners for various user activities
        
        // User Login
        Event::listen(Login::class, function (Login $event) {
            Pulse::record('user-login')->value(1)
                ->data([
                    'user_id' => $event->user->id ?? 0,
                    'email' => $event->user->email ?? 'guest',
                    'role' => $event->user->role ?? 'guest',
                    'time' => Carbon::now()->timestamp,
                ])
                ->count();
        });
        
        // User Registration
        Event::listen(Registered::class, function (Registered $event) {
            Pulse::record('user-registered', 'register', 1)
                ->data([
                    'user_id' => $event->user->id ?? 0,
                    'email' => $event->user->email ?? 'unknown',
                    'role' => $event->user->role ?? 'nasabah',
                    'time' => Carbon::now()->timestamp,
                ])
                ->count();
        });
        
        // User Logout
        Event::listen(Logout::class, function (Logout $event) {
            Pulse::record('user-logout', 'logout', 1)
                ->data([
                    'user_id' => $event->user->id ?? 0,
                    'email' => $event->user->email ?? 'guest',
                    'time' => Carbon::now()->timestamp,
                ])
                ->count();
        });
    }
} 