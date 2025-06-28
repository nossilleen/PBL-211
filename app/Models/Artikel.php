<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;
    
    protected $table = 'artikel';
    protected $primaryKey = 'artikel_id';
    protected $fillable = [
        'kategori', 
        'judul', 
        'konten', 
        'tanggal_publikasi', 
        'user_id'
    ];
    
    protected $casts = [
        'tanggal_publikasi' => 'date',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
    public function likes()
{
    return $this->hasMany(ArtikelLike::class, 'artikel_id', 'artikel_id');
}

public function isLikedBy($user)
{
    return $this->likes()->where('user_id', $user?->user_id)->exists();
}

public function likedByUsers() {
    return $this->belongsToMany(User::class, 'artikel_likes', 'artikel_id', 'user_id')->withTimestamps();
}

    
    public function gambar()
    {
        return $this->hasMany(ArtikelGambar::class, 'artikel_id');
    }
    
   
public function feedback()
{
    return $this->hasMany(Feedback::class, 'artikel_id', 'artikel_id')->latest();
}
    
    public function setJudulAttribute($value)
    {
        $this->attributes['judul'] = $value;
        $this->attributes['slug'] = \Str::slug($value);
    }
}