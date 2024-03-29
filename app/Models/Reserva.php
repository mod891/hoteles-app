<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reserva extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id','user_id', 'fecha_ini', 'fecha_fin', 'dias', 'precio',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class,'room_id');
    }
}

