<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelAntrianDokter;
use Session;

class MengelolaAntrianDokterController extends Controller
{
    public function index() {

    	if(!Session::get('LoginAdmin')){
            return redirect('admin/LoginAdmin')->with('alert','Anda harus login dulu');
        }
        else{

	    	$datas = ModelAntrianDokter::all();
            
	    	return view('admin.content.MengelolaAntrianDokter',compact('datas')); 
	    }
	}

	public function delete($id_antrian) {
    	$datas = ModelAntrianDokter::find($id_antrian);
    	$datas->delete();
    	return redirect('admin/MengelolaAntrianDokter')->with('alert-success','Data berhasil dihapus!');
    }

}
