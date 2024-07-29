<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instansi;

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
            ->with('Berhasil', 'Instansi/Unit Kerja berhasil ditambahkan.');
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
            ->with('Berhasil', 'Instansi/Unit Kerja berhasil diubah.');
    }

    // delete instansi by id
    public function destroy($id)
    {
        Instansi::destroy($id);

        return redirect()->route('daftar-instansi')
            ->with('Berhasil', 'Instansi/Unit Kerja berhasil dihapus.');
    }
}
