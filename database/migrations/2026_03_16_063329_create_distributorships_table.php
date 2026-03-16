<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('distributorships', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->json('points')->nullable(); // array of bullet points
            $table->json('contacts')->nullable(); // array of contact items with icon, text, link
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('distributorships');
    }
};
