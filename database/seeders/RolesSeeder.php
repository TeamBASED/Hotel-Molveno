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
        Roles::insert([
            'title' => 'owner',
        ]);

        Roles::insert([
            'title' => 'hotel manager',
        ]);

        Roles::insert([
            'title' => 'head-housekeeping',
        ]);

        Roles::insert([
            'title' => 'housekeeping',
        ]);

        Roles::insert([
            'title' => 'reception',
        ]);
    }
}
