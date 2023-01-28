<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelDetailPemesanan extends Model
{
    protected $table        = 'detail_pemesanan'; // nama tabel 
    protected $primaryKey   = 'id_detail_pemesanan'; // primary key tabel 
    protected $fillable     = ['id_pemesanan', 
    							'id_obat', 
    							'jumlah', 
    							'harga_jumlah']; //field tabel 

    public function Pemesanan() { //Pemesanan dimiliki oleh DetailPemesanan
        return $this->belongsTo(ModelPemesanan::class,'id_pemesanan');
        //nama_modelTabelrelasinya,foreignkey di tabel DetailPemesanan
    }

    public function Obat() { //Obat dimiliki oleh DetailPemesanan
        return $this->belongsTo(ModelObat::class,'id_obat');
        //nama_modelTabelrelasinya,foreignkey di tabel DetailPemesanan
    }
}
