<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DatabaseInteraction extends Model
{
    protected $fillable = [
        'user_id',
        'action_type', // create, read, update, delete
        'table_name',
        'record_id',
        'details',
        'status'
    ];

    protected $casts = [
        'details' => 'array'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}