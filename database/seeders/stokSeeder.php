<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StokSeeder extends Seeder
{
    public function run()
    {
        // Seeder untuk tabel stok
        DB::table('stok')->insert([
            [
                'id_stok' => 's001',
                'nama_stok' => 'Kopi Arabika',
                'deskripsi_stok' => 'Biji kopi Arabika premium',
                'jumlah_stok' => 100,
                'harga_stok' => 80000,
                'kategori_stok' => 'Biji Kopi',
                'gambar_stok' => 'kopi_arabika.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_stok' => 's002',
                'nama_stok' => 'Gula Pasir',
                'deskripsi_stok' => 'Gula pasir berkualitas',
                'jumlah_stok' => 200,
                'harga_stok' => 15000,
                'kategori_stok' => 'Bahan Minuman',
                'gambar_stok' => 'gula_pasir.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_stok' => 's003',
                'nama_stok' => 'Lychee',
                'deskripsi_stok' => 'Leci Segar',
                'jumlah_stok' => 200,
                'harga_stok' => 5000,
                'kategori_stok' => 'Bahan Minuman',
                'gambar_stok' => 'leci.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_stok' => 's004',
                'nama_stok' => 'Bubuk Teh',
                'deskripsi_stok' => 'Bubuk Teh berkualitas',
                'jumlah_stok' => 200,
                'harga_stok' => 30000,
                'kategori_stok' => 'Bahan Minuman',
                'gambar_stok' => 'bubuk_teh.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_stok' => 's005',
                'nama_stok' => 'Susu Sapi',
                'deskripsi_stok' => 'Susu segar untuk minuman kopi',
                'jumlah_stok' => 150,
                'harga_stok' => 25000,
                'kategori_stok' => 'Bahan Minuman',
                'gambar_stok' => 'susu_sapi.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_stok' => 's006',
                'nama_stok' => 'Krim Kental',
                'deskripsi_stok' => 'Krim kental untuk topping',
                'jumlah_stok' => 80,
                'harga_stok' => 35000,
                'kategori_stok' => 'Bahan Minuman',
                'gambar_stok' => 'krim_kental.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_stok' => 's007',
                'nama_stok' => 'Coklat Bubuk',
                'deskripsi_stok' => 'Bubuk coklat berkualitas tinggi',
                'jumlah_stok' => 120,
                'harga_stok' => 40000,
                'kategori_stok' => 'Bahan Minuman',
                'gambar_stok' => 'coklat_bubuk.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_stok' => 's008',
                'nama_stok' => 'Kayu Manis',
                'deskripsi_stok' => 'Bubuk kayu manis untuk rasa ekstra',
                'jumlah_stok' => 50,
                'harga_stok' => 20000,
                'kategori_stok' => 'Bahan Tambahan',
                'gambar_stok' => 'kayu_manis.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_stok' => 's009',
                'nama_stok' => 'Sirup Vanila',
                'deskripsi_stok' => 'Sirup vanila untuk menambah rasa',
                'jumlah_stok' => 100,
                'harga_stok' => 10000,
                'kategori_stok' => 'Bahan Minuman',
                'gambar_stok' => 'sirup_vanila.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_stok' => 's010',
                'nama_stok' => 'Es Batu',
                'deskripsi_stok' => 'Es batu untuk minuman dingin',
                'jumlah_stok' => 500,
                'harga_stok' => 5000,
                'kategori_stok' => 'Bahan Minuman',
                'gambar_stok' => 'es_batu.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],            
        ]);
    }
}
