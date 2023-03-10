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
        RoomView::insert([
            'type' => 'standard',
        ]);

        RoomView::insert([
            'type' => 'mountain',
        ]);

        RoomView::insert([
            'type' => 'lake',
        ]);
    }
}
