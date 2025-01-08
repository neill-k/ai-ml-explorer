<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ResearchPaper>
 */
class ResearchPaperFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $aiTopics = ['Deep Learning', 'Neural Networks', 'Transformer Models', 'Reinforcement Learning', 'Computer Vision'];
        $authors = [
            'A. Smith, B. Johnson, C. Williams',
            'X. Zhang, Y. Chen, Z. Wang',
            'M. Kumar, R. Patel, S. Gupta',
            'J. Brown, K. Davis, L. Miller'
        ];

        return [
            'title' => fake()->randomElement($aiTopics) . ': ' . fake()->sentence(),
            'authors' => fake()->randomElement($authors),
            'publication_date' => fake()->dateTimeBetween('-5 years')->format('Y-m-d'),
            'url' => 'https://arxiv.org/abs/' . fake()->numerify('####.#####'),
        ];
    }
}
