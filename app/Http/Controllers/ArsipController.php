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
            $file->storeAs('arsipvital', $fileName, 'private');
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

        $arsip = ArsipVital::findOrFail($id);

        // file handling if file is not null, delete the old file if exist on storage
        if ($request->file('file')) {
            if ($arsip->file) {
                Storage::disk('private')->delete('arsipvital/' . $arsip->file);
            }

            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('arsipvital', $fileName, 'private');          
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
        $arsip = ArsipVital::findOrFail($id);
        if ($arsip->file) {
            Storage::disk('private')->delete('arsipvital/' . $arsip->file);
        }
        ArsipVital::destroy($id);

        return redirect()->route('daftar-arsip')
            ->with('success', 'Arsip berhasil dihapus.');
    }


    // view arsip file by id (authorized only)
    public function view($id)
    {
        $arsip = ArsipVital::findOrFail($id);
        $filePath = 'arsipvital/' . $arsip->file;

        if (Storage::disk('private')->exists($filePath)) {
            $file = Storage::disk('private')->get($filePath);
            return response($file, 200)->header('Content-Type', 'application/pdf');
        }

        return abort(404, 'File not found.');
    }

    // download arsip file by id (authorized only)
    public function download($id)
    {
        $arsip = ArsipVital::findOrFail($id);
        $filePath = 'arsipvital/' . $arsip->file;

        if (Storage::disk('private')->exists($filePath)) {
            return response()->download(storage_path('app/private/' . $filePath), $arsip->file);
        }

        return abort(404, 'File not found.');
    }

    // get arsip data by id (for PDF)
    public function getData($id)
    {
        $arsip = ArsipVital::findOrFail($id);
        return response()->json($arsip);
    }
}
