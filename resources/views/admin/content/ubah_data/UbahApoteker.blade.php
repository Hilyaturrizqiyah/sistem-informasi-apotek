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
                  <h6 class="m-0 font-weight-bold text-primary">Ubah Data Apoteker</h6>
                </div>
                <div class="card-body">

<form enctype="multipart/form-data" class="contact-form-area contact-page-form contact-form text-left" action="AksiUbahApoteker{{$datas->id_apoteker}}" method="post">

                    {{csrf_field()}}

                    <table>
                      <tr>
                        <td><label><b>Nama Apoteker Lama</b></label></td>
                        <td width="250"><label><b>Nama Apoteker Baru</b></label></td>
                      </tr>
                      <tr>
                        <td><input type="text" class="form-control" placeholder="kosongkan jika tidak dirubah" value="{{$datas->nama}}" readonly></td>
                        <td><input type="text" class="form-control" name="nama" placeholder="kosongkan jika tidak dirubah"></td>
                        <td></td>
                      </tr>
                    </table>
                    @if ($errors->has('nama'))
                        <span class="text-danger"><p class="text-right">* {{ $errors->first('nama') }}</p></span>
                    @endif
                    <hr>
                    <table>
                      <tr>
                        <td><label><b>Email Lama</b></label></td>
                        <td width="250"><label><b>Email Baru</b></label></td>
                      </tr>
                      <tr>
                        <td><input type="text" class="form-control" value="{{$datas->email}}" readonly></td>
                        <td><input type="text" class="form-control" name="email" placeholder="kosongkan jika tidak dirubah"></td>
                      </tr>
                    </table>
                    @if ($errors->has('email'))
                        <span class="text-danger"><p class="text-right">* {{ $errors->first('email') }}</p></span>
                    @endif
                    <hr>
                    <table>
                      <tr>
                        <td><label><b>Password Lama</b></label></td>
                        <td width="250"><label><b>Password Baru</b></label></td>
                      </tr>
                      <tr>
                        <td><input type="password" class="form-control" value="{{$datas->password}}" readonly></td>
                        <td><input type="password" class="form-control" name="password" placeholder="kosongkan jika tidak dirubah"></td>
                      </tr>
                    </table>
                    @if ($errors->has('password'))
                        <span class="text-danger"><p class="text-right">* {{ $errors->first('password') }}</p></span>
                    @endif
                    <hr>                    
                    <table>
                      <tr>
                        <td><label><b>No Telepon Lama</b></label></td>
                        <td width="250"><label><b>No Telepon Baru</b></label></td>
                      </tr>
                      <tr>
                        <td><input type="number" class="form-control" value="{{$datas->no_telepon}}" readonly></td>
                        <td><input type="text" class="form-control" name="no_telp" placeholder="kosongkan jika tidak dirubah"></td>
                      </tr>
                    </table>
                    @if ($errors->has('no_telp'))
                        <span class="text-danger"><p class="text-right">* {{ $errors->first('no_telp') }}</p></span>
                    @endif
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