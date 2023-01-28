<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//------------Halaman Utama-------------------

Route::get('/', 'HomeController@index');
Route::post('/formAntrianPost','AntrianController@ambilAntrian');
Route::get('/DetailNomorAntrian{id_antrian}', 'AntrianController@detailAntrian');
Route::get('/Pasien/cetak_antrian/{id_antrian}', 'AntrianController@cetak_antrian');

Route::get('daftar', function () {
    return view('daftar');
});

Route::get('obat', function () {
    return view('obat');
});



//------------------User---------------------------------

Route::get('/Pasien/DashboardPasien', 'PasienController@index');
Route::get('/index', 'PasienController@loginPasien');
Route::post('/loginPasienPost', 'PasienController@loginPasienPost');
Route::get('/registerPasien', 'PasienController@registerPasien');
Route::post('/registerPasienPost', 'PasienController@registerPasienPost');
Route::get('/logoutPasien', 'PasienController@logoutPasien');

Route::get('Pasien/DashboardPasien', function () {
    return view('Pasien/DashboardPasien');
});

//===============Pembelian Obat=========
Route::get('/obat','ObatController@tampil');
Route::get('/obat/cari','ObatController@cariObat');
Route::get('/Pasien/DashboardPasien/cari','PemesananController@cari');
Route::get('/detailObat{id_obat}','ObatController@tampilDetailObat');
Route::get('/Pasien/DashboardPasien','PemesananController@index');
Route::get('/Pasien/detailObat{id_obat}','PemesananController@tampilDetailObat');
Route::get('/Pasien/keranjangObat','PemesananController@index_checkOut');
Route::delete('/Pasien/keranjangObat/{id_detail_pemesanan}','PemesananController@deletePemesanan');
Route::get('/Pasien/riwayat_Beli','PemesananController@tampilRiwayat');
Route::post('/pesan/{id_obat}','PemesananController@beliObat');
Route::post('/add-konfirmasi/{id_pemesanan}', 'PemesananController@konfirmasi');
Route::get('/Pasien/riwayat_Beli', 'PemesananController@history');
Route::get('history/{id_pemesanan}', 'PemesananController@historydetail');
Route::post('buktiTf/{id_pemesanan}', 'PemesananController@buktiTf');
Route::get('/Pasien/cetak_pdf/{id_pemesanan}', 'PemesananController@cetak_pdf');

//---------------Admin-------------------
Route::get('/admin/LoginAdmin', 'LoginAdminController@login');
Route::get('/admin/DashboardAdmin', 'LoginAdminController@index');
Route::post('/admin/loginPost', 'LoginAdminController@loginPost');
Route::get('logout', 'LoginAdminController@logout');

Route::get('/admin/UbahProfile{id_admin}','MengelolaAdminController@ubah');
Route::post('/admin/AksiUbahProfile{id_admin}','MengelolaAdminController@aksiubah');


Route::get('/admin/MengelolaApoteker','MengelolaApotekerController@index');
Route::get('/admin/TambahApoteker','MengelolaApotekerController@tambah');
Route::post('/admin/AksiTambahApoteker','MengelolaApotekerController@store');
Route::get('/admin/UbahApoteker{id_apoteker}','MengelolaApotekerController@edit');
Route::post('/admin/AksiUbahApoteker{id_apoteker}','MengelolaApotekerController@update');
Route::get('/admin/HapusApoteker{id_apoteker}','MengelolaApotekerController@delete');

Route::get('/admin/MengelolaPasien','MengelolaPasienController@index');
Route::get('/admin/TambahPasien','MengelolaPasienController@tambah');
Route::post('/admin/AksiTambahPasien','MengelolaPasienController@store');
Route::get('/admin/UbahPasien{id_pasien}','MengelolaPasienController@edit');
Route::post('/admin/AksiUbahPasien{id_pasien}','MengelolaPasienController@update');
Route::get('/admin/HapusPasien{id_pasien}','MengelolaPasienController@delete');

Route::get('/admin/MengelolaAdmin','MengelolaAdminController@index');
Route::get('/admin/TambahAdmin','MengelolaAdminController@tambah');
Route::post('/admin/AksiTambahAdmin','MengelolaAdminController@store');
Route::get('/admin/UbahAdmin{id_admin}','MengelolaAdminController@edit');
Route::post('/admin/AksiUbahAdmin{id_admin}','MengelolaAdminController@update');
Route::get('/admin/HapusAdmin{id_admin}','MengelolaAdminController@delete');

Route::get('/admin/MengelolaObat','MengelolaObatController@index');
Route::get('/admin/TambahObat','MengelolaObatController@tambah');
Route::post('/admin/AksiTambahObat','MengelolaObatController@store');
Route::get('/admin/UbahObat{id_obat}','MengelolaObatController@edit');
Route::post('/admin/AksiUbahObat{id_obat}','MengelolaObatController@update');
Route::get('/admin/HapusObat{id_obat}','MengelolaObatController@delete');

