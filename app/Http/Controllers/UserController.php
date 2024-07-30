<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    // If super admin, can store admin and user
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'role' => 'required|string|in:admin,user', // Validate role options
            'instansi_id' => 'required|integer',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'instansi_id' => $request->instansi_id,
        ]);

        $this->addRoleAndPermission($user);

        return redirect()->route('daftar-user')
            ->with('success', 'User berhasil ditambahkan.');
    }

    // If super admin, can update admin and user
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8',
            'role' => 'required|string|in:admin,user', // Validate role options
            'instansi_id' => 'required|integer',
        ]);

        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->instansi_id = $request->instansi_id;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        $this->updateRoleAndPermission($user);

        return redirect()->route('daftar-user')
            ->with('success', 'User berhasil diubah.');
    }

    // If super admin, can delete admin and user
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // cannot delete their own account
        if ($user->id == auth()->id()) {
            return redirect()->route('daftar-user')
                ->with('error', 'Maaf, Anda tidak dapat menghapus akun sendiri.');
        }

        $this->dropRoleAndPermission($user);
        $user->delete();

        return redirect()->route('daftar-user')
            ->with('success', 'User berhasil dihapus.');
    }

    private function addRoleAndPermission($user)
    {
        if ($user->role == 'admin') {
            $role = Role::findByName('Admin');
            $permissions = [
                'manageUsers',
                'createArsips',
                'editArsips',
                'deleteArsips'
            ];
        } else {
            $role = Role::findByName('User');
            $permissions = []; // No specific permissions for 'User'
        }

        $user->assignRole($role);

        // Sync permissions for the role
        $role->syncPermissions($permissions);
    }

    private function dropRoleAndPermission($user)
    {
        if ($user->role == 'admin') {
            $role = Role::findByName('Admin');
        } else {
            $role = Role::findByName('User');
        }

        $user->removeRole($role);
    }

    private function updateRoleAndPermission($user)
    {
        $this->dropRoleAndPermission($user);
        $this->addRoleAndPermission($user);
    }
}
