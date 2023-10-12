<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CompanieFactory>
 */
class CompanieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            'type' => fake()->randomElement($array = array('SA', 'SAS', 'SASU', 'SARL', 'EURL', 'EI')),
            'headquarter' => fake()->city(),
            'about' => fake()->text($maxNbChars = 150),
        ];
    }
}
