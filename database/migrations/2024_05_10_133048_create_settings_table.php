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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_compania');
            $table->string('nombre_representante');
            $table->string('concepto');
            $table->string('img_logo')->nullable();
            $table->string('img_icono')->nullable();
            $table->string('codigo');
            $table->float('precio', 6);
            $table->float('cantidad', 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
