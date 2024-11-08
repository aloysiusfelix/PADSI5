<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class menuSeeder extends Seeder
{
    public function run()
    {
        // Seeder untuk tabel menu
        DB::table('menu')->insert([
            [
                'id_menu' => 'm001',
                'nama_menu' => 'Kopi Latte',
                'deskripsi_menu' => 'Kopi latte dengan campuran susu',
                'harga_menu' => 25000,
                'kategori_menu' => 'Minuman',
                'gambar_menu' => 'kopi_latte.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_menu' => 'm002',
                'nama_menu' => 'Kopi Espresso',
                'deskripsi_menu' => 'Espresso dengan rasa kuat',
                'harga_menu' => 20000,
                'kategori_menu' => 'Minuman',
                'gambar_menu' => 'kopi_espresso.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_menu' => 'm003',
                'nama_menu' => 'Americano',
                'deskripsi_menu' => 'Kopi hitam tanpa gula',
                'harga_menu' => 15000,
                'kategori_menu' => 'Minuman',
                'gambar_menu' => 'americano.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_menu' => 'm004',
                'nama_menu' => 'Cappuccino',
                'deskripsi_menu' => 'Kopi dengan busa susu',
                'harga_menu' => 30000,
                'kategori_menu' => 'Minuman',
                'gambar_menu' => 'cappuccino.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_menu' => 'm005',
                'nama_menu' => 'Roti Panggang',
                'deskripsi_menu' => 'Roti panggang dengan selai',
                'harga_menu' => 15000,
                'kategori_menu' => 'Makanan',
                'gambar_menu' => 'roti_panggang.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_menu' => 'm006',
                'nama_menu' => 'Matcha Latte',
                'deskripsi_menu' => 'Teh hijau dengan susu',
                'harga_menu' => 28000,
                'kategori_menu' => 'Minuman',
                'gambar_menu' => 'matcha_latte.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_menu' => 'm007',
                'nama_menu' => 'Teh Tarik',
                'deskripsi_menu' => 'Teh dengan susu kental manis',
                'harga_menu' => 18000,
                'kategori_menu' => 'Minuman',
                'gambar_menu' => 'teh_tarik.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_menu' => 'm008',
                'nama_menu' => 'Brownies',
                'deskripsi_menu' => 'Kue cokelat lembut',
                'harga_menu' => 20000,
                'kategori_menu' => 'Makanan',
                'gambar_menu' => 'brownies.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_menu' => 'm009',
                'nama_menu' => 'Cheesecake',
                'deskripsi_menu' => 'Kue keju lembut',
                'harga_menu' => 30000,
                'kategori_menu' => 'Makanan',
                'gambar_menu' => 'cheesecake.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_menu' => 'm010',
                'nama_menu' => 'Frappuccino',
                'deskripsi_menu' => 'Minuman kopi dingin dengan es krim',
                'harga_menu' => 35000,
                'kategori_menu' => 'Minuman',
                'gambar_menu' => 'frappuccino.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}