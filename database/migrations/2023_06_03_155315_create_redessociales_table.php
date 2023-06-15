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
        Schema::create('redessociales', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 60);
            $table->string('url');
            $table->string('icono');
            $table->string('colorfondo', 7);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('redessociales');
    }
};
