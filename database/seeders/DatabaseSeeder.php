<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(pelangganSeeder::class);
        $this->call(menuSeeder::class);
        $this->call(stokSeeder::class);
        $this->call(transaksipenjualanSeeder::class);
        $this->call(transaksipembelianSeeder::class);
        // $this->call(RolesSeeder::class);
        $this->call(userSeeder::class);
        $this->call(laporanpenjualanSeeder::class);
        $this->call(detailpenjualanSeeder::class);
        $this->call(detailpembelianSeeder::class);
    }
}
