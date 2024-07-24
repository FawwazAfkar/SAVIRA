<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         //Create users
         $superAdmin = User::create([
            'name' => 'Super Admin',
            'email' => 'spadmin@example.com',
            'role' => 'spadmin',
            'password' => Hash::make('spadmin123'),
        ]);

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'role' => 'admin',
            'password' => Hash::make('admin123'),
        ]);

        $user = User::create([
            'name' => 'waz',
            'email' => 'wawaz@gmail.com',
            'password' => Hash::make('password'),
        ]);
    }
}
