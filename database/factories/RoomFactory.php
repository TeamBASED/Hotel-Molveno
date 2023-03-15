<?php

namespace Database\Factories;

use Database\Seeders\RoomSeeder;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // 'capacity' => fake()->numberBetween(1, 4),
            'bed_configuration' => fake()->randomElement(["single", "double"]),
            // 'room_number' => fake()->unique()->numberBetween(100, 400),
            // 'base_price_per_night' => fake()->numberBetween(100, 1000),
            'cleaning_status_id' => fake()->numberBetween(1, 4),
            // 'baby_bed_possible' => fake()->numberBetween(0, 1),
            // 'room_view_id' => fake()->numberBetween(1, 3),
            // 'room_type_id' => fake()->numberBetween(1, 3),
            'description' => fake()->sentence(),
            'status_comment' => fake()->paragraph(),
        ];
    }
}