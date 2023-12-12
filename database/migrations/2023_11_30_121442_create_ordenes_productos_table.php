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
        Schema::create('ordenes_productos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_orden');
            $table->foreign('id_orden')
                ->references('id')->on('ordenes')
                ->inDelete('set null');

            $table->unsignedBigInteger('id_producto');
            $table->foreign('id_producto')
                ->references('id')->on('productos')
                ->inDelete('set null');

            $table->integer('id_woocommerce')->nullable();
            $table->float('cantidad');
            $table->float('precio');
            $table->float('subtotal');
            $table->date('fecha');
            $table->text('tipo_desc')->nullable();
            $table->float('descuento')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordenes_productos');
    }
};
