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
        Schema::create('_jugador', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_jugador');
            $table->string('posicion_jugador');
            $table->integer('numero_jugador');
            $table->foreignId('id_equipo')->constrained('_equipo');
            $table->boolean('estado');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_jugador');
    }
};
