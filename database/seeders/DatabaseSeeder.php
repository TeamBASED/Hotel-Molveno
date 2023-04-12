<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\RoomTypeSeeder;
use Database\Seeders\RoomViewSeeder;
use Database\Seeders\CleaningStatusSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoomViewSeeder::class); 
        $this->call(RoomTypeSeeder::class);
        $this->call(RoomSeeder::class); //echte data
        $this->call(CleaningStatusSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(GuestSeeder::class);
        $this->call(ContactSeeder::class);
        $this->call(ReservationSeeder::class);
        $this->call(GuestReservationSeeder::class);
        $this->call(ReservationRoomSeeder::class);
        $this->call(BedConfigurationSeeder::class);
        $this->call(RoomMaintenanceSeeder::class);
        $this->call(RoomBedConfigurationSeeder::class);
        $this->call(UserSeeder::class);
    }
}
