<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'title' => 'owner',
        ]);

        Role::create([
            'title' => 'hotel manager',
        ]);

        Role::create([
            'title' => 'head-housekeeping',
        ]);

        Role::create([
            'title' => 'housekeeping',
        ]);

        Role::create([
            'title' => 'reception',
        ]);
    }
}
