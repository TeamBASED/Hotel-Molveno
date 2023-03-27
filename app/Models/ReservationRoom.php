<?php

namespace App\Models;

use App\Models\ReservationRoom;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReservationRoom extends Model
{
    use HasFactory;

    protected $fillable = [
        'reservation_id',
        'room_id',
    ] ;

    public static function getAllReservationRoomData() {
        return ReservationRoom::get();
    }

    public static function deleteReservationRoomData($reservation_id) {
        $deleted = ReservationRoom::where('reservation_id', $reservation_id)->delete();
    }
}
