<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('full_name', length: 255);
            $table->string('id_number');
            $table->foreignId('country_id')
                  ->constrained('countries') // Automatically references the countries table
                  ->onDelete('cascade');     // Delete patients on country delete
            $table->boolean('death')->default('false');
            $table->boolean('recovered')->default('false');
            $table->timestamps();

            $table->unique(['id_number', 'country_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
