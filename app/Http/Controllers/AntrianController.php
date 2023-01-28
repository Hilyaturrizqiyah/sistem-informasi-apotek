<?php

namespace App\Http\Controllers;

use App\ModelAntrianDokter;
use App\ModelJadwalPraktik;
use App\ModelPasien;
use App\ModelPraktikDokter;

use Alert;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use DB;
use PDF;

class AntrianController extends Controller
{
    public function antrian(){
        $jadwals = ModelJadwalPraktik::all();

        //$jadwal = ModelJadwalPraktik::where('hari', $hari)->get();

            //$jadwal = DB::table('jadwal_praktik')->join('praktik_dokter','jadwal_praktik.id_praktik','=','jadwal_praktik.id_praktik')->get();

            //$jadwal = DB::table('jadwal_praktik')->where('hari', 3)->pluck('id_praktik');

            //$harinya = json_encode($jadwal);

            //$dokters = ModelPraktikDokter::find([$harinya])->toarray();
            //$dokters = [$dokters];
            //dd($dokters);

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

        return view('/Pasien/AmbilNomorAntrian', compact('dokters','jadwals','jadwalhari'));
    }

    public function ambilAntrian( Request $request) {

        $messages = [
            'required' => ':attribute masih kosong',
            'min' => ':attribute diisi minimal :min karakter',
            'max' => ':attribute diisi maksimal :max karakter',
            'numeric' => ':attribute harus berupa angka',
            'unique' => ':attribute sudah ada',
            'email' => ':attribute harus berupa email',
            'image' => ':attribute harus berupa gambar',
            'alpha' => ':attribute harus berupa huruf',
            'no_telp.regex' => 'Format Nomor telepon salah'
        ];

        $this->validate($request, [
            'dokter' => 'required|max:50',
            'nama_pasien' => 'required|max:50',
            'no_telp' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'alamat' => 'required|max:255'
        ], $messages);

        /* //Cari max no surat pada hari itu
        select max(no) from mytable where tanggal = curdate()

        //Kalau tidak ada
        Kalau max(no) == NULL set no = 01

        //Kalau ada
        Kalau max(no) <> NULL set no = no + 1


        $yearnow = date('Y', time());
        $datenow = date('d', time());
        $monthnow = date('m', time());
        $fulldatenow = date( 'Y-m-d', time() );*/

        $now = Carbon::now()->Format('Y-m-d');

        $cariurut = ModelAntrianDokter::where('waktu_hari', $now)
        ->where('id_praktik', $request->dokter)->get();

        //$cariurut = ModelAntrianDokter::all();

        $count = $cariurut->count();

        if($count == NUlL){
            $noantri = 1;
        }
        elseif($count <> NULL){
            $noantri = $count + 1;
        }

        $na = ModelPraktikDokter::find($request->dokter);

        $data = new ModelAntrianDokter();
        $data->id_praktik = $request->dokter;
        $data->nama_pasien = $request->nama_pasien;
        $data->no_telepon = $request->no_telp;
        $data->alamat = $request->alamat;
        $data->nomor_antrian = $na->kode_antrian.'-'.$noantri;
        $data->waktu_hari = $now;
        $data->save();
        $data->id_antrian;

        alert()->success('Kamu Berhasil Ambil No antrian', 'Berhasil');
        return redirect('DetailNomorAntrian'.$data->id_antrian);
    }

    public function detailAntrian($id_antrian){
            $datas = ModelAntrianDokter::find($id_antrian);
            return view('Pasien.DetailNomorAntrian',compact('datas'));
    }

    public function cetak_antrian($id_antrian)
    {
        $datas        = ModelAntrianDokter::find($id_antrian);
        $praktik      = ModelPraktikDokter::where('id', $datas->id_praktik)->first();

        $pdf = PDF::loadview('/Pasien/NomorAntrianPDF',compact('datas', 'praktik'));
        return $pdf->stream('cetak-NomorAntrian.pdf');
    }

}
