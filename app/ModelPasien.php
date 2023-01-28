<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelPasien extends Model
{
    protected $table        = 'pasien'; // nama tabel 
    protected $primaryKey   = 'id_pasien'; // primary key tabel 
    protected $fillable     = ['nama', 
    							'email', 
    							'password', 
    							'no_hp',
                                'alamat',]; //field tabel 

    public function PemesananDetail() {
        return $this->belongsToMany(PemesananDetailModel::class,'detail_pemesanan','id_detail_pemesanan','id_pasien');//model_tabel_yang_mau_disambungin, nama_tabel_perantara, foreignkey1_pada_tabel_penghubung, foreignkey2_pada_tabel_penghubung)
    }
    
    public function Konsultasi() { // 1 pasien memiliki banyak konsultasi
        return $this->hasMany(ModelKonsultasi::class,'id_pasien');
    }

    public function Pemesanan() { // 1 pasien memiliki banyak konsultasi
        return $this->hasMany(ModelPemesanan::class,'id_pasien');
    }
}
