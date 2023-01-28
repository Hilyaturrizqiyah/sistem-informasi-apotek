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
                  <h6 class="m-0 font-weight-bold text-primary">Keterangan Dibatalkan</h6>
                </div>
                <div class="card-body">

<form class="contact-form-area contact-page-form contact-form text-left" action="AksiDibatalkan{{$datas->id_pemesanan}}" method="post">

                    {{csrf_field()}}

                    <div class="form-group">
                      <label><b>Keterangan Dibatalkan</b></label>
                      <input type="text" class="form-control" name="ket_batal" placeholder="Masukkan Keterangan Dibatalkan">
                    </div>
                    @if ($errors->has('ket_batal'))
                        <span class="text-danger"><p class="text-right">* {{ $errors->first('ket_batal') }}</p></span>
                      @endif

                    <div class="form-group"> 
                        <input type="reset" class="btn btn-secondary"  value="Reset">
                        <input type="submit" class="btn btn-danger" value="Batalkan">
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