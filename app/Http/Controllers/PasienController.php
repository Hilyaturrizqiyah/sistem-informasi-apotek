<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\ModelPasien;
use Hash;
use Session;
use Alert;

class PasienController extends Controller
{
    public function index(){
        if(!Session::get('login')){
            return redirect('/')->with('alert','Kamu harus login dulu');
        }
        else{

            return view('/Pasien/DashboardPasien');
        }
    }

    public function loginPasienPost(Request $request){

        $email = $request->email;
        $password = $request->password;

        $data = ModelPasien::where('email',$email)->first();
        if($data){ //apakah email tersebut ada atau tidak
            if(Hash::check($password,$data->password)){
                Session::put('nama',$data->nama);
                Session::put('email',$data->email);
                Session::put('id_pasien',$data->id_pasien);
                Session::put('loginPasienPost',TRUE);
                return redirect('/Pasien/DashboardPasien');
            }
            else{
        alert()->error('Email atau Password Salah', 'Error');

                return redirect('/');
            }
        }
        else{
        alert()->error('Email atau Password Salah', 'Error');

            return redirect('/');
        }
    }

    public function logoutPasien(){
        Session::flush();
        alert()->info('Kamu Sudah Log Out', 'Logout');
        return redirect('/');
    }

    public function registerPasien(Request $request){
        return view('/daftar');
    }

    public function registerPasienPost(Request $request){
        $this->validate($request, [
            'nama' => 'required|min:4',
            'no_telepon' => 'required|min:4',
            'alamat' => 'required|min:4',
            'email' => 'required|min:4',
            'password' => 'required',
            'confirmation' => 'required|same:password',

        ],[
            'nama.required' => 'Nama harus diisi dengan lengkap',
            'no_telepon.required' => 'No HP harus diisi',
            'alamat.required' => 'Alamat harus diisi',
            'email.required' => 'Email harus diisi',
            'password.required' => 'Password harus diisi',
            'confirmation.required' => 'Isi dengan password yang sama',
        ]);

        $data =  new ModelPasien();
        $data->nama = $request->nama;
        $data->no_telepon = $request->no_telepon;
        $data->alamat = $request->alamat;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);

        $data->save();

        alert()->success('Kamu Berhasil Registrasi', 'Berhasil');
        return redirect('/');
    }
}
