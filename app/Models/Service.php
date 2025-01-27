<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['name', 'price', 'room_type']; 

    // app/Models/Service.php
    public function bookings()
    {
        return $this->belongsToMany(Booking::class, 'booking_service');
    }

}
