<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    
    protected $table = 'feedback';
    protected $primaryKey = 'feedback_id';
    protected $fillable = ['komentar', 'user_id', 'artikel_id'];
    
    // Disable default timestamps
    public $timestamps = false;
    
    // Only use created_at timestamp
    protected $casts = [
        'created_at' => 'datetime',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function artikel()
    {
        return $this->belongsTo(Artikel::class, 'artikel_id');
    }
} 