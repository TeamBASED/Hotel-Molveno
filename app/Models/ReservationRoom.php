<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReservationRoom extends Model {
    use HasFactory;

    protected $fillable = [
        'reservation_id',
        'room_id',
    ];

    public static function getAllReservationRoomData() {
        return ReservationRoom::get();
    }
}