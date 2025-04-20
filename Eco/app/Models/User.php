<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasApiTokens, HasFactory, Notifiable;

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
        'lokasi_id',
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
        'role' => 'string',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the lokasi that owns the user.
     */
    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class, 'lokasi_id', 'lokasi_id');
    }

    /**
     * Get the artikel for the user.
     */
    public function artikel()
    {
        return $this->hasMany(Artikel::class, 'user_id', 'user_id');
    }

    /**
     * Get the produk for the user.
     */
    public function produk()
    {
        return $this->hasMany(Produk::class, 'user_id', 'user_id');
    }

    /**
     * Get the transaksi for the user.
     */
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'user_id', 'user_id');
    }

    /**
     * Get the poin for the user.
     */
    public function poin()
    {
        return $this->hasMany(Poin::class, 'user_id', 'user_id');
    }
}
