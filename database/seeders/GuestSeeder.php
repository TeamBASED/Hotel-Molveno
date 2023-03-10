<?php

namespace Database\Seeders;

use App\Models\Guest;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GuestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $idNumber = 1;
        while ($idNumber <= 10) {
        Guest::factory()->create(['contact_id' => $idNumber]);
        $idNumber++;
        }
        Guest::factory(50)->create();
    }
}
