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
                                    <div>Data Praktik Dokter
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
                                    <div class="card-body"><h5 class="card-title">Tabel Praktik Dokter
                                     </h5>
                                     <a href="{{url('admin/TambahPraktikDokter')}}" class="btn btn-success" >Tambah data</a>
                                    <br><br>
                                        <table class="mb-0 table" id="example1">
                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>SIP</th>
                                                <th>Foto</th>
                                                <th>Nama Dokter</th>
                                                <th>Jenis Dokter</th>
                                                <th>Kode Antrian</th>
                                                <th>Pilih Opsi</th>
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
                                                <td>{{$tampil->sip}}</td>                                   
                                                 <td><img width="150px" src="{{ url('admin/assets/images/praktikdokter/'.$tampil->foto) }}"></td>
                                                <td>{{$tampil->nama_dokter}}</td>
                                                <td>{{$tampil->jenis_dokter}}</td>
                                                <td>{{$tampil->kode_antrian}}</td>
                                                <td>
                                                    <a class="btn btn-outline-info" href="LihatJadwal{{$tampil->id}}">
                                                        <i class="fas fa-eye"></i>
                                                        Lihat Jadwal
                                                    </a>
                                                </td>
                                                        <td>
                                                    <a href="UbahPraktikDokter{{$tampil->id}}" class="btn btn-warning">
                                                            <i class="fas fa-pencil-alt"></i>
                                                            </a>
                                                              <a href="HapusPraktikDokter{{$tampil->id}}" class="btn btn-danger" onclick="return confirm('Anda yakin mau menghapus item ini ?')">
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