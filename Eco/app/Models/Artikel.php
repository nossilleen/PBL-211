<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'artikel';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'artikel_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'kategori',
        'judul',
        'konten',
        'tanggal_publikasi',
        'user_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'kategori' => 'string',
        'tanggal_publikasi' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the user that owns the artikel.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    /**
     * Get the gambar for the artikel.
     */
    public function gambar()
    {
        return $this->hasMany(ArtikelGambar::class, 'artikel_id', 'artikel_id');
    }

    /**
     * Get the feedback for the artikel.
     */
    public function feedback()
    {
        return $this->hasMany(Feedback::class, 'artikel_id', 'artikel_id');
    }
} 