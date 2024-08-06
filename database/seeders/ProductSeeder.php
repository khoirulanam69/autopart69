<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::factory()->create(['code' => 'P001', 'name' => 'Product 1', 'stock' => 100, 'buy' => 10000, 'sell' => 15000, 'vendor_id' => 1]);
        Product::factory()->create(['code' => 'P002', 'name' => 'Product 2', 'stock' => 200, 'buy' => 20000, 'sell' => 25000, 'vendor_id' => 1]);
        Product::factory()->create(['code' => 'P003', 'name' => 'Product 3', 'stock' => 300, 'buy' => 30000, 'sell' => 35000, 'vendor_id' => 1]);
    }
}
