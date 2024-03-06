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
        Schema::table('configuraciones', function (Blueprint $table) {
            $table->text('facebook')->nullable();
            $table->text('tiktok')->nullable();
            $table->text('instagram')->nullable();
            $table->text('whatsapp')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('configuraciones', function (Blueprint $table) {
            //
        });
    }
};
