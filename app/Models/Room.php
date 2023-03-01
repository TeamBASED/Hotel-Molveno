<?php

namespace App\Models;

use App\Models\CleaningStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Room extends Model
{
    use HasFactory;

    public static function getRoomData(int $roomId) {
        return Room::where('id', $roomId)->with('cleaningStatus')->first();
    }

    public function cleaningStatus() {
        return $this->belongsTo(CleaningStatus::class);
    } 

    public static function deleteRoomData(int $roomId) {
        $deleted = Room::where('id', '=', $roomId)->delete();
    }
}

