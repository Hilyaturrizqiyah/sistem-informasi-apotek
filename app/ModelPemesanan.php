<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelPemesanan extends Model
{    
    protected $table  = 'pemesanan_obat';  //nama tabel
    protected $primaryKey   = 'id_pemesanan';  //primary key
    protected $keyType = 'string'; //primary key berupa string bukan integer
    protected $fillable      = ['id_pasien', 
    							'id_admin',
    							'status',
                                'waktu',
                                'ket_batal']; //field tabel

    public function Obat() {
        return $this->belongsToMany(ModelObat::class,'detail_pemesanan','id_pemesanan','id_obat');//model_tabel_yang_mau_disambungin, nama_tabel_perantara, foreignkey1_pada_tabel_penghubung, foreignkey2_pada_tabel_penghubung)
    }

    public function Admin() { //Penyewaan dimiliki oleh Admin
        return $this->belongsTo(ModelAdmin::class,'id_admin');
        //nama_modelTabelrelasinya,foreignkey di tabel penyewaan
    } 

    public function Pasien() { //Penyewaan dimiliki oleh User
        return $this->belongsTo(ModelPasien::class,'id_pasien');
        //nama_modelTabelrelasinya,foreignkey di tabel penyewaan
    } 

    public function DetailPemesanan() { //banyak DetailPemesanan memiliki 1 pemesanan
        return $this->hasMany(ModelDetailPemesanan::class,'id_pemesanan');
    }

    public function Pembayaran() {
        return $this->belongsToMany(ModelPembayaran::class,'pembayaran_obat','id_pembayaran','id_pemesanan');
        //model_tabel_yang_mau_disambungin, nama_tabel_perantara, foreignkey1_pada_tabel_penghubung, foreignkey2_pada_tabel_penghubung)
    }
   
}
