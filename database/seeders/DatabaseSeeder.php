<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Muhammad Revaldi (Admin)',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Petugas Event (Staff)',
            'email' => 'petugas@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'petugas',
        ]);
    }
}