<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ProdukGambar extends Model
{
    use HasFactory;
    
    protected $table = 'produk_gambar';
    protected $primaryKey = 'gambar_id';
    
    protected $fillable = [
        'produk_id',
        'file_path'
    ];

    // Remove timestamps from fillable since they're automatically handled by Laravel
    public $timestamps = true;

    // Define relationship with Produk model
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id', 'produk_id');
    }

    // Add accessor for full image URL
    public function getImageUrlAttribute()
    {
        return $this->file_path ? Storage::url($this->file_path) : asset('images/default-image.jpg');
    }
}