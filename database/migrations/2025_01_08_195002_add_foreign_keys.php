<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('implementation_guidances', function (Blueprint $table) {
            $table->foreign('ai_model_id')->references('id')->on('ai_models')->onDelete('cascade');
        });

        Schema::table('ai_models', function (Blueprint $table) {
            $table->foreign('implementation_guidance_id')->references('id')->on('implementation_guidances')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('implementation_guidances', function (Blueprint $table) {
            $table->dropForeign(['ai_model_id']);
        });

        Schema::table('ai_models', function (Blueprint $table) {
            $table->dropForeign(['implementation_guidance_id']);
        });
    }
}; 