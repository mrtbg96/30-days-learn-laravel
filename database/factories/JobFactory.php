<?php

namespace Database\Factories;

use App\Models\Employer;

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
            'employer_id' => Employer::factory(),
            'title' => fake()->jobTitle(),
            'description' => fake()->paragraph(),
            'salary' =>  number_format(fake()->numberBetween(20000, 150000), 0, '.', '.')
        ];
    }
}