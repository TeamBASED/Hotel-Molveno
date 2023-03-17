<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BedConfigurations;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BedConfigurationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BedConfigurations::create([
            'configuration' => 'single',
        ]);

        BedConfigurations::create([
            'configuration' => 'double',
        ]);

    }
}
