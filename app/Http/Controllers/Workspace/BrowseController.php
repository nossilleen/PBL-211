<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BrowseController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $products = Produk::with(['user', 'gambar'])
            ->orderByRaw("FIELD(status_ketersediaan, 'Available', 'Unavailable')")
            ->get();

        // Add isLiked property for each product
        if ($user) {
            $likedIds = \DB::table('product_likes')
                ->where('user_id', $user->id)
                ->pluck('produk_id')
                ->toArray();
            foreach ($products as $product) {
                $product->isLiked = in_array($product->produk_id, $likedIds);
            }
        } else {
            foreach ($products as $product) {
                $product->isLiked = false;
            }
        }

        return view('browse', compact('products'));
    }
}