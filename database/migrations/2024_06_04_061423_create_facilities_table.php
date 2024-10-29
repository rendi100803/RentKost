<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacilitiesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('facilities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kost_id');
            $table->enum('type', ['Fasilitas Umum', 'Fasilitas Parkir', 'Fasilitas Kamar Mandi']); // 'kamar', 'kamar_mandi', 'umum', 'parkir'
            $table->longText('facility');
            $table->timestamps();

            $table->foreign('kost_id')->references('id')->on('kosts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facilities');
    }
};
