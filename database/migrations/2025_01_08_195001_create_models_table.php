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
        Schema::create('a_i_models', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('markdown_description')->nullable();
            $table->text('limitations')->nullable();
            $table->text('evaluation_metrics')->nullable();
            $table->text('training_data_description')->nullable();
            $table->string('license')->nullable();
            $table->string('maintainers_authors')->nullable();
            $table->datetime('date_added')->nullable();
            $table->datetime('date_updated')->nullable();
            $table->foreignId('implementation_guidance_id')->nullable();
            $table->boolean('is_gpu_accelerated')->default(false);
            $table->integer('interpretability_score')->nullable();
            $table->text('interpretability_explanation')->nullable();
            $table->string('training_data_size_estimate')->nullable();
            $table->timestamps();
        });

        Schema::create('related_models', function (Blueprint $table) {
            $table->id();
            $table->foreignId('model_id1')->constrained('a_i_models')->onDelete('cascade');
            $table->foreignId('model_id2')->constrained('a_i_models')->onDelete('cascade');
            $table->string('relationship_type')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('related_models');
        Schema::dropIfExists('a_i_models');
    }
};
