<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UseCase>
 */
class UseCaseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $domains = ['healthcare', 'finance', 'retail', 'manufacturing', 'education', 'transportation'];
        $tasks = ['classification', 'prediction', 'detection', 'recognition', 'analysis', 'optimization'];
        
        return [
            'description' => fake()->paragraph(3) . "\n\n" .
                           "Application Domain: " . fake()->randomElement($domains) . "\n" .
                           "Primary Task: " . fake()->randomElement($tasks) . "\n\n" .
                           fake()->paragraph(2),
        ];
    }
}
