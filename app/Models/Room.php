<?php

namespace App\Models;

use App\Models\CleaningStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Room extends Model
{
    use HasFactory;

    public static function getAllRoomData() {
        return Room::get();
    }

    public static function getRoomData() {
        $roomId = 4;
        $test = Room::where('id', $roomId)->with('cleaningStatus')->first();
        dd($test);
        return $test;
    }

    public function cleaningStatus() {
        return $this->belongsTo(CleaningStatus::class);
    }
}

