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
                                    <div>Data Obat
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
                                    <div class="card-body"><h5 class="card-title">Tabel Obat
                                     </h5>
                                    <a href="{{url('admin/TambahObat')}}" class="btn btn-success" >Tambah data</a>
                                    <br><br>
                                        <table class="mb-0 table" id="example1">
                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Id Obat</th>
                                                <th>Nama Obat</th>
                                                <th>Satuan</th>
                                                <th>Harga Modal</th>
                                                <th>Harga Jual</th>
                                                <th>Stok</th>
                                                <th>Foto</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php
                                                $no=1;
                                            @endphp
                                            @foreach($datas as $tampil)
                                                    <tr>
                                                        <th scope="row">{{$no++}}</th>
                                                        <td>{{$tampil->id_obat}}</td>
                                                        <td>{{$tampil->nama_obat}}</td>
                                                        <td>{{$tampil->satuan}}</td>
                                                        <td>@rupiah($tampil->harga_modal)</td>
                                                        <td>@rupiah($tampil->harga_jual)</td>
                                                        <td>{{$tampil->stok}}</td>
                                                        <td><img width="150px" src="{{ url('admin/assets/images/obat/'.$tampil->foto) }}"></td>
                                                        <td>
                                                    <a href="UbahObat{{$tampil->id_obat}}" class="btn btn-warning">
                                                            <i class="fas fa-pencil-alt"></i>
                                                            </a>
                                                              <a href="HapusObat{{$tampil->id_obat}}" class="btn btn-danger" onclick="return confirm('Anda yakin mau menghapus item ini ?')">
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