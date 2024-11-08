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

                // 'id_role' => 1,
                'name' => 'Michael Anderson',
                'email' => 'valen@gmail.com',
                'password' => bcrypt('valen123'),
                'created_at' => now(),
                'updated_at' => null,
            ],
            [
                // 'id_role' => 2,
                'name' => 'Felix',
                'email' => 'felix@gmail.com',
                'password' => bcrypt('felix123'),
                'created_at' => now(),
                'updated_at' => null,
            ]
        ]);
    }
}
        // // Creating Owner
        // $ownerRole = Role::where('name', 'Owner')->first();
        // User::create([
        //     'name' => 'Owner User',
        //     'email' => 'owner@example.com',
        //     'password' => bcrypt('password'), // Hash the password
        //     'id' => $ownerRole->id, // Set the role_id from roles table
        //     'updated_at'=> null,
        //     'created_at'=>now(),
        // ]);

        // // Creating Karyawan
        // $karyawanRole = Role::where('name', 'Karyawan')->first();
        // User::create([
        //     'name' => 'Karyawan User',
        //     'email' => 'karyawan@example.com',
        //     'password' => bcrypt('password'), // Hash the password
        //     'id' => $karyawanRole->id, // Set the role_id from roles table
        //     'updated_at'=> null,
        //     'created_at'=>now(),
        // ]);