Route::get('/admin/MengelolaPemesanan','MengelolaPemesananController@index');
Route::get('/admin/UbahStatusPesanan{id_pemesanan}','MengelolaPemesananController@edit');
Route::post('/admin/AksiUbahStatusPesanan{id_pemesanan}','MengelolaPemesananController@update');
Route::get('/admin/HapusPemesanan{id_pemesanan}','MengelolaPemesananController@delete');
Route::get('/admin/MengelolaDetailPemesanan{id_pemesanan}','MengelolaPemesananController@detail');
Route::get('/admin/AksiKonfirmasi{id_pemesanan}','MengelolaPemesananController@konfirmasi');
Route::get('/admin/BatalPemesanan{id_pemesanan}','MengelolaPemesananController@batalkan');
Route::post('/admin/AksiDibatalkan{id_pemesanan}','MengelolaPemesananController@aksibatal');
Route::get('/admin/AksiDiambil{id_pemesanan}','MengelolaPemesananController@diambil');

Route::get('/admin/MengelolaPembayaran','MengelolaPembayaranController@index');
Route::get('/admin/AksiValidasiPembayaran{id_pemesanan}','MengelolaPembayaranController@validasiBayar');
Route::get('/admin/AksiPembayaranBatal{id_pemesanan}','MengelolaPembayaranController@BayarBatal');

Route::get('/admin/MengelolaKonsultasi','MengelolaKonsultasiController@index');
Route::get('/admin/HapusKonsultasi{id_konsultasi}','MengelolaKonsultasiController@delete');

Route::get('/admin/MengelolaAntrianDokter','MengelolaAntrianDokterController@index');
Route::get('/admin/HapusAntrian{id_antrian}','MengelolaAntrianDokterController@delete');


Route::get('Antrian','AntrianController@index');
Route::post('AksiAntrian','AntrianController@ambilAntrian');


Route::get('/admin/MengelolaPraktikDokter','MengelolaPraktikDokterController@index');
Route::get('/admin/TambahPraktikDokter','MengelolaPraktikDokterController@tambah');
Route::post('/admin/AksiTambahPraktikDokter','MengelolaPraktikDokterController@store');
Route::get('/admin/UbahPraktikDokter{id_praktik}','MengelolaPraktikDokterController@edit');
Route::post('/admin/AksiUbahPraktikDokter{id_praktik}','MengelolaPraktikDokterController@update');
Route::get('/admin/HapusPraktikDokter{id_praktik}','MengelolaPraktikDokterController@delete');
Route::get('/admin/LihatJadwal{id_praktik}','MengelolaPraktikDokterController@lihat');


Route::get('/admin/MengelolaJadwalPraktik','MengelolaJadwalPraktikController@index');
Route::get('/admin/TambahJadwal','MengelolaJadwalPraktikController@tambah');
Route::post('/admin/AksiTambahJadwal','MengelolaJadwalPraktikController@store');
Route::get('/admin/UbahJadwal{id_jadwal}','MengelolaJadwalPraktikController@edit');
Route::post('/admin/AksiUbahJadwal{id_jadwal}','MengelolaJadwalPraktikController@update');
Route::get('/admin/HapusJadwal{id_jadwal}','MengelolaJadwalPraktikController@delete');

//----------------------Admin--------------------------


//----------------------Apoteker--------------------------
Route::get('/apoteker/LoginApoteker', 'LoginApotekerController@login');
Route::get('/apoteker/DashboardApoteker', 'LoginApotekerController@index');
Route::post('/apoteker/loginPost', 'LoginApotekerController@loginPost');
Route::get('logout', 'LoginApotekerController@logout');

Route::get('/apoteker/MengelolaKonsultasi','MengelolaBalasanKonsultasiController@index');
Route::get('/apoteker/Ubah{id_konsultasi}','MengelolaBalasanKonsultasiController@edit');
Route::post('/apoteker/Aksi{id_konsultasi}','MengelolaBalasanKonsultasiController@update');
Route::get('/apoteker/HapusKonsultasi{id_konsultasi}','MengelolaBalasanKonsultasiController@delete');

Route::get('/apoteker/MengelolaKonsultasiBelumDijawab','MengelolaBalasanKonsultasiController@belumDijawab');

//----------------------Apoteker--------------------------


//----------------------Konsultasi--------------------------

Route::get('Pasien/konsultasiPasien', function () {
    return view('Pasien/konsultasiPasien');
});

Route::get('/Pasien/konsultasiPasien','KonsultasiPasienController@index');
Route::get('/Pasien/konsultasiPasien/cari','KonsultasiPasienController@cariKonsul');
Route::get('/Pasien/jawabanKonsultasi{id_konsultasi}','KonsultasiPasienController@tampilDetailKonsul');
Route::get('/Pasien/KirimPertanyaan','KonsultasiPasienController@tambah');
Route::post('/Pasien/AksiKirim','KonsultasiPasienController@store');
Route::get('/Pasien/riwayat_konsultasi', 'KonsultasiPasienController@history');



//----------------------Konsultasi--------------------------

