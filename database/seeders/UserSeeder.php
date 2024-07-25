<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'M Khoirul Anam',
            'email' => 'khoirulanam.um@gmail.com',
            'password' => password_hash('Sakura1121', PASSWORD_DEFAULT),
        ]);
    }
}
