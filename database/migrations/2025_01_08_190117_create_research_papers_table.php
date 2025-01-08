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
        Schema::create('research_papers', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('authors');
            $table->date('publication_date');
            $table->string('url');
            $table->timestamps();
        });

        Schema::create('model_research_papers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('a_i_model_id')->constrained()->onDelete('cascade');
            $table->foreignId('research_paper_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('model_research_papers');
        Schema::dropIfExists('research_papers');
    }
};
