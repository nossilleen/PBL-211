<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return redirect()->route('admin.artikel');
    }

    public function artikel()
    {
        return view('admin.artikel.index');
    }

    public function pengajuan()
    {
        return view('admin.pengajuan.index');
    }

    public function user()
    {
        return view('admin.user.index');
    }
} 