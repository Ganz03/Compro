<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('spbus', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique(); // SPBU code like "44.581.24"
            $table->string('name'); // Name like "Kaliceret"
            $table->text('address');
            $table->string('city');
            $table->string('province');
            $table->string('postal_code');
            $table->string('phone');
            $table->string('email');
            $table->text('google_maps_embed'); // The iframe src URL for Google Maps
            $table->integer('established_year');
            $table->text('description');
            $table->boolean('is_active')->default(true);
            $table->string('slug')->unique(); // URL-friendly identifier
            $table->string('hero_image')->nullable(); // Path to hero/banner image
            $table->string('thumbnail_image')->nullable(); // Path to thumbnail image
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('spbus');
    }
};