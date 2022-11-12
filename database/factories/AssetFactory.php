<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Asset>
 */
class AssetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->word(),
            'series_number' => fake()->unique()->safeEmail(),
            'description' => fake()->sentence($nbWords = 6, $variableNbWords = true),
            'ordered_by' => User::all()->random()->id,
            'acquired_by' => User::all()->random()->id,
        ];
    }
}
