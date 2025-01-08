<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tasks = [
            'Image Classification',
            'Text Generation',
            'Speech Recognition',
            'Object Detection',
            'Sentiment Analysis',
            'Machine Translation',
            'Data Clustering',
            'Anomaly Detection',
            'Time Series Prediction',
            'Natural Language Processing'
        ];
        
        return [
            'name' => fake()->unique()->randomElement($tasks),
        ];
    }
}
