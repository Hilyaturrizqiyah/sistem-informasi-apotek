<?php

namespace App\Http\Controllers;

use App\ModelApoteker;
use Illuminate\Http\Request;
use Session;


class MengelolaApotekerController extends Controller
{
    public function index(){

        if(!Session::get('LoginAdmin')){
            return redirect('admin/LoginAdmin')->with('alert','Anda harus login dulu');
        }
        else{

        	$datas = ModelApoteker::get();         
        	return view('admin.content.MengelolaApoteker',compact('datas'));     
        } 
    } 

    public function tambah() {
        if(!Session::get('LoginAdmin')){
            return redirect('admin/LoginAdmin')->with('alert','Anda harus login dulu');
        }
        else{

        	return view('admin.content.tambah_data.TambahApoteker');
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
    		'nama' => 'required|max:50',
    		'password' => 'required|min:8|max:50',
            'email' => 'required|max:50|email|unique:apoteker',
    		'no_telp' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'alamat' => 'required|max:255',
            'foto' => 'nullable|image|max:2048'

    	], $messages);
     

    	$data = new ModelApoteker();
    	$data->nama = $request->nama;
    	$data->email = $request->email;
    	$data->password = bcrypt($request->password);
    	$data->no_telepon = $request->no_telp;
    	$data->alamat = $request->alamat;
        
        if (empty($request->foto)){
            $data->foto = $data->foto;
        }
        else{
            $file = $request->file('foto'); // menyimpan data gambar yang diupload ke variabel $file
            $nama_file = time()."_".$file->getClientOriginalName();
            $file->move('admin/assets/images/avatars',$nama_file); // isi dengan nama folder tempat kemana file diupload
            $data->foto = $nama_file;
        }
        

    	$data->save();
    	return redirect('admin/MengelolaApoteker')->with('alert-success','Data berhasil ditambah!');
    }

   	public function edit($id_apoteker) {

        if(!Session::get('LoginAdmin')){
            return redirect('admin/LoginAdmin')->with('alert','Anda harus login dulu');
        }
        else{

        	$datas = ModelApoteker::find($id_apoteker);
        	return view('admin.content.ubah_data.UbahApoteker',compact('datas'));
        }
    }

    public function update($id_apoteker, Request $request) {
    	$messages = [
            'required' => ':attribute masih kosong',
            'min' => ':attribute diisi minimal :min karakter',
            'max' => ':attribute diisi maksimal :max karakter',
            'numeric' => ':attribute harus berupa angka',
            'unique' => ':attribute sudah ada',
            'email' => ':attribute harus berupa email',
            'alpha' => ':attribute harus berupa huruf',
            'image' => ':attribute harus berupa gambar',
            'no_telp.regex' => 'Format Nomor telepon salah',
            'no_telp.digits_between' => ':attribute diisi antara 1 sampai 15 digit',
            'no_telp.min' => ':attribute tidak boleh kurang dari 10 digit'
        ];

        $this->validate($request, [
            'nama' => 'nullable|max:50',
            'password' => 'nullable|min:8|max:50',
            'email' => 'nullable|max:50|email|unique:apoteker',
            'no_telp' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'alamat' => 'nullable|max:255',
        ], $messages);

        $data = ModelApoteker::find($id_apoteker);

        if (empty($request->nama)){
            $data->nama = $data->nama;
        }
        else {
            $data->nama = $request->nama;
        }

        if (empty($request->email)){
            $data->email = $data->email;
        }
        else {
            $data->email = $request->email;
        }

        if (empty($request->password)){
            $data->password = $data->password;
        }
        else{
            $data->password = bcrypt($request->password);
        }

        if (empty($request->no_telp)){
            $data->no_telepon = $data->no_telepon;
        }
        else {
            $data->no_telepon = $request->no_telp;
        }

        if (empty($request->alamat)){
            $data->alamat = $data->alamat;
        }
        else {
            $data->alamat = $request->alamat;
        }

        if (empty($request->foto)){
            $data->foto = $data->foto;
        }
        else{
            if (empty($data->foto)){
            }else{
                unlink('img/produk/'.$data->foto); //menghapus file lama
            }
            $file = $request->file('foto'); // menyimpan data gambar yang diupload ke variabel $file
            $nama_file = time()."_".$file->getClientOriginalName();
            $file->move('admin/assets/images/avatars',$nama_file); // isi dengan nama folder tempat kemana file diupload
            $data->foto = $nama_file;
        }

    	$data->save();
    	return redirect('admin/MengelolaApoteker')->with('alert-success','Data berhasil diubah!');
    }

    public function delete($id_apoteker) {
    	$datas = ModelApoteker::find($id_apoteker);
    	$datas->delete();
    	return redirect('admin/MengelolaApoteker')->with('alert-success','Data berhasil dihapus!');
    }

}

