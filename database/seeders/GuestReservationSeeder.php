<?php

namespace Database\Seeders;

use App\Models\Reservation;
use Illuminate\Database\Seeder;
use App\Models\GuestReservation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GuestReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($id = 1; $id <= 10; $id++) {
            GuestReservation::insert([
                'reservation_id' => $id,
                'guest_id' => $id,
            ]);
        }
    }
}
