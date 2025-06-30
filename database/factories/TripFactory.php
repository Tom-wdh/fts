<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Trip>
 */
class TripFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'time' => fake()->time,
            'city' => fake()->city(),
            'price' => fake()->randomFloat(30.00, 99.99),
            'points_to_give' => fake()->randomNumber(5, 20),
        ];
    }
}
