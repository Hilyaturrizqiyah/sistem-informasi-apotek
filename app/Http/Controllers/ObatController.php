<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelObat;
use App\ModelJadwalPraktik;
use App\ModelPraktikDokter;
use Alert;
use Session;

class ObatController extends Controller
{

    public function tampil(){
        $Obat = ModelObat::all();
        return view('/obat', compact('Obat'));
    }

    public function tampilDetailObat($id_obat)
    {

        $detail     = ModelObat::where('id_obat', $id_obat)->first();

        return view('/detailObat', compact('detail'));
    }

    public function cariObat(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;

    		// mengambil data dari table pegawai sesuai pencarian data
        $Obat = ModelObat::where('nama_obat','like',"%".$cari."%")->paginate();

    		// mengirim data pegawai ke view index
		return view('/obat', compact('Obat'));
    }
}
