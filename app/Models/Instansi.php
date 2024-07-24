<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instansi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_instansi',
        'alamat',
        'telepon',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function arsipvitals()
    {
        return $this->hasMany(ArsipVital::class);
    }
}
