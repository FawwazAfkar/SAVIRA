<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Instansi;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create dummy instansi
        $instansi = Instansi::create([
            'nama_instansi' => 'Dinas Arsip dan Perpustakaan Daerah Kabupaten Banyumas',
        ]);

        // Create users
        $superAdmin = User::create([
            'name' => 'Super Admin',
            'email' => 'spadmin@example.com',
            'role' => 'spadmin',
            'password' => Hash::make('spadmin123'),
            'instansi_id' => $instansi->id,
        ]);

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'role' => 'admin',
            'password' => Hash::make('admin123'),
            'instansi_id' => $instansi->id,
        ]);

        $user = User::create([
            'name' => 'waz',
            'email' => 'wawaz@gmail.com',
            'password' => Hash::make('password'),
            'instansi_id' => $instansi->id,
        ]);

        

        // Create spatie roles
        Role::create(['name' => 'SuperAdmin']);
        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'User']);
        
        // Assign roles to users
        $superAdmin->assignRole('SuperAdmin');
        $admin->assignRole('Admin');
        $user->assignRole('User');

        // Create spatie permissions

        // Assign permisions to roles

    }
}
