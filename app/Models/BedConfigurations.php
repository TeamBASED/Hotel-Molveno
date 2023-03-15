<?php

namespace App\Models;

use App\Models\RoomBedConfigurations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BedConfigurations extends Model
{
    use HasFactory;
    public function rooms() : BelongsToMany {
        return $this->belongsToMany(Room::class, 'room_bed_configuration');
    }
}
