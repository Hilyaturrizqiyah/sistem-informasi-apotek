<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelPraktikDokter extends Model
{
    protected $table        = 'praktik_dokter'; // nama tabel 
    protected $fillable     = ['sip', 
    							'nama_dokter', 
    							'jenis_dokter',
    							'foto',
    							'kode_antrian']; //field tabel 

    public function JadwalPraktik() { // 1 praktik memiliki banyak jadwal
        return $this->hasMany(ModelJadwalPraktik::class,'id_praktik');
    }

}
