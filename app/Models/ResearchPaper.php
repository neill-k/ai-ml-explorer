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

    public function models(): BelongsToMany
    {
        return $this->belongsToMany(AIModel::class, 'model_research_papers');
    }
}