<?php

namespace App\Http\Controllers\Workspace;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    // ProfileController.php
public function index()
{
    $user = Auth::user();
    $artikelFavorit = $user->artikelFavorit()->latest()->get();

    return view('profil', compact('artikelFavorit'));
}

    //
}
