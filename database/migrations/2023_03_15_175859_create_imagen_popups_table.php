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
        Schema::create('imagen_popups', function (Blueprint $table) {
            $table->id();
            $table->string('nombreImagen');
            $table->foreignId('popup_id')->constrained('popups')->onDelete('cascade')->onUpdate('cascade');
            $table->string('link')->default('#');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imagen_popups');
    }
};
