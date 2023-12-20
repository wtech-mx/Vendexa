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

            $table->float('monto')->nullable();
            $table->text('metodo_pago');
            $table->text('metodo_pago2')->nullable();
            $table->float('dinero_recibido');
            $table->float('dinero_recibido2')->nullable();
            $table->float('cambio');
            $table->text('comprobante')->nullable();
            $table->date('fecha');
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
