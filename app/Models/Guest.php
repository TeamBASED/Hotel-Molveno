<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;

    public function contact() { 
        return $this->belongsTo(Contact::class);
    }

    public static function getGuestData(int $id) {
        return Guest::where(['id', $id])->first();
    }
}
