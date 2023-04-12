<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'nationality',
        'id_number',
        'date_of_birth',
        'contact_id',
        'checked_in',
        'passport_checked',

    ];


    public function contact() { 
        return $this->belongsTo(Contact::class);
    }

    public function reservation() {
        return $this->belongsToMany(Reservation::class, 'guest_reservations');
    }

    public static function getGuestData(int $reservationId) {
        return Guest::where(['id', $reservationId])->first();
    }

}
