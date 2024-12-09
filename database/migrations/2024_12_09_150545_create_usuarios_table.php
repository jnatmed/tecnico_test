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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('usuario', 50)->nullable();
            $table->string('contrasenia', 255)->nullable();
            $table->enum('tipo_usuario', ['tecnico', 'administrativo'])->nullable();
            $table->string('email', 100)->nullable();
            $table->timestamps(0); // Timestamps sin precisión para mantener el formato de `timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP`
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
