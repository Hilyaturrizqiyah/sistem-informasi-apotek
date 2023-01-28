<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\ModelJadwalPraktik;
use App\ModelPraktikDokter;
use App\ModelAntrianDokter;
use App\ModelPasien;
use App\praktik_dokter;


use Alert;
use Carbon\Carbon;
use Session;
use DB;

class HomeController extends Controller
{
    public function index(){
        $jadwals = ModelJadwalPraktik::all();
        $dokters = ModelPraktikDokter::all();
        $antrians = ModelAntrianDokter::all();

            $now = Carbon::now()->isoFormat('dddd');
            //$hari;
            if ($now == 'Senin') {
                $hari = 1;
            }
            elseif($now == 'Selasa') {
                $hari = 2;
            }
            elseif($now == 'Rabu') {
                $hari = 3;
            }
            elseif($now == 'Kamis') {
                $hari = 4;
            }
            elseif($now == 'Jumat') {
                $hari = 5;
            }
            elseif($now == 'Sabtu') {
                $hari = 6;
            }
            elseif($now == 'Minggu'){
                $hari = 7;
            }

            $jadwalhari = ModelJadwalPraktik::where('hari',$hari)->get();

        return view('/index', compact('dokters','jadwals','jadwalhari'));
    }


}
