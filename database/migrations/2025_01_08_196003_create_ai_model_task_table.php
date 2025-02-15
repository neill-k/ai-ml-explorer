<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAiModelTaskTable extends Migration
{
    public function up()
    {
        Schema::create('ai_model_task', function (Blueprint $table) {
            $table->foreignId('ai_model_id')
                ->constrained('ai_models')
                ->onDelete('cascade');
            $table->foreignId('task_id')->constrained('tasks')->onDelete('cascade');
            $table->primary(['ai_model_id', 'task_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('ai_model_task');
    }
} 