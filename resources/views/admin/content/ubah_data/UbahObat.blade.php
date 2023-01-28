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
                  <h6 class="m-0 font-weight-bold text-primary">Ubah Data Obat</h6>
                </div>
                <div class="card-body">

<form enctype="multipart/form-data" class="contact-form-area contact-page-form contact-form text-left" action="AksiUbahObat{{$datas->id_obat}}" method="post">

                    {{csrf_field()}}

                    <div class="form-group">
                      <label><b>Id Obat</b></label>
                      <input type="text" class="form-control" value="{{$datas->id_obat}}" disabled>
                    @if ($errors->has('id_obat'))
                        <span class="text-danger"><p class="text-right">* {{ $errors->first('id_obat') }}</p></span>
                    @endif
                    </div>
                    <div class="form-group">
                      <label><b>Nama Obat</b></label>
                      <input type="text" class="form-control" value="{{$datas->nama_obat}}" name="nama_obat" placeholder="Masukkan Nama Obat">
                      @if ($errors->has('nama_obat'))
                        <span class="text-danger"><p class="text-right">* {{ $errors->first('nama_obat') }}</p></span>
                    @endif
                    </div>
                    <div class="form-group">
                      <label><b>Satuan</b></label>
                      <input type="text" class="form-control" value="{{$datas->satuan}}" name="satuan"placeholder="Masukkan Satuan">
                      @if ($errors->has('satuan'))
                        <span class="text-danger"><p class="text-right">* {{ $errors->first('satuan') }}</p></span>
                    @endif
                    </div>
                    
                    <div class="form-group">
                      <label><b>Harga Modal</b></label>
                      <input type="text" class="form-control" value="{{$datas->harga_modal}}" name="harga_modal" placeholder="Masukkan Harga Modal">
                      @if ($errors->has('harga_modal'))
                        <span class="text-danger"><p class="text-right">* {{ $errors->first('harga_modal') }}</p></span>
                    @endif
                    </div>
                    <div class="form-group">
                      <label><b>Harga Jual</b></label>
                      <input type="text" class="form-control" value="{{$datas->harga_jual}}" name="harga_jual" placeholder="Masukkan Harga Jual">
                      @if ($errors->has('harga_jual'))
                        <span class="text-danger"><p class="text-right">* {{ $errors->first('harga_jual') }}</p></span>
                    @endif
                    </div>
                    <div class="form-group">
                      <label><b>Stok</b></label>
                      <input type="text" class="form-control" value="{{$datas->stok}}" name="stok" placeholder="Masukkan Stok">
                      @if ($errors->has('stok'))
                        <span class="text-danger"><p class="text-right">* {{ $errors->first('stok') }}</p></span>
                    @endif
                    </div>
                    <div class="form-group">
                      <label><b>Foto</b></label>
                      <div class="custom-file">
                        <input type="file" name="foto" id="uploadFoto">
                        <br><label class="text-primary" for="uploadFoto">* Ukuran Maksimal 2 Mb, Dikosongkan jika tidak dirubah</label>
                      </div>
                      @if ($errors->has('foto'))
                        <span class="text-danger"><p class="text-right">* {{ $errors->first('foto') }}</p></span>
                      @endif
                    </div>

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