<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelPemesanan;
use App\ModelAdmin;
use App\ModelPasien;
use App\ModelObat;
use App\ModelDetailPemesanan;
use Session;
use Carbon\Carbon;

class MengelolaPemesananController extends Controller
{
    public function index() {

    	if(!Session::get('LoginAdmin')){
            return redirect('admin/LoginAdmin')->with('alert','Anda harus login dulu');
        }
        else{
            $tanggalwaktu = Carbon::now()->isoFormat('dddd, D MMMM Y');
	    	$datas = ModelPemesanan::all()->sortBy('created_at');
	    	$pasien = ModelPasien::all();

            $now = Carbon::now()->format('y-m-d');
            $batal = ModelPemesanan::all();

            foreach ($batal as $telatbayar) {
                    $selisihHari = $telatbayar->created_at->diffInDays($now);

                    if ($selisihHari >= 1  && $telatbayar->status == 1) {

                        $updetbatal = ModelPemesanan::find($telatbayar->id_pemesanan);
                        $updetbatal->status = 5;
                        $updetbatal->ket_batal = 'Tidak melakukan pembayaran dalam 24 jam';
                        $updetbatal->save();
                    }
            }

            foreach ($batal as $gkdiambil) {
                    $selisihHari = $gkdiambil->created_at->diffInDays($now);

                    if ($selisihHari >= 1  && $gkdiambil->status == 3 && $gkdiambil->metode_pembayaran == 2 ) {

                        $updetbatal = ModelPemesanan::find($gkdiambil->id_pemesanan);
                        $updetbatal->status = 5;
                        $updetbatal->ket_batal = 'Obat tidak diambil dalam 24 jam';
                        $updetbatal->save();
                    }
            }
            
	    	return view('admin.content.MengelolaPemesanan',compact('datas','pasien','tanggalwaktu')); 
	    }
	}

    public function edit($id_pemesanan) {

        if(!Session::get('LoginAdmin')){
            return redirect('admin/LoginAdmin')->with('alert','Anda harus login dulu');
        }
        else{

            $datas = ModelPemesanan::find($id_pemesanan);
            return view('admin.content.ubah_data.UbahStatusPesanan',compact('datas'));
        }
    }

    public function update($id_pemesanan, Request $request) {
        $messages = [
            'required' => ':attribute masih kosong',
            'min' => ':attribute diisi minimal :min karakter',
            'max' => ':attribute diisi maksimal :max karakter',
            'numeric' => ':attribute harus berupa angka',
            'unique' => ':attribute sudah ada',
            'email' => ':attribute harus berupa email',
            'alpha' => ':attribute harus berupa huruf',
            'image' => ':attribute harus berupa gambar'
        ];

        $this->validate($request, [
            'status' => 'required|max:50'
        ], $messages);

        if ($request->status == 5) {
            $datas = ModelPemesanan::find($id_pemesanan);
            return view('admin.content.BatalPemesanan',compact('datas'));
        }else{
            $data = ModelPemesanan::find($id_pemesanan);
            $data->id_admin = Session::get('id_admin');
            $data->status = $request->status; 
            $data->save();
            return redirect('admin/MengelolaPemesanan')->with('alert-success','Data berhasil diubah!');
        }

        
    }

    public function delete($id_pemesanan)
    {
        $hapus = ModelPemesanan::find($id_pemesanan);
        $hapus->delete();
        return redirect('admin/MengelolaPemesanan')->with('alert-success','Data berhasil dihapus!');
    }

    public function detail($id_pemesanan) {
        if(!Session::get('LoginAdmin')){
            return redirect('admin/LoginAdmin')->with('alert','Anda harus login dulu');
        }
        else{

            $datas = ModelPemesanan::find($id_pemesanan);
            $obat = ModelObat::all();
            $total = ModelDetailPemesanan::where('id_pemesanan',$id_pemesanan)->sum('harga_jumlah');

            return view('admin.content.MengelolaDetailPemesanan',compact('datas','obat','total'));
        }
    }

    public function konfirmasi($id_pemesanan) {
        $ambil = ModelPemesanan::find($id_pemesanan);

        $ambil->status = 3;
        $ambil->id_admin = Session::get('id_admin');
        $ambil->save();

        return redirect('admin/MengelolaPemesanan')->with('alert-success','Data berhasil dikonfirmasi!');
    }

    public function batalkan($id_pemesanan) {

        if(!Session::get('LoginAdmin')){
            return redirect('admin/LoginAdmin')->with('alert','Anda harus login dulu');
        }
        else{

            $datas = ModelPemesanan::find($id_pemesanan);
            return view('admin.content.BatalPemesanan',compact('datas'));
        }
    }

    public function aksibatal($id_pemesanan, Request $request) {

        $messages = [
            'required' => ':attribute masih kosong',
            'max' => ':attribute diisi maksimal :max karakter',
        ];

        $this->validate($request, [
            'ket_batal' => 'required|max:100'
        ], $messages);

        $batal = ModelPemesanan::find($id_pemesanan);

        $batal->status = 5;
        $batal->id_admin = Session::get('id_admin');
        $batal->ket_batal = $request->ket_batal; 
        $batal->save();

        return redirect('admin/MengelolaPemesanan')->with('alert-success','Data berhasil dibatalkan!');
    }

    public function diambil($id_pemesanan) {
        $ambil = ModelPemesanan::find($id_pemesanan);

        $ambil->status = 4;
        $ambil->id_admin = Session::get('id_admin');
        $ambil->save();

        return redirect('admin/MengelolaPemesanan')->with('alert-success','Data berhasil diambil!');
    }
}
