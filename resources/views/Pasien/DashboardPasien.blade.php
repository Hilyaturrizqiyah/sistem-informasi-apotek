<!DOCTYPE html>
<html lang="en">
<head>
    <title>SIAP</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,700" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('fonts/icomoon/style.css')}}">

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
                <a href="{{ url('/Pasien/DashboardPasien') }}" class="text-black"><span class="text-primary">Apotek </span>Enggal Sae</a>
            </div>

            <div class="col-12">
                <nav class="site-navigation text-right " role="navigation">

                    <ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
                        <li><a href="#home-section" class="nav-link">Pemesanan Obat</a></li>
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
                        <li class="nav-item dropdown">
                            <?php
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
                                <a href="{{ url('Pasien/riwayat_Beli') }}" class="dropdown-item"><i class="fas fa-list-ul"></i> Riwayat Pemesanan</a>
                                <a href="{{ url('Pasien/riwayat_konsultasi') }}" class="dropdown-item"><i class="fas fa-list-ul"></i> Riwayat Konsultasi</a>
                                <a class="dropdown-item" href="{{('/logoutPasien') }}"><i class="fas fa-sign-out-alt"></i> Logout </a>
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="toggle-button d-inline-block d-lg-none"><a href="#" class="site-menu-toggle py-5 js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>
        </div>
    </div>

    </header>

    <div class="site-section" id="home-section">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12">
            <div class="text-center mb-2">
                <div class="block-heading-1">
                    <span>Apotek Enggal Sae</span>
                    <h2>Pemesanan Obat</h2>
                </div>
            </div>
            </div>
        </div>
        <div class="section-title col-md-12 mb-1">
            <form action="/Pasien/DashboardPasien/cari" method="GET">
                <input class="btn btn-light col-10" type="text" name="cari" placeholder="Cari Nama Obat .." value="{{ old('cari') }}" style="box-shadow: 2px 5px rgba(128, 128, 128, 0.247);">
                <button class="btn btn-primary col-1"><i class="fa fa-search"></i></button>
            </form>
        </div>
        <br> <br>
        <div class="row">
            @foreach ($obat as $obat)
        <div class="col-lg-3 col-md-6 mb-4 mb-lg-4" data-aos="fade-up">
            <div class="block-team-member-1 text-left rounded">
                <img src="{{ url('../admin/assets/images/obat/'.$obat->foto) }}" alt="Image" width="200px" height="150px">
                <p class="px-3 mb-4 mt-3">

                        <span style="color: black">{{$obat->nama_obat}}</span> <br>
                        @if($obat->stok <=0)
                        <span class="badge badge-danger">Habis</span>
                        @else
                        <span style="color: green">Rp. {{$obat->harga_jual}}</span> <br>
                        @endif
                    <center>
                        @if($obat->stok <= 0)
                            <button class="btn btn-danger py-2 px-3" disabled><i class="fas fa-times"></i> Pesan</button>
                        @else
                        <a href="{{url('/Pasien/detailObat'.$obat->id_obat)}}" class="btn btn-primary text-black py-2 px-3" >
                            <i class="fas fa-shopping-cart"></i> Pesan</a>
                        @endif
                    </center>
                </p>
            </div>
        </div> <br> <br>
            @endforeach
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
