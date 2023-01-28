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
                                    <div>Data Detail Praktik Dokter
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
                                    <div class="card-body">
                                        <h5 class="card-title">Data Praktik DOkter</h5>
                                        <div class="row">  
                                            <div class="col-lg-6"> 
                                            <table>
                                                <tr>
                                                    <td><label>S I P  </label></td>
                                                    <td><label>:</label></td>
                                                    <td><label><b>{{$praktik->sip}}</b></label></td></td>
                                                </tr>
                                                <tr>
                                                    <td><label>Nama Dokter  </label></td>
                                                    <td><label>:</label></td>
                                                    <td><label><b>{{$praktik->nama_dokter}}</b></label></td></td>
                                                </tr>
                                                <tr>
                                                    <td><label>Jenis Dokter  </label></td>
                                                    <td><label>:</label></td>
                                                    <td><label><b>{{$praktik->jenis_dokter}}</b></label></td></td>
                                                </tr>
                                                              
                                            </table>
                                            </div>

                                            <div class="col-lg-6">
                                            <table>
                                              <tr>
                                                <td><img width="150px" src="{{ url('admin/assets/images/praktikdokter/'.$praktik->foto) }}"></td>
                                              </tr>
                                            </table>
                                            </div>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">                           
                            <div class="col-lg-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Jadwal Praktik
                                     </h5>
                                        <table class="mb-0 table" id="example1">
                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Hari</th>
                                                <th>Waktu Mulai</th>
                                                <th>Waktu Selesai</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                    @php
                                        $no=1;
                                    @endphp
                                    @foreach($jadwal as $tampil)
                                            <tr>
                                                <td scope="row">{{$no++}}</td>
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
                                                <td>Jam : {{$tampil->waktu_mulai}}</td>
                                                <td>Jam : {{$tampil->waktu_selesai}}</td>
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