<?php

namespace Tests\Feature;

use App\Models\Framework;
use App\Models\AIModel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FrameworkTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_framework()
    {
        $framework = Framework::create(['name' => 'TensorFlow']);

        $this->assertDatabaseHas('frameworks', [
            'name' => 'TensorFlow'
        ]);
    }

    /** @test */
    public function it_requires_a_name()
    {
        $this->expectException(\Illuminate\Database\QueryException::class);
        
        Framework::create(['name' => null]);
    }

    /** @test */
    public function it_can_have_models()
    {
        $framework = Framework::factory()->create();
        $model = AIModel::factory()->create();

        $framework->models()->attach($model);

        $this->assertCount(1, $framework->models);
        $this->assertTrue($framework->models->contains($model));
    }

    /** @test */
    public function name_must_be_unique()
    {
        Framework::create(['name' => 'TensorFlow']);
        
        $this->expectException(\Illuminate\Database\QueryException::class);
        
        Framework::create(['name' => 'TensorFlow']);
    }
}
