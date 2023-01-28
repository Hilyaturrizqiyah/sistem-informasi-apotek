<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelKonsultasi;
use App\ModelApoteker;
use App\ModelPasien;
use Session;
use Carbon\Carbon;

class MengelolaKonsultasiController extends Controller
{
    public function index() {

    	if(!Session::get('LoginAdmin')){
            return redirect('admin/LoginAdmin')->with('alert','Anda harus login dulu');
        }
        else{
            $now = Carbon::now()->format('y-m-d');
            $tanggalwaktu = Carbon::now();

	    	$datas = ModelKonsultasi::all()->sortBy('waktu');
            
	    	return view('admin.content.MengelolaKonsultasi',compact('datas')); 
	    }
	}



    public function delete($id_konsultasi)
    {
        $hapus = ModelKonsultasi::find($id_konsultasi);
        $hapus->delete();
        return redirect('admin/MengelolaKonsultasi')->with('alert-success','Data berhasil dihapus!');
    }
}
