<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Provider\en_US\Person;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Guest>
 */
class GuestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'nationality' => fake()->countryCode(),
            'id_number' => fake()->numberBetween(100000000, 999999999),
            'date_of_birth' => fake()->date(),
            'checked_in' => fake()->boolean(),
            'contact_id' => null,

        ];
    }
}