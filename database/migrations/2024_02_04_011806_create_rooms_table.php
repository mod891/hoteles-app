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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('hotel_id');
            $table->foreign('hotel_id')->references('id')->on('hotels');
            $table->string('descripcion');
            $table->boolean('fumadores');
            $table->boolean('balcon');
            $table->boolean('minibar');
            $table->boolean('cama_matrimonio');
            $table->float('precio',4,2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};