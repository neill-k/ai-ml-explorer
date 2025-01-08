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
        'a_i_model_id',
    ];

    public function model(): BelongsTo
    {
        return $this->belongsTo(AIModel::class, 'a_i_model_id');
    }
}
