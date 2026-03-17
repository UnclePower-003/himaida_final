<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contact_us_heroes', function (Blueprint $table) {
            $table->id();
            $table->string('title_line1')->default("LET'S ENHANCE");
            $table->string('title_highlight')->default('LIVES');
            $table->string('subtitle')->default('WITH OUR "WELLNESS" PRODUCTS TOGETHER');
            $table->string('background_image')->nullable();
            $table->boolean('is_active')->default(true);
       
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_us_heroes');
    }
};