<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'lokasi';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'lokasi_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama_lokasi',
        'alamat',
        'kota',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the users for the lokasi.
     */
    public function users()
    {
        return $this->hasMany(User::class, 'lokasi_id', 'lokasi_id');
    }

    /**
     * Get the transaksi for the lokasi.
     */
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'lokasi_id', 'lokasi_id');
    }

    /**
     * Get the poin for the lokasi.
     */
    public function poin()
    {
        return $this->hasMany(Poin::class, 'lokasi_id', 'lokasi_id');
    }
} 