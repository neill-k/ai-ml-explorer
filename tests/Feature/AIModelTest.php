<?php

namespace Tests\Feature;

use App\Models\AIModel;
use App\Models\AlgorithmType;
use App\Models\DataType;
use App\Models\Framework;
use App\Models\ImplementationGuidance;
use App\Models\ResearchPaper;
use App\Models\Task;
use App\Models\UseCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AIModelTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function it_can_create_an_ai_model(): void
    {
        $model = AIModel::factory()->create([
            'name' => 'Test Model',
            'markdown_description' => 'Test description',
        ]);

        $this->assertDatabaseHas('models', [
            'name' => 'Test Model',
            'markdown_description' => 'Test description',
        ]);
    }

    #[Test]
    #[ExpectException(\Illuminate\Database\QueryException::class)]
    public function it_requires_name_and_description(): void
    {
        $this->expectException(\Illuminate\Database\QueryException::class);
        
        AIModel::factory()->create([
            'name' => null,
            'markdown_description' => null,
        ]);
    }

    #[Test]
    public function it_can_have_tasks(): void
    {
        $model = AIModel::factory()->create();
        $task = Task::factory()->create();

        $model->tasks()->attach($task);

        $this->assertCount(1, $model->tasks);
        $this->assertTrue($model->tasks->contains($task));
    }

    #[Test]
    public function it_can_have_data_types(): void
    {
        $model = AIModel::factory()->create();
        $dataType = DataType::factory()->create();

        $model->dataTypes()->attach($dataType);

        $this->assertCount(1, $model->dataTypes);
        $this->assertTrue($model->dataTypes->contains($dataType));
    }

    #[Test]
    public function it_can_have_algorithm_types(): void
    {
        $model = AIModel::factory()->create();
        $algorithmType = AlgorithmType::factory()->create();

        $model->algorithmTypes()->attach($algorithmType);

        $this->assertCount(1, $model->algorithmTypes);
        $this->assertTrue($model->algorithmTypes->contains($algorithmType));
    }

    #[Test]
    public function it_can_have_frameworks(): void
    {
        $model = AIModel::factory()->create();
        $framework = Framework::factory()->create();

        $model->frameworks()->attach($framework);

        $this->assertCount(1, $model->frameworks);
        $this->assertTrue($model->frameworks->contains($framework));
    }

    #[Test]
    public function it_can_have_implementation_guidance(): void
    {
        $model = AIModel::factory()->create();
        $guidance = ImplementationGuidance::factory()->create([
            'aimodel_id' => $model->id
        ]);

        $this->assertInstanceOf(ImplementationGuidance::class, $model->implementationGuidance);
    }

    #[Test]
    public function it_can_have_research_papers(): void
    {
        $model = AIModel::factory()->create();
        $paper = ResearchPaper::factory()->create([
            'aimodel_id' => $model->id
        ]);

        $this->assertCount(1, $model->researchPapers);
        $this->assertTrue($model->researchPapers->contains($paper));
    }

    #[Test]
    public function it_can_have_related_models(): void
    {
        $model1 = AIModel::factory()->create();
        $model2 = AIModel::factory()->create();

        $model1->relatedModels()->attach($model2, ['relationship_type' => 'similar']);

        $this->assertCount(1, $model1->relatedModels);
        $this->assertTrue($model1->relatedModels->contains($model2));
    }

    #[Test]
    public function it_can_have_use_cases(): void
    {
        $model = AIModel::factory()->create();
        $useCase = UseCase::factory()->create([
            'aimodel_id' => $model->id
        ]);

        $this->assertCount(1, $model->useCases);
        $this->assertTrue($model->useCases->contains($useCase));
    }

    #[Test]
    public function it_casts_attributes_correctly(): void
    {
        $model = AIModel::factory()->create([
            'is_gpu_accelerated' => true,
            'date_added' => '2023-01-01 00:00:00',
        ]);

        $this->assertTrue($model->is_gpu_accelerated);
        $this->assertInstanceOf(\Carbon\Carbon::class, $model->date_added);
    }
}
