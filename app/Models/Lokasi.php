<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    use HasFactory;
    
    protected $table = 'lokasi';
    protected $primaryKey = 'lokasi_id';
    protected $fillable = ['nama_lokasi', 'alamat', 'kota'];
    
    public function poin()
    {
        return $this->hasMany(Poin::class, 'lokasi_id');
    }
    
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'lokasi_id');
    }
} 