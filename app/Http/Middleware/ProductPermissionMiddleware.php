<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ProductPermissionMiddleware
{
    public function handle(Request $request, Closure $next, string $permission)
    {
        $user = $request->user();

        if (!$user) {
            return redirect()->route('login');
        }

        // Admin has all permissions
        if ($user->role === 'admin') {
            return $next($request);
        }

        // Check specific permissions for other users
        $hasPermission = match($permission) {
            'view' => $user->canViewProduct(),
            'create' => $user->canCreateProduct(),
            'edit' => $user->canEditProduct(),
            'delete' => $user->canDeleteProduct(),
            default => false
        };

        if (!$hasPermission) {
            return redirect()->back()->with('error', 'You do not have permission to perform this action.');
        }

        return $next($request);
    }
}
