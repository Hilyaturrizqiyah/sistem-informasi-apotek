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
                  <h6 class="m-0 font-weight-bold text-primary">Ubah Data Jadwal</h6>
                </div>
                <div class="card-body">

                  <form action="AksiUbahJadwal{{$datas->id}}" method="post">

                    {{csrf_field()}}

                    <div class="form-group">
                      <label><b>Dokter Praktik</b></label>
                      <select name="dokter" class="form-control">
                          <option value="">Pilih Dokter</option>
                          @foreach($dokters as $dokter)
                          <option value="{{$dokter->id}}" {{ ($datas->id_praktik == $dokter->id) ? 'selected' : ''}}>{{$dokter->nama_dokter}}</option>
                          @endforeach
                        <select>
                    @if ($errors->has('dokter'))
                        <span class="text-danger"><p class="text-right">* {{ $errors->first('dokter') }}</p></span>
                    @endif
                    </div>
                    <div class="form-group">
                      <label><b>Hari</b></label>
                      <select name="hari" class="form-control">
                        <option value="">Pilih Hari</option>
                        <option value="1" {{ ($datas->hari == '1') ? 'selected' : ''}}>Senin</option>
                        <option value="2" {{ ($datas->hari == '2') ? 'selected' : ''}}>Selasa</option>
                        <option value="3" {{ ($datas->hari == '3') ? 'selected' : ''}}>Rabu</option>
                        <option value="4" {{ ($datas->hari == '4') ? 'selected' : ''}}>Kamis</option>
                        <option value="5" {{ ($datas->hari == '5') ? 'selected' : ''}}>Jumat</option>
                        <option value="6" {{ ($datas->hari == '6') ? 'selected' : ''}}>Sabtu</option>
                        <option value="7" {{ ($datas->hari == '7') ? 'selected' : ''}}>Minggu</option>
                      </select>
                      @if ($errors->has('hari'))
                        <span class="text-danger"><p class="text-right">* {{ $errors->first('hari') }}</p></span>
                    @endif
                    </div>
                    <div class="form-group">
                      <label><b>Waktu Mulai</b></label>
                      <input type="time" class="form-control" name="waktu_mulai"placeholder="Masukkan Waktu Selesai" value="{{$datas->waktu_mulai}}">
                      @if ($errors->has('waktu_mulai'))
                        <span class="text-danger"><p class="text-right">* {{ $errors->first('waktu_mulai') }}</p></span>
                    @endif
                    </div>
                    
                    <div class="form-group">
                      <label><b>Waktu Selesai</b></label>
                      <input type="time" class="form-control" name="waktu_selesai" placeholder="Masukkan Waktu Mulai" value="{{$datas->waktu_selesai}}">
                      @if ($errors->has('waktu_selesai'))
                        <span class="text-danger"><p class="text-right">* {{ $errors->first('waktu_selesai') }}</p></span>
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