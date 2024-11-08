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
        Schema::create('detail_pembelian', function (Blueprint $table) {
            $table->string('id_stok');
            $table->string('nama_stok');
            $table->string('id_pembelian');
            $table->date('tanggal_pembelian');
            $table->integer('jumlah_item_pembelian');
            $table->double('total_harga_pembelian');
            $table->primary(['id_stok', 'id_pembelian']);
            $table->foreign('id_stok')->references('id_stok')->on('stok')->onDelete('cascade');
            $table->foreign('id_pembelian')->references('id_pembelian')->on('transaksi_pembelian')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_pembelian');
    }
};
