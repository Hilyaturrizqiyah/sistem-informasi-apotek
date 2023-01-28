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
                                    <div>Data Pemesanan
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
                                    <div class="card-body"><h5 class="card-title">Tabel Pemesanan
                                     </h5>
                                        <table class="mb-0 table" id="example1">
                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Id Pemesanan</th>
                                                <th>Nama Pasien</th>
                                                <th>Email</th>
                                                <th>No Telepon</th>
                                                <th>Status Pemesanan</th>
                                                <th>Metode Pembayaran</th>
                                                <th>Admin</th>
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
                                                <th scope="row">{{$no++}}</th>
                                                <td>{{$tampil->id_pemesanan}}</td>
                                                <td>{{$tampil->Pasien->nama}}</td>
                                                <td>{{$tampil->Pasien->email}}</td>
                                                <td>{{$tampil->no_telepon}}</td>
                                                <td>
                                                    @if ($tampil->status == '1')
                                                       <span class="badge badge-warning">Menunggu Pembayaran</span>
                                                  @elseif ($tampil->status == '2')
                                                       <span class="badge badge-info">Menunggu Konfirmasi</span>

                                                  @elseif ($tampil->status == '3')
                                                        <span class="badge badge-primary">Menunggu diambil</span>
                                                  @elseif ($tampil->status == '4')
                                                        <span class="badge badge-success">Selesai</span>
                                                  @elseif ($tampil->status == '5')
                                                        <span class="badge badge-danger">Dibatalkan</span>
                                                  @endif
                                                </td>
                                                <td>
                                                    @if ($tampil->metode_pembayaran == '1')
                                                       Transfer
                                                    @else($tampil->metode_pembayaran == '2')
                                                       Bayar Ditempat
                                                    @endif
                                                </td>
                                                <td>@if (isset($tampil->Admin->nama))
                                                      {{$tampil->Admin->nama}}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($tampil->status == '2')
                                                    <a class="btn btn-outline-success btn-sm" href="AksiKonfirmasi{{$tampil->id_pemesanan}}">
                                                        <i class="fas fa-check"></i>
                                                        Konfirmasi
                                                    </a>
                                                    <a class="btn btn-outline-danger btn-sm" href="BatalPemesanan{{$tampil->id_pemesanan}}">
                                                        <i class="fas fa-ban"></i>
                                                        Dibatalkan
                                                    </a>
                                                    @elseif($tampil->status == 3)
                                                    <a class="btn btn-outline-success btn-sm" href="AksiDiambil{{$tampil->id_pemesanan}}">
                                                        <i class="fas fa-check"></i>
                                                        Sudah Diambil
                                                    </a>
                                                    @endif

                                                    <a class="btn btn-outline-info" href="MengelolaDetailPemesanan{{$tampil->id_pemesanan}}">
                                                        <i class="fas fa-eye"></i>
                                                        Lihat Detail
                                                    </a>
                                                    
                                                 </td>
                                                <td>
                                                    <a href="UbahStatusPesanan{{$tampil->id_pemesanan}}" class="btn btn-warning">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <a href="HapusPemesanan{{$tampil->id_pemesanan}}" class="btn btn-danger" onclick="return confirm('Anda yakin mau menghapus item ini ?')">
                                                     <i class="fas fa-trash-alt"></i>
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