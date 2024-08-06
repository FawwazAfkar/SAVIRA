<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\ArsipVital;

class ArsipController extends Controller
{
    // store arsip with instansi_id = user's instansi_id
    public function store(Request $request)
    {
        $request->validate([
            'jenis_arsip' => 'required|string|max:255',
            'tingkat_perkembangan' => 'required|string|max:255',
            'kurun_waktu' => 'required|string|max:255',
            'media' => 'required|string|max:255',
            'jumlah' => 'required|string|max:255',
            'jangka_simpan' => 'required|string|max:255',
            'metode_perlindungan' => 'required|string|max:255',
            'lokasi_simpan' => 'required|string|max:255',
            'file' => 'required|mimes:pdf|max:51200',
            'keterangan' => 'nullable|string',
        ]);

        // file handling
        if($request->has('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/arsipvital', $fileName);
        }else{
            $fileName = null;
        }

        // merge instansi_id with user's instansi_id and merge file name
        $request->merge([
            'instansi_id' => auth()->user()->instansi_id
        ]);
        $arsipVital = ArsipVital::create($request->all());
        $arsipVital->file = $fileName;
        $arsipVital->save();

        return redirect()->route('daftar-arsip')
            ->with('success', 'Arsip berhasil ditambahkan.');
    }

    // update arsip by id
    public function update(Request $request, $id)
    {
        $request->validate([
            'jenis_arsip' => 'required|string|max:255',
            'tingkat_perkembangan' => 'required|string|max:255',
            'kurun_waktu' => 'required|string|max:255',
            'media' => 'required|string|max:255',
            'jumlah' => 'required|string|max:255',
            'jangka_simpan' => 'required|string|max:255',
            'metode_perlindungan' => 'required|string|max:255',
            'lokasi_simpan' => 'required|string|max:255',
            'file' => 'nullable|mimes:pdf|max:51200',
            'keterangan' => 'nullable|string',
        ]);

        $arsip = ArsipVital::find($id);

        // file handling if file is not null, delete the old file if exist on storage
        if ($request->file('file')) {
            if ($arsip->file) {
                Storage::delete('public/arsipvital/' . $arsip->file);
            }

            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/arsipvital', $fileName);            
        } else {
            $fileName = $arsip->file;
        }

        $arsip->update($request->all());
        $arsip->file = $fileName;
        $arsip->save();

        return redirect()->route('daftar-arsip')
            ->with('success', 'Arsip berhasil diubah.');
    }

    // delete arsip by id
    public function destroy($id)
    {
        $arsip = ArsipVital::find($id);
        if ($arsip->file) {
            Storage::delete('public/arsipvital/' . $arsip->file);
        }
        ArsipVital::destroy($id);

        return redirect()->route('daftar-arsip')
            ->with('success', 'Arsip berhasil dihapus.');
    }

    // view arsip by id
    public function viewArsip($id)
    {
        $arsip = ArsipVital::findOrFail($id);
        return response()->file(storage_path('app/public/arsipvital/' . $arsip->file));
    }

    // download arsip by id
    public function downloadArsip($id)
    {
        $arsip = ArsipVital::findOrFail($id);
        return response()->download(storage_path('app/public/arsipvital/' . $arsip->file));
    }

}
