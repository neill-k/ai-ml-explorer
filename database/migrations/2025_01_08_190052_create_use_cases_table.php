<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('use_cases', function (Blueprint $table) {
            $table->id();
            $table->text('description');
            $table->timestamps();
        });

        Schema::create('model_use_cases', function (Blueprint $table) {
            $table->id();
            $table->foreignId('a_i_model_id')->constrained()->onDelete('cascade');
            $table->foreignId('use_case_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('model_use_cases');
        Schema::dropIfExists('use_cases');
    }
};
