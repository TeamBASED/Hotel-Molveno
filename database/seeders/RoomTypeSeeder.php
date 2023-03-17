<?php

namespace Database\Seeders;

use App\Models\RoomType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoomTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RoomType::create([
            'type' => 'economy',
        ]);

        RoomType::create([
            'type' => 'standard',
        ]);

        RoomType::create([
            'type' => 'luxurious',
        ]);
    }
}
