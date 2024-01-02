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
            $table->unsignedBigInteger('id_cliente');
            $table->foreign('id_cliente')
                ->references('id')->on('clientes')
                ->inDelete('set null');

            $table->string('folio_venta')->nullable();
            $table->string('folio_cotizacion')->nullable();
            $table->string('cotizacion');
            $table->string('estatus_cotizacion');
            $table->date('fecha')->nullable();
            $table->string('tipo')->nullable();
            $table->float('total')->nullable();
            $table->float('restante')->nullable();
            $table->text('comentario')->nullable();
            $table->text('tipo_desc')->nullable();
            $table->float('descuento')->nullable();
            $table->string('factura')->nullable();

            $table->unsignedBigInteger('id_factura')->nullable();
            $table->foreign('id_factura')
                ->references('id')->on('datos_facturas')
                ->inDelete('set null');

            $table->unsignedBigInteger('id_empresa');
            $table->foreign('id_empresa')
                ->references('id')->on('empresas')
                ->inDelete('set null');

            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')
                ->references('id')->on('users')
                ->inDelete('set null');

            $table->unsignedBigInteger('id_cajero');
            $table->foreign('id_cajero')
                ->references('id')->on('users')
                ->inDelete('set null');

            $table->unsignedBigInteger('id_orden_woocommerce')->nullable();
            $table->timestamps();
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
