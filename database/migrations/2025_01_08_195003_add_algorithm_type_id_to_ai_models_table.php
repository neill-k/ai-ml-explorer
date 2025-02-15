<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAlgorithmTypeIdToAiModelsTable extends Migration
{
    public function up()
    {
        Schema::table('ai_models', function (Blueprint $table) {
            $table->foreignId('algorithm_type_id')->constrained('algorithm_types')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('ai_models', function (Blueprint $table) {
            $table->dropForeign(['algorithm_type_id']);
            $table->dropColumn('algorithm_type_id');
        });
    }
} 