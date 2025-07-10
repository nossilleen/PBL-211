<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtikelLike extends Model
{
    use HasFactory;

    protected $table = 'artikel_likes';

    protected $fillable = ['user_id', 'artikel_id'];

    public function user()
    {
        // Sertakan user yang sudah di-soft-delete
        return $this->belongsTo(User::class, 'user_id', 'user_id')->withTrashed();
    }

    public function artikel()
    {
        return $this->belongsTo(Artikel::class, 'artikel_id', 'artikel_id');
    }
}
