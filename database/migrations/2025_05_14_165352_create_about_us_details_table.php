<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('about_us_details', function (Blueprint $table) {
            $table->id();
            $table->string('company_name'); // Nama perusahaan
            $table->longText('company_description'); // Deskripsi perusahaan
            $table->string('image')->nullable(); // Gambar (image)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_us_details');
    }
};
