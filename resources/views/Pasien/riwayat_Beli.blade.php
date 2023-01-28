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
                            <a href="{{ url('/Pasien/riwayat_Beli') }}" class="dropdown-item text-white"><i class="fas fa-list-ul"></i> Riwayat</a>
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

    <div class="container">
        <a href="{{ url('Pasien/DashboardPasien') }}" class="btn_2"><i class="fas fa-arrow-left"></i> Kembali</a><br><br>

    <div class="row">

    <div class="col-12">
        <div class="card" style="box-shadow: 2px 5px 5px  rgba(128, 128, 128, 0.247);">
            <div class="card-body">
                <H4><i class="fas fa-shopping-cart"></i> Riwayat Pemesanan</H4>

                    <table class="table">

                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Pesanan</th>
                            <th>Tanggal Pembelian</th>
                            <th>Metode Pembayaran</th>
                            <th>Status</th>
                            <th>Detail</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $no = 1;
                        ?>
                        @foreach($pemesanan as $pemesanan)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $pemesanan->id_pemesanan }}</td>
                                <td>{{ $pemesanan->waktu}}</td>
                                <td>
                                    @if($pemesanan->metode_pembayaran == 1)
                                    <span>Transfer</span>
                                    @else
                                    <span>Bayar Ditempat</span>
                                    @endif
                                </td>
                                <td>
                                    @if($pemesanan->status == 1)
                                    <span class="badge badge-warning">Sudah Pesan & Menunggu Pembayaran</span>
                                    @elseif($pemesanan->status == 2)
                                    <span class="badge text-white" style="background-color: blue">Menunggu Konfirmasi</span>
                                    @elseif($pemesanan->status == 3)
                                    <span class="badge text-white" style="background-color: #3f6ad8">Menunggu di ambil</span>
                                    @elseif($pemesanan->status == 4)
                                    <span class="badge badge-success"> Selesai</span>
                                    @else
                                    <span class="badge badge-danger"> Dibatalkan</i></span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ url('history')}}/{{ $pemesanan->id_pemesanan}}" class="btn btn-primary"><i class="fa fa-info"></i> Detail</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </div>

        </div>

  </div><br><br>


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
