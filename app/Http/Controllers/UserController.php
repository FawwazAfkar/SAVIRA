<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // If super admin, can store admin and user
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|string|max:255',
            'instansi_id' => 'required|integer',
        ]);

        User::create($request->all());

        return redirect()->route('daftar-user')
            ->with('Berhasil', 'User berhasil ditambahkan.');
    }

    // If super admin, can update admin and user
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'role' => 'required|string|max:255',
            'instansi_id' => 'required|integer',
        ]);

        $user = User::find($id);
        $user->update($request->all());

        return redirect()->route('daftar-user')
            ->with('Berhasil', 'User berhasil diubah.');
    }

    // If super admin, can delete admin and user
    public function destroy($id)
    {
        User::destroy($id);

        return redirect()->route('daftar-user')
            ->with('Berhasil', 'User berhasil dihapus.');
    }
}
