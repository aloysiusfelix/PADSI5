<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Owner',
                'email' => 'valen@gmail.com',
                'password' => bcrypt('valen123'),
                'role' => 'admin', // Peran admin
                'created_at' => now(),
                'updated_at' => null,
            ],
            [
                'name' => 'Staff',
                'email' => 'felix@gmail.com',
                'password' => bcrypt('felix123'),
                'role' => 'pegawai', // Peran pegawai
                'created_at' => now(),
                'updated_at' => null,
            ]
        ]);
        
    }
}
