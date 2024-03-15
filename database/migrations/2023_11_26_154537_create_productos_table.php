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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion')->nullable();

            $table->unsignedBigInteger('id_categoria');
            $table->foreign('id_categoria')
                ->references('id')->on('categorias')
                ->inDelete('set null');

            $table->unsignedBigInteger('id_subcategoria')->nullable();
            $table->foreign('id_subcategoria')
                ->references('id')->on('subcategorias')
                ->inDelete('set null');

            $table->unsignedBigInteger('id_marca')->nullable();
            $table->foreign('id_marca')
                ->references('id')->on('marcas')
                ->inDelete('set null');

            $table->unsignedBigInteger('id_proveedor');
            $table->foreign('id_proveedor')
                ->references('id')->on('proveedores')
                ->inDelete('set null');

            $table->string('codigo_proveedor')->nullable();
            $table->string('unidad_venta')->nullable();
            $table->float('stock')->nullable();
            $table->text('imagen_principal')->nullable();
            $table->text('clave_sat')->nullable();
            $table->string('sku')->unique();
            $table->float('costo')->nullable();
            $table->string('visibilidad_estatus')->nullable();
            $table->float('precio_normal')->nullable();
            $table->float('precio_mayo')->nullable();
            $table->string('descuento')->nullable();
            $table->float('precio_descuento')->nullable();
            $table->date('fecha_inicio_desc')->nullable();
            $table->date('fecha_fin_desc')->nullable();

            $table->unsignedBigInteger('id_empresa');
            $table->foreign('id_empresa')
                ->references('id')->on('empresas')
                ->inDelete('set null');

            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')
                ->references('id')->on('users')
                ->inDelete('set null');

            $table->unsignedBigInteger('id_woocommerce')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
