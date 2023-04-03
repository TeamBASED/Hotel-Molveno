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
        Room::factory()->create([
            'capacity' => '2',  
            'room_number' => '1.01', 
            'base_price_per_night' => '100.00', 
            'baby_bed_possible' => '0',
            'room_view_id' => '1',
            'room_type_id' => '1',
        ]);

        Room::factory()->create([
            'capacity' => '2',  
            'room_number' => '1.02', 
            'base_price_per_night' => '100.00', 
            'baby_bed_possible' => '0',
            'room_view_id' => '1',
            'room_type_id' => '1',
        ]);

        Room::factory()->create([
            'capacity' => '2',  
            'room_number' => '1.03', 
            'base_price_per_night' => '100.00', 
            'baby_bed_possible' => '0',
            'room_view_id' => '1',
            'room_type_id' => '1',
        ]);

        Room::factory()->create([
            'capacity' => '2',  
            'room_number' => '1.04', 
            'base_price_per_night' => '100.00', 
            'baby_bed_possible' => '0',
            'room_view_id' => '1',
            'room_type_id' => '1',
        ]);

        Room::factory()->create([
            'capacity' => '2',  
            'room_number' => '1.05', 
            'base_price_per_night' => '100.00', 
            'baby_bed_possible' => '1',
            'room_view_id' => '1',
            'room_type_id' => '1',
        ]);

        Room::factory()->create([
            'capacity' => '2',  
            'room_number' => '1.06', 
            'base_price_per_night' => '100.00', 
            'baby_bed_possible' => '1',
            'room_view_id' => '1',
            'room_type_id' => '1',
        ]);

        Room::factory()->create([
            'capacity' => '4',  
            'room_number' => '1.07', 
            'base_price_per_night' => '150.00', 
            'baby_bed_possible' => '1',
            'room_view_id' => '1',
            'room_type_id' => '1',
        ]);

        Room::factory()->create([
            'capacity' => '4',  
            'room_number' => '1.08', 
            'base_price_per_night' => '150.00', 
            'baby_bed_possible' => '0',
            'room_view_id' => '1',
            'room_type_id' => '1',
        ]);

        Room::factory()->create([
            'capacity' => '2',  
            'room_number' => '2.07', 
            'base_price_per_night' => '125.00', 
            'baby_bed_possible' => '1',
            'room_view_id' => '2',
            'room_type_id' => '2',
        ]);

        Room::factory()->create([
            'capacity' => '2',  
            'room_number' => '2.08', 
            'base_price_per_night' => '125.00', 
            'baby_bed_possible' => '1',
            'room_view_id' => '2',
            'room_type_id' => '2',
        ]);

        Room::factory()->create([
            'capacity' => '2',  
            'room_number' => '2.09', 
            'base_price_per_night' => '125.00', 
            'baby_bed_possible' => '1',
            'room_view_id' => '2',
            'room_type_id' => '2',
        ]);

        Room::factory()->create([
            'capacity' => '2',  
            'room_number' => '2.10', 
            'base_price_per_night' => '125.00', 
            'baby_bed_possible' => '1',
            'room_view_id' => '2',
            'room_type_id' => '2',
        ]);

        Room::factory()->create([
            'capacity' => '2',  
            'room_number' => '2.11', 
            'base_price_per_night' => '125.00', 
            'baby_bed_possible' => '1',
            'room_view_id' => '2',
            'room_type_id' => '2',
        ]);

        Room::factory()->create([
            'capacity' => '2',  
            'room_number' => '2.12', 
            'base_price_per_night' => '125.00', 
            'baby_bed_possible' => '1',
            'room_view_id' => '2',
            'room_type_id' => '2',
        ]);

        Room::factory()->create([
            'capacity' => '4',  
            'room_number' => '2.13', 
            'base_price_per_night' => '175.00', 
            'baby_bed_possible' => '1',
            'room_view_id' => '2',
            'room_type_id' => '2',
        ]);

        Room::factory()->create([
            'capacity' => '4',  
            'room_number' => '2.14', 
            'base_price_per_night' => '175.00', 
            'baby_bed_possible' => '1',
            'room_view_id' => '2',
            'room_type_id' => '2',
        ]);

        Room::factory()->create([
            'capacity' => '2',  
            'room_number' => '2.15', 
            'base_price_per_night' => '125.00', 
            'baby_bed_possible' => '1',
            'room_view_id' => '2',
            'room_type_id' => '2',
        ]);

        Room::factory()->create([
            'capacity' => '2',  
            'room_number' => '2.16', 
            'base_price_per_night' => '125.00', 
            'baby_bed_possible' => '1',
            'room_view_id' => '2',
            'room_type_id' => '2',
        ]);

        Room::factory()->create([
            'capacity' => '4',  
            'room_number' => '2.17', 
            'base_price_per_night' => '175.00', 
            'baby_bed_possible' => '1',
            'room_view_id' => '2',
            'room_type_id' => '2',
        ]);

        Room::factory()->create([
            'capacity' => '2',  
            'room_number' => '2.18', 
            'base_price_per_night' => '175.00', 
            'baby_bed_possible' => '1',
            'room_view_id' => '3',
            'room_type_id' => '2',
        ]);

        Room::factory()->create([
            'capacity' => '2',  
            'room_number' => '2.19', 
            'base_price_per_night' => '175.00', 
            'baby_bed_possible' => '1',
            'room_view_id' => '3',
            'room_type_id' => '2',
        ]);

        Room::factory()->create([
            'capacity' => '4',  
            'room_number' => '2.20', 
            'base_price_per_night' => '255.00', 
            'baby_bed_possible' => '1',
            'room_view_id' => '3',
            'room_type_id' => '3',
        ]);

        Room::factory()->create([
            'capacity' => '2',  
            'room_number' => '3.01', 
            'base_price_per_night' => '175.00', 
            'baby_bed_possible' => '0',
            'room_view_id' => '3',
            'room_type_id' => '2',
        ]);

        Room::factory()->create([
            'capacity' => '2',  
            'room_number' => '3.02', 
            'base_price_per_night' => '200.00', 
            'baby_bed_possible' => '0',
            'room_view_id' => '3',
            'room_type_id' => '3',
        ]);

        Room::factory()->create([
            'capacity' => '2',  
            'room_number' => '3.03', 
            'base_price_per_night' => '200.00', 
            'baby_bed_possible' => '0',
            'room_view_id' => '3',
            'room_type_id' => '3',
        ]);



    }


}
