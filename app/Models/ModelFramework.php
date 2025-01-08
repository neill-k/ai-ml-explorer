<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelFramework extends Model
{
    use HasFactory;

    protected $table = 'model_frameworks';
    protected $fillable = ['model_id', 'framework_id'];
}