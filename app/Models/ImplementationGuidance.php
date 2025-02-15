<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ImplementationGuidance extends Model
{
    use HasFactory;

    protected $table = 'implementation_guidances';

    protected $fillable = [
        'title',
        'description',
        'best_practices',
        'code_example',
        'performance_benchmarks',
        'ai_model_id',
    ];

    public function model(): BelongsTo
    {
        return $this->belongsTo(AiModel::class, 'ai_model_id');
    }
}
