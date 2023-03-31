<?php

namespace App\Models;

use App\Models\RoomBedConfiguration;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BedConfiguration extends Model
{
    use HasFactory;
    public function rooms() : BelongsToMany {
        return $this->belongsToMany(Room::class, 'room_bed_configuration');
    }
    
    public static function getByConfiguration(int $configuration) {
        return BedConfiguration::where('configuration', $configuration)->first();
    }
}
