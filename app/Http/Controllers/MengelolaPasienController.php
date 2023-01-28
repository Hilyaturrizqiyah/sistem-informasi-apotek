<?php

namespace App\Http\Controllers;

use App\ModelPasien;
use Illuminate\Http\Request;
use Session;


class MengelolaPasienController extends Controller
{
    public function index(){

        if(!Session::get('LoginAdmin')){
            return redirect('admin/LoginAdmin')->with('alert','Anda harus login dulu');
        }
        else{

        	$datas = ModelPasien::get();         
        	return view('admin.content.MengelolaPasien',compact('datas'));     
        } 
    } 

    public function tambah() {
        if(!Session::get('LoginAdmin')){
            return redirect('admin/LoginAdmin')->with('alert','Anda harus login dulu');
        }
        else{

        	return view('admin.content.tambah_data.TambahPasien');
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
    		'nama' => 'required|max:50',
    		'password' => 'required|min:8|max:50',
            'email' => 'required|max:50|email|unique:apoteker',
    		'no_telp' => 'required|numeric|min:1|digits_between:1,15',
            'alamat' => 'required|max:255',

    	], $messages);

    	$data = new ModelApoteker();
    	$data->nama = $request->nama;
    	$data->email = $request->email;
    	$data->password = bcrypt($request->password);
    	$data->no_telepon = $request->no_telp;
    	$data->alamat = $request->alamat;

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
            'no_telp.digits_between' => ':attribute diisi antara 1 sampai 15 digit',
            'no_telp.min' => ':attribute tidak boleh kurang dari 1'
        ];

        $this->validate($request, [
            'nama' => 'nullable|max:50',
            'password' => 'nullable|min:8|max:50',
            'email' => 'nullable|max:50|email|unique:apoteker',
            'no_telp' => 'nullable|numeric|min:1|digits_between:1,15',
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
    	$data->save();
    	return redirect('admin/MengelolaApoteker')->with('alert-success','Data berhasil diubah!');
    }

    public function delete($id_apoteker) {
    	$datas = ModelApoteker::find($id_apoteker);
    	$datas->delete();
    	return redirect('admin/MengelolaApoteker')->with('alert-success','Data berhasil dihapus!');
    }

}

