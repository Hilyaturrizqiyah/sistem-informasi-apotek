@extends('apoteker.layout.TampilanApoteker')
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
                  <h6 class="m-0 font-weight-bold text-primary">Ubah Data Apoteker</h6>
                </div>
                <div class="card-body">

<form enctype="multipart/form-data" class="contact-form-area contact-page-form contact-form text-left" action="Aksi{{$datas->id_konsultasi}}" method="post">

                    {{csrf_field()}}

                    <table>
                      <tr>
                        <td><label><b>Nama</b></label></td>
                      </tr>
                      <tr>
                        <td>{{$datas->Pasien->nama}}</td>
                        <!-- <td><input type="text" class="form-control" value="{{$datas->Pasien->nama}}" readonly></td> -->
                      </tr>
                    </table>
                    <hr>
                    <table>
                      <tr>
                        <td><label><b>Pertanyaan</b></label></td>
                      </tr>
                      <tr>
                        <td>{{$datas->pertanyaan}}</td>
                      </tr>
                    </table>
                    <hr>
                    <table>
                      <tr>
                        <td><label><b>Jawaban</b></label></td>
                      </tr>
                      <tr>
                        @if(isset($datas->jawaban))
                          <td>{{$datas->jawaban}}</td>
                        @else
                          <td><span class="badge badge-danger">Belum dijawab</span></td>
                        @endif
                      </tr>
                    </table>
                    <hr>
                    <table>
                      <tr>
                        <label><b>Tambah/Edit Jawaban</b></label>
                        <textarea class="form-control" name="jawaban" placeholder="Masukkan Jawaban"></textarea>
                          @if ($errors->has('jawaban'))
                          <span class="text-danger"><p class="text-right">* {{ $errors->first('jawaban') }}</p></span>
                          @endif
                      </tr>
                    </table>
                   
                    <hr>

                    <div class="form-group"> 
                        <input type="reset" class="btn btn-secondary"  value="Batal">
                        <input type="submit" class="btn btn-primary" value="Jawab">
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