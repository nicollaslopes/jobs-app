<?php

namespace Database\Factories;

use App\Models\Company;
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
            'id_company' => Company::all()->random()->id, 
            'title' => fake()->jobTitle(), 
            'city' => fake()->city(), 
            'state' => fake('en_US')->state(), 
            'country' => fake('en_US')->country(), 
            'description' => fake()->paragraph(), 
            'publish_date' => fake()->dateTimeBetween('-2 months', 'now'), 
            'salary' => fake()->randomFloat(2, 1000, 10000), 
            'created_at' => now(), 
            'updated_at' => now()
        ];
    }
}
