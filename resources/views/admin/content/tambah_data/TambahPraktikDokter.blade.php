@extends('admin.layout.TampilanAdmin')
@section('content')
<!-- Content -->

<div class="app-main__inner"> 
    <div class="row">
            <div class="col-md-6 col-xl-6">
              <div class="card mb-5">
                <div class="card-header py-4 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Tambah Data Praktik Dokter</h6>
                </div>
                <div class="card-body">

                  <form enctype="multipart/form-data" action="{{url('admin/AksiTambahPraktikDokter')}}" method="post">

                    {{csrf_field()}}

                    <div class="form-group">
                      <label><b>SIP</b></label>
                      <input type="text" class="form-control" name="sip" placeholder="Masukkan SIP">
                    @if ($errors->has('sip'))
                        <span class="text-danger"><p class="text-right">* {{ $errors->first('sip') }}</p></span>
                    @endif
                    </div>
                    <div class="form-group">
                      <label><b>Nama Dokter</b></label>
                      <input type="text" class="form-control" name="nama_dokter" placeholder="Masukkan Nama Dokter">
                      @if ($errors->has('nama_dokter'))
                        <span class="text-danger"><p class="text-right">* {{ $errors->first('nama_dokter') }}</p></span>
                    @endif
                    </div>
                    
                    <div class="form-group">
                      <label><b>Jenis Dokter </b></label>
                      <input type="text" class="form-control" name="jenis_dokter" placeholder="Masukkan Jenis Dokter ">
                      @if ($errors->has('jenis_dokter'))
                        <span class="text-danger"><p class="text-right">* {{ $errors->first('jenis_dokter') }}</p></span>
                    @endif
                    </div>
                    <div class="form-group">
                      <label><b>Foto</b></label>
                      <div class="custom-file">
                        <input type="file" name="foto" id="uploadFoto">
                        <br><label class="text-primary" for="uploadFoto">* Ukuran Maksimal 2 Mb, Boleh dikosongkan jika tidak ada</label>
                      </div>
                      @if ($errors->has('foto'))
                        <span class="text-danger"><p class="text-right">* {{ $errors->first('foto') }}</p></span>
                      @endif
                    </div>
                    <div class="form-group">
                      <label><b>Kode Antrian</b></label>
                      <input type="text" class="form-control" name="kode_antrian" placeholder="Masukkan Kode Antrian">
                      @if ($errors->has('kode_antrian'))
                        <span class="text-danger"><p class="text-right">* {{ $errors->first('kode_antrian') }}</p></span>
                    @endif
                    </div>

                </div>
              </div>
            </div>
            
            <div class="col-md-6 col-xl-6">
              <div class="card mb-5">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Tambah Data Jadwal</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                      <label><b>Pilih Hari dan Waktu yang sama</b></label><br>
                        <input type="checkbox" name="hari[1]" value="1">  Senin &nbsp;&nbsp;
                        <input type="checkbox" name="hari[2]" value="2">  Selasa &nbsp;&nbsp;
                        <input type="checkbox" name="hari[3]" value="3">  Rabu &nbsp;&nbsp;
                        <input type="checkbox" name="hari[4]" value="4">  Kamis &nbsp;&nbsp;
                        <input type="checkbox" name="hari[5]" value="5">  Jumat &nbsp;&nbsp;
                        <input type="checkbox" name="hari[6]" value="6">  Sabtu &nbsp;&nbsp;
                        <input type="checkbox" name="hari[7]" value="7">  Minggu &nbsp;&nbsp;

                        @if ($errors->has('hari'))
                            <span class="text-danger"><p class="text-right">* {{ $errors->first('hari') }}</p></span>
                        @endif
                    </div>

                    <div class="form-group">
                      <label><b>Waktu Mulai</b></label>
                      <input type="time" class="form-control" name="waktu_mulai"placeholder="Masukkan Satuan">
                      @if ($errors->has('waktu_mulai'))
                        <span class="text-danger"><p class="text-right">* {{ $errors->first('waktu_mulai') }}</p></span>
                    @endif
                    </div>
                    
                    <div class="form-group">
                      <label><b>Waktu Selesai</b></label>
                      <input type="time" class="form-control" name="waktu_selesai" placeholder="Masukkan Harga Modal">
                      @if ($errors->has('waktu_selesai'))
                        <span class="text-danger"><p class="text-right">* {{ $errors->first('waktu_selesai') }}</p></span>
                    @endif
                    </div>


                    <div class="form-group"> 
                        <input type="reset" class="btn btn-secondary"  value="Batal">
                        <input type="submit" class="btn btn-primary" value="Simpan">
                    </div>

                  </form>
                </div>
              </div>
            </div>

        </div>


</div>          
                    
      
    <!-- Content -->
@endsection