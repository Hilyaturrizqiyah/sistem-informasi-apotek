<!DOCTYPE html>
<html lang="en">
  <head>
    <title>SIAP</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,700" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{asset('css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/bootstrap-datepicker.css')}}">

    <link rel="stylesheet" href="/fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <link rel="stylesheet" href="{{url('fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('style.css')}}">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  <div class="site-wrap"  id="home-section">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>


    <header class="site-navbar js-sticky-header site-navbar-target" role="banner">

    <div class="container">
        <div class="row align-items-center position-relative">


            <div class="site-logo">
                <a href="index.html" class="text-black"><span class="text-primary">Apotek </span>ENGGAL SAE</a>
            </div>

            <div class="col-12">
            <nav class="site-navigation text-right " role="navigation">

                <ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
                    <li><a href="{{ url('/Pasien/DashboardPasien') }}" class="nav-link">Pemesanan Obat</a></li>
                    <li><a href="{{ url('/Pasien/konsultasiPasien') }}" class="nav-link">Konsultasi</a></li>
                    <li>
                        <?php
                        $pesanan_utama = \App\ModelPemesanan::where('id_pasien', Session::get('id_pasien'))->where('status',0)->first();
                        if(!empty($pesanan_utama))
                        {
                            $notif = \App\PemesananDetailModel::where('id_pemesanan', $pesanan_utama->id_pemesanan)->count();
                        }

                        ?>
                            <a class="nav-link" href="{{ url('/Pasien/keranjangObat') }}"><i class="fa fa-shopping-cart"></i>
                            @if(!empty($notif))
                            <span class="badge badge-danger align-top" style="font-size: 10px; margin-left:-8px; margin-top:-5px; border-radius:50px">{{ $notif }}</span>
                            @endif
                            </a>
                    </li>
                    <li class="nav-item dropdown"><?php
                        $pemesanan_notif = \App\ModelPemesanan::where('id_pasien', Session::get('id_pasien'))->where('status',1)->first();
                        $pemesanan_notif2 = \App\ModelPemesanan::where('id_pasien', Session::get('id_pasien'))->where('status',5)->first();

                        if(!empty($pemesanan_notif))
                        {
                            $notifikasi = \App\ModelPemesanan::where('id_pasien', Session::get('id_pasien'))->where('status', $pemesanan_notif->status)->count();
                        }
                        if(!empty($pemesanan_notif2))
                        {
                            $notifikasi2 = \App\ModelPemesanan::where('id_pasien', Session::get('id_pasien'))->where('status', $pemesanan_notif2->status)->count();
                        }
                        ?>
                            <a href="{{ url('Pasien/riwayat_Beli') }}" class="nav-link"><i class="fas fa-bell"></i>
                                @if(!empty($pemesanan_notif && $pemesanan_notif2))
                                <span class="badge badge-danger align-top" style="font-size: 10px; margin-left:-8px; margin-top:-5px; border-radius:50px">{{ $notifikasi + $notifikasi2}}</span>
                                @elseif(!empty($pemesanan_notif ))
                                <span class="badge badge-danger align-top" style="font-size: 10px; margin-left:-8px; margin-top:-5px; border-radius:50px">{{ $notifikasi }}</span>
                                @elseif(!empty($pemesanan_notif2 ))
                                <span class="badge badge-danger align-top" style="font-size: 10px; margin-left:-8px; margin-top:-5px; border-radius:50px">{{ $notifikasi2 }}</span>

                                @else
                                <span class="badge badge-danger align-top" style="font-size: 10px; margin-left:-8px; margin-top:-5px; border-radius:50px"></span>
                                @endif
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownpro">
                                    <a href="{{ url('Pasien/riwayat_Beli') }}" class="dropdown-item">
                                        @if(!empty($notifikasi))
                                        <span class="badge badge-warning">{{$notifikasi}} Pesanan Belum Dibayar</span>
                                        @else
                                        <span class="badge badge-warning">Tidak ada pesanan yang belum dibayar</span>
                                        @endif
                                    </a>
                                    <a href="{{ url('Pasien/riwayat_Beli') }}" class="dropdown-item">
                                        @if(!empty($notifikasi2))
                                        <span class="badge badge-danger">{{$notifikasi2}} Pesanan Dibatalkan</span>
                                        @else
                                        <span class="badge badge-warning">Tidak ada pesanan yang dibatalkan</span>
                                        @endif
                                    </a>
                                </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle"  id="navbarDropdownpro" href="#"
                            role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{Session::get('nama')}}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownpro">
                            <center>
                            <a href="{{ url('/Pasien/riwayat_Beli') }}" class="dropdown-item"><i class="fas fa-list-ul"></i> Riwayat</a>
                            <a class="dropdown-item" href="{{('/logoutPasien') }}"><i class="fas fa-sign-out-alt"></i> Logout </a>
                            </center>
                        </div>
                    </li>
              </ul>
              </nav>

            </div>

          <div class="toggle-button d-inline-block d-lg-none"><a href="#" class="site-menu-toggle py-5 js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

        </div>
      </div>

    </header>
<br>
    <div class="container">
        <a href="{{ url('Pasien/riwayatBeli') }}" class="btn_2"><i class="fas fa-arrow-left"></i> Kembali</a><br><br>

    <div class="row">

        <div class="col-12">
            <div class="card">
            @if($pemesanan->status==1)
                <div class="card-body">
                    <h3 style="color : green">Pemesanan Sukses</h3>
                    <h5>Pemesanan anda sudah dicheck out selanjutnya untuk pembayaran silahkan transfer
                    di rekening <strong>Bank BRI Nomer Rekening : <strong style="color: blue">
                    0165-0107-0111-508</strong> atas nama <strong style="color: blue">Dr. Ani</strong> </strong>
                    dengan nominal : <strong style="color: blue">Rp. {{ number_format($total)}}</strong><br>
                    </h5>

                </div>
                @elseif($pemesanan->status==2)
                <div class="card-body">
                    <h5 style="color : blue">Menunggu Konfirmasi dari pihak Apotek Enggal Sae</h5>
                </div>
                @elseif($pemesanan->status==3)
                <div class="card-body">
                    <h3 style="color : green">Pembayaran Sukses</h3>
                    <h5>Bukti Pembayaran sudah di konfirmasi, Silahkan ambil pemesanan obat pada Apotek Enggal Sae
                    di<i class="fas fa-map-marker-alt"></i><strong style="color: blue"> Jalan Raya Jatibarang (Apotek Enggal Sae)</strong>
                </div>
                @elseif($pemesanan->status==4)
                <div class="card-body">
                    <h3 style="color : green">Selesai</h3>
                    <h5>Pesanan Anda Telah Selesai, Terimakasih^^
                </div>
                @elseif($pemesanan->status==5)
                <div class="card-body">
                    <h3 style="color : red"><i class="fas fa-exclamation-triangle"></i> Pemesanan Di Batalkan</h3>
                </div>
                @endif
            </div>
    </div>
    <div class="col-7 mt-3">
        <div class="card">
            <div class="card-body">
                <H4><i class="fas fa-clipboard"></i> Detail Pemesanan</H4>
            <div class="outtable">
                    <table class="table table-responsive">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th><center>Foto</center></th>
                            <th>Nama Obat</th>
                            <th>Jumlah Beli</th>
                            <th>Harga</th>
                            <th>Jumlah Harga</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $no = 1;
                        ?>
                        @foreach($pemesanan_detail as $pemesanan_detail)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>
                                    <img src="{{ url('admin/assets/images/obat/'.$pemesanan_detail->obat->foto) }}" style="width : 100px;">
                                </td>
                                <td>{{$pemesanan_detail->obat->nama_obat}}</td>
                                <td>{{$pemesanan_detail->jumlah}}</td>
                                <td>Rp.{{number_format($pemesanan_detail->obat->harga_jual)}}</td>
                                <td>Rp.{{number_format($pemesanan_detail->harga_jumlah)}}</td>

                            </tr>
                        @endforeach
                            <tr class="mt-3">
                                <td><a href="{{url ('/Pasien/cetak_pdf')}}/{{$pemesanan->id_pemesanan}}" class="btn btn-primary"><i class="fas fa-file-pdf"></i> PDF</a></td>
                                <td colspan="4" align="right"><i class="fas fa-coins"></i> Total Yang Harus Di Bayar :</td>
                                <td>Rp.{{number_format($total)}}</td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
            </div>
        </div>
    </div>
    <div class="col-5 mt-3">
        <div class="card">
            <div class="card-body">
            @if($pemesanan->status == 1)
                <H4><i class="fas fa-mobile-alt"></i> Upload Bukti Transfer</H4>

                <form action="{{ url('buktiTf')}}/{{ $pemesanan->id_pemesanan }}" method="post" enctype="multipart/form-data">
                @csrf
                <table class="table">
                    <tr>
                        <td><strong>Atas Nama</strong> </td>
                        <td width="15px">:</td>
                        <td><input class="form-control" value="{{Session::get('nama')}} " ReadOnly></td>
                    </tr>
                    <tr>
                        <td><strong>Bukti Pembayaran</strong></td>
                        <td>:</td>
                        <td><input type="file" id="bukti_tf" name="bukti_tf" class="form-control-file" required></td>
                    </tr>
                </table>
                <div class="col-12 float-right" align="right">
                    <tr>
                        <td>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-mobile-alt"></i>  Upload</button>
                        </td>
                    </tr>
                </div>
                </form>
               @elseif($pemesanan->status == 2)
                <div>
                    <h4><i class="fas fa-calendar"></i> Detail Tanggal</h4>
                    <table class="table">
                        <tr>
                            <td><i class="fas fa-calendar-plus"></i> Tanggal Pembelian</td>
                            <td>:</td>
                            <td>{{ $pemesanan->waktu}}</td>
                        </tr>
                    </table>
                </div>
                @elseif($pemesanan->status == 3)
                <div>
                    <h4><i class="fas fa-calendar"></i> Detail Tanggal</h4>
                    <table class="table">
                        <tr>
                            <td><i class="fas fa-calendar-plus"></i> Tanggal Pembelian</td>
                            <td>:</td>
                            <td>{{ $pemesanan->waktu}}</td>
                        </tr>
                    </table>
                </div>
                @elseif($pemesanan->status == 4)
                <div>
                    <h4><i class="fas fa-calendar"></i> Detail Tanggal</h4>
                    <table class="table">
                        <tr>
                            <td><i class="fas fa-calendar-plus"></i> Tanggal Pembelian</td>
                            <td>:</td>
                            <td>{{ $pemesanan->waktu}}</td>
                            <td>
                                <p></p>
                            </td>
                        </tr>
                    </table>
                    <p>Terimakasih sudah berbelanja di Apotek kami^^</p>
                </div>
                @elseif($pemesanan->status == 5)
                <div>
                    <h4><i class="fas fa-calendar"></i> Detail Tanggal</h4>
                    <table class="table">
                        <tr>
                            <td><i class="fas fa-calendar-plus"></i> Tanggal Pembelian</td>
                            <td>:</td>
                            <td>{{ $pemesanan->waktu}}</td>
                        </tr>
                    </table>
                    <p>Pemesanan Produk Di Batalkan dikarenakan belum membayar atau melakukan konfirmasi kepada pihak
                    Apotek Enggal Sae sampai tanggal <strong style="color: red">{{ $pemesanan->waktu }}</strong></p>
                </div>
                @endif

            </div>
        </div>
    </div>

        </div>

  </div>


  @include('sweet::alert')


    <script src="{{ asset ('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset ('js/jquery-ui.js') }}"></script>
    <script src="{{ asset ('js/popper.min.js') }}"></script>
    <script src="{{ asset ('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset ('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset ('js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset ('js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset ('js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset ('js/jquery.sticky.js') }}"></script>
    <script src="{{ asset ('js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset ('js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset ('js/aos.js') }}"></script>

    <script src="{{ asset ('js/main.js') }}"></script>

    </body>
</html>

