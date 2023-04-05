<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Provider\en_US\Person;
use Faker\Provider\en_US\PhoneNumber;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
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
            'email' => fake()->email(),
            'telephone_number' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'nationality' => fake()->country(),
            'id_checked' => fake()->boolean()
        ];
    }
}
