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
        Schema::create('transaksi_pembelian', function (Blueprint $table) {
            $table->string('id_pembelian')->primary(); // ID Pembelian sebagai primary key
            $table->timestamp('tanggal_pembelian'); // Tanggal pembelian
            $table->string('id_stok'); // ID stok dari tabel stok
            $table->string('nama_stok'); // Nama barang
            $table->integer('jumlah_item_pembelian'); // Jumlah barang yang dibeli
            $table->double('total_harga_pembelian'); // Total harga
            $table->foreign('id_stok')->references('id_stok')->on('stok')->onDelete('cascade'); // Relasi dengan tabel stok
            $table->timestamps(); // Timestamps untuk created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_pembelian'); // Menghapus tabel jika migrasi dibatalkan
    }
};
