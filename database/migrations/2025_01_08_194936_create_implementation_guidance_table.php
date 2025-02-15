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
        Schema::create('implementation_guidances', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->text('best_practices')->nullable();
            $table->text('code_example')->nullable();
            $table->text('performance_benchmarks')->nullable();
            $table->text('implementation_steps')->nullable();
            $table->text('optimization_tips')->nullable();
            $table->text('debugging_guidance')->nullable();
            $table->text('deployment_considerations')->nullable();
            $table->foreignId('ai_model_id')->nullable()->constrained('ai_models')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('implementation_guidances');
    }
};
