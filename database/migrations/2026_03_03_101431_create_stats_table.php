<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('stats', function (Blueprint $table) {
            $table->id();
            $table->string('value');        // Can be number OR string (1000+, 25 Years, ISO, etc.)
            $table->string('title');        // e.g. Satisfied Clients
            $table->text('description')->nullable();
            $table->string('icon')->nullable(); // image path
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stats');
    }
};
