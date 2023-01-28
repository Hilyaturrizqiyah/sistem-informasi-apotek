<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelJadwalPraktik extends Model
{
    protected $table        = 'jadwal_praktik'; // nama tabel 
    protected $fillable     = ['id_praktik', 
                                'hari', 
                                'waktu_mulai', 
                                'waktu_selesai']; //field tabel

    public function PraktikDokter() { //praktik dimiliki oleh jadwal
        return $this->belongsTo(ModelPraktikDokter::class,'id_praktik');
        //nama_modelTabelrelasinya,foreignkey di tabel penyewaan
    } 
}
