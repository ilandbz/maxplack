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
        Schema::create('convocatorias', function (Blueprint $table) {
            $table->id();
            $table->string('titulo')->unique();
            $table->string('descripcion');
            $table->foreignId('tipo_convocatoria_id')->constrained('tipo_convocatorias')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('etapa_convocatoria_id')->constrained('etapa_convocatorias')->onDelete('cascade')->onUpdate('cascade');
            $table->string('estado')->default('ABIERTO');
            $table->unsignedTinyInteger('es_activo')->default(1);
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('convocatorias');
    }
};
