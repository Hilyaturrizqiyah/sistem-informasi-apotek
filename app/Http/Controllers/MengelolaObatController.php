<?php

namespace App\Http\Controllers;

use App\ModelObat;
use Illuminate\Http\Request;
use Session;


class MengelolaObatController extends Controller
{
    public function index(){

        if(!Session::get('LoginAdmin')){
            return redirect('admin/LoginAdmin')->with('alert','Anda harus login dulu');
        }
        else{

        	$datas = ModelObat::all();         
        	return view('admin.content.MengelolaObat',compact('datas'));     
        } 
    } 

public function tambah() {
        if(!Session::get('LoginAdmin')){
            return redirect('admin/LoginAdmin')->with('alert','Anda harus login dulu');
        }
        else{

            return view('admin.content.tambah_data.TambahObat');
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
            'no_telp.regex' => 'Format Nomor telepon salah',
            'no_telp.min' => 'Nomor telepon minimal 10 digit',
            'no_telp.unique' => 'Nomor telepon sudah dipakai',
            'foto.max' => 'tidak boleh lebih 2 Mb',
            
        ];

        $this->validate($request, [
            'id_obat' => 'required|max:50',
            'nama_obat' => 'required|max:50',
            'satuan' => 'required|max:50',
            'harga_modal' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'stok' => 'required|numeric',
            'foto' => 'required|image|max:2048'

        ], $messages);

        $data = new ModelObat();
        $data->id_obat = $request->id_obat;
        $data->nama_obat = $request->nama_obat;
        $data->satuan = $request->satuan;
        $data->harga_modal = $request->harga_modal;
        $data->harga_jual = $request->harga_jual;
        $data->stok = $request->stok;

            $file = $request->file('foto'); // menyimpan data gambar yang diupload ke variabel $file
            $nama_file = time()."_".$file->getClientOriginalName();
            $file->move('admin/assets/images/obat',$nama_file); // isi dengan nama folder tempat kemana file diupload
            $data->foto = $nama_file;

        

        $data->save();
        return redirect('admin/MengelolaObat')->with('alert-success','Data berhasil ditambah!');
    }

    public function edit($id_obat) {

        if(!Session::get('LoginAdmin')){
            return redirect('admin/LoginAdmin')->with('alert','Anda harus login dulu');
        }
        else{

            $datas = ModelObat::find($id_obat);
            return view('admin.content.ubah_data.UbahObat',compact('datas'));
        }
    }

    public function update($id_obat, Request $request) {
        $messages = [
            'required' => ':attribute masih kosong',
            'min' => ':attribute diisi minimal :min karakter',
            'max' => ':attribute diisi maksimal :max karakter',
            'numeric' => ':attribute harus berupa angka',
            'unique' => ':attribute sudah ada',
            'email' => ':attribute harus berupa email',
            'alpha' => ':attribute harus berupa huruf',
            'image' => ':attribute harus berupa gambar',
            'no_telp.digits_between' => ':attribute diisi antara 1 sampai 15 digit',
            'no_telp.min' => ':attribute tidak boleh kurang dari 1'
        ];

        $this->validate($request, [
            'nama_obat' => 'required|max:50',
            'satuan' => 'required|max:50',
            'harga_modal' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'stok' => 'required|numeric',
            'foto' => 'nullable|image|max:2048'
        ], $messages);

        $data = ModelObat::find($id_obat);

        $data->nama_obat = $request->nama_obat;
        $data->satuan = $request->satuan;
        $data->harga_modal = $request->harga_modal;
        $data->harga_jual = $request->harga_jual;
        $data->stok = $request->stok;

        if (empty($request->foto)){
            $data->foto = $data->foto;
        }
        else{
            unlink('admin/assets/images/obat/'.$data->foto); //menghapus file lama
            $file = $request->file('foto'); // menyimpan data gambar yang diupload ke variabel $file
            $nama_file = time()."_".$file->getClientOriginalName();
            $file->move('admin/assets/images/obat',$nama_file); // isi dengan nama folder tempat kemana file diupload
            $data->foto = $nama_file;
        }
            
        

        $data->save();
        return redirect('admin/MengelolaObat')->with('alert-success','Data berhasil diubah!');
    }


    public function delete($id_obat) {
    	$datas = ModelObat::find($id_obat);
    	$datas->delete();
    	return redirect('admin/MengelolaObat')->with('alert-success','Data berhasil dihapus!');
    }

}

