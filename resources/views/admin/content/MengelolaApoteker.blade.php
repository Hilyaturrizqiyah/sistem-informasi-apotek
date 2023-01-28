@extends('admin.layout.TampilanAdmin')
@section('content')
<!-- Content -->

<div class="app-main__inner">
    <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                        <i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
                                        </i>
                                    </div>
                                    <div>Data Apoteker
                                        <!--<div class="page-title-subheading">Tables are the backbone of almost all web applications.
                                        </div>-->
                                    </div>
                                </div>

                            </div>
                        </div>

                    @if(\Session::has('alert-success'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        {{Session::get('alert-success')}}
                    </div>
                    @endif

                        <div class="row">                           
                            <div class="col-lg-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Tabel Apoteker
                                     </h5>
                                    <a href="{{url ('admin/TambahApoteker')}}" class="btn btn-success" >Tambah data</a>
                                    <br><br>
                                        <table class="mb-0 table table-hover" id="example1">
                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Foto</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>No Telepon</th>
                                                <th>Alamat</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                    @php
                                        $no=1;
                                    @endphp
                                    @foreach($datas as $tampil)
                                            <tr>
                                                <td scope="row">{{$no++}}</td>
                                                <td><img height="100px" src="{{ url('admin/assets/images/avatars/'.$tampil->foto) }}"></td>
                                                <td>{{$tampil->nama}}</td>
                                                <td>{{$tampil->email}}</td>
                                                <td>{{$tampil->no_telepon}}</td>
                                                <td>{{$tampil->alamat}}</td>
                                                <td>
                                                 <a href="UbahApoteker{{$tampil->id_apoteker}}" class="btn btn-warning">
                                                    <i class="fas fa-pencil-alt"></i>
                                                     </a>
                                                      <a href="HapusApoteker{{$tampil->id_apoteker}}" class="btn btn-danger" onclick="return confirm('Anda yakin mau menghapus item ini ?')">
                                                     <i class="fas fa-trash"></i>
                                                      </a>
                                                 </td>
                                            </tr>
                                    @endforeach       
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
    <!-- Content -->
@endsection