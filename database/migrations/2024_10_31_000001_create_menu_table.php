<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuTable extends Migration
{
    public function up()
    {
        Schema::create('menu', function (Blueprint $table) {
            $table->string('id_menu')->primary(); // ID manual
            $table->string('nama_menu')->unique(); // Nama menu unik
            $table->text('deskripsi_menu')->nullable();
            $table->integer('harga_menu');
            $table->string('kategori_menu');
            $table->string('gambar_menu')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('menu');
    }
}
