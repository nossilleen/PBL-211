<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductLike extends Model
{
    use HasFactory;

    protected $table = 'product_likes';

    protected $fillable = ['user_id', 'produk_id'];

    public function user()
    {
        // Sertakan user yang di-soft-delete
        return $this->belongsTo(User::class, 'user_id', 'user_id')->withTrashed();
    }

    public function produk()
    {
        // Sertakan produk yang di-soft-delete
        return $this->belongsTo(Produk::class, 'produk_id', 'produk_id')->withTrashed();
    }
} 