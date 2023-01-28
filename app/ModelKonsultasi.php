<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class ModelKonsultasi extends Model
{
    protected $table  = 'konsultasi';  //nama tabel
    protected $primaryKey   = 'id_konsultasi';  //primary key
    protected $fillable      = ['id_pasien', 
    							'id_apoteker',
    							'pertanyaan',
                                'jawaban',
                                'waktu']; //field tabel

    public function getCreatedAtAttribute(){
        return Carbon::parse($this->attributes['created_at'])
            ->translatedFormat('l, d F Y');
	}
    
    public function Apoteker() { //Penyewaan dimiliki oleh Apoteker
        return $this->belongsTo(ModelApoteker::class,'id_apoteker');
        //nama_modelTabelrelasinya,foreignkey di tabel penyewaan
    } 

    public function Pasien() { //Penyewaan dimiliki oleh User
        return $this->belongsTo(ModelPasien::class,'id_pasien');
        //nama_modelTabelrelasinya,foreignkey di tabel penyewaan
    } 
   
}
