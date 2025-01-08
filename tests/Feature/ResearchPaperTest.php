<?php

namespace Tests\Feature;

use App\Models\ResearchPaper;
use App\Models\AIModel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ResearchPaperTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_research_paper()
    {
        $paper = ResearchPaper::create([
            'title' => 'Attention is All You Need',
            'authors' => 'Vaswani et al.',
            'publication_date' => '2017-06-12',
            'url' => 'https://arxiv.org/abs/1706.03762'
        ]);

        $this->assertDatabaseHas('research_papers', [
            'title' => 'Attention is All You Need',
            'url' => 'https://arxiv.org/abs/1706.03762'
        ]);
    }

    /** @test */
    public function it_requires_title_and_authors()
    {
        $this->expectException(\Illuminate\Database\QueryException::class);
        
        ResearchPaper::create([
            'title' => null,
            'authors' => null
        ]);
    }

    /** @test */
    public function it_can_have_models()
    {
        $paper = ResearchPaper::factory()->create();
        $model = AIModel::factory()->create();

        $paper->models()->attach($model);

        $this->assertCount(1, $paper->models);
        $this->assertTrue($paper->models->contains($model));
    }

    /** @test */
    public function url_must_be_valid()
    {
        $this->expectException(\Illuminate\Database\QueryException::class);
        
        ResearchPaper::create([
            'title' => 'Test Paper',
            'authors' => 'Test Author',
            'url' => 'invalid-url'
        ]);
    }

    /** @test */
    public function publication_date_must_be_valid()
    {
        $this->expectException(\Illuminate\Database\QueryException::class);
        
        ResearchPaper::create([
            'title' => 'Test Paper',
            'authors' => 'Test Author',
            'publication_date' => 'invalid-date'
        ]);
    }
}
