<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelJadwalPraktik;
use App\ModelPraktikDokter;
use Session;

class MengelolaJadwalPraktikController extends Controller
{
    public function index() {

    	if(!Session::get('LoginAdmin')){
            return redirect('admin/LoginAdmin')->with('alert','Anda harus login dulu');
        }
        else{

	    	$datas = ModelJadwalPraktik::all()->sortBy('id_praktik');
            
	    	return view('admin.content.MengelolaJadwalPraktik',compact('datas')); 
	    }
	}

	public function tambah() {
        if(!Session::get('LoginAdmin')){
            return redirect('admin/LoginAdmin')->with('alert','Anda harus login dulu');
        }
        else{
        	$dokters = ModelPraktikDokter::all();

            return view('admin.content.tambah_data.TambahJadwal',compact('dokters')); 
        }
    }

    public function store( Request $request) {

        $messages = [
            'required' => ':attribute masih kosong',
            'min' => ':attribute diisi minimal :min karakter',
            'max' => ':attribute diisi maksimal :max karakter',
            'numeric' => ':attribute harus berupa angka',
            'unique' => ':attribute sudah ada',
            'email' => ':attribute harus berupa email',
            'image' => ':attribute harus berupa gambar',
            'alpha' => ':attribute harus berupa huruf'
        ];

        $this->validate($request, [
            'dokter' => 'required|max:50',
            'hari' => 'required|max:50',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required'
        ], $messages);
     

        $data = new ModelJadwalPraktik();
        $data->id_praktik = $request->dokter;
        $data->hari = $request->hari;
        $data->waktu_mulai = $request->waktu_mulai;
        $data->waktu_selesai = $request->waktu_selesai;     

        $data->save();
        return redirect('admin/MengelolaJadwalPraktik')->with('alert-success','Data berhasil ditambah!');    
    }

    public function edit($id_jadwal) {

        if(!Session::get('LoginAdmin')){
            return redirect('admin/LoginAdmin')->with('alert','Anda harus login dulu');
        }
        else{

            $datas = ModelJadwalPraktik::find($id_jadwal);
            $dokters = ModelPraktikDokter::all();

            return view('admin.content.ubah_data.UbahJadwal',compact('datas','dokters'));
        }
    }

    public function update($id_jadwal, Request $request) {
        $messages = [
            'required' => ':attribute masih kosong',
            'min' => ':attribute diisi minimal :min karakter',
            'max' => ':attribute diisi maksimal :max karakter',
            'numeric' => ':attribute harus berupa angka',
            'unique' => ':attribute sudah ada',
            'email' => ':attribute harus berupa email',
            'alpha' => ':attribute harus berupa huruf'
        ];

        $this->validate($request, [
            'dokter' => 'required|max:50',
            'hari' => 'required|max:50',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required'
        ], $messages);

        $data = ModelJadwalPraktik::find($id_jadwal);

        $data->id_praktik = $request->dokter;
        $data->hari = $request->hari;
        $data->waktu_mulai = $request->waktu_mulai;
        $data->waktu_selesai = $request->waktu_selesai;        

        $data->save();
        return redirect('admin/MengelolaJadwalPraktik')->with('alert-success','Data berhasil diubah!');
    }


    public function delete($id_jadwal) {
    	$datas = ModelJadwalPraktik::find($id_jadwal);
    	$datas->delete();
    	return redirect('admin/MengelolaJadwalPraktik')->with('alert-success','Data berhasil dihapus!');
    }


}
