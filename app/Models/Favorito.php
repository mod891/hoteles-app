<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Favorito extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'hotel_id'
    ];

    public function hotel(): BelongsTo
    {
        return $this->belongsTo(Hotel::class,'hotel_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }
}