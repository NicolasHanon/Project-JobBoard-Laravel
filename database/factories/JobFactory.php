<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'companies_id' => fake()->numberBetween(1,10),
            'title' => fake()->sentence($nbWords = 3, $asText = True),
            'contract' => fake()->randomElement($array = array('Full-time', 'Part-time', 'Freelance', 'Apprenticeship', 'Internship')),
            'more' => fake()->text($maxNbChars = 100),
            'location' => fake()->city(),
            'salary' => fake()->numberBetween(10000, 50000),
        ];
    }
}
