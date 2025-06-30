<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DatabaseConnection extends Model
{
    protected $fillable = [
        'user_id',
        'ip_address',
        'connection_type',
        'status',
        'device_info'
    ];

    protected $casts = [
        'device_info' => 'array'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}