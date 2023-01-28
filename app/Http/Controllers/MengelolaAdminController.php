<?php

namespace App\Http\Controllers;

use App\ModelAdmin;
use Illuminate\Http\Request;
use Session;


class MengelolaAdminController extends Controller
{
    public function index(){

        if(!Session::get('LoginAdmin')){
            return redirect('admin/LoginAdmin')->with('alert','Anda harus login dulu');
        }
        else{

        	$datas = ModelAdmin::get();         
        	return view('admin.content.MengelolaAdmin',compact('datas'));     
        } 
    } 

    public function tambah() {
        if(!Session::get('LoginAdmin')){
            return redirect('admin/LoginAdmin')->with('alert','Anda harus login dulu');
        }
        else{

        	return view('admin.content.tambah_data.TambahAdmin');
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
            'email' => 'required|max:50|email|unique:admin',
    		'no_telp' => 'required|numeric|min:1|digits_between:1,15',
            'alamat' => 'required|max:255',

    	], $messages);

    	$data = new ModelAdmin();
    	$data->nama = $request->nama;
    	$data->email = $request->email;
    	$data->password = bcrypt($request->password);
    	$data->no_telepon = $request->no_telp;
    	$data->alamat = $request->alamat;

    	$data->save();
    	return redirect('admin/MengelolaAdmin')->with('alert-success','Data berhasil ditambah!');
    }

   	public function edit($id_admin) {

        if(!Session::get('LoginAdmin')){
            return redirect('admin/LoginAdmin')->with('alert','Anda harus login dulu');
        }
        else{

        	$datas = ModelAdmin::find($id_admin);
        	return view('admin.content.ubah_data.UbahAdmin',compact('datas'));
        }
    }

    public function update($id_admin, Request $request) {
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
            'email' => 'nullable|max:50|email|unique:admin',
            'no_telp' => 'nullable|numeric|min:1|digits_between:1,15',
            'alamat' => 'nullable|max:255',
        ], $messages);

        $data = ModelAdmin::find($id_admin);

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
    	return redirect('admin/MengelolaAdmin')->with('alert-success','Data berhasil diubah!');
    }

    public function delete($id_admin) {
    	$datas = ModelAdmin::find($id_admin);
    	$datas->delete();
    	return redirect('admin/MengelolaAdmin')->with('alert-success','Data berhasil dihapus!');
    }

    public function ubah($id_admin) {
        if(!Session::get('LoginAdmin')){
            return redirect('admin/LoginAdmin')->with('alert','Anda harus login dulu');
        }
    else{
            $datas = ModelAdmin::find($id_admin);
            return view('admin.content.ubah_data.UbahProfile',compact('datas'));
        }

    }

public function aksiubah($id_admin, Request $request) {
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
            'email' => 'nullable|max:50|email|unique:admin',
            'no_telp' => 'nullable|numeric|min:1|digits_between:1,15',
            'alamat' => 'nullable|max:255',
        ], $messages);

        $data = ModelAdmin::find($id_admin);

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
        Session::flush();
        return redirect('/admin/LoginAdmin')->with('alert-success','Data Berhasil Di Rubah!');
    }
}

