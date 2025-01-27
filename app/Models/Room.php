<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'room_title',
        'image',
        'description',
        'price',
        'wifi',
        'room_type'
    ];

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

}