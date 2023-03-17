<?php

namespace Database\Seeders;

use App\Models\RoomView;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoomViewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RoomView::create([
            'type' => 'standard',
        ]);

        RoomView::create([
            'type' => 'mountain',
        ]);

        RoomView::create([
            'type' => 'lake',
        ]);
    }
}
