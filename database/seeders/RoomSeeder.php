<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Room::insert([
            'capacity' => Str::random(10),
            'bed_configuration' => 'double',
            'room_number' => Str::random(25),
            'base_price_per_night' => Str::random(200),
            'cleaning_status_id' => Str::random(3),
            'baby_bed_possible' => Str::random(1),
            'window_view_id' => Str::random(3),
            'room_type_id' =>Str::random(3),
            'description' => 'awesome!',
            'status_comment' => 'no comment',
        ]);
    }
}
