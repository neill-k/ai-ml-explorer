<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelDataType extends Model
{
    use HasFactory;

    protected $table = 'model_data_types';
    protected $fillable = ['model_id', 'data_type_id'];
}