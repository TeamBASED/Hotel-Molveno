<?php

namespace App\Models;

use App\Models\RoomType;
use App\Models\RoomView;
use App\Models\CleaningStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Room extends Model
{
    use HasFactory;

    protected $fillable= [
        'room_number', 
        'capacity', 
        'base_price_per_night',
        'bed_configuration',
        'baby_bed_possible',
        'description',
        'room_view_id',
        'room_type_id',
        'cleaning_status_id'
    ];

    public function cleaningStatus() {
        return $this->belongsTo(CleaningStatus::class);
    } 

    public static function deleteRoomData(int $roomId) {
        $deleted = Room::where('id', '=', $roomId)->delete();
    }

    public function roomView() {
        return $this->belongsTo(RoomView::class);
    }

    public function roomType() {
        return $this->belongsTo(RoomType::class);
    }

    public static function getAllRoomData() {
        return Room::get();
    }
    
    public static function getRoomData(int $roomId) : Room {
        return Room::where('id', $roomId)->with(['cleaningStatus','roomView','roomType'])->first();
    }
}

