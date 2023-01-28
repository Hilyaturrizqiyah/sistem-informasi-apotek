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
                  <h6 class="m-0 font-weight-bold text-primary">Tambah Data Apoteker</h6>
                </div>
                <div class="card-body">

                  <form enctype="multipart/form-data" action="{{url('admin/AksiTambahApoteker')}}" method="post">

                    {{csrf_field()}}

                    <div class="form-group">
                      <label><b>Nama</b></label>
                      <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama">
                    @if ($errors->has('nama'))
                        <span class="text-danger"><p class="text-right">* {{ $errors->first('nama') }}</p></span>
                    @endif
                    </div>
                    <div class="form-group">
                      <label><b>Email</b></label>
                      <input type="text" class="form-control" name="email" placeholder="Masukkan Email">
                      @if ($errors->has('email'))
                        <span class="text-danger"><p class="text-right">* {{ $errors->first('email') }}</p></span>
                    @endif
                    </div>
                    <div class="form-group">
                      <label><b>Password</b></label>
                      <input type="password" class="form-control" name="password"placeholder="Masukkan Password">
                      @if ($errors->has('password'))
                        <span class="text-danger"><p class="text-right">* {{ $errors->first('password') }}</p></span>
                    @endif
                    </div>
                    
                    <div class="form-group">
                      <label><b>Nomor Telepon</b></label>
                      <input type="text" class="form-control" name="no_telp" placeholder="Masukkan Nomer Telepon">
                      @if ($errors->has('no_telp'))
                        <span class="text-danger"><p class="text-right">* {{ $errors->first('no_telp') }}</p></span>
                    @endif
                    </div>
                    <div class="form-group">
                      <label><b>Alamat</b></label>
                      <textarea class="form-control" name="alamat" placeholder="Masukkan Alamat"></textarea>
                      @if ($errors->has('alamat'))
                        <span class="text-danger"><p class="text-right">* {{ $errors->first('alamat') }}</p></span>
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
                        <input type="reset" class="btn btn-secondary"  value="Batal">
                        <input type="submit" class="btn btn-primary" value="Simpan">
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