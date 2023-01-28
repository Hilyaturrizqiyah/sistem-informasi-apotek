<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelObat;
use App\ModelPasien;
use App\PemesananDetailModel;
use App\ModelPemesanan;
use App\ModelPembayaran;
use Alert;
use App\ModelDetailPemesanan;
use Session;
use Carbon\Carbon;
use PDF;

class PemesananController extends Controller
{
    public function index(){
        $pasien = ModelPasien::all();
        $obat = ModelObat::all();

        //Proses pembatalan dalam 1 hari
        $now = Carbon::now()->format('y-m-d');
        $selesai = ModelPemesanan::all();

        foreach ($selesai as $batal) {
            $selisih_hari = $batal->created_at->diffInDays($now);
            $stok   = ModelDetailPemesanan::where('id_pemesanan', $batal->id_pemesanan)->get();


            if($selisih_hari >= 1 && $batal->status == 1){
                $update_batal = ModelPemesanan::find($batal->id_pemesanan);
                $update_batal->status = 5;
                $update_batal->save();

                foreach ($stok as $value){
                    $obat = ModelObat::find($value->id_obat);
                    $obat->stok = $obat->stok + $value->jumlah;
                    $obat->save();
                }
            }
    }
        return view('/Pasien/DashboardPasien', compact('obat','pasien', 'now', 'selesai'));
    }

    public function tampilDetailObat($id_obat)
    {

        $obat     = ModelObat::where('id_obat', $id_obat)->first();

        return view('/Pasien/detailObat', compact('obat'));
    }

    public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;

    		// mengambil data dari table pegawai sesuai pencarian data
        $obat = ModelObat::where('nama_obat','like',"%".$cari."%")->paginate();

