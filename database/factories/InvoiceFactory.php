<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition() {
        return [
            'payment_method_id' => fake()->numberBetween(1, 3),
            'value_added_tax' => fake()->numberBetween(10, 30),
            'cost_adjustment' => fake()->numberBetween(0, 100),
            'final_amount' => fake()->numberBetween(600, 2000),
            'comment' => fake()->sentence(),
        ];
    }
}