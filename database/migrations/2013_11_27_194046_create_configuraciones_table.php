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
        Schema::create('configuraciones', function (Blueprint $table) {
            $table->id();
            $table->integer('estatus_config');
            $table->text('logo')->nullable();

            $table->integer('tarjeta')->nullable();
            $table->integer('efectivo')->nullable();
            $table->integer('transferencia')->nullable();
            $table->integer('mercado_pago')->nullable();

            $table->integer('codigo_caja')->nullable();
            $table->integer('precio_mayorista')->nullable();
            $table->integer('encriptar_mayo')->nullable();
            $table->text('palabra_encriptada')->nullable();
            $table->integer('sat_productos')->nullable();

            $table->integer('opcion_factura')->nullable();
            $table->text('tipo_factura')->nullable();
            $table->integer('porcentaje_factura')->nullable();

            $table->integer('caja_avanzada')->nullable();
            $table->integer('fondo_fijo')->nullable();
            $table->double('fondo_caja')->nullable();

            $table->integer('stock_alto');
            $table->integer('stock_medio');
            $table->integer('stock_bajo');

            $table->unsignedBigInteger('id_empresa')->unique();
            $table->foreign('id_empresa')
                ->references('id')->on('empresas')
                ->inDelete('set null');

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
        Schema::dropIfExists('configuraciones');
    }
};
