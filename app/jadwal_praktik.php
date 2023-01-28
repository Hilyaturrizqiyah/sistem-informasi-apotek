<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jadwal_praktik extends Model
{
	protected $table        = 'jadwal_praktik'; // nama tabel 
    public function PraktikDokter(){
    	return $this->belongsTo('App\praktik_dokter','id_Praktik');
    }
}
