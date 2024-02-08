<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use App\Models\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Room extends Model
{
    use HasFactory;


    protected $fillable = [
        'hotel_id','descripcion', 'fumadores', 'minibar', 'balcon', 'cama_matrimonio', 'precio'
    ];

    /**
     * Get the hotel that owns the room.
    */
    public function hotel(): BelongsTo
    {
        return $this->belongsTo(Hotel::class,'hotel_id');
    }
}
