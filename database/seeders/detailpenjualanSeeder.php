<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailPenjualanSeeder extends Seeder
{
    public function run()
    {
        // Seeder untuk tabel detail_penjualan
        DB::table('detail_penjualan')->insert([
            [
                'id_menu' => 'm001',
                'nama_menu' => 'Kopi Latte',
                'jumlah_menu' => 2,
                'tanggal_penjualan' => now(),
                'id_penjualan' => 't001',
                'total_penjualan' => 50000,
                'id_pelanggan' => 'p001',
                'nama_pelanggan' => 'Cahyo Prasetyo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_menu' => 'm002',
                'nama_menu' => 'Kopi Espresso',
                'jumlah_menu' => 3,
                'tanggal_penjualan' => now(),
                'id_penjualan' => 't002',
                'total_penjualan' => 60000,
                'id_pelanggan' => 'p002',
                'nama_pelanggan' => 'Wulan Sari',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_menu' => 'm003',
                'nama_menu' => 'Americano',
                'jumlah_menu' => 1,
                'tanggal_penjualan' => now(),
                'id_penjualan' => 't003',
                'total_penjualan' => 15000,
                'id_pelanggan' => 'p003',
                'nama_pelanggan' => 'Rudi Hartono',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_menu' => 'm004',
                'nama_menu' => 'Cappuccino',
                'jumlah_menu' => 4,
                'tanggal_penjualan' => now(),
                'id_penjualan' => 't004',
                'total_penjualan' => 120000,
                'id_pelanggan' => 'p004',
                'nama_pelanggan' => 'Ayu Lestari',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_menu' => 'm005',
                'nama_menu' => 'Roti Panggang',
                'jumlah_menu' => 2,
                'tanggal_penjualan' => now(),
                'id_penjualan' => 't005',
                'total_penjualan' => 30000,
                'id_pelanggan' => 'p005',
                'nama_pelanggan' => 'Bagus Pranoto',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_menu' => 'm006',
                'nama_menu' => 'Matcha Latte',
                'jumlah_menu' => 1,
                'tanggal_penjualan' => now(),
                'id_penjualan' => 't006',
                'total_penjualan' => 28000,
                'id_pelanggan' => 'p006',
                'nama_pelanggan' => 'Diana Suryani',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_menu' => 'm007',
                'nama_menu' => 'Teh Tarik',
                'jumlah_menu' => 2,
                'tanggal_penjualan' => now(),
                'id_penjualan' => 't007',
                'total_penjualan' => 36000,
                'id_pelanggan' => 'p007',
                'nama_pelanggan' => 'Eko Prabowo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_menu' => 'm008',
                'nama_menu' => 'Brownies',
                'jumlah_menu' => 3,
                'tanggal_penjualan' => now(),
                'id_penjualan' => 't008',
                'total_penjualan' => 60000,
                'id_pelanggan' => 'p008',
                'nama_pelanggan' => 'Fajar Aditya',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_menu' => 'm009',
                'nama_menu' => 'Cheesecake',
                'jumlah_menu' => 2,
                'tanggal_penjualan' => now(),
                'id_penjualan' => 't009',
                'total_penjualan' => 60000,
                'id_pelanggan' => 'p009',
                'nama_pelanggan' => 'Gina Lestari',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_menu' => 'm010',
                'nama_menu' => 'Frappuccino',
                'jumlah_menu' => 1,
                'tanggal_penjualan' => now(),
                'id_penjualan' => 't010',
                'total_penjualan' => 35000,
                'id_pelanggan' => 'p010',
                'nama_pelanggan' => 'Hendra Saputra',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}