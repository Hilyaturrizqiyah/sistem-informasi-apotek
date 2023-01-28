<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelKonsultasi;
use App\ModelApoteker;
use App\ModelPasien;
use Session;
use Carbon\Carbon;

class KonsultasiPasienController extends Controller
{
	public function index(){
        $pasien = ModelPasien::all();
        $konsul = ModelKonsultasi::all();

		//Proses pembatalan dalam 1 hari
		// $now = Carbon::now()->format('l, d m y');
        // $tanggalwaktu = Carbon::now();

		return view('/Pasien/konsultasiPasien', compact('konsul','pasien'));
    }

	public function tambah() {

    	return view('Pasien.tambahKonsultasi');
    }

    public function store( Request $request) {

        $messages = [
            'required' => ':attribute masih kosong',
            'min' => ':attribute diisi minimal :min karakter',
            'max' => ':attribute diisi maksimal :max karakter',
            'unique' => ':attribute sudah ada',
            
        ];

    	$this->validate($request, [
            'pertanyaan' => 'required|max:255',
    	], $messages);
     
        $konsul = new ModelKonsultasi();
        $konsul->id_pasien = Session::get('id_pasien');
        $konsul->pertanyaan = $request->pertanyaan;
        $konsul->save();

    	return redirect('/Pasien/konsultasiPasien')->with('alert-success','Data berhasil ditambah!');
    }

    public function cariKonsul(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;

    		// mengambil data dari table pegawai sesuai pencarian data
        $konsul = ModelKonsultasi::where('pertanyaan','like',"%".$cari."%")->paginate();

    		// mengirim data pegawai ke view index
		return view('/Pasien/konsultasiPasien', compact('konsul'));
	}
	
	public function tampilDetailKonsul($id_konsultasi)
    {
        $konsul     = ModelKonsultasi::where('id_konsultasi', $id_konsultasi)->first();

        return view('/Pasien/jawabanKonsultasiPasien', compact('konsul'));
    }

    public function history()
    {
        $konsul = ModelKonsultasi::where('id_pasien', Session::get('id_pasien'))->get()->sortBy('jawaban');
        $selesai = ModelKonsultasi::All();

        return view('Pasien/riwayat_konsultasi', compact('konsul', 'selesai'));
    }

}
