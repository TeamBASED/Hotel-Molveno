<?php

namespace App\Models;

use App\Models\ReservationRoom;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReservationRoom extends Model
{
    use HasFactory;

    public static function getAllReservationRoomData() {
        return ReservationRoom::get();
    }
}
