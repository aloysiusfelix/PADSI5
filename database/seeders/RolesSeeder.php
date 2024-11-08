<?php

// namespace Database\Seeders;

// use Illuminate\Database\Seeder;
// use Illuminate\Support\Facades\DB;
// use App\Models\Role; // Import the Role model

// class RolesSeeder extends Seeder
// {
//     public function run()
//     {
//         // Create an array of roles
//         $roles = [
//             ['name_roles' => 'Owner'],
//             ['name_roles' => 'Karyawan'],
//         ];

//         // Insert each role into the roles table
//         foreach ($roles as $role) {
//             Role::create($role); // Create using the Role model
//         }
//     }
// }

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role; // Pastikan Anda telah mengimpor model Role

class RolesSeeder extends Seeder
{
    public function run()
    {
        // Untuk membuat array dari roles
        $roles = [
            ['name_role' => 'Kasir'], // Menggunakan kolom yang benar
            ['name_role' => 'Owner'],
        ];

        // Insert each role into the roles table using Eloquent
        foreach ($roles as $role) {
            Role::create($role); // Membuat menggunakan model Role
        }
    }
}

