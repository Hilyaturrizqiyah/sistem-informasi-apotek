<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelApoteker extends Model
{
    protected $table        = 'apoteker'; // nama tabel 
    protected $primaryKey   = 'id_apoteker'; // primary key tabel 
    protected $fillable     = ['nama', 
    							'email', 
    							'password', 
    							'no_telepon',
                                'alamat',
                                'foto',]; //field tabel 

    public function Konsultasi() { // 1 apoteker memiliki banyak konsultasi
        return $this->hasMany(ModelKonsultasi::class,'id_apoteker');
    } 
}
