<?php

namespace Database\Factories;

use Database\Seeders\RoomSeeder;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition() {
        return [
            'capacity' => fake()->numberBetween(1, 8),
            'room_number' => fake()->numerify("#.##"),
            'base_price_per_night' => fake()->numberBetween(50, 400),
            'baby_bed_possible' => fake()->numberBetween(0, 1),
            'room_view_id' => fake()->numberBetween(1, 3),
            'room_type_id' => fake()->numberBetween(1, 3),
            'cleaning_status_id' => fake()->numberBetween(1, 4),
            'description' => fake()->paragraph(),
            'status_comment' => fake()->paragraph(),
        ];
    }
}