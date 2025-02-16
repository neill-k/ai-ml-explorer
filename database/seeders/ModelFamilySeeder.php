<?php

namespace Database\Seeders;

use App\Models\ModelFamily;
use App\Models\AiModel;
use Illuminate\Database\Seeder;

class ModelFamilySeeder extends Seeder
{
    public function run(): void
    {
        // Create model families
        $families = [
            [
                'name' => 'Neural Networks',
                'description' => 'A collection of models based on artificial neural networks, including deep learning architectures.',
            ],
            [
                'name' => 'Linear Models',
                'description' => 'Models based on linear relationships between variables, including linear regression and its variants.',
            ],
            [
                'name' => 'Tree-based Models',
                'description' => 'Decision trees and ensemble methods based on trees, such as random forests and gradient boosting machines.',
            ],
            [
                'name' => 'Probabilistic Models',
                'description' => 'Models that explicitly model probability distributions and uncertainty.',
            ],
            [
                'name' => 'Support Vector Machines',
                'description' => 'Kernel-based models for classification and regression tasks.',
            ],
            [
                'name' => 'Clustering Models',
                'description' => 'Unsupervised learning models for grouping similar data points.',
            ],
            [
                'name' => 'Dimensionality Reduction',
                'description' => 'Models for reducing the number of features while preserving important information.',
            ],
            [
                'name' => 'Reinforcement Learning',
                'description' => 'Models that learn through interaction with an environment.',
            ],
        ];

        foreach ($families as $family) {
            ModelFamily::create($family);
        }

        // Attach Linear Regression to Linear Models family
        $linearModels = ModelFamily::where('name', 'Linear Models')->first();
        $linearRegression = AiModel::where('name', 'Linear Regression')->first();
        
        if ($linearModels && $linearRegression) {
            $linearModels->models()->attach($linearRegression);
        }
    }
} 