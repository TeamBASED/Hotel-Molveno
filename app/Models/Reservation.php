<?php

namespace App\Models;

use App\Models\Contact;
use App\Models\Invoice;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable= [
        'date_of_arrival',
        'date_of_departure',
        'contact_id',
        'invoice_id',
        // 'room_number', 
        // 'capacity', 
        // 'base_price_per_night',
        // 'bed_configuration',
        // 'baby_bed_possible',
        // 'description',
        // 'room_view_id',
        // 'room_type_id',
        // 'cleaning_status_id'
    ];

    public static function getAllReservationData() {
        return Reservation::with(['contact','rooms'])->get();
    }

    public static function getReservationData(int $id) {
        return Reservation::where('id', $id)->with(['contact','rooms'])->first();
    }

    public static function deleteReservation(int $id) {
        $deleted = Reservation::where('id', $id)->with(['contact','rooms'])->delete();
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
