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
        Schema::dropIfExists('pembelian');
        Schema::create('pembelian', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_pembelian');
            $table->dateTime('tanggal_pembelian');
            $table->string('id_barang');
            $table->integer('harga');
            $table->integer('kuantitas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembelian');
    }
};
