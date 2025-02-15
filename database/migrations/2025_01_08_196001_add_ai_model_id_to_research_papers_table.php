<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAiModelIdToResearchPapersTable extends Migration
{
    public function up()
    {
        Schema::table('research_papers', function (Blueprint $table) {
            $table->foreignId('ai_model_id')
                ->nullable()
                ->constrained('ai_models')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('research_papers', function (Blueprint $table) {
            $table->dropForeign(['ai_model_id']);
            $table->dropColumn('ai_model_id');
        });
    }
} 