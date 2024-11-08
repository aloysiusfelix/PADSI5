<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PelangganSeeder extends Seeder
{
    public function run()
    {
        // Seeder untuk tabel pelanggan
        DB::table('pelanggan')->insert([
            [
                'id_pelanggan' => 'p001',
                'nama_pelanggan' => 'Cahyo Prasetyo',
                'no_hp_pelanggan' => '081234567900',
                'email_pelanggan' => 'cahyo.prasetyo@example.com',
                'poin_pelanggan' => 2252,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_pelanggan' => 'p002',
                'nama_pelanggan' => 'Wulan Sari',
                'no_hp_pelanggan' => '081234567901',
                'email_pelanggan' => 'wulan.sari@example.com',
                'poin_pelanggan' => 3200,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_pelanggan' => 'p003',
                'nama_pelanggan' => 'Rudi Hartono',
                'no_hp_pelanggan' => '081234567902',
                'email_pelanggan' => 'rudi.hartono@example.com',
                'poin_pelanggan' => 3613,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_pelanggan' => 'p004',
                'nama_pelanggan' => 'Ayu Lestari',
                'no_hp_pelanggan' => '081234567903',
                'email_pelanggan' => 'ayu.lestari@example.com',
                'poin_pelanggan' => 4885,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_pelanggan' => 'p005',
                'nama_pelanggan' => 'Bagus Pranoto',
                'no_hp_pelanggan' => '081234567904',
                'email_pelanggan' => 'bagus.pranoto@example.com',
                'poin_pelanggan' => 3626,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_pelanggan' => 'p006',
                'nama_pelanggan' => 'Diana Suryani',
                'no_hp_pelanggan' => '081234567905',
                'email_pelanggan' => 'diana.suryani@example.com',
                'poin_pelanggan' => 4100,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_pelanggan' => 'p007',
                'nama_pelanggan' => 'Eko Prabowo',
                'no_hp_pelanggan' => '081234567906',
                'email_pelanggan' => 'eko.prabowo@example.com',
                'poin_pelanggan' => 2950,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_pelanggan' => 'p008',
                'nama_pelanggan' => 'Fajar Aditya',
                'no_hp_pelanggan' => '081234567907',
                'email_pelanggan' => 'fajar.aditya@example.com',
                'poin_pelanggan' => 1750,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_pelanggan' => 'p009',
                'nama_pelanggan' => 'Gina Lestari',
                'no_hp_pelanggan' => '081234567908',
                'email_pelanggan' => 'gina.lestari@example.com',
                'poin_pelanggan' => 4500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_pelanggan' => 'p010',
                'nama_pelanggan' => 'Hendra Saputra',
                'no_hp_pelanggan' => '081234567909',
                'email_pelanggan' => 'hendra.saputra@example.com',
                'poin_pelanggan' => 5300,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}