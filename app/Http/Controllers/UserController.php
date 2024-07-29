<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    // If super admin, can store admin and user
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'role' => 'required|string|max:255',
            'instansi_id' => 'required|integer',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'instansi_id' => $request->instansi_id,
        ]);

        return redirect()->route('daftar-user')
            ->with('success', 'User berhasil ditambahkan.');
    }

    // If super admin, can update admin and user
    public function update(Request $request, $id)
    {
        Log::info($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8',
            'role' => 'required|string|max:255',
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

        return redirect()->route('daftar-user')
            ->with('success', 'User berhasil diubah.');
    }

    // If super admin, can delete admin and user
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('daftar-user')
            ->with('success', 'User berhasil dihapus.');
    }
}
