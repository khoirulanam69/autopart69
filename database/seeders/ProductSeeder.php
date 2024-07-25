<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Product::factory()->create([
            'code' => '90123-KVY-340',
            'name' => 'Kampas Ganda Beat 2012',
            'stock' => 30,
            'buy' => 60000,
            'sell' => 70000,
            'vendor_id' => 1,
        ]);
    }
}
