<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelTask extends Model
{
    use HasFactory;

    protected $table = 'model_tasks';
    protected $fillable = ['model_id', 'task_id'];
}