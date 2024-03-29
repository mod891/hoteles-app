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
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('user_id')
                ->references('id')->on('users');
               // ->onDelete('cascade');
            $table->foreignId('room_id')
                ->references('id')->on('rooms')
                ->onDelete('cascade');
            $table->date('fecha_ini');
            $table->date('fecha_fin');
            $table->smallInteger('dias');
            $table->float('precio',10,2);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
