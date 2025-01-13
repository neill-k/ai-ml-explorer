<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class AIModel extends Model
{
    use HasFactory;

    protected $table = 'a_i_models';

    protected $fillable = [
        'name',
        'markdown_description',
        'limitations',
        'evaluation_metrics',
        'training_data_description', // Keeping this field
        'license',
        'maintainers_authors',
        'date_added',
        'date_updated',
        'implementation_guidance_id',
        'is_gpu_accelerated',
        'interpretability_score',
        'interpretability_explanation',
        'training_data_size_estimate',
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

    public function researchPapers(): HasMany
    {
        return $this->hasMany(ResearchPaper::class);
    }

    public function relatedModels(): BelongsToMany
    {
        return $this->belongsToMany(AIModel::class, 'related_models', 'model_id1', 'model_id2')->withPivot('relationship_type');
    }

    public function useCases(): BelongsToMany
    {
        return $this->belongsToMany(UseCase::class, 'model_use_cases');
    }
}
