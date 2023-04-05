<?php

namespace App\Models;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model {
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'telephone_number',
        'address',
        'nationality',
        'id_checked'
    ];

    public static function getContactByEmail(string $email) {
        return Contact::where('email', $email)->first();
    }

    public static function getContactById(int $id) {
        return Contact::where('id', $id)->first();
    }

    public function saveContact($reservation) {
        $this->reservations()->save($reservation);
    }

    public function reservations() {
        return $this->hasMany(Reservation::class);
    }

    public function guest() {
        return $this->hasOne(Guest::class);
    }

    public static function updateContact(Request $request, int $id) {
        $contact = Contact::getContactById($id);
        $contact->update([
            'first_name' => $request->firstname,
            'last_name' => $request->lastname,
            'email' => $request->email,
            'telephone_number' => $request->telephone,
            'address' => $request->address,
            'nationality' => $request->nationality,
            'id_checked' => $request->id_checked,
        ]);
    }



        // public static function updateReservation(Request $request, int $id) {
        // $reservation = Reservation::getReservationData($id);
        // // dd($reservation);
        // $reservation->update([
        //     'date_of_arrival' => $request->date_of_arrival,
        //     'date_of_departure' => $request->date_of_departure,
        // ]);

    public static function getContactData(int $id): Contact {
        return Contact::where('id', $id)->first();
    }
}