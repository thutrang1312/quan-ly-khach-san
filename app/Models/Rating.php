<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    
    protected $fillable = [
        'room_id',
        'user_id',
        'rating',
        'comment',
    ];

    

    // Quan hệ với model Room
    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    // Quan hệ với model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
