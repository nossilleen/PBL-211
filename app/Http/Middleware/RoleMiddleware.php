<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * Middleware sekarang dapat menerima beberapa role yang dipisahkan koma.
     * Selain itu, jika parameter role adalah "admin" maka role "superadmin"
     * juga dianggap valid sehingga hierarki akses tetap terjaga.
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!$request->user()) {
            return redirect('/')->with('error', 'Unauthorized access');
        }

        // Laravel akan mengirimkan setiap parameter sebagai elemen tersendiri dalam array $roles,
        // namun kita juga antisipasi pemisahan dengan koma jika hanya satu string.
        if (count($roles) === 1 && str_contains($roles[0], ',')) {
            $allowedRoles = array_map('trim', explode(',', $roles[0]));
        } else {
            $allowedRoles = $roles;
        }

        $userRole = $request->user()->role;

        // Jika admin termasuk di daftar allowedRoles, maka superadmin juga diizinkan otomatis
        if (in_array('admin', $allowedRoles) && $userRole === 'superadmin') {
            return $next($request);
        }

        if (!in_array($userRole, $allowedRoles)) {
            return redirect('/')->with('error', 'Unauthorized access');
        }

        return $next($request);
    }
}