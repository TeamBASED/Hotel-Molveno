<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        PaymentMethod::create([
            'method' => 'cash',
        ]);

        PaymentMethod::create([
            'method' => 'pin',
        ]);

        PaymentMethod::create([
            'method' => 'creditcard',
        ]);
    }
}