<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\AIModel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_task()
    {
        $task = Task::create(['name' => 'Image Classification']);

        $this->assertDatabaseHas('tasks', [
            'name' => 'Image Classification'
        ]);
    }

    /** @test */
    public function it_requires_a_name()
    {
        $this->expectException(\Illuminate\Database\QueryException::class);
        
        Task::create(['name' => null]);
    }

    /** @test */
    public function it_can_have_models()
    {
        $task = Task::factory()->create();
        $model = AIModel::factory()->create();

        $task->models()->attach($model);

        $this->assertCount(1, $task->models);
        $this->assertTrue($task->models->contains($model));
    }

    /** @test */
    public function name_must_be_unique()
    {
        Task::create(['name' => 'Image Classification']);
        
        $this->expectException(\Illuminate\Database\QueryException::class);
        
        Task::create(['name' => 'Image Classification']);
    }
}
