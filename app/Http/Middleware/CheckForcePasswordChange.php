<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckForcePasswordChange
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && auth()->user()->force_password_change) {
            // Jika request bukan ke halaman force change password atau action-nya
            if (!$request->is('password/force-change') && !$request->is('password/force-update') && !$request->is('logout')) {
                return redirect()->route('password.force-change')
                    ->with('warning', 'Anda harus mengganti password default sebelum melanjutkan.');
            }
        }

        return $next($request);
    }
}