    		// mengirim data pegawai ke view index
		return view('/Pasien/DashboardPasien', compact('obat'));
    }

    public function beliObat(Request $request, $id_obat){
        $this->validate($request, [
            'jumlah' => 'required|min:1|integer',
            'harga_jumlah' => 'required'
        ],[
            'jumlah.required' => '*Harus isi jumlah beli terlebih dahulu',
            'jumlah.min' => 'Tidak boleh kosong atau minus 1'
        ]);
        $obat = ModelObat::where('id_obat', $id_obat)->first();

        $pemesanan_detail = PemesananDetailModel::all();


        //validasi apakah MELEBIHI STOK
        if($request->jumlah > $obat->stok){
            alert()->info('Melebihi Stok Yang Ada !!!!!', 'Peringatan!');
            return redirect('Pasien/detailObat'.$id_obat);
        }
        $cek_pemesanan = ModelPemesanan::where('id_pasien', Session::get('id_pasien'))->where('status', 0)->first();
        if(empty($cek_pemesanan)){
            $pemesanan = new ModelPemesanan;
            $pemesanan->id_pemesanan = "Pemesanan-". mt_rand(1,999);
            $pemesanan->id_pasien =  Session::get('id_pasien');
            $pemesanan->status = 0;
            $pemesanan->save();
        }


        $pemesanan_baru = ModelPemesanan::where('id_pasien', Session::get('id_pasien'))->where('status',0)->first();

        $cek_pemesanan_detail = PemesananDetailModel::where('id_obat', $obat->id_obat)->where('id_pemesanan', $pemesanan_baru->id_pemesanan)->first();
        if(empty($cek_pemesanan_detail)){
            $pemesanan_detail = new PemesananDetailModel;
            $pemesanan_detail->id_pemesanan = $pemesanan_baru->id_pemesanan;
            $pemesanan_detail->id_obat = $obat->id_obat;
            $pemesanan_detail->jumlah = $request->jumlah;
            $pemesanan_detail->harga_jumlah = $obat->harga_jual*$request->jumlah;
            $pemesanan_detail->save();
        }else{
            $pemesanan_detail = PemesananDetailModel::where('id_obat', $obat->id_obat)->where('id_pemesanan', $pemesanan_baru->id_pemesanan)->first();
            if($pemesanan_detail->jumlah + $request->jumlah > $obat->stok ){
                alert()->error('Barang yang masuk keranjang melebihi stok yang ada','Gagal');
                return redirect('Pasien/detailObat'.$id_obat);
            }
            $pemesanan_detail->jumlah = $pemesanan_detail->jumlah+$request->jumlah;

            $harga_pemesanan_detail_baru = $obat->harga_jual * $request->jumlah;
            $pemesanan_detail->harga_jumlah = $pemesanan_detail->harga_jumlah+$harga_pemesanan_detail_baru;
            $pemesanan_detail->update();
        }

            alert()->success('Masuk Ke Dalam Keranjang', 'Berhasil');
            return redirect('Pasien/DashboardPasien');
        }

        public function index_checkOut()
        {
        $pasien   = ModelPasien::all();
        $obat   = ModelObat::all();
        $pemesanan = ModelPemesanan::where('id_pasien', Session::get('id_pasien'))->where('status',0)->first();

        if(!empty($pemesanan))
        {
            $pemesanan_detail  = PemesananDetailModel::where('id_pemesanan', $pemesanan->id_pemesanan)->get();
            $total = PemesananDetailModel::where('id_pemesanan', $pemesanan->id_pemesanan)->sum('harga_jumlah');
            return view('Pasien/keranjangObat', compact('pemesanan', 'pemesanan_detail','total','obat','pasien'));
        }
        return view('Pasien/keranjangObat', compact('pemesanan', 'pemesanan_detail','total','obat','pasien'));
        }

    public function deletePemesanan($id_detail_pemesanan)
    {
        $pemesanan_detail = PemesananDetailModel::where('id_detail_pemesanan', $id_detail_pemesanan)->first();
        $pemesanan = ModelPemesanan::where('id_pemesanan', $pemesanan_detail->id_pemesanan)->first();

        $pemesanan_detail->delete();
        alert()->info('Produk Pada Keranjang Telah Di Hapus', 'Hapus');
        return redirect('Pasien/keranjangObat');
    }

    public function konfirmasi(Request $request, $id_pemesanan)
    {
        $pemesanan = ModelPemesanan::where('id_pasien', Session::get('id_pasien'))->where('status',0)->first();
        $pemesanan_detail = PemesananDetailModel::where('id_pemesanan', $pemesanan->id_pemesanan)->get();
        $total = PemesananDetailModel::where('id_pemesanan', $id_pemesanan)->sum('harga_jumlah');

        $id_pemesanan = $pemesanan->id_pemesanan;

        if($request->metode_pembayaran == "1"){
            $pemesanan->metode_pembayaran = "1";
            $pemesanan->status = 1;
        }else if($request->metode_pembayaran == "2"){
            $pemesanan->metode_pembayaran = "2";
            $pemesanan->status = 2;
        }
        $pemesanan->no_telepon = $request->no_telepon;
        $pemesanan->update();

        $pemesanan_detail = PemesananDetailModel::where('id_pemesanan', $id_pemesanan)->get();
        foreach($pemesanan_detail as $pemesanan_detail){
            $obat = ModelObat::where('id_obat', $pemesanan_detail->id_obat)->first();
            $obat->stok = $obat->stok-$pemesanan_detail->jumlah;
            $obat->update();
        }

        alert()->success('Sukses Check Out', 'Success');
        return redirect('Pasien/riwayat_Beli');
    }

    public function history()
    {
        $pemesanan = ModelPemesanan::where('id_pasien', Session::get('id_pasien'))->where('status','!=',0)->get()->sortBy('status');

        //Proses pembatalan dalam 1 hari
        $now = Carbon::now()->format('y-m-d');
        $selesai = ModelPemesanan::all();

        foreach ($selesai as $batal) {
            $selisih_hari = $batal->created_at->diffInDays($now);

            if($selisih_hari >= 1 && $batal->status == 1){
                $update_batal = ModelPemesanan::find($batal->id_pemesanan);
                $update_batal->status = 5;
                $update_batal->save();
            }
        }

        return view('Pasien/riwayat_Beli', compact('pemesanan','now', 'selesai'));
    }

    public function historydetail($id_pemesanan)
    {
        $pemesanan = ModelPemesanan::where('id_pemesanan', $id_pemesanan)->first();
        //$pembayaran = ModelPembayaran::where('id_pembayaran', $pemesanan->id_pembayaran)->get();
        $pemesanan_detail  = PemesananDetailModel::where('id_pemesanan', $pemesanan->id_pemesanan)->get();
        $total = PemesananDetailModel::where('id_pemesanan', $id_pemesanan)->sum('harga_jumlah');
        $pembayaran = ModelPembayaran::get();

        return view('Pasien/riwayatBeli_detail', compact('pembayaran', 'pemesanan','pemesanan_detail','total' ));
    }

    public function buktiTf(Request $request, $id_pemesanan)
    {

        $pemesanan = ModelPemesanan::where('id_pemesanan', $id_pemesanan)->where('id_pasien', Session::get('id_pasien'))->where('status',1)->first();
        $pembayaran = ModelPembayaran::where('id_pemesanan', $pemesanan->id_pemesanan)->get();
        $total = PemesananDetailModel::where('id_pemesanan', $id_pemesanan)->sum('harga_jumlah');


        $file = $request->file('bukti_tf');
        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = 'bukti_tf';
        $file -> move($tujuan_upload,$nama_file);

        $tanggal = Carbon::now();

        $pembayaran = new ModelPembayaran();
        $pembayaran->id_pemesanan = $pemesanan->id_pemesanan;
        $pembayaran->waktu = $tanggal;
        $pembayaran->nominal = $total;
        $pembayaran->bukti_tf = $nama_file;
        $pembayaran->status = 1;
        $pembayaran->save();


        $pemesanan->status=2;
        $pemesanan->update();

        alert()->success('Sukses Upload Bukti Transfer', 'Success');
        return redirect('/Pasien/riwayat_Beli');
    }

    public function cetak_pdf($id_pemesanan)
    {
        $obat             = ModelObat::all();
        $pemesanan        = ModelPemesanan::where('id_pemesanan', $id_pemesanan)->first();
        $pemesanan_detail = PemesananDetailModel::where('id_pemesanan', $pemesanan->id_pemesanan)->get();
        $total = PemesananDetailModel::where('id_pemesanan', $pemesanan->id_pemesanan)->sum('harga_jumlah');


        $pdf = PDF::loadview('/Pasien/PemesananPDF',compact('obat', 'pemesanan', 'pemesanan_detail', 'total'));
        return $pdf->stream('cetak-pemesanan-pdf.pdf');
    }
}

