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
            $table->foreign('hotel_id')
                ->references('id')->on('hotels')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('descripcion');
            $table->boolean('fumadores');
            $table->boolean('balcon');
            $table->boolean('minibar');
            $table->boolean('cama_matrimonio');
            $table->boolean('minicadena_wifi');
            $table->float('precio',6,2);
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
