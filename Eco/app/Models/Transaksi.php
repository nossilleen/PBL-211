<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'transaksi';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'transaksi_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'lokasi_id',
        'harga_total',
        'poin_used',
        'tanggal',
        'status',
        'pay_method',
        'ref_number',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'harga_total' => 'integer',
        'poin_used' => 'integer',
        'tanggal' => 'datetime',
        'status' => 'string',
        'pay_method' => 'string',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the user that owns the transaksi.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    /**
     * Get the lokasi that owns the transaksi.
     */
    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class, 'lokasi_id', 'lokasi_id');
    }

    /**
     * Get the items for the transaksi.
     */
    public function items()
    {
        return $this->hasMany(TransaksiItem::class, 'transaksi_id', 'transaksi_id');
    }
} 