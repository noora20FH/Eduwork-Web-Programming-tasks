<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;

class ProductAndOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat 10 user dummy
        User::factory(10)->create();

        // Buat 20 produk dummy
        Product::factory(20)->create();

        // Buat 50 order dummy
        Order::factory(50)->create();
    }
}