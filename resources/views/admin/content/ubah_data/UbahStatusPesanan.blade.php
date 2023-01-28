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

<form class="contact-form-area contact-page-form contact-form text-left" action="AksiUbahStatusPesanan{{$datas->id_pemesanan}}" method="post">

                    {{csrf_field()}}

                    <div class="form-group">
                      <label><b>Id Pemesanan</b></label>
                      <input type="text" class="form-control" value="{{$datas->id_pemesanan}}" disabled>
                    </div>
                    <div class="form-group">
                      <label><b>Nama Pasien</b></label>
                      <input type="text" class="form-control" value="{{$datas->Pasien->nama}}" disabled>
                    </div>
                    <div class="form-group">
                      <label><b>Nomor Telepon</b></label>
                      <input type="text" class="form-control" value="{{$datas->no_telepon}}" placeholder="Masukkan Nomor Telepon" disabled>

                    </div>                   
                    <div class="form-group">
                      <label><b>Status</b></label>
                      <div class="form-select">
                        <select name="status" class="form-control">
                            <option value="">Pilih Status</option>
                            <option value="1">1. Menunggu Pembayaran</option>
                            <option value="2">2. Menunggu Konfirmasi</option>
                            <option value="3">3. Menunggu Diambil</option>
                            <option value="4">4. Selesai</option>
                            <option value="5">5. Dibatalkan</option>
                          </select>
                      </div>
                      @if ($errors->has('status'))
                        <span class="text-danger"><p class="text-right">* {{ $errors->first('status') }}</p></span>
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