<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'license_plate' => $this->faker->unique()->bothify('??####??'),
            'brand' => $this->faker->word(),
            'model' => $this->faker->word(),
            'color' => $this->faker->colorName(),
        ];
    }
}
