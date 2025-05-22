<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('facilities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('spbu_id')->constrained()->onDelete('cascade');
            $table->string('name'); // Facility name (e.g., "Toilet", "Musholla")
            $table->string('image'); // Path to facility image
            $table->text('description')->nullable(); // Optional description
            $table->boolean('is_active')->default(true);
            $table->integer('order'); // For controlling display order
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('facilities');
    }
};