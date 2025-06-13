<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';
    protected $primaryKey = 'produk_id';

    protected $fillable = [
        'nama_produk',
        'harga',
        'harga_points',
        'deskripsi',
        'kategori',
        'status_ketersediaan',
        'user_id',
        'suka' 
    ];

    public function gambar()
    {
        return $this->hasMany(ProdukGambar::class, 'produk_id');
    }

    // Accessor to get the main image
    public function getImageUrlAttribute()
    {
        $image = $this->gambar->first();
        return $image ? Storage::url($image->file_path) : asset('images/default-image.jpg');
    }

    // Add user relationship
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function likedByCurrentUser()
    {
        return \DB::table('product_likes')
            ->where('user_id', auth()->id())
            ->where('produk_id', $this->produk_id)
            ->exists();
    }
}