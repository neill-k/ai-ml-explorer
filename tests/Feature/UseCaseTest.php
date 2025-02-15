<?php

namespace Tests\Feature;

use App\Models\UseCase;
use App\Models\AiModel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UseCaseTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_use_case()
    {
        $useCase = UseCase::create([
            'description' => 'Image classification for medical diagnosis'
        ]);

        $this->assertDatabaseHas('use_cases', [
            'description' => 'Image classification for medical diagnosis'
        ]);
    }

    /** @test */
    public function it_requires_a_description()
    {
        $this->expectException(\Illuminate\Database\QueryException::class);
        
        UseCase::create(['description' => null]);
    }

    /** @test */
    public function it_can_have_models()
    {
        $useCase = UseCase::factory()->create();
        $model = AiModel::factory()->create();

        $useCase->models()->attach($model);

        $this->assertCount(1, $useCase->models);
        $this->assertTrue($useCase->models->contains($model));
    }

    /** @test */
    public function description_can_be_long_text()
    {
        $longDescription = str_repeat('a', 1000);
        $useCase = UseCase::create(['description' => $longDescription]);

        $this->assertEquals($longDescription, $useCase->description);
    }
}
