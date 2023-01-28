<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class ModelAntrianDokter extends Model
{
    protected $table        = 'antrian'; // nama tabel
    protected $primaryKey   = 'id_antrian'; // primary key tabel
    protected $fillable     = ['id_pasien',
                                'id_praktik',
    							'nama_pasien',
    							'no_telepon',
                                'alamat',
                                'nomor_antrian',
                                'waktu_hari']; //field tabel

    public function PraktikDokter() { //praktik dimiliki oleh antrian
        return $this->belongsTo(ModelPraktikDokter::class,'id_praktik');
        //nama_modelTabelrelasinya,foreignkey di tabel penyewaan
    }
    public function getCreatedAtAttribute()
    {

        return Carbon::parse($this->attributes['created_at'])
            ->translatedFormat('l, d F Y H:i');
    }

}
