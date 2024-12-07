<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransaksiPembelianSeeder extends Seeder
{
    public function run()
    {
        // Kosongkan tabel transaksi_pembelian sebelum menyisipkan data baru
        DB::table('transaksi_pembelian');

        // Seeder untuk tabel transaksi_pembelian
        DB::table('transaksi_pembelian')->insert([
            [
                'id_pembelian' => 'PB001',
                'tanggal_pembelian' => now(),
                'id_stok'=> 's001',
                'nama_stok' => 'Kopi Arabika',
                'jumlah_item_pembelian' => 50,
                'total_harga_pembelian' => 250000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_pembelian' => 'PB002',
                'tanggal_pembelian' => now(),
                'id_stok'=> 's002',
                'nama_stok' => 'Gula Pasir',
                'jumlah_item_pembelian' => 100,
                'total_harga_pembelian' => 500000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_pembelian' => 'PB003',
                'tanggal_pembelian' => now(),
                'id_stok'=> 's003',
                'nama_stok' => 'Lychee',
                'jumlah_item_pembelian' => 75,
                'total_harga_pembelian' => 375000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_pembelian' => 'PB004',
                'tanggal_pembelian' => now(),
                'id_stok'=> 's004',
                'nama_stok' => 'Bubuk Teh',
                'jumlah_item_pembelian' => 20,
                'total_harga_pembelian' => 100000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_pembelian' => 'PB005',
                'tanggal_pembelian' => now(),
                'id_stok'=> 's005',
                'nama_stok' => 'Susu Sapi',
                'jumlah_item_pembelian' => 30,
                'total_harga_pembelian' => 150000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_pembelian' => 'PB006',
                'tanggal_pembelian' => now(),
                'id_stok'=> 's006',
                'nama_stok' => 'Krim Kental',
                'jumlah_item_pembelian' => 45,
                'total_harga_pembelian' => 225000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_pembelian' => 'PB007',
                'tanggal_pembelian' => now(),
                'id_stok'=> 's007',
                'nama_stok' => 'Coklat Bubuk',
                'jumlah_item_pembelian' => 60,
                'total_harga_pembelian' => 300000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_pembelian' => 'PB008',
                'tanggal_pembelian' => now(),
                'id_stok'=> 's008',
                'nama_stok' => 'Kayu Manis',
                'jumlah_item_pembelian' => 90,
                'total_harga_pembelian' => 450000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_pembelian' => 'PB009',
                'tanggal_pembelian' => now(),
                'id_stok'=> 's009',
                'nama_stok' => 'Sirup Vanila',
                'jumlah_item_pembelian' => 15,
                'total_harga_pembelian' => 75000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_pembelian' => 'PB010',
                'tanggal_pembelian' => now(),
                'id_stok'=> 's010',
                'nama_stok' => 'Es Batu',
                'jumlah_item_pembelian' => 80,
                'total_harga_pembelian' => 400000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
