<?php

namespace App\Models;

use App\Models\Contact;
use App\Models\Reservation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Guest extends Model
{
    use HasFactory;

    public function contact() { 
        return $this->belongsTo(Contact::class);
    }

    public function reservation() { 
        return $this->belongsTo(Reservation::class);
    }

    public static function getGuestData(int $id) {
        return Guest::where(['id', $id])->first();
    }
}
