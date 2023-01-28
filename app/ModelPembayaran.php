<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelPembayaran extends Model
{   
    protected $table  = 'pembayaran_obat';  //nama tabel
    protected $primaryKey   = 'id_pembayaran';  //primary key
    protected $fillable      = ['id_pemesanan', 
    							'nominal',
    							'bukti_tf',
                                'status',
                                'waktu']; //field tabel

    public function Pemesanan() { //pemesanan dimiliki oleh pembayaran
        return $this->belongsTo('App\ModelPembayaran');
        //nama_modelTabelrelasinya,foreignkey di tabel penyewaan
    }
}
