<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductPermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $permission  Permission type: view, create, edit, delete
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $permission)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu');
        }

        // Admin memiliki akses penuh
        if ($user->role === 'admin') {
            return $next($request);
        }

        // Cek izin spesifik untuk pengelola
        $permissionField = 'can_' . $permission . '_product';
        
        // Pastikan field permission valid
        if (!in_array($permission, ['view', 'create', 'edit', 'delete'])) {
            \Log::warning('Invalid product permission requested: ' . $permission);
            return redirect()->back()->with('error', 'Permintaan izin tidak valid');
        }
        
        if ($user->role === 'pengelola' && $user->$permissionField) {
            return $next($request);
        }

        // Log penolakan akses
        \Log::info('Akses ditolak untuk user ' . $user->email . ' pada operasi ' . $permission . ' produk');

        // Berikan respons sesuai dengan tipe request
        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Anda tidak memiliki izin untuk operasi ini',
            ], 403);
        }

        return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk operasi ini (' . $permission . ')');
    }
}
