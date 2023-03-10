<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'date_of_arrival' => fake()->dateTimeBetween('-1 week', '-1 day'),
            'date_of_departure' => fake()->dateTimeBetween('+1 day', '+1 week'),
        ];
    }
}
