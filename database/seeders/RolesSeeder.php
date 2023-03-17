<?php

namespace Database\Seeders;

use App\Models\Roles;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Roles::create([
            'title' => 'owner',
        ]);

        Roles::create([
            'title' => 'hotel manager',
        ]);

        Roles::create([
            'title' => 'head-housekeeping',
        ]);

        Roles::create([
            'title' => 'housekeeping',
        ]);

        Roles::create([
            'title' => 'reception',
        ]);
    }
}
