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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('telefono')->unique();
            $table->string('correo')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('password_caja')->unique()->nullable();
            $table->text('foto')->nullable();
            $table->string('estatus_rol')->nullable();
            $table->rememberToken();

            $table->unsignedBigInteger('id_direccion')->nullable();
            $table->foreign('id_direccion')
                ->references('id')->on('direcciones')
                ->inDelete('set null');

            $table->unsignedBigInteger('id_empresa')->nullable();
            $table->foreign('id_empresa')
                ->references('id')->on('empresas')
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
        Schema::dropIfExists('users');
    }
};
