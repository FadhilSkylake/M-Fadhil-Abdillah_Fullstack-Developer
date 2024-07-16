<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    // Tentukan nama tabel jika berbeda dari konvensi Laravel
    protected $table = 'pasien';

    // Tentukan primary key jika berbeda dari 'id'
    protected $primaryKey = 'id_pasien';

    // Tentukan atribut yang dapat diisi massal
    protected $fillable = [
        'nama_pasien',
        'usia',
        'no_hp',
        'alamat',
        'created_at',
        'updated_at',
    ];
}
