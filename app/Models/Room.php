<?php

namespace App\Models;

use App\Models\RoomType;
use App\Models\RoomView;
use App\Models\Reservation;
use App\Models\CleaningStatus;
use App\Models\RoomMaintenance;
use App\Models\BedConfigurations;
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

    public function bedConfigurations() : BelongsToMany {
        return $this->belongsToMany(BedConfigurations::class, 'room_bed_configuration');
    }

    public function reservations() : BelongsToMany {
        return $this->belongsToMany(Reservation::class, 'reservation_room');
    }

    public function roomMaintenances() {
        return $this->hasMany(RoomMaintenance::class);
    }

    // Local scopes

    public function scopeWithCapacity($query, $capacity) {
        return $query->where('capacity', '>=', $capacity)->orderBy('capacity', 'asc');
    }

    public function scopeWithNumber($query, $number) {
        return $query->where('room_number', 'like', "%" . $number . "%");
    }

    public function scopeWithRoomType($query, int $typeId) {
        return $query->where('room_type_id', $typeId);
    }

    public function scopeWithRoomView($query, int $viewId) {
        return $query->where('room_view_id', $viewId);
    }

    public function scopeWithBedConfiguration($query, int $configurationId) {
        return $query->whereExists(function($query) use($configurationId) {
            $query->from('room_bed_configurations')
                ->whereColumn('room_id', 'rooms.id')
                ->where('bed_configuration_id', $configurationId);
        });
    }

    // public function scopeWithSingleBeds($query, int $singleBedCount) {
    //     return $query->where
    // }

    public function scopeWithCleaningStatus($query, int $statusId) {
        return $query->where('cleaning_status_id', $statusId);
    }

    public function scopeWithBabybed($query, int $bedPossible) {
        return $query->where('baby_bed_possible', $bedPossible);
    }
}

