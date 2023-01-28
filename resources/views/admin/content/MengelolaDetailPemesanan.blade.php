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
                                    <div>Data Detail Pemesanan
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
                                        <h5 class="card-title">Data Pemesanan</h5>
                                        <div class="row">  
                                            <div class="col-lg-6"> 
                                            <table>
                                                <tr>
                                                    <td><label>Id Pemesanan  </label></td>
                                                    <td><label>:</label></td>
                                                    <td><label><b>{{$datas->id_pemesanan}}</b></label></td></td>
                                                </tr>
                                                <tr>
                                                    <td><label>Status Pemesanan  </label></td>
                                                    <td><label>:</label></td>
                                                    <td><label>
                                                @if ($datas->status == '1')
                                                       <span class="badge badge-warning">Menunggu Pembayaran</span>
                                                  @elseif ($datas->status == '2')
                                                       <span class="badge badge-info">Menunggu Konfirmasi</span>
                                                       <a class="btn btn-outline-success btn-sm" href="AksiKonfirmasi{{$datas->id_pemesanan}}">
                                                        <i class="fas fa-check"></i>
                                                        Konfirmasi
                                                    </a>

                                                  @elseif ($datas->status == '3')
                                                        <span class="badge badge-primary">Menunggu diambil</span>
                                                        <a class="btn btn-outline-success btn-sm" href="AksiDiambil{{$datas->id_pemesanan}}">
                                                        <i class="fas fa-check"></i>
                                                        Sudah Diambil
                                                    </a>
                                                  @elseif ($datas->status == '4')
                                                        <span class="badge badge-success">Selesai</span>
                                                  @elseif ($datas->status == '4')
                                                        <span class="badge badge-danger">Dibatalkan</span>
                                                  @endif

                                                </label></td>
                                              </tr>                  
                                            </table>
                                            </div>

                                            <div class="col-lg-6">
                                            <table>
                                              <tr>
                                                <td><label>Nama Penyewa   </label></td>
                                                <td><label>:</label></td>
                                                <td><label><b>{{$datas->Pasien->nama}}</b></label></td>
                                              </tr>
                                              <tr>
                                                <td><label>Nomor Telepon   </label></td>
                                                <td><label>:</label></td>
                                                <td><label><b>{{$datas->no_telepon}}</b></label></td>
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
                                    <div class="card-body"><h5 class="card-title">Data Obat
                                     </h5>
                                        <table class="mb-0 table" id="example1">
                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Gambar</th>
                                                <th>Nama Obat</th>
                                                <th>Harga</th>
                                                <th>Jumlah</th>
                                                <th>Total Harga</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                    @php
                                        $no=1;
                                    @endphp
                                    @foreach($datas->DetailPemesanan as $tampil)
                                            <tr>
                                                <th scope="row">{{$no++}}</th>
                                                <td><img width="100px" src="{{ url('admin/assets/images/obat/'.$tampil->Obat->foto) }}"></td>
                                                <td>{{$tampil->Obat->nama_obat}}</td>
                                                <td>@rupiah($tampil->Obat->harga_jual)</td>
                                                <td>{{$tampil->jumlah}}</td>
                                                <td>@rupiah($tampil->harga_jumlah)</td>
                                            </tr>
                                    @endforeach       
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th>Total</th>
                                                <th>@rupiah($total)</th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
    <!-- Content -->
@endsection