<?php

namespace Database\Seeders;

use App\Models\ReservationRoom;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ReservationRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($id = 1; $id <= 10; $id++) {
            ReservationRoom::factory()->create(['reservation_id' => $id]);
        }
    }
}
