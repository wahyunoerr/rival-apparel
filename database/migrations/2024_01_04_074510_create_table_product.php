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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('ukuran_id');
            $table->unsignedBigInteger('kategori_id');
            $table->string('gambar');
            $table->string('harga');
            $table->timestamps();
            $table->foreign('kategori_id')->references('id')->on('ukurans')->cascadeOnDelete();
            $table->foreign('ukuran_id')->references('id')->on('kategoris')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_product');
    }
};
