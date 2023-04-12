<?php

namespace App\Models;

use App\Models\Contact;
use App\Models\Reservation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Guest extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'nationality',
        'passport_number',
        'date_of_birth',
        'contact_id',
        'passport_checked',
        'checked_in',
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
