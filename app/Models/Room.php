<?php

namespace App\Models;

use App\Models\RoomType;
use App\Models\RoomView;
use App\Models\Reservation;
use App\Models\CleaningStatus;
use App\Models\RoomMaintenance;
use App\Models\BedConfiguration;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Room extends Model {
    use HasFactory;

    protected $fillable = [
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

    public function reservations(): BelongsToMany {
        return $this->belongsToMany(Reservation::class, 'reservation_room');
    }

    public function roomView() {
        return $this->belongsTo(RoomView::class);
    }

    public function roomType() {
        return $this->belongsTo(RoomType::class);
    }

    public function roomMaintenances() {
        return $this->hasMany(RoomMaintenance::class);
    }

    public function cleaningStatus() {
        return $this->belongsTo(CleaningStatus::class);
    }

    public function bedConfigurations() {
        return $this->belongsToMany(BedConfiguration::class, 'room_bed_configurations')->withPivot('amount');
    }

    public static function deleteRoomData(int $roomId) {
        $deleted = Room::where('id', '=', $roomId)->delete();
    }

    public static function getAllRoomData() {
        return Room::with(['cleaningStatus', 'roomView', 'roomType', 'bedConfigurations'])->get();
    }

    public static function getRoomData(int $roomId): Room {
        return Room::where('id', $roomId)->with(['cleaningStatus', 'roomView', 'roomType', 'bedConfigurations'])->first();
    }

    public static function getRoomByNumber(string $roomNumber) {
        return Room::where('room_number', $roomNumber)->with(['cleaningStatus', 'roomView', 'roomType'])->first();
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

    public function scopeWithBedConfiguration($query, int $bedId, int $bedCount) {
        return $query->whereExists(function ($query) use ($bedId, $bedCount) {
            $query->from('room_bed_configurations')
                ->whereColumn('room_id', 'rooms.id')
                ->where('bed_configuration_id', $bedId)
                ->where('amount', '>=', $bedCount);
        });
    }

    public function scopeWithCleaningStatus($query, int $statusId) {
        return $query->where('cleaning_status_id', $statusId);
    }

    public function scopeWithBabybed($query, int $bedPossible) {
        return $query->where('baby_bed_possible', $bedPossible);
    }
}