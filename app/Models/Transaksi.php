<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    
    protected $table = 'transaksi';
    protected $primaryKey = 'transaksi_id';
    protected $fillable = [
        'user_id',
        'lokasi_id',
        'produk_id',
        'jumlah_produk',
        'harga_total',
        'poin_used',
        'tanggal',
        'status',
        'pay_method',
        'bukti_transfer'
    ];
    
    protected $casts = [
        'tanggal' => 'datetime',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class, 'lokasi_id');
    }
    
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }
} 