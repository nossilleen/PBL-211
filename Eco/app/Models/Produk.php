<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'produk';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'produk_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama_produk',
        'kategori',
        'status_ketersediaan',
        'harga',
        'rating',
        'deskripsi',
        'user_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'harga' => 'integer',
        'rating' => 'decimal:1',
        'kategori' => 'string',
        'status_ketersediaan' => 'string',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the user that owns the produk.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    /**
     * Get the gambar for the produk.
     */
    public function gambar()
    {
        return $this->hasMany(ProdukGambar::class, 'produk_id', 'produk_id');
    }

    /**
     * Get the transaksi_item for the produk.
     */
    public function transaksiItem()
    {
        return $this->hasMany(TransaksiItem::class, 'produk_id', 'produk_id');
    }
} 