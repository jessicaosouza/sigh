<?php

namespace Database\Factories;

use App\Models\Asset;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Loan>
 */
class LoanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'lended_at' => fake()->dateTimeBetween($startDate = '-10 years', $endDate = 'now', $timezone = 'America/Sao_Paulo'),
            'retrieved_at' => fake()->dateTimeBetween($startDate = '-10 years', $endDate = 'now', $timezone = 'America/Sao_Paulo'),
            'asset_id' => Asset::all()->random()->id,
            'lended_by' => User::all()->random()->id,
            'user_id' => User::all()->random()->id,
            'observations' => fake()->sentence($nbWords = 6, $variableNbWords = true),
        ];
    }
}
