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
            'capacity' => '4',
            'bed_configuration' => 'double',
            'room_number' => '1',
            'base_price_per_night' => '200',
            'cleaning_status_id' => '1',
            'baby_bed_possible' => '0',
            'window_view_id' => '1',
            'room_type_id' => '2',
            'description' => 'awesome!',
            'status_comment' => 'no comment',
        ]);

        Room::insert([
            'capacity' => '4',
            'bed_configuration' => 'double',
            'room_number' => '2',
            'base_price_per_night' => '200',
            'cleaning_status_id' => '1',
            'baby_bed_possible' => '0',
            'window_view_id' => '1',
            'room_type_id' => '2',
            'description' => 'awesome!',
            'status_comment' => 'no comment',
        ]);
    }
}
