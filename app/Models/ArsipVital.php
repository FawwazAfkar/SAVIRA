<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ArsipVital extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'instansi_id',
        'jenis_arsip',
        'tingkat_perkembangan',
        'kurun_waktu',
        'media',
        'jumlah',
        'jangka_simpan',
        'metode_perlindungan',
        'lokasi_simpan',
        'file',
        'keterangan',
        'berita_acara',
        'unit_pengolah',
        'sarana_temu_kembali',
        'sifat_kerahasiaan',
        'sarana_simpan',
        'nama_pendata',
        'waktu_pendataan',
    ];

    public function instansi()
    {
        return $this->belongsTo(Instansi::class);
    }
}
