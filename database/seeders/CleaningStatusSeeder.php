<?php

namespace Database\Seeders;

use App\Models\CleaningStatus;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CleaningStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CleaningStatus::create([
            'status' => 'clean',
        ]);

        CleaningStatus::create([
            'status' => 'small',
        ]);

        CleaningStatus::create([
            'status' => 'medium',
        ]);

        CleaningStatus::create([
            'status' => 'large',
        ]);
    }
}
