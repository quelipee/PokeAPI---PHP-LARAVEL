<?php

namespace Database\Factories;

use App\TrainerDomain\Models\Trainer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Trainer>
 */
class TrainerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'region' => fake()->city(),
            'age' => fake()->numberBetween(10,80)
        ];
    }
}
