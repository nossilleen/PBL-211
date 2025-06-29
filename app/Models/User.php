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
        'tanggal_lahir',
        'role',
        'jenis_kelamin',
        'alamat',
        'points',
        'foto_toko',
        'alamat_toko', 
        'jam_operasional',
        'deskripsi_toko',
        'nomor_rekening',
        'nama_bank_rekening',
        'can_view_product',
        'can_create_product', 
        'can_edit_product',
        'can_delete_product'
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
        'can_create_product' => 'boolean',
        'can_edit_product' => 'boolean',
        'can_delete_product' => 'boolean',
        'can_view_product' => 'boolean'
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

    // Helper methods untuk permissions
    public function canCreateProduct(): bool
    {
        return $this->role === 'admin' || $this->can_create_product;
    }

    public function canEditProduct(): bool
    {
        return $this->role === 'admin' || $this->can_edit_product;
    }

    public function canDeleteProduct(): bool
    {
        return $this->role === 'admin' || $this->can_delete_product;
    }

    public function canViewProduct(): bool
    {
        return $this->role === 'admin' || $this->can_view_product;
    }
}
