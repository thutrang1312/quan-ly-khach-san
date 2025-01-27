<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'room_id',
        'name',
        'email',
        'phone',
        'start_date',
        'end_date',
        'total_price',
        'services'
    ];
    // public function room()
    // {
    //     return $this->hasOne('App\Models\Room', 'id', 'room_id');
    // }
    

    // Trong App\Models\Booking
public static function isRoomBooked($id, $startDate, $endDate) {
    // Kiểm tra nếu ngày kết thúc lớn hơn ngày bắt đầu
    if (strtotime($endDate) < strtotime($startDate)) {
        return true; // Hoặc bạn có thể ném một ngoại lệ nếu cần
    }

    // Kiểm tra phòng đã được đặt trong khoảng thời gian yêu cầu
    return self::where('room_id', $id)
        ->where(function($query) use ($startDate, $endDate) {
            $query->whereBetween('start_date', [$startDate, $endDate])
                  ->orWhereBetween('end_date', [$startDate, $endDate])
                  ->orWhere(function($q) use ($startDate, $endDate) {
                      $q->where('start_date', '<=', $startDate)
                        ->where('end_date', '>=', $endDate);
                  });
        })
        ->exists();
}


    // app/Models/Booking.php
    public function services()
    {
        return $this->belongsToMany(Service::class, 'booking_service');
    }
    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }


}
