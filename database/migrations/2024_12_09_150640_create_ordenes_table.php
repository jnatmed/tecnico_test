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
        Schema::create('ordenes', function (Blueprint $table) {
            $table->id();
            $table->string('tipoServicio');
            $table->dateTime('fechaEmision')->nullable();
            $table->string('apellido');
            $table->string('nombre');
            $table->string('grado');
            $table->string('credencial');
            $table->string('division');
            $table->string('seccion');
            $table->string('email');
            $table->text('observaciones')->nullable();
            $table->string('pathOrden')->nullable();
            $table->timestamps(0);
            $table->foreignId('estado_orden_id')->constrained('estado_ordenes')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('usuario_id')->constrained('usuarios')->onDelete('restrict')->onUpdate('cascade');
            $table->text('trabajos_realizados')->nullable();
            $table->text('motivo_rechazo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordenes');
    }
};
