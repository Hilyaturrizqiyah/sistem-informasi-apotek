<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelApoteker;
use App\ModelPasien;
use App\ModelKonsultasi;

use Hash;
use Session;

class LoginApotekerController extends Controller
{
    public function index(){
        if(!Session::get('LoginApoteker')){
            return redirect('/apoteker/LoginApoteker')->with('alert','Kamu harus login dulu');
        }
        else{

            $apoteker = ModelApoteker::all();
            $konsultasi = ModelKonsultasi::all();
            $pasien = ModelPasien::all();
            $belum = ModelKonsultasi::where('jawaban')->get();
            $sudah = count($konsultasi) - count($belum);

            return view('/apoteker/DashboardApoteker', compact('apoteker','pasien','konsultasi','belum','sudah'));
        }
    }

    public function login(){
        return view('/apoteker/LoginApoteker');
    }

    public function loginPost(Request $request){

        $email = $request->email;
        $password = $request->password;

        $data = ModelApoteker::where('email',$email)->first();
        if($data){ //apakah email tersebut ada atau tidak
            if(Hash::check($password,$data->password)){
                Session::put('id_apoteker',$data->id_apoteker);
                Session::put('nama',$data->nama);
                Session::put('email',$data->email);
                Session::put('foto',$data->foto);
             
                Session::put('LoginApoteker',TRUE);
                return redirect('/apoteker/DashboardApoteker');
            }
            else{
                return redirect('/apoteker/LoginApoteker')->with('alert','Password atau Email, Salah !');
            }
        }
        else{
            return redirect('/apoteker/LoginApoteker')->with('alert','Password atau Email, Salah!');
        }
    }

    
    public function logout(){
        Session::flush();
        return redirect('/apoteker/LoginApoteker')->with('alert','Kamu sudah logout');
    }
}
