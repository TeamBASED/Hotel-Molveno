<?php

namespace App\Models;

use App\Models\Contact;
use App\Models\Invoice;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
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

    public static function getAllReservationsInTimeinterval(string $dateOfArrival, string $dateOfDeparture) {
        return Reservation::where('date_of_departure' ,'>' , $dateOfArrival)->where('date_of_arrival', '<', $dateOfDeparture)->with('rooms')->get();
    }

    public static function getReservationData(int $id) {
        return Reservation::where('id', $id)->with(['contact','rooms','guests'])->first();
    }

    public static function getDepartureDateByRoomId(int $id) {
        return Reservation::with(['rooms'])->whereRelation('rooms', 'rooms.id', '=', $id)->orderBy('date_of_departure', 'desc')->first();
    }

    public static function getArrivalDateByRoomId(int $id) {
        return Reservation::with(['rooms'])->whereRelation('rooms', 'rooms.id', '=', $id)->orderBy('date_of_arrival', 'asc')->first();
    }
    
    public static function deleteReservation(int $id) {
        $deleted = Reservation::where('id', $id)->with(['contact','rooms'])->delete();
    }
    
    public function guests() {
        return $this->belongsToMany(Guest::class, 'guest_reservations');
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
