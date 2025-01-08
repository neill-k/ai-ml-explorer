<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AIModel>
 */
class AIModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $modelNames = [
            'ResNet', 'BERT', 'GPT', 'YOLO', 'VGG', 
            'Inception', 'Transformer', 'UNet', 'DenseNet', 'EfficientNet'
        ];
        
        $now = now();
        
        return [
            'name' => fake()->unique()->randomElement($modelNames) . '-' . fake()->numberBetween(1, 99),
            'markdown_description' => "# " . fake()->sentence() . "\n\n" . 
                                   fake()->paragraph(3) . "\n\n" .
                                   "## Features\n\n" . 
                                   "- " . fake()->sentence() . "\n" .
                                   "- " . fake()->sentence() . "\n" .
                                   "- " . fake()->sentence(),
            'limitations' => "1. " . fake()->sentence() . "\n" .
                           "2. " . fake()->sentence() . "\n" .
                           "3. " . fake()->sentence(),
            'evaluation_metrics' => json_encode([
                'accuracy' => fake()->numberBetween(85, 99) . '%',
                'f1_score' => fake()->randomFloat(2, 0.8, 0.99),
                'precision' => fake()->randomFloat(2, 0.8, 0.99),
                'recall' => fake()->randomFloat(2, 0.8, 0.99)
            ]),
            'training_data_description' => fake()->paragraph(2),
            'license' => fake()->randomElement(['MIT', 'Apache 2.0', 'GPL-3.0', 'BSD-3-Clause']),
            'maintainers_authors' => fake()->name() . ', ' . fake()->name() . ', ' . fake()->name(),
            'date_added' => $now,
            'date_updated' => $now,
            'is_gpu_accelerated' => fake()->boolean(80), // 80% chance of being true
            'interpretability_score' => fake()->numberBetween(1, 10),
            'interpretability_explanation' => fake()->paragraph(),
            'training_data_size_estimate' => fake()->randomElement([
                '10K samples', '100K samples', '1M samples', '10M samples', '100M samples'
            ]),
        ];
    }
}
