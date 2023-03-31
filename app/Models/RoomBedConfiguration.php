<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomBedConfiguration extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id',
        'bed_configuration_id',
        'amount',
    ];
}
