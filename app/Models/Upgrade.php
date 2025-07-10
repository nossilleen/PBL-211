<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upgrade extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama_bank_sampah',
        'alamat_lengkap',
        'kota',
        'alasan_pengajuan',
        'status',
    ];

    public function user()
    {
        // Sertakan user yang di-soft-delete
        return $this->belongsTo(User::class, 'user_id', 'user_id')->withTrashed();
    }
}
