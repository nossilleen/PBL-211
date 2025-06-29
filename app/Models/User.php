<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\PasswordResetNotification;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'user_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama',
        'email',
        'password',
        'no_hp',
        'role',
        'points',
        'deskripsi_toko',
        'jam_operasional',
        'nomor_rekening',
        'nama_bank_rekening',
        'foto_toko'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'poin' => 'integer',
        'meta' => 'array',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new PasswordResetNotification($token));
    }

    public function artikel()
    {
        return $this->hasMany(Artikel::class, 'user_id');
    }
    
    // use App\Models\User; ← pastikan ini ada di atas

public function likes()
{
    return $this->belongsToMany(User::class, 'artikel_likes', 'artikel_id', 'user_id')->withTimestamps();
}

public function isLikedBy($user)
{
    return $this->likes()->where('artikel_likes.user_id', $user?->id)->exists();
}

public function likedArtikels() {
    return $this->belongsToMany(Artikel::class, 'artikel_likes', 'user_id', 'artikel_id')->withTimestamps();
}


    public function produk()
    {
        return $this->hasMany(Produk::class, 'user_id');
    }
    
    public function poin()
    {
        return $this->hasMany(Poin::class, 'user_id');
    }
    
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'user_id');
    }
    
    public function feedback()
    {
        return $this->hasMany(Feedback::class, 'user_id');
    }

    public function pointHistories()
    {
        return $this->hasMany(PointHistory::class, 'user_id', 'user_id');
    }

    public function lokasi()
    {
        return $this->hasMany(Lokasi::class, 'user_id', 'user_id');
    }
    public function favoritArtikels()
{
    return $this->belongsToMany(Artikel::class, 'artikel_likes')->withTimestamps();
}


}
