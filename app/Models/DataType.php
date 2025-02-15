<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DataType extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function models(): BelongsToMany
    {
        return $this->belongsToMany(AiModel::class, 'model_data_types');
    }
}