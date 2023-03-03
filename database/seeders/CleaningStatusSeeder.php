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
        CleaningStatus::insert([
            'status' => 'clean',
        ]);

        CleaningStatus::insert([
            'status' => 'small',
        ]);

        CleaningStatus::insert([
            'status' => 'medium',
        ]);

        CleaningStatus::insert([
            'status' => 'large',
        ]);
    }
}
