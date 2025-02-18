<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function models(): BelongsToMany
    {
        return $this->belongsToMany(AiModel::class, 'model_tasks');
    }
}