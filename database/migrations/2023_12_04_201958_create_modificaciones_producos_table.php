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
        Schema::create('modificaciones_producos', function (Blueprint $table) {
            $table->id();
            $table->text('nombre')->nullable();
            $table->text('costo')->nullable();
            $table->text('precio_normal')->nullable();
            $table->text('sku')->nullable();
            $table->text('stock')->nullable();
            $table->text('unidad_venta')->nullable();
            $table->text('visibilidad_estatus')->nullable();

            $table->date('fecha');
            $table->unsignedBigInteger('id_producto');
            $table->foreign('id_producto')
                ->references('id')->on('productos')
                ->inDelete('set null');

            $table->unsignedBigInteger('id_empresa');
            $table->foreign('id_empresa')
                ->references('id')->on('empresas')
                ->inDelete('set null');

            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')
                ->references('id')->on('users')
                ->inDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modificaciones_producos');
    }
};
