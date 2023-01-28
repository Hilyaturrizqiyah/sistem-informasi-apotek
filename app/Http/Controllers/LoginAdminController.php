<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelAdmin;
use App\ModelApoteker;
use App\ModelPemesanan;
use App\ModelObat;
use App\ModelPasien;
use App\ModelKonsultasi;
use App\ModelPembayaran;
use App\ModelAntrianDokter;
use App\ModelJadwalPraktik;
use App\ModelPraktikDokter;



use Hash;
use Session;

class LoginAdminController extends Controller
{
    public function index(){
        if(!Session::get('LoginAdmin')){
            return redirect('/admin/LoginAdmin')->with('alert','Kamu harus login dulu');
        }
        else{

            $admin = ModelAdmin::all();
            $apoteker = ModelApoteker::all();
            $pemesanan = ModelPemesanan::all();
            $obat = ModelObat::all();
            $pasien = ModelPasien::all();
            $konsultasi = ModelKonsultasi::all();
            $pembayaran = ModelPembayaran::all();
            $praktikDokter = ModelPraktikDokter::all();
            $jadwalPraktik = ModelJadwalPraktik::all();
            $antrian = ModelAntrianDokter::all();

            return view('/admin/DashboardAdmin', compact('admin','apoteker','pemesanan','obat','pasien','konsultasi','pembayaran','praktikDokter','jadwalPraktik','antrian'));
        }
    }

    public function login(){
        return view('/admin/LoginAdmin');
    }

    public function loginPost(Request $request){

        $email = $request->email;
        $password = $request->password;

        $data = ModelAdmin::where('email',$email)->first();
        if($data){ //apakah email tersebut ada atau tidak
            if(Hash::check($password,$data->password)){
                Session::put('id_admin',$data->id_admin);
                Session::put('nama',$data->nama);
                Session::put('email',$data->email);
                Session::put('foto',$data->foto);
             
                Session::put('LoginAdmin',TRUE);
                return redirect('/admin/DashboardAdmin');
            }
            else{
                return redirect('/admin/LoginAdmin')->with('alert','Password atau Email, Salah !');
            }
        }
        else{
            return redirect('/admin/LoginAdmin')->with('alert','Password atau Email, Salah!');
        }
    }

    public function logout(){
        Session::flush();
        return redirect('/admin/LoginAdmin')->with('alert','Kamu sudah logout');
    }

}
