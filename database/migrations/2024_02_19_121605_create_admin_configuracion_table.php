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
        Schema::create('admin_configuracion', function (Blueprint $table) {
            $table->id();
            $table->text('img_enero')->nullable();
            $table->text('img_febrero')->nullable();
            $table->text('img_marzo')->nullable();
            $table->text('img_abril')->nullable();
            $table->text('img_mayo')->nullable();
            $table->text('img_junio')->nullable();
            $table->text('img_julio')->nullable();
            $table->text('img_agosto')->nullable();
            $table->text('img_septiembre')->nullable();
            $table->text('img_octubre')->nullable();
            $table->text('img_noviembre')->nullable();
            $table->text('img_diciembre')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_configuracion');
    }
};
