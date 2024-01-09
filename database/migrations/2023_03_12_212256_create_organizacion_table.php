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
        Schema::create('organizacion', function (Blueprint $table) {
            $table->id();
            $table->string('ruc')->unique();
            $table->string('razon_social')->unique();
            $table->string('titulo');
            $table->string('slogan');
            $table->text('descripcion');
            $table->string('director');
            $table->string('direccion');
            $table->string('email');
            $table->string('telefono');
            $table->string('telefono2')->nullable();
            $table->string('url_web');
            $table->text('quienes_somos');
            $table->text('vision');
            $table->text('mision');
            $table->string('logo')->default('logo.png');
            $table->string('icono')->default('favicon.ico');;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organizacion');
    }
};
