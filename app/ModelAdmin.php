<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelAdmin extends Model
{
    protected $table        = 'admin'; // nama tabel 
    protected $primaryKey   = 'id_admin'; // primary key tabel 
    protected $fillable     = ['nama', 
    							'email', 
    							'password', 
    							'no_telepon',
    							'foto',
                                'alamat',]; //field tabel 
}
