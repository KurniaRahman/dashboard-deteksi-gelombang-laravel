<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BacaSensor>
 */
class BacaSensorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pitch' => fake()->randomFloat(2, -90, 90),
            'roll' => fake()->randomFloat(2, -60, 60),
            'temperature' => fake()->randomFloat(2, 25, 35),
            'pressure' => fake()->randomFloat(2, 980, 1050),
            'altitude' => fake()->randomFloat(2, 10, 100),
            'current' => fake()->randomFloat(2, 0, 3),
            
        ];
    }
}
