<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('brand_spotlights', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Brand title
            $table->string('title_color')->default('#FFD700'); // Title color
            $table->text('description'); // Brand description
            $table->string('brand_image')->nullable(); // Main image
            $table->string('circle_image')->nullable(); // Circle/logo image
            $table->json('tags')->nullable(); // Product tags array
            $table->boolean('active')->default(true); // Active toggle
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('brand_spotlights');
    }
};