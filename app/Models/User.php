<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\PasswordResetNotification;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Produk;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, SoftDeletes;

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
        'can_create_article',
        'can_create_event',
        'deskripsi_toko',
        'jam_operasional',
        'nomor_rekening',
        'nama_bank_rekening',
        'foto_toko',
        'alamat',
        'kecamatan',
        'kelurahan',
        'kode_pos'
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
        'poin' => 'integer',  // Add this to ensure proper type casting
        'deleted_at' => 'datetime',
        'can_create_article' => 'boolean',
        'can_create_event' => 'boolean',
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

    /**
     * Check if user has verified their email
     *
     * @return bool
     */
    public function hasVerifiedEmail()
    {
        return ! is_null($this->email_verified_at);
    }

    /**
     * Mark the given user's email as verified.
     *
     * @return bool
     */
    public function markEmailAsVerified()
    {
        return $this->forceFill([
            'email_verified_at' => $this->freshTimestamp(),
        ])->save();
    }

    public function artikel()
    {
        return $this->hasMany(Artikel::class, 'user_id');
    }
    
    // use App\Models\User; ← pastikan ini ada di atas

public function likedArtikels() {
    return $this->belongsToMany(Artikel::class, 'artikel_likes', 'user_id', 'artikel_id')->withTimestamps();
}


    public function produk()
    {
        return $this->hasMany(Produk::class, 'user_id');
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

    public function getFullAlamatAttribute()
    {
        // Gabungkan bagian alamat yang tersedia menjadi satu string rapi
        $parts = [
            $this->alamat,
            $this->kelurahan,
            $this->kecamatan,
            $this->kode_pos,
        ];

        return collect($parts)
            ->filter(fn($part) => !empty($part))
            ->implode(', ');
    }

    protected static function booted()
    {
        parent::booted();

        static::deleted(function (self $user) {
            // Saat user di-soft-delete, ubah semua produk miliknya menjadi unavailable
            Produk::where('user_id', $user->user_id)->update([
                'status_ketersediaan' => 'unavailable'
            ]);
        });
    }

}


