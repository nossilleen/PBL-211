<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Visit;
use Illuminate\Support\Str;

class VisitTracker
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Daftar path yang ingin di-abaikan
        $excludedPaths = [
            'admin', 'admin/*',
            'login', 'logout', 'register',
            'livewire/*', 'pulse',
            'telescope', 'telescope/*'
        ];

        // Daftar ekstensi file yang ingin di-abaikan
        $excludedExtensions = ['js', 'css', 'woff', 'woff2', 'ttf', 'eot', 'svg', 'png', 'jpg', 'jpeg', 'gif', 'ico', 'map'];

        // Cek apakah path atau ekstensi harus diabaikan
        if ($this->shouldExclude($request, $excludedPaths, $excludedExtensions)) {
            return $next($request);
        }

        // Simpan data kunjungan
        Visit::create([
            'session_id' => $request->session()->getId(),
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'url' => $request->fullUrl(),
            'user_id' => auth()->id(),
        ]);

        return $next($request);
    }

    private function shouldExclude(Request $request, array $paths, array $extensions): bool
    {
        // Cek path
        foreach ($paths as $path) {
            if ($request->is($path)) {
                return true;
            }
        }

        // Cek ekstensi file
        $path = $request->path();
        $extension = pathinfo($path, PATHINFO_EXTENSION);
        if (in_array(strtolower($extension), $extensions, true)) {
            return true;
        }

        return false;
    }
}
