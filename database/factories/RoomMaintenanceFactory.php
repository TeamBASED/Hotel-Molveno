<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RoomMaintenance>
 */
class RoomMaintenanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'room_id' => fake()->numberBetween(1, 25),
            'comments' => fake()->sentence(),
            'costs'=> fake()->randomFloat(2, 0, 500),
        ];
    }
}
