<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtikelGambar extends Model
{
    use HasFactory;
    
    protected $table = 'artikel_gambar';
    protected $primaryKey = 'gambar_id';
    protected $fillable = ['artikel_id', 'file_path', 'judul'];
    
    public function artikel()
    {
        return $this->belongsTo(Artikel::class, 'artikel_id');
    }
} 