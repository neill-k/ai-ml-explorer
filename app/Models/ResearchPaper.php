<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ResearchPaper extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'authors',
        'publication_date',
        'url',
    ];

    protected $casts = [
        'publication_date' => 'datetime',
    ];

    public function models(): BelongsToMany
    {
        return $this->belongsToMany(AiModel::class, 'model_research_papers');
    }
}