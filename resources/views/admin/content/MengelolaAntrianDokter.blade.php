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
                                    <div>Data Antrian Dokter
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
                                    <div class="card-body"><h5 class="card-title">Tabel Antrian Dokter
                                     </h5>

                                        <table class="mb-0 table" id="example1">
                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Waktu</th>
                                                <th>Nomor Antrian</th>
                                                <th>Nama Pasien</th>
                                                <th>Nomor Telepon</th>
                                                <th>Alamat</th>
                                                <th>Dokter Praktik</th>
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
                                                <td>{{$tampil->created_at}}</td>
                                                <td>{{$tampil->nomor_antrian}}</td>
                                                <td>{{$tampil->nama_pasien}}</td>
                                                <td>{{$tampil->no_telepon}}</td>
                                                <td>{{$tampil->alamat}}</td>
                                                <td>{{$tampil->PraktikDokter->nama_dokter}}</td>
                                                <td>
                                                    <a href="HapusAntrian{{$tampil->id_antrian}}" class="btn btn-danger" onclick="return confirm('Anda yakin mau menghapus item ini ?')">
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
