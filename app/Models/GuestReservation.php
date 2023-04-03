<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuestReservation extends Model
{
    use HasFactory;

    public static function getAllGuestReservationData() {
        return GuestReservation::get();
    }
    
    public static function getGuestReservationData(int $reservationId, int $guestId) {
        return GuestReservation::where(['reservation_id', $reservationId], ['guest_id', $guestId])->first();
    }

    public static function removeGuestFromReservation(int $reservationId, int $guestId) {
        $deleted = GuestReservation::where(getGuestReservationData($reservationId, $guestId))->delete();
    }
}
