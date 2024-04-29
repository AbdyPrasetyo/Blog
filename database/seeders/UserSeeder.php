<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username' => 'admin',
            'password' => bcrypt('admin123'),
            'name' => 'Admin',
            'role' => 'admin',
        ]);

        // Tambahkan data pengguna biasa
        User::create([
            'username' => 'user',
            'password' => bcrypt('user123'),
            'name' => 'User',
            'role' => 'user',
        ]);
    }
}
