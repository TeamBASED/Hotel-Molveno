<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'username' => 'TeamBased', 
            'first_name' => 'Team',
            'last_name' => 'Based',
            'role_id' => 1,        ]);

        User::factory()->create([
            'username' => 'owner',
            'first_name' => 'Idske',
            'last_name' => 'Regtien',
            'role_id' => '1',
        ]);

        User::factory()->create([
            'username' => 'hotel manager',
            'role_id' => '2',
        ]);

        User::factory()->create([
            'username' => 'head-housekeeping',
            'role_id' => '3',
        ]);

        User::factory()->create([
            'username' => 'housekeeping',
            'role_id' => '4',
        ]);

        User::factory()->create([
            'username' => 'reception',
            'role_id' => '5',
        ]);
    }
}