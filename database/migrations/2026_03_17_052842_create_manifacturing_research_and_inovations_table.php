<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManifacturingResearchAndInovationsTable extends Migration
{
    public function up()
    {
        Schema::create('manifacturing_research_and_inovations', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('image')->nullable();
            $table->json('descriptions')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('manifacturing_research_and_inovations');
    }
}