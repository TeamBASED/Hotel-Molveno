<?php

namespace Database\Seeders;

use App\Models\RoomMaintenance;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoomMaintenanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RoomMaintenance::factory(30)->create();
    }
}
