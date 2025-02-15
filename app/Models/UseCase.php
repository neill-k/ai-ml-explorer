<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class UseCase extends Model
{
    use HasFactory;

    protected $fillable = ['description'];

    public function models(): BelongsToMany
    {
        return $this->belongsToMany(AiModel::class, 'model_use_cases');
    }
}