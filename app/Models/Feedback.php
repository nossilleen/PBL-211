<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    
    // Beri tahu Laravel bahwa tabel ini tidak memiliki kolom 'updated_at'
    const UPDATED_AT = null;

    protected $table = 'feedback';
    protected $primaryKey = 'feedback_id';
    protected $fillable = [
        'komentar',
        'user_id',
        'artikel_id',
        'parent_id' 
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    
public function user()
{
    // Include trashed (soft-deleted) users so their data is still accessible in feedback
    return $this->belongsTo(User::class, 'user_id')->withTrashed();
}

    public function artikel()
    {
        return $this->belongsTo(Artikel::class, 'artikel_id');
    }

    // Relasi untuk mendapatkan komentar INDUK (parent) dari sebuah balasan
    public function parent()
    {
        return $this->belongsTo(Feedback::class, 'parent_id', 'feedback_id');
    }

    // Relasi untuk mendapatkan SEMUA BALASAN (children) dari sebuah komentar
    public function replies()
    {
        return $this->hasMany(Feedback::class, 'parent_id', 'feedback_id');
    }
}