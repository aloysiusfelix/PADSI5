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
        Schema::create('stok', function (Blueprint $table) {
            $table->string('id_stok')->primary(); // ID Stok sebagai primary key
            $table->string('nama_stok')->unique(); // Nama barang dengan index unik
            $table->string('deskripsi_stok')->nullable(); // Deskripsi barang
            $table->integer('jumlah_stok'); // Jumlah stok yang tersedia
            $table->string('kategori_stok'); // Kategori dari barang
            $table->string('gambar_stok')->nullable(); // Path gambar barang
            $table->double('harga_stok'); // Harga barang
            $table->timestamps(); // Timestamps untuk created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stok'); // Menghapus tabel jika migrasi dibatalkan
    }
};