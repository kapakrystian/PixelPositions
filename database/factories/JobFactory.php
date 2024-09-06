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
            'title' => fake()->jobTitle,
            'salary' =>fake()->randomElement(['$3,000 USD', '$5,000 USD', '$8,000 USD', '$10,000 USD', '$15,000 USD']),
            'location' => 'Remote',
            'schedule' => fake()->randomElement(['Full Time', 'Part Time']),
            'url' => fake()->url,
            'featured' => false
        ];
    }
}
