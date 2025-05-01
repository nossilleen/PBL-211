<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukGambar extends Model
{
    use HasFactory;
    
    protected $table = 'produk_gambar';
    protected $primaryKey = 'gambar_id';
    protected $fillable = ['produk_id', 'file_path'];
    
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }
} 