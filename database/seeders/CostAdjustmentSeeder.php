<?php

namespace Database\Seeders;

use App\Models\CostAdjustment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CostAdjustmentSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        CostAdjustment::factory()->count(10)->create();
    }
}