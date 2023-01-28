<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelObat extends Model
{  
    protected $table        = 'obat'; // nama tabel 
    protected $primaryKey   = 'id_obat'; // primary key tabel 
    protected $keyType = 'string'; //primary key berupa string bukan integer
    protected $fillable     = ['nama_obat', 
                                'satuan', 
                                'harga_modal', 
                                'harga_jual',
                                'stok',
                                'foto',
                                'created_at',
                                'updated_at']; //field tabel

    public function Pemesanan() {
        return $this->belongsToMany(ModelPemesanan::class,'detail_pemesanan','id_pemesanan','id_obat');//model_tabel_yang_mau_disambungin, nama_tabel_perantara, foreignkey1_pada_tabel_penghubung, foreignkey2_pada_tabel_penghubung)
    }
}
