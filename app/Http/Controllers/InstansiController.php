<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instansi;
use Illuminate\Database\QueryException;

class InstansiController extends Controller
{
    // store instansi
    public function store(Request $request)
    {
        $request->validate([
            'nama_instansi' => 'required|string|max:255'
        ]);

        Instansi::create($request->all());

        return redirect()->route('daftar-instansi')
            ->with('success', 'Instansi/Unit Kerja berhasil ditambahkan.');
    }

    // update instansi by id
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_instansi' => 'required|string|max:255'
        ]);

        $instansi = Instansi::find($id);
        $instansi->update($request->all());

        return redirect()->route('daftar-instansi')
            ->with('success', 'Instansi/Unit Kerja berhasil diubah.');
    }

    // delete instansi by id
    public function destroy($id)
    {
        try {
            Instansi::destroy($id);

            return redirect()->route('daftar-instansi')
                ->with('success', 'Instansi/Unit Kerja berhasil dihapus.');
        } catch (QueryException $e) {
            return redirect()->route('daftar-instansi')
                ->with('error', 'Instansi/Unit Kerja tidak bisa dihapus karena masih ada pengguna atau arsip yang terkait.');
        }
    }
}
