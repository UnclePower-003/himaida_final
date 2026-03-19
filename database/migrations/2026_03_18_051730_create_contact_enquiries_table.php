<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contact_enquiries', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name'); // Name of the person
            $table->string('email'); // Email
            $table->string('mobile'); // Mobile number
            $table->string('company')->nullable(); // Company (optional)
            $table->string('city')->nullable(); // City (optional)
            $table->text('message')->nullable(); // Message / requirement (optional)
            $table->boolean('active')->default(true); // Active status for admin toggle
            $table->timestamps(); // created_at and updated_at
            $table->softDeletes(); // soft deletes column (deleted_at)
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_enquiries');
    }
};