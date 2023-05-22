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
            'view' => 'standard',
        ]);

        RoomView::create([
            'view' => 'mountain',
        ]);

        RoomView::create([
            'view' => 'lake',
        ]);
    }
}
