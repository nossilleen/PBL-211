<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PointHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'transaction_type',
        'amount',
        'description',
        'related_id',
        'related_type',
    ];

    public function user()
    {
        // Sertakan user yang di-soft-delete
        return $this->belongsTo(User::class, 'user_id', 'user_id')->withTrashed();
    }

    public function related()
    {
        return $this->morphTo();
    }
}
