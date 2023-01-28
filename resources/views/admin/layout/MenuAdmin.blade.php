<!--menu-->
<div class="app-sidebar sidebar-shadow">
                    <div class="app-header__logo">
                        <div class="logo-src"></div>
                        <div class="header__pane ml-auto">
                            <div>
                                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="app-header__mobile-menu">
                        <div>
                            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="app-header__menu">
                        <span>
                            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                <span class="btn-icon-wrapper">
                                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                                </span>
                            </button>
                        </span>
                    </div>    <div class="scrollbar-container">
                        <div class="app-sidebar__inner">
                            <ul class="vertical-nav-menu">
                                <li class="app-sidebar__heading">Dashboards</li>
                                <li>
                                    <a class="{{ Request::is('admin/DashboardAdmin')? "mm-active":""}}"" href="{{url ('/admin/DashboardAdmin')}}">
                                        <i class="metismenu-icon pe-7s-rocket"></i>
                                        Dashboard
                                    </a>
                                </li>
                                <li class="app-sidebar__heading">Data Akun</li>
                               <li>
                                    <!--<a class="{{ Request::is('admin/MengelolaAdmin')? "mm-active":""}}"" href="{{url ('/admin/MengelolaAdmin')}}">
                                        <i class="metismenu-icon pe-7s-diamond"></i>
                                        Admin
                                    </a>-->
                                    <a class="{{ Request::is('admin/MengelolaPasien')? "mm-active":""}}"" href="{{url ('/admin/MengelolaPasien')}}">
                                        <i class="metismenu-icon pe-7s-diamond"></i>
                                        Pasien
                                    </a>
                                    <a class="{{ Request::is('admin/MengelolaApoteker')? "mm-active":""}}"" href="{{url ('/admin/MengelolaApoteker')}}">
                                        <i class="metismenu-icon pe-7s-diamond"></i>
                                        Apoteker
                                    </a>
                                </li>
                                <li class="app-sidebar__heading">Pemesanan Obat</li>
                                <li>
                                    <a class="{{ Request::is('admin/MengelolaObat')? "mm-active":""}}"" href="{{url ('/admin/MengelolaObat')}}">
                                        <i class="metismenu-icon pe-7s-diamond"></i>
                                        Data Obat-obatan
                                    </a>
                                    <a class="{{ Request::is('admin/MengelolaPemesanan')? "mm-active":""}}"" href="{{url ('/admin/MengelolaPemesanan')}}">
                                        <i class="metismenu-icon pe-7s-diamond"></i>
                                        Pemesanan Obat
                                    </a>
                                    <a class="{{ Request::is('admin/MengelolaPembayaran')? "mm-active":""}}"" href="{{url ('/admin/MengelolaPembayaran')}}">
                                        <i class="metismenu-icon pe-7s-diamond"></i>
                                        Pembayaran Transfer
                                    </a>
                                </li>
                                <li class="app-sidebar__heading">Konsultasi</li>
                                <li>
                                    <a class="{{ Request::is('admin/MengelolaKonsultasi')? "mm-active":""}}"" href="{{url ('/admin/MengelolaKonsultasi')}}">
                                        <i class="metismenu-icon pe-7s-diamond"></i>
                                        Data Konsultasi
                                    </a>
                                </li>
                                <li class="app-sidebar__heading">Antrian</li>
                                <li>
                                    <a class="{{ Request::is('admin/MengelolaAntrianDokter')? "mm-active":""}}"" href="{{url ('/admin/MengelolaAntrianDokter')}}">
                                        <i class="metismenu-icon pe-7s-diamond"></i>
                                        Data Antrian
                                    </a>
                                </li>
                                <li>
                                    <a class="{{ Request::is('admin/MengelolaPraktikDokter')? "mm-active":""}}"" href="{{url ('/admin/MengelolaPraktikDokter')}}">
                                        <i class="metismenu-icon pe-7s-diamond"></i>
                                        Praktik Dokter
                                    </a>
                                </li>
                                <li>
                                    <a class="{{ Request::is('admin/MengelolaJadwalPraktik')? "mm-active":""}}"" href="{{url ('/admin/MengelolaJadwalPraktik')}}">
                                        <i class="metismenu-icon pe-7s-diamond"></i>
                                        Jadwal Praktik
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
<!--menu-->