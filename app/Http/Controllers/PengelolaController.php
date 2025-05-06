<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengelolaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // Check if user is pengelola
        $this->middleware(function ($request, $next) {
            if (Auth::user()->role !== 'pengelola') {
                return redirect('/')->with('error', 'Unauthorized access');
            }
            return $next($request);
        });
    }

    public function index()
    {
        // Main dashboard for pengelola
        return view('pengelola.dashboard');
    }

    public function alamat()
    {
        // Alamat page for pengelola
        return view('pengelola.alamat');
    }

    public function toko()
    {
        // Toko page for pengelola
        return view('pengelola.toko');
    }

    public function poin()
    {
        // Poin page for pengelola
        return view('pengelola.poin');
    }

    public function transaksi()
    {
        // Transaction management for pengelola
        return view('pengelola.transaksi');
    }

    public function nasabah()
    {
        // Nasabah management for pengelola
        return view('pengelola.nasabah');
    }

    public function laporan()
    {
        // Reports for pengelola
        return view('pengelola.laporan');
    }
} 