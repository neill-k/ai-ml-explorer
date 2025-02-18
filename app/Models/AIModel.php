<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class AiModel extends Model
{
    use HasFactory;

    protected $table = 'ai_models';

    protected $fillable = [
        'name',
        'markdown_description',
        'limitations',
        'evaluation_metrics',
        'training_data_description',
        'license',
        'maintainers_authors',
        'date_added',
        'date_updated',
        'implementation_guidance_id',
        'is_gpu_accelerated',
        'interpretability_score',
        'interpretability_explanation',
        'training_data_size_estimate',
        'algorithm_description',
        'tasks_description',
        'related_models_description',
    ];

    protected $casts = [
        'date_added' => 'datetime',
        'date_updated' => 'datetime',
        'is_gpu_accelerated' => 'boolean',
    ];

    public function tasks(): BelongsToMany
    {
        return $this->belongsToMany(Task::class, 'model_tasks');
    }

    public function dataTypes(): BelongsToMany
    {
        return $this->belongsToMany(DataType::class, 'model_data_types');
    }

    public function algorithmTypes(): BelongsToMany
    {
        return $this->belongsToMany(AlgorithmType::class, 'model_algorithm_types');
    }

    public function frameworks(): BelongsToMany
    {
        return $this->belongsToMany(Framework::class, 'model_frameworks');
    }

    public function implementationGuidance(): HasOne
    {
        return $this->hasOne(ImplementationGuidance::class);
    }

    public function researchPapers(): BelongsToMany
    {
        return $this->belongsToMany(ResearchPaper::class, 'model_research_papers');
    }

    public function relatedModels(): BelongsToMany
    {
        return $this->belongsToMany(AiModel::class, 'related_models', 'model_id1', 'model_id2')->withPivot('relationship_type');
    }

    public function useCases(): BelongsToMany
    {
        return $this->belongsToMany(UseCase::class, 'ai_model_use_case', 'ai_model_id', 'use_case_id');
    }
}
