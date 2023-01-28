<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelPraktikDokter;
use App\ModelJadwalPraktik;
use Session;

class MengelolaPraktikDokterController extends Controller
{
    public function index() {

    	if(!Session::get('LoginAdmin')){
            return redirect('admin/LoginAdmin')->with('alert','Anda harus login dulu');
        }
        else{

	    	$datas = ModelPraktikDokter::all();
            
	    	return view('admin.content.MengelolaPraktikDokter',compact('datas')); 
	    }
	}
	
    public function tambah() {
        if(!Session::get('LoginAdmin')){
            return redirect('admin/LoginAdmin')->with('alert','Anda harus login dulu');
        }
        else{

        	return view('admin.content.tambah_data.TambahPraktikDokter');
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
            'alpha' => ':attribute harus berupa huruf',
            'no_telp.digits_between' => ':attribute diisi antara 1 sampai 15 digit',
            'no_telp.min' => ':attribute tidak boleh kurang dari 1'
        ];

    	$this->validate($request, [
    		'sip' => 'required|max:50',
    		'nama_dokter' => 'required|max:50',
            'jenis_dokter' => 'required|max:50',
            'foto' => 'nullable|image|max:2048',
            'kode_antrian' => 'required|max:50|unique:praktik_dokter',
            'hari' => 'required',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required'
    	], $messages);

    	$data = new ModelPraktikDokter();
    	$data->sip = $request->sip;
    	$data->nama_dokter = $request->nama_dokter;
    	$data->jenis_dokter = $request->jenis_dokter;

    	  if (empty($request->foto)){
            $data->foto = $data->foto;
        }
        else{
            $file = $request->file('foto'); // menyimpan data gambar yang diupload ke variabel $file
            $nama_file = time()."_".$file->getClientOriginalName();
            $file->move('admin/assets/images/praktikdokter',$nama_file); // isi dengan nama folder tempat kemana file diupload
            $data->foto = $nama_file;
        }

        $data->kode_antrian = $request->kode_antrian;

    	$data->save();
        $data->id;

        foreach ($request->hari as $key => $value) {
            $jp = new ModelJadwalPraktik();
            $jp->id_praktik = $data->id;
            $jp->hari = $value;
            $jp->waktu_mulai = $request->waktu_mulai;
            $jp->waktu_selesai = $request->waktu_selesai;
            $jp->save();
        }


    	return redirect('admin/MengelolaPraktikDokter')->with('alert-success','Data berhasil ditambah!');
    }
   public function edit($id_praktik) {

        if(!Session::get('LoginAdmin')){
            return redirect('admin/LoginAdmin')->with('alert','Anda harus login dulu');
        }
        else{

            $datas = ModelPraktikDokter::find($id_praktik);
            return view('admin.content.ubah_data.UbahPraktikDokter',compact('datas'));
        }
    }

    public function update($id_praktik, Request $request) {
        $messages = [
            'required' => ':attribute masih kosong',
            'min' => ':attribute diisi minimal :min karakter',
            'max' => ':attribute diisi maksimal :max karakter',
            'numeric' => ':attribute harus berupa angka',
            'unique' => ':attribute sudah ada',
            'email' => ':attribute harus berupa email',
            'alpha' => ':attribute harus berupa huruf',
            'image' => ':attribute harus berupa gambar',

        ];

        $this->validate($request, [
            'sip' => 'required|max:50',
            'nama_dokter' => 'required|max:50',
            'jenis_dokter' => 'required|max:50',            
            'foto' => 'nullable|image|max:2048',
            'kode_antrian' => 'nullable|max:5|unique:praktik_dokter',
    	   
        ], $messages);

        $data = ModelPraktikDokter::find($id_praktik);

        $data->sip = $request->sip;
        $data->nama_dokter = $request->nama_dokter;
        $data->jenis_dokter = $request->jenis_dokter;


        if (empty($request->foto)){
            $data->foto = $data->foto;
        }
        else{
            unlink('admin/assets/images/praktikdokter/'.$data->foto); //menghapus file lama
            $file = $request->file('foto'); // menyimpan data gambar yang diupload ke variabel $file
            $nama_file = time()."_".$file->getClientOriginalName();
            $file->move('admin/assets/images/praktikdokter',$nama_file); // isi dengan nama folder tempat kemana file diupload
            $data->foto = $nama_file;
        }

        if(empty($request->kode_antrian)){
            $data->kode_antrian = $data->kode_antrian;
        }else{
            $data->kode_antrian = $request->kode_antrian;
        }
                   

        $data->save();
        return redirect('admin/MengelolaPraktikDokter')->with('alert-success','Data berhasil diubah!');
    }


    public function delete($id_praktik) {
    	$datas = ModelPraktikDokter::find($id_praktik);
    	$datas->delete();
    	return redirect('admin/MengelolaPraktikDokter')->with('alert-success','Data berhasil dihapus!');
    }

    public function lihat($id_praktik) {
        if(!Session::get('LoginAdmin')){
            return redirect('admin/LoginAdmin')->with('alert','Anda harus login dulu');
        }
        else{
            
            $praktik = ModelPraktikDokter::find($id_praktik);
            $jadwal = ModelJadwalPraktik::where('id_praktik',$id_praktik)->orderBy('hari')->get();

            return view('admin.content.MengelolaLihatJadwal',compact('praktik','jadwal'));
        }
    }


}
