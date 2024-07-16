<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalPeriksa extends Model
{
    protected $table = 'jadwal_periksa';
    protected $primaryKey = 'id_jadwal';
    protected $fillable = ['pasien_id', 'dokter_id', 'tanggal', 'status'];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'pasien_id', 'id_pasien');
    }

    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'dokter_id', 'id_dokter');
    }
}
