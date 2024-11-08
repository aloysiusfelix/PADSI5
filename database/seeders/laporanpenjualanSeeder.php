<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class laporanPenjualanSeeder extends Seeder
{
    public function run()
    {
        // Seeder untuk tabel laporan_penjualan
        DB::table('laporan_penjualan')->insert([
            [
                'id_user' => 'u001',
                'id_penjualan' => 't001',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_user' => 'u002',
                'id_penjualan' => 't002',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_user' => 'u003',
                'id_penjualan' => 't003',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_user' => 'u004',
                'id_penjualan' => 't004',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_user' => 'u005',
                'id_penjualan' => 't005',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}