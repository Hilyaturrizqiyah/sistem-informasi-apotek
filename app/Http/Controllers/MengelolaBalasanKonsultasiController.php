<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelKonsultasi;
use App\ModelApoteker;
use App\ModelPasien;
use Session;
use Carbon\Carbon;

class MengelolaBalasanKonsultasiController extends Controller
{
    public function index() {

    	if(!Session::get('LoginApoteker')){
            return redirect('apoteker/LoginApoteker')->with('alert','Anda harus login dulu');
        }
        else{
            $now = Carbon::now()->format('y-m-d');
            $tanggalwaktu = Carbon::now();
            
	    	$datas = ModelKonsultasi::all()->sortBy('waktu');
            
	    	return view('apoteker.content.MengelolaKonsultasi',compact('datas')); 
	    }
    }
    
    public function belumDijawab() {

    	if(!Session::get('LoginApoteker')){
            return redirect('apoteker/LoginApoteker')->with('alert','Anda harus login dulu');
        }
        else{
            $now = Carbon::now()->format('y-m-d');
            $tanggalwaktu = Carbon::now();

	    	$datas = ModelKonsultasi::where('jawaban')->get();
	    	return view('apoteker.content.KonsultasiBelumDijawab',compact('datas')); 
	    }
	}

    public function edit($id_konsultasi) {

        if(!Session::get('LoginApoteker')){
            return redirect('apoteker/LoginApoteker')->with('alert','Anda harus login dulu');
        }
        else{

        	$datas = ModelKonsultasi::find($id_konsultasi);
        	return view('apoteker.content.ubah_data.JawabKonsultasi',compact('datas'));
        }
    }

    public function update($id_konsultasi, Request $request) {
    	$messages = [
            'required' => ':attribute masih kosong',
            'min' => ':attribute diisi minimal :min karakter',
            'max' => ':attribute diisi maksimal :max karakter',
        ];

        $this->validate($request, [
            'jawaban' => 'required|max:255',
        ], $messages);

        $data = ModelKonsultasi::find($id_konsultasi);
        $data->id_apoteker = Session::get('id_apoteker');
        $data->jawaban = $request->jawaban;
        $data->save();
        
    	return redirect('apoteker/MengelolaKonsultasi')->with('alert-success','Data berhasil diubah!');
    }

    public function delete($id_konsultasi)
    {
        $hapus = ModelKonsultasi::find($id_konsultasi);
        $hapus->delete();
        return redirect('apoteker/MengelolaKonsultasi')->with('alert-success','Data berhasil dihapus!');
    }
}
