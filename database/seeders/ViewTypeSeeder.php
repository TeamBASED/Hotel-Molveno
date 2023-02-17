<?php

namespace Database\Seeders;

use App\Models\ViewType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ViewTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ViewType::insert([
            'view_type' => 'standard',
        ]);

        ViewType::insert([
            'view_type' => 'mountain',
        ]);

        ViewType::insert([
            'view_type' => 'lake',
        ]);
    }
}
