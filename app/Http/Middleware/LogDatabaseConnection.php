<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\DatabaseConnection;

class LogDatabaseConnection
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()) {
            DatabaseConnection::create([
                'user_id' => auth()->id(),
                'ip_address' => $request->ip(),
                'connection_type' => 'web',
                'status' => 'connected',
                'device_info' => json_encode([
                    'user_agent' => $request->userAgent(),
                    'timestamp' => now()
                ])
            ]);
        }

        return $next($request);
    }
}