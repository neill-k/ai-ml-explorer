<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('model_families', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create('model_family_models', function (Blueprint $table) {
            $table->id();
            $table->foreignId('model_family_id')->constrained()->onDelete('cascade');
            $table->foreignId('ai_model_id')->constrained('ai_models')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('model_family_models');
        Schema::dropIfExists('model_families');
    }
}; 