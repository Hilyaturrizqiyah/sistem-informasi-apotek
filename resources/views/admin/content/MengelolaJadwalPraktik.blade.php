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
                                    <div>Data Jadwal Praktik Dokter
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
                                    <div class="card-body"><h5 class="card-title">Tabel Jadwal Praktik Dokter
                                     </h5>
                                     <a href="{{url('admin/TambahJadwal')}}" class="btn btn-success" >Tambah data</a>
                                    <br><br>
                                        <table class="mb-0 table" id="example1">
                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Dokter</th>
                                                <th>Hari</th>
                                                <th>Waktu Mulai</th>
                                                <th>Waktu Selesai</th>
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
                                                <td>{{$tampil->PraktikDokter->nama_dokter}}</td>
                                                <td>
                                                    @if ($tampil->hari == '1')
                                                    Senin
                                                    @elseif ($tampil->hari == '2')
                                                    Selasa
                                                    @elseif ($tampil->hari == '3')
                                                    Rabu
                                                    @elseif ($tampil->hari == '4')
                                                    Kamis
                                                    @elseif ($tampil->hari == '5')
                                                    Jumat
                                                    @elseif ($tampil->hari == '6')
                                                    Sabtu
                                                    @elseif ($tampil->hari == '7')
                                                    Minggu
                                                    @endif
                                                </td>
                                                <td>{{$tampil->waktu_mulai}}</td>
                                                <td>{{$tampil->waktu_selesai}}</td>
                                                <td>
                                                    <a href="UbahJadwal{{$tampil->id}}" class="btn btn-warning">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <a href="HapusJadwal{{$tampil->id}}" class="btn btn-danger" onclick="return confirm('Anda yakin mau menghapus item ini ?')">
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