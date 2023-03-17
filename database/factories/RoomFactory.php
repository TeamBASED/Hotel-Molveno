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
            'cleaning_status_id' => fake()->numberBetween(1, 4),
            'description' => fake()->sentence(),
            'status_comment' => fake()->paragraph(),
        ];
    }
}