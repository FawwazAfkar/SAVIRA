<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Instansi;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create first instansi
        $instansi = Instansi::create([
            'nama_instansi' => 'Dinas Arsip dan Perpustakaan Daerah Kabupaten Banyumas',
        ]);

        // Create first user (Super Admin)
        $superAdmin = User::create([
            'name' => 'Super Admin',
            'email' => 'spadmin@example.com',
            'role' => 'spadmin',
            'password' => Hash::make('spadmin123'),
            'instansi_id' => $instansi->id,
        ]);

        // Create spatie roles
        Role::create(['name' => 'SuperAdmin']);
        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'User']);

        // Create spatie permissions
        $ManageUsers = Permission::create(['name' => 'manageUsers']);
        $ManageInstansis = Permission::create(['name' => 'manageInstansis']);
        $CreateArsips = Permission::create(['name' => 'createArsips']);
        $EditArsips = Permission::create(['name' => 'editArsips']);
        $DeleteArsips = Permission::create(['name' => 'deleteArsips']);

        // Assign roles to users (Super Admin)
        $superAdmin->assignRole('SuperAdmin');

        // Assign permissions to roles (Super Admin)
        $superAdmin->givePermissionTo(
            $ManageUsers,
            $ManageInstansis,
            $CreateArsips,
            $EditArsips,
            $DeleteArsips
        );
    }
}
