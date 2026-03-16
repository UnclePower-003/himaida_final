<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('private_label_heroes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('highlight_text')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('private_label_heroes');
    }
};