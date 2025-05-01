<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    
    protected $table = 'produk';
    protected $primaryKey = 'produk_id';
    protected $fillable = [
        'nama_produk', 
        'kategori', 
        'status_ketersediaan', 
        'harga', 
        'suka', 
        'deskripsi', 
        'user_id'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function gambar()
    {
        return $this->hasMany(ProdukGambar::class, 'produk_id');
    }
    
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'produk_id');
    }
} 