<?php

namespace Database\Factories;

use App\Models\AiModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ImplementationGuidance>
 */
class ImplementationGuidanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => 'Implementation Guide: ' . fake()->sentence(),
            'description' => fake()->paragraph(3),
            'best_practices' => "1. " . fake()->sentence() . "\n" .
                              "2. " . fake()->sentence() . "\n" .
                              "3. " . fake()->sentence(),
            'code_example' => "import tensorflow as tf\n\n" .
                            "def create_model():\n" .
                            "    model = tf.keras.Sequential([\n" .
                            "        tf.keras.layers.Dense(128, activation='relu'),\n" .
                            "        tf.keras.layers.Dropout(0.2),\n" .
                            "        tf.keras.layers.Dense(10, activation='softmax')\n" .
                            "    ])\n" .
                            "    return model",
            'performance_benchmarks' => "Training Time: " . fake()->numberBetween(1, 24) . " hours\n" .
                                     "Accuracy: " . fake()->numberBetween(85, 99) . "%\n" .
                                     "GPU Memory Usage: " . fake()->numberBetween(2, 16) . "GB",
            'ai_model_id' => AiModel::factory(),
        ];
    }
}
