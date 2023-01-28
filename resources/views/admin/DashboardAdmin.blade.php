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
                                    <div>Dashboard Admin
                                        <!--<div class="page-title-subheading">Tables are the backbone of almost all web applications.
                                        </div>-->
                                    </div>
                                </div>

                            </div>
                        </div>  

                        <div class="row">
                            <div class="col-lg-12">
                                <h5>Data Akun</h5>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content bg-midnight-bloom">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Data Pasien</div>
                                            <div class="widget-subheading">Pasien</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white"><span>{{count($pasien)}}</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content bg-midnight-bloom">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Data Apoteker</div>
                                            <div class="widget-subheading">Apoteker</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white"><span>{{count($apoteker)}}</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--<div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content bg-midnight-bloom">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Data Admin</div>
                                            <div class="widget-subheading">Admin</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white"><span>{{count($admin)}}</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>-->
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-lg-12">
                                <h5>Pemesanan Obat</h5>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content bg-arielle-smile">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Data Obat-obatan</div>
                                            <div class="widget-subheading">Obat</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white"><span>{{count($obat)}}</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content bg-arielle-smile">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Data Pemesanan Obat</div>
                                            <div class="widget-subheading">Pemesanan Obat</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white"><span>{{count($pemesanan)}}</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content bg-arielle-smile">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Data Pembayaran</div>
                                            <div class="widget-subheading">Pembayaran transfer</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white"><span>{{count($pembayaran)}}</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-lg-12">
                                <h5>Konsultasi</h5>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content bg-arielle-smile">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Data Konsultasi</div>
                                            <div class="widget-subheading">Konsultasi</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white"><span>{{count($konsultasi)}}</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-lg-12">
                                <h5>Antrian</h5>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content bg-arielle-smile">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Data Antrian</div>
                                            <div class="widget-subheading">Antrian Dokter</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white"><span>{{count($antrian)}}</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content bg-arielle-smile">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Data Praktik Dokter</div>
                                            <div class="widget-subheading">Praktik Dokter</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white"><span>{{count($praktikDokter)}}</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
    <!-- Content -->
@endsection