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
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('titulo')->nullable();
            $table->string('subtitulo')->nullable();
            $table->string('nombrebutton1', 20)->nullable();
            $table->string('nombrebutton2', 20)->nullable();
            $table->string('link1')->nullable();//en el caso que podrian tener talves dos botones basado en la plantilla
            $table->string('link2')->nullable();
            $table->string('nombreImagen');
            $table->string('es_activo', 1)->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sliders');
    }
};
