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
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique();
            $table->string('telefono')->unique();
            $table->string('correo')->nullable();
            $table->string('referencia')->nullable();
            $table->string('giro')->nullable();
            
            $table->unsignedBigInteger('id_direccion');
            $table->foreign('id_direccion')
                ->references('id')->on('direcciones')
                ->inDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empresas');
    }
};
