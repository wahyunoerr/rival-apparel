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
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->unsignedBigInteger('kategori_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('ukuran_id');
            $table->string('gambar_design');
            $table->string('status')->nullable();
            $table->string('reivisi');
            $table->timestamps();
            $table->foreign('product_id')->references('id')->on('products')->cascadeOnDelete();
            $table->foreign('kategori_id')->references('id')->on('kategoris')->cascadeOnDelete();
            $table->foreign('ukuran_id')->references('id')->on('ukurans')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
