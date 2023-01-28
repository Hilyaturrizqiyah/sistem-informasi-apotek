@extends('admin.layout.TampilanAdmin')
@section('content')
    <!-- Content -->

<div class="app-main__inner"> 
  <div class="row">
    <div class="col-lg-12">
      <div class="row justify-content-center">
        <div class="col-lg-6">
            <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Ubah Data Praktik Dokter</h6>
                </div>
                <div class="card-body">

<form enctype="multipart/form-data" class="contact-form-area contact-page-form contact-form text-left" action="AksiUbahPraktikDokter{{$datas->id}}" method="post">

                    {{csrf_field()}}

                      <div class="form-group">
                      <label><b>SIP</b></label>
                      <input type="text" class="form-control" value="{{$datas->sip}}" name="sip" placeholder="Masukkan SIP">
                    @if ($errors->has('sip'))
                        <span class="text-danger"><p class="text-right">* {{ $errors->first('sip') }}</p></span>
                    @endif
                    </div>
                    <hr>
                      <div class="form-group">
                      <label><b>Nama Dokter</b></label>
                      <input type="text" class="form-control" value="{{$datas->nama_dokter}}" name="nama_dokter" placeholder="Masukkan Nama Dokter">
                    @if ($errors->has('nama_dokter'))
                        <span class="text-danger"><p class="text-right">* {{ $errors->first('nama_dokter') }}</p></span>
                    @endif
                    </div>
                    <div class="form-group">
                      <label><b>Jenis Dokter</b></label>
                      <input type="text" class="form-control" value="{{$datas->jenis_dokter}}" name="jenis_dokter" placeholder="Masukkan Jenis Dokter">
                    @if ($errors->has('nama_dokter'))
                        <span class="text-danger"><p class="text-right">* {{ $errors->first('jenis_dokter') }}</p></span>
                    @endif
                    </div>
                    <hr>
                    <table>
                      <tr>
                        <td width="450"><label><b>Foto</b></label></td>
                      </tr>
                      <tr>
                        <td>
                          <input type="file" name="foto" class="form-control" id="uploadFoto">
                          <br><label class="text-primary" for="uploadFoto">* Ukuran Maksimal 2 Mb</label>
                          <br><label class="text-primary" for="uploadFoto">* Dikosongkan jika tidak dirubah</label>
                        </td>
                      </tr>
                    </table>
                    @if ($errors->has('foto'))
                        <span class="text-danger"><p class="text-right">* {{ $errors->first('foto') }}</p></span>
                    @endif
                    <hr>
                    <div class="form-group">
                      <table>
                      <tr>
                        <td><label><b>Kode Antrian Lama</b></label></td>
                        <td width="250"><label><b>Kode Antrian Baru</b></label></td>
                      </tr>
                      <tr>
                        <td><input type="text" class="form-control" placeholder="kosongkan jika tidak dirubah" value="{{$datas->kode_antrian}}" readonly></td>
                        <td><input type="text" class="form-control" name="kode_antrian" placeholder="kosongkan jika tidak dirubah"></td>
                        <td></td>
                      </tr>
                    </table>
                    @if ($errors->has('kode_antrian'))
                        <span class="text-danger"><p class="text-right">* {{ $errors->first('kode_antrian') }}</p></span>
                    @endif
                    <br>
                    <div class="form-group"> 
                        <input type="reset" class="btn btn-secondary"  value="Batal">
                        <input type="submit" class="btn btn-primary" value="Ubah">
                    </div>
                </form>
                </div>
              </div>
        </div>
      </div>
    </div>
  </div>
</div>          

    <!-- Content -->
@endsection