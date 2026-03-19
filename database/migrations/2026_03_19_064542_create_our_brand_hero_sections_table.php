<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('ourbrandherosections', function (Blueprint $table) {
            $table->id();
            $table->string('title_line_1')->nullable();
            $table->string('highlight_1')->nullable();
            $table->string('title_line_2')->nullable();
            $table->string('highlight_2')->nullable();
            $table->string('background_image')->nullable();
            $table->boolean('is_active')->default(1);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ourbrandherosections');
    }
};