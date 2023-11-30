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

            $table->date('fecha')->nullable();
            $table->string('tipo')->nullable();
            $table->float('total')->nullable();
            $table->float('restante')->nullable();
            $table->text('comentario')->nullable();

            $table->unsignedBigInteger('id_empresa');
            $table->foreign('id_empresa')
                ->references('id')->on('empresas')
                ->inDelete('set null');

            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')
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
