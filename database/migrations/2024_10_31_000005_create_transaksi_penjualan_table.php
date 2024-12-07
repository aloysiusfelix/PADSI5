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
        Schema::create('transaksi_penjualan', function (Blueprint $table) {
            $table->string('id_penjualan')->primary();
            $table->date('tanggal_penjualan');
            $table->string('id_menu');
            $table->string('nama_menu');
            $table->integer('jumlah_menu');
            $table->decimal('harga_menu', 10, 2); // Mengganti double dengan decimal untuk akurasi
            $table->decimal('total_penjualan', 15, 2); // Mengganti double dengan decimal untuk akurasi
            $table->string('id_pelanggan');
            $table->string('nama_pelanggan');
            $table->timestamps();

            // Foreign keys
            $table->foreign('id_menu')->references('id_menu')->on('menu')->onDelete('cascade');
            $table->foreign('id_pelanggan')->references('id_pelanggan')->on('pelanggan')->onDelete('cascade');
            
            // Optional: Menambahkan constraint unik untuk kombinasi id_menu dan tanggal_penjualan jika dibutuhkan
            $table->unique(['id_menu', 'tanggal_penjualan']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_penjualan');
    }
};