<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelAlgorithmType extends Model
{
    use HasFactory;

    protected $table = 'model_algorithm_types';
    protected $fillable = ['model_id', 'algorithm_type_id'];
}