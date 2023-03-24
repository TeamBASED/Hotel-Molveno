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
        'contact_id', 
        'date_of_arrival', 
        'date_of_departure'
    ];

    public static function getAllReservationData() {
        return Reservation::with(['contact','rooms'])->get();
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
}
