<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelPembayaran;
use App\ModelPemesanan;
use Session;

class MengelolaPembayaranController extends Controller
{
    public function index() {
        if(!Session::get('LoginAdmin')){
            return redirect('admin/LoginAdmin')->with('alert','Anda harus login dulu');
        }
        else{

        	$datas = ModelPembayaran::all();
        	return view('admin.content.MengelolaPembayaran',compact('datas')); 
        }
    }

    public function validasiBayar($id_pemesanan) {
    	$byr = ModelPembayaran::where('id_pemesanan',$id_pemesanan)->first();
        $sewa = ModelPemesanan::where('id_pemesanan',$id_pemesanan)->first();

        $byr->status = 2;
        $byr->save();

        $sewa->status = 3;
        $sewa->id_admin = Session::get('id_admin');
        $sewa->save();

        return redirect('admin/MengelolaPembayaran')->with('alert-success','Data berhasil divalidasi!');
    }

    public function BayarBatal($id_pemesanan) {
        $byr = ModelPembayaran::where('id_pemesanan',$id_pemesanan)->first();
        $sewa = ModelPemesanan::find($id_pemesanan)->first();

        $byr->status = 3;
        $byr->save();

        $sewa->status = 1;
        $sewa->id_admin = Session::get('id_admin');
        $sewa->save();

        return redirect('admin/MengelolaPembayaran')->with('alert-success','Data Pembayaran berhasil dibatalkan!');
    }
}
