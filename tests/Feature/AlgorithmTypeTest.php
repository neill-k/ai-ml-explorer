<?php

namespace Tests\Feature;

use App\Models\AlgorithmType;
use App\Models\AiModel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AlgorithmTypeTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function it_can_create_an_algorithm_type(): void
    {
        $type = AlgorithmType::create(['name' => 'Neural Network']);

        $this->assertDatabaseHas('algorithm_types', [
            'name' => 'Neural Network'
        ]);
    }

    #[Test]
    #[ExpectException(\Illuminate\Database\QueryException::class)]
    public function it_requires_a_name(): void
    {
        $this->expectException(\Illuminate\Database\QueryException::class);
        
        AlgorithmType::create(['name' => null]);
    }

    #[Test]
    public function it_can_have_models(): void
    {
        $type = AlgorithmType::factory()->create();
        $model = AiModel::factory()->create();

        $type->models()->attach($model);

        $this->assertCount(1, $type->models);
        $this->assertTrue($type->models->contains($model));
    }

    #[Test]
    #[ExpectException(\Illuminate\Database\QueryException::class)]
    public function name_must_be_unique(): void
    {
        AlgorithmType::create(['name' => 'Neural Network']);
        
        $this->expectException(\Illuminate\Database\QueryException::class);
        
        AlgorithmType::create(['name' => 'Neural Network']);
    }
}
