<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAiModelUseCaseTable extends Migration
{
    public function up()
    {
        Schema::create('ai_model_use_case', function (Blueprint $table) {
            $table->foreignId('ai_model_id')
                ->constrained('ai_models')
                ->onDelete('cascade');
            $table->foreignId('use_case_id')->constrained('use_cases')->onDelete('cascade');
            $table->primary(['ai_model_id', 'use_case_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('ai_model_use_case');
    }
} 