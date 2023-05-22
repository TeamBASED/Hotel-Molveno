<?php

namespace App\Models;

use App\Models\Contact;
use App\Models\Invoice;
use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservation extends Model {
    use HasFactory;

    protected $fillable = [
        'date_of_arrival',
        'date_of_departure',
        'contact_id',
    ];


    // Relations

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

    // Query methods

    public static function getAllReservationData() {
        return Reservation::with(['contact', 'rooms', 'guests'])->get();
    }

    public static function getAllReservationsInTimeinterval(string $dateOfArrival, string $dateOfDeparture) {
        return Reservation::where('date_of_departure', '>', $dateOfArrival)->where('date_of_arrival', '<', $dateOfDeparture)->with('rooms')->get();
    }

    public static function getReservationData(int $id) {
        return Reservation::where('id', $id)->with(['contact', 'rooms', 'guests'])->first();
    }

    public static function getDepartureDateByRoomId(int $roomId) {
        return Reservation::with(['rooms'])->whereRelation('rooms', 'rooms.id', '=', $roomId)->orderBy('date_of_departure', 'desc')->first();
    }

    public static function getArrivalDateByRoomId(int $roomId) {
        return Reservation::with(['rooms'])->whereRelation('rooms', 'rooms.id', '=', $roomId)->orderBy('date_of_arrival', 'asc')->first();
    }

    public static function getFirstReservationsByRoomId(int $roomId) {
        return Reservation::whereRelation('rooms', 'rooms.id', $roomId)->where('date_of_departure', '>=', date('Y-m-d'))->orderBy('date_of_arrival', 'asc')->first();
    }

    public static function deleteReservation(int $id) {
        Reservation::where('id', $id)->with(['contact', 'rooms'])->delete();
    }

    public static function getGuestByReservationId(int $reservationId) {
        return Reservation::where(['reservation_id', $reservationId])->with(['guest'])->get();
    }

    // Utility methods

    public function getDurationInDays(): int {
        return (new DateTime($this->date_of_arrival))->diff(new DateTime($this->date_of_departure))->days;
    }

    // Local scopes

    public function scopeWithRoom($query, $roomId) {
        return $query->whereExists(function ($query) use ($roomId) {
            $query->from('reservation_rooms')->whereColumn('reservation_id', 'reservations.id')->where('room_id', $roomId);
        }
        );
    }

    public function scopeWithDateOfArrival($query, $dateOfArrival) {
        return $query->where('date_of_arrival', $dateOfArrival);
    }

    public function scopeWithDateOfDeparture($query, $dateOfDepature) {
        return $query->where('date_of_departure', $dateOfDepature);
    }


    public function scopeWithContactName($query, $contactName) {
        return $query->whereExists(function ($query) use ($contactName) {
            $query->from('contacts')
                ->whereColumn('id', 'reservations.contact_id')
                ->where(function ($query) use ($contactName) {
                    $query->where('first_name', 'LIKE', '%' . $contactName . '%')
                        ->orWhere('last_name', 'LIKE', '%' . $contactName . '%');

                });
        }
        );

    }
}