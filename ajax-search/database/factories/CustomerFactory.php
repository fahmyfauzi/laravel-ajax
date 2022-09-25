<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name,
            'address' => fake()->address('ID'),
            'city' => fake()->city(),
            'postal_code' => fake()->randomNumber(5, true),
            'country' => fake()->country()
        ];
    }
}
