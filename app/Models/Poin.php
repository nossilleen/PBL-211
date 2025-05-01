<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poin extends Model
{
    use HasFactory;
    
    protected $table = 'poin';
    protected $primaryKey = 'poin_id';
    protected $fillable = ['user_id', 'lokasi_id', 'jumlah_poin'];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class, 'lokasi_id');
    }
} 