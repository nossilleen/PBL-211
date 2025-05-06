<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;

    // Jika tabel kamu memang bernama 'events', ini bisa diabaikan
    // protected $table = 'events';

    // Field yang boleh diisi (fillable) melalui form atau seeder
    protected $fillable = [
        'title',
        'description',
        ];

    // Jika kamu ingin menyembunyikan kolom tertentu dari JSON (opsional)
    // protected $hidden = [];

   
}
