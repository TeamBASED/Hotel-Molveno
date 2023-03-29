<?php

namespace App\Models;

use App\Models\Reservation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name', 
        'last_name', 
        'email',
        'telephone_number', 
        'address'
    ];

    public static function getContactByEmail(string $email) { 
        return Contact::where('email', $email)->first();
    }

    public static function getContactById(int $id) { 
        return Contact::where('id', $id)->first();
    }

    public function reservations() {
        return $this->hasMany(Reservation::class);
    }

    public function guest() {
        return $this->hasOne(Guest::class);
    }

    public static function getContactData(int $id) :Contact {
        return Contact::where('id', $id)->first();
    }
}
