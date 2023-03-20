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
        return Reservation::get();
    }
    
    public function rooms() : BelongsToMany {
        return $this->belongsToMany(Room::class, 'reservation_room');
    }

    public function contactId() {
        return $this->belongsTo(Contact::class);
    }

    public function invoice() {
        return $this->hasOne(Invoice::class);
    }


}
