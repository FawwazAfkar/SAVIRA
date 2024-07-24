<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ArsipVital extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
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
    ];
}
