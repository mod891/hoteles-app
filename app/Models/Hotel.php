<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre', 'direccion', 'municipio', 'provincia', 'telefono', 'imagen'
    ];

    
    /**
     * Get the rooms for the hotel
     */
    public function rooms(): HasMany
    {
        return $this->hasMany(Room::class);//,'hotel_id'
    }
}
