<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ModelFamily extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function models(): BelongsToMany
    {
        return $this->belongsToMany(AiModel::class, 'model_family_models');
    }
} 