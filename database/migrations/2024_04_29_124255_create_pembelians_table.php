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
        Schema::create('pembelian', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_pembelian');
            $table->string('no_pembelian');
            $table->string('keterangan');
            $table->string('status');
            $table->date('tgl_jatuh_tempo');
            $table->integer('kuantitas');
            $table->integer('harga');
            $table->unsignedBigInteger('id_barang');
            $table->unsignedBigInteger('id_pegawai');
            $table->unsignedBigInteger('id_supplier');
            $table->timestamps();
            $table->foreign('id_supplier')->references('id')->on('supplier');
            $table->foreign('id_barang')->references('id')->on('barang');
            $table->foreign('id_pegawai')->references('id_pegawai')->on('pegawai');
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
