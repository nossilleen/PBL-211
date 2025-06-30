<?php

namespace App\Http\Controllers\PBS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\ProdukGambar;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ProductController extends Controller
{
    public function index()
    {
        $products = Produk::where('user_id', auth()->id())->paginate(12);
        return view('pengelola.toko', compact('products'));
    }

    public function create()
    {
        return view('pengelola.products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'harga_points' => 'nullable|numeric|min:0',
            'deskripsi' => 'nullable|string',
            'kategori' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        try {
            $product = Produk::create([
                'nama_produk' => $validated['nama_produk'],
                'harga' => $validated['harga'],
                'harga_points' => $validated['harga_points'] ?? null,
                'deskripsi' => $validated['deskripsi'],
                'kategori' => $validated['kategori'],
                'status_ketersediaan' => 'Available',
                'user_id' => auth()->id(),
                'suka' => 0
            ]);

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->extension();
                $path = $image->storeAs('products', $imageName, 'public');

                ProdukGambar::create([
                    'produk_id' => $product->produk_id,
                    'file_path' => $path
                ]);
            }

            return redirect()->route('pengelola.toko')
                ->with('success', 'Produk berhasil dibuat!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Gagal membuat produk: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $product = Produk::findOrFail($id);
        
        // Check if user owns the product
        if ($product->user_id !== auth()->id()) {
            return redirect()->back()
                ->with('error', 'Anda tidak memiliki akses untuk mengedit produk ini');
        }

        return view('pengelola.products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'harga_points' => 'nullable|numeric|min:0',
            'deskripsi' => 'required|string',
            'kategori' => 'required|in:eco_enzim,sembako',
            'status_ketersediaan' => 'required|in:Available,Unavailable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        try {
            $product = Produk::findOrFail($id);
            
            // Check if user owns the product
            if ($product->user_id !== auth()->id()) {
                return redirect()->back()
                    ->with('error', 'Anda tidak memiliki akses untuk mengedit produk ini');
            }

            $product->update([
                'nama_produk' => $validated['nama_produk'],
                'harga' => $validated['harga'],
                'harga_points' => $validated['harga_points'] ?? null,
                'deskripsi' => $validated['deskripsi'],
                'kategori' => $validated['kategori'],
                'status_ketersediaan' => $validated['status_ketersediaan']
            ]);

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->extension();
                $path = $image->storeAs('products', $imageName, 'public');

                if ($product->gambar()->exists()) {
                    Storage::disk('public')->delete($product->gambar->first()->file_path);
                    $product->gambar()->delete();
                }

                ProdukGambar::create([
                    'produk_id' => $product->produk_id,
                    'file_path' => $path
                ]);
            }

            return redirect()->route('pengelola.toko')
                ->with('success', 'Produk berhasil diperbarui!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Gagal memperbarui produk: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $product = Produk::findOrFail($id);
            
            // Check if user owns the product
            if ($product->user_id !== auth()->id()) {
                return redirect()->back()
                    ->with('error', 'Anda tidak memiliki akses untuk menghapus produk ini');
            }

            foreach ($product->gambar as $image) {
                Storage::disk('public')->delete($image->file_path);
            }
            
            $product->gambar()->delete();
            $product->forceDelete();

            return redirect()->route('pengelola.toko')
                ->with('success', 'Produk berhasil dihapus!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal menghapus produk: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        // Ambil produk yang diminta beserta relasinya
        $product = Produk::with(['user', 'gambar'])->findOrFail($id);

        // Ambil produk lain dari toko (user) yang sama, kecuali produk yang sedang dilihat
        $relatedProducts = Produk::with('gambar')
            ->where('user_id', $product->user_id)
            ->where('produk_id', '!=', $product->produk_id)
            ->latest()
            ->take(4)
            ->get();

        return view('product-detail', compact('product', 'relatedProducts'));
    }

    public function toko()
    {
        $user = auth()->user();
        $products = Produk::where('user_id', auth()->id())->paginate(12);
        return view('pengelola.toko', compact('products', 'user'));
    }

    public function updateToko(Request $request)
    {
        $validated = $request->validate([
            'deskripsi_toko' => 'nullable|string',
            'jam_operasional' => 'required|string',
            'nomor_rekening' => 'required|string',
            'nama_bank_rekening' => 'required|string',
            'foto_toko' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $user = auth()->user();

        if ($request->hasFile('foto_toko')) {
            if ($user->foto_toko) {
                Storage::delete('public/' . $user->foto_toko);
            }
            $path = $request->file('foto_toko')->store('toko-photos', 'public');
            $validated['foto_toko'] = $path;
        }

        $user->update($validated);

        return redirect()->route('pengelola.toko')->with('success', 'Informasi toko berhasil diperbarui');
    }

    public function toggleLike(Request $request, $id)
    {
        try {
            $user = auth()->user(); // Get the currently logged-in user
            if (!$user) {
                return response()->json(['success' => false, 'message' => 'Not authenticated'], 401);
            }

            // Check if the product exists
            $product = \App\Models\Produk::findOrFail($id);

            // Check if the user already liked the product
            $alreadyLiked = \DB::table('product_likes')
                ->where('user_id', $user->user_id)
                ->where('produk_id', $product->produk_id)
                ->exists();

            if ($alreadyLiked) {
                // Unlike the product
                \DB::table('product_likes')
                    ->where('user_id', $user->user_id)
                    ->where('produk_id', $product->produk_id)
                    ->delete();

                // Decrement the likes count
                $product->decrement('suka');

                return response()->json([
                    'success' => true,
                    'isLiked' => false,
                    'suka' => $product->suka,
                ]);
            } else {
                // Like the product
                \DB::table('product_likes')->insert([
                    'user_id' => $user->user_id,
                    'produk_id' => $product->produk_id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                // Increment the likes count
                $product->increment('suka');

                return response()->json([
                    'success' => true,
                    'isLiked' => true,
                    'suka' => $product->suka,
                ]);
            }
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function getBestSellers()
    {
        return Produk::with('gambar')
            ->orderBy('suka', 'desc')
            ->take(4)
            ->get();
    }
}