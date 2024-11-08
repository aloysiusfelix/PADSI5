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
        Schema::create('detail_penjualan', function (Blueprint $table) {
            $table->string('id_menu');
            $table->string('nama_menu');
            $table->integer('jumlah_menu');
            $table->date('tanggal_penjualan');
            $table->string('id_penjualan');
            $table->double('total_penjualan');
            $table->string('id_pelanggan');
            $table->string('nama_pelanggan');
            $table->primary(['id_menu', 'id_penjualan']);
            $table->foreign('id_menu')->references('id_menu')->on('menu')->onDelete('cascade');
            $table->foreign('id_penjualan')->references('id_penjualan')->on('transaksi_penjualan')->onDelete('cascade');
            $table->foreign('id_pelanggan')->references('id_pelanggan')->on('pelanggan')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_penjualan');
    }
};
