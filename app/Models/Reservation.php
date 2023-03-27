<?php

namespace App\Models;

use App\Models\Contact;
use App\Models\Invoice;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservation extends Model
{
    use HasFactory;

    public static function getAllReservationData() {
        return Reservation::with(['contact','rooms'])->get();
    }

    public static function getReservationData(int $id) {
        return Reservation::where('id', $id)->with(['contact','rooms'])->first();
    }

    public function rooms() {
        return $this->belongsToMany(Room::class, 'reservation_rooms');
    }

    public function contact() {
        return $this->belongsTo(Contact::class);
    }

    public function invoice() {
        return $this->hasOne(Invoice::class);
    }

    public static function getGuestByReservationId(int $reservationId) {
        return Reservation::where(['reservation_id', $reservationId])->with(['guest'])->get();
    }
}
