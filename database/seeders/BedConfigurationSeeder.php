<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BedConfiguration;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BedConfigurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BedConfiguration::create([
            'configuration' => 'single',
        ]);

        BedConfiguration::create([
            'configuration' => 'double',
        ]);

    }
}
