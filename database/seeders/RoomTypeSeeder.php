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
        RoomType::insert([
            'type' => 'economy',
        ]);

        RoomType::insert([
            'type' => 'standard',
        ]);

        RoomType::insert([
            'type' => 'luxurious',
        ]);
    }
}
