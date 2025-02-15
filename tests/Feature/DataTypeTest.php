<?php

namespace Tests\Feature;

use App\Models\DataType;
use App\Models\AiModel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DataTypeTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_data_type()
    {
        $type = DataType::create(['name' => 'Image']);

        $this->assertDatabaseHas('data_types', [
            'name' => 'Image'
        ]);
    }

    /** @test */
    public function it_requires_a_name()
    {
        $this->expectException(\Illuminate\Database\QueryException::class);
        
        DataType::create(['name' => null]);
    }

    /** @test */
    public function it_can_have_models()
    {
        $type = DataType::factory()->create();
        $model = AiModel::factory()->create();

        $type->models()->attach($model);

        $this->assertCount(1, $type->models);
        $this->assertTrue($type->models->contains($model));
    }

    /** @test */
    public function name_must_be_unique()
    {
        DataType::create(['name' => 'Image']);
        
        $this->expectException(\Illuminate\Database\QueryException::class);
        
        DataType::create(['name' => 'Image']);
    }
}
