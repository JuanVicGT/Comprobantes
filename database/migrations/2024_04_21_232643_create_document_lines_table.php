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
        Schema::create('document_lines', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 30);
            $table->string('descripcion');
            $table->float('precio', 6);
            $table->float('cantidad', 2);
            $table->float('total', 6);
            $table->timestamps();

            $table->unsignedBigInteger('doc_id');
            $table->foreign('doc_id')->references('id')->on('documents');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('document_lines');
    }
};
