<?php

namespace Tests\Feature;

use App\Models\ImplementationGuidance;
use App\Models\AiModel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ImplementationGuidanceTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_implementation_guidance()
    {
        $model = AiModel::factory()->create();
        $guidance = ImplementationGuidance::create([
            'title' => 'Best Practices',
            'description' => 'Detailed implementation guide',
            'best_practices' => 'Follow these steps...',
            'code_example' => 'def example(): pass',
            'performance_benchmarks' => '100ms latency',
            'ai_model_id' => $model->id
        ]);

        $this->assertDatabaseHas('implementation_guidances', [
            'title' => 'Best Practices',
            'ai_model_id' => $model->id
        ]);
    }

    /** @test */
    public function it_requires_title_and_description()
    {
        $this->expectException(\Illuminate\Database\QueryException::class);
        
        ImplementationGuidance::create([
            'title' => null,
            'description' => null
        ]);
    }

    /** @test */
    public function it_belongs_to_a_model()
    {
        $model = AiModel::factory()->create();
        $guidance = ImplementationGuidance::factory()->create([
            'ai_model_id' => $model->id
        ]);

        $this->assertInstanceOf(AiModel::class, $guidance->model);
        $this->assertEquals($model->id, $guidance->model->id);
    }

    /** @test */
    public function it_can_store_code_examples_and_benchmarks()
    {
        $guidance = ImplementationGuidance::factory()->create([
            'code_example' => 'def example(): pass',
            'performance_benchmarks' => '100ms latency'
        ]);

        $this->assertEquals('def example(): pass', $guidance->code_example);
        $this->assertEquals('100ms latency', $guidance->performance_benchmarks);
    }
}
