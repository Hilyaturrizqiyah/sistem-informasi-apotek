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
                                    <div>Data Pembayaran Transfer
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
                                    <div class="card-body"><h5 class="card-title">Tabel Pembayaran
                                     </h5>
                                        <table class="mb-0 table" id="example1">
                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Id Pemesanan</th>
                                                <th>Nama Pasien</th>
                                                <th>Nominal</th>
                                                <th>Bukti Transfer</th>
                                                <th>Status Pembayaran</th>
                                                <th>Opsi Validasi</th>
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
                                                <td></td>
                                                <td>@rupiah($tampil->nominal)</td>
                                                <td><a href="{{ url('admin/assets/images/transfer/'.$tampil->bukti_tf) }}">
                                                    <img width="100px" src="{{ url('admin/assets/images/transfer/'.$tampil->bukti_tf) }}">
                                                  </a>
                                                </td>
                                                <td>
                                                    
                                                    @if ($tampil->status == '1')
                                                       <span class="badge badge-info">Menunggu Validasi</span>
                                                    @elseif ($tampil->status == '2')
                                                       <span class="badge badge-primary">Berhasil</span>
                                                    @elseif ($tampil->status == '3')
                                                       <span class="badge badge-danger">Dibatalkan/Tidak sesuai</span>
                                                  @endif
                                                </td>
 
                                                <td>
                                                    @if ($tampil->status == 1)
                                                        <a class="btn btn-outline-success" href="AksiValidasiPembayaran{{$tampil->id_pemesanan}}">
                                                            <i class="fas fa-check"></i>
                                                            Validasi
                                                        </a>
                                                        <a class="btn btn-outline-danger" href="AksiPembayaranBatal{{$tampil->id_pemesanan}}">
                                                            <i class="fas fa-ban"></i>
                                                            Tidak Sesuai
                                                        </a>
                                                    @else
                                                    @endif
                                                 </td>
                                                <td>
                                                    <a href="" class="btn btn-danger" onclick="return confirm('Anda yakin mau menghapus item ini ?')">
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