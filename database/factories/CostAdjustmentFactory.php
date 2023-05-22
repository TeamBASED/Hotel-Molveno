<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CostAdjustment>
 */
class CostAdjustmentFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition() {
        return [
            'invoice_id' => fake()->numberBetween(1, 10),
            'amount' => fake()->numberBetween(-400, 400),
            'description' => fake()->sentence(),
        ];
    }
}