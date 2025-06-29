<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManageProductAccess
{
    public function handle(Request $request, Closure $next, $operations)
    {
        $user = Auth::user();
        
        // Admin memiliki akses penuh
        if ($user->role === 'admin') {
            return $next($request);
        }

        // Parse operations yang diizinkan (create,read,update,delete)
        $allowedOps = explode('|', $operations);

        // Cek hak akses pengelola
        if ($user->role === 'pengelola') {
            $currentOp = $this->getOperationType($request);
            $allowedOps = $user->meta['product_operations'] ?? [];
            
            if (!in_array($currentOp, $allowedOps)) {
                return response()->json([
                    'message' => 'Akses ditolak untuk operasi ini',
                    'notification' => 'Akses produk dinonaktifkan',
                    'required_access' => $currentOp,
                    'your_access' => $allowedOps
                ], 403);
            }
        }

        return $next($request);
    }

    protected function getOperationType($request)
    {
        if ($request->isMethod('post')) return 'create';
        if ($request->isMethod('get')) return 'read'; 
        if ($request->isMethod('put') || $request->isMethod('patch')) return 'update';
        if ($request->isMethod('delete')) return 'delete';
    }
}
