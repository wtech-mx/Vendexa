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
        Schema::create('ordenes_prod_pagos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_orden');
            $table->foreign('id_orden')
                ->references('id')->on('ordenes')
                ->inDelete('set null');

            $table->integer('monto');
            $table->integer('dinero_recibido');
            $table->integer('cambio');
            $table->integer('metodo_pago');
            $table->integer('comprobante')->nullable();
            $table->integer('fecha');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordenes_prod_pagos');
    }
};
