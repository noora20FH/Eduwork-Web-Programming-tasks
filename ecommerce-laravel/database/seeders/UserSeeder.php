<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Jalankan seed database.
     */
    public function run(): void
    {
        // Menghapus pengguna yang sudah ada untuk menghindari duplikasi
        User::truncate();

        // Membuat 2 pengguna dengan status 'customer'
        User::create([
            'name' => 'Customer Satu',
            'email' => 'customer1@example.com',
            'password' => Hash::make('password'),
            'photo_profile' => null,
            'status' => 'customer',
        ]);

        User::create([
            'name' => 'Customer Dua',
            'email' => 'customer2@example.com',
            'password' => Hash::make('password'),
            'photo_profile' => null,
            'status' => 'customer',
        ]);

        // Membuat 1 pengguna dengan status 'admin'
        User::create([
            'name' => 'Admin Satu',
            'email' => 'admin1@example.com',
            'password' => Hash::make('password'),
            'photo_profile' => null,
            'status' => 'admin',
        ]);
    }
}
