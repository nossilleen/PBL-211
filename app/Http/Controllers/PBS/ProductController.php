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
        // Use paginate for current user's products
        $products = Produk::where('user_id', auth()->id())->paginate(12);
        $allProducts = Produk::where('user_id', auth()->id())->get();
        $user = auth()->user();
        return view('pengelola.toko', compact('products', 'allProducts', 'user'));
    }

    public function create()
    {
        // Show the form to create a new product
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
            // Create product
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

            // Handle image upload
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->extension();
                // Update storage path
                $path = $image->storeAs('products', $imageName, 'public');

                // Update file path in database
                ProdukGambar::create([
                    'produk_id' => $product->produk_id,
                    'file_path' => $path
                ]);
            }

            return redirect()->route('pengelola.toko')
                ->with('success', 'Product created successfully!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to create product: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        // Show the form to edit an existing product
        $product = Produk::findOrFail($id); // Use the correct model
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
            'status_ketersediaan' => 'required|in:Available,Unavailable', // Updated to match enum
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        try {
            $product = Produk::findOrFail($id);
            
            if ($product->user_id !== auth()->id()) {
                return redirect()->back()->with('error', 'Unauthorized action.');
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

                // Delete old image if exists
                if ($product->gambar()->exists()) {
                    Storage::disk('public')->delete($product->gambar->first()->file_path);
                    $product->gambar()->delete();
                }

                // Create new image record
                ProdukGambar::create([
                    'produk_id' => $product->produk_id,
                    'file_path' => $path
                ]);
            }

            return redirect()->route('pengelola.toko')
                ->with('success', 'Product updated successfully!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to update product: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $product = Produk::findOrFail($id);
            
            if ($product->user_id !== auth()->id()) {
                return redirect()->back()->with('error', 'Unauthorized action.');
            }

            // Delete associated images from storage
            foreach ($product->gambar as $image) {
                Storage::disk('public')->delete($image->file_path);
            }
            
            $product->gambar()->delete(); // Delete image records
            $product->forceDelete(); // Permanently delete the product

            return redirect()->route('pengelola.toko')
                ->with('success', 'Product deleted successfully!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Failed to delete product: ' . $e->getMessage());
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
        // Paginate for grid display
        $products = Produk::where('user_id', auth()->id())->paginate(12);
        // Fetch full list for availability modal
        $allProducts = Produk::where('user_id', auth()->id())->get();
        return view('pengelola.toko', compact('products', 'allProducts', 'user'));
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

                // Decrement the likes count, but never below 0
                $product->suka = max(0, $product->suka - 1);
                $product->save();

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

    public function bulkUpdateAvailability(Request $request)
    {
        $validated = $request->validate([
            'produk_ids' => 'required|array',
            'status_ketersediaan' => 'required|in:Available,Unavailable',
        ]);

        // Ensure only products owned by current user are updated
        Produk::whereIn('produk_id', $validated['produk_ids'])
            ->where('user_id', auth()->id())
            ->update(['status_ketersediaan' => $validated['status_ketersediaan']]);

        return redirect()->route('pengelola.toko')
            ->with('success', 'Status ketersediaan produk berhasil diperbarui');
    }
}