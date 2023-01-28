<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PemesananDetailModel extends Model
{
    protected $table = 'detail_pemesanan';
    protected $primaryKey = 'id_detail_pemesanan';
    protected $fillable     = ['id_pemesanan', 'id_obat', 'jumlah', 'harga_jumlah']; //field tabel

    public function pemesanan() { //jenis produk dimiliki oleh produk
        return $this->belongsTo('App\PemesananModel', 'id_pemesanan', 'id_pemesanan');
   // return $this->belongsTo(PemesananModel::class,'id_pemesanan');
    //nama_modelTabelrelasinya,foreignkey di tabel produk
    }

    public function Obat() { //jenis produk dimiliki oleh produk
    return $this->belongsTo(ModelObat::class,'id_obat');
    //nama_modelTabelrelasinya,foreignkey di tabel produk
    }

    public function Pasien() { //Penyewaan dimiliki oleh User
        return $this->belongsTo(ModelPasien::class,'id_pasien');
        //nama_modelTabelrelasinya,foreignkey di tabel penyewaan
    }

    public function DetailPemesanan() { //banyak DetailPemesanan memiliki 1 pemesanan
        return $this->hasMany(DetailPemesananModel::class,'id_pemesanan');
    }
}
