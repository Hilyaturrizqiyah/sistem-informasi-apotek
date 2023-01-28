<!DOCTYPE html>
<html lang="en">
  <head>
    <title>SIAPES</title>
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
                <li><a href="{{ url('/') }}" class="nav-link">Beranda</a></li>
                <li><a href="{{ url('/') }}" class="nav-link">Pelayanan</a></li>
                <li><a href="{{ url('/') }}" class="nav-link">Tentang</a></li>
                <li><a href="{{ url('/') }}" class="nav-link">Dokter</a></li>
                <li><a href="{{ url('/AmbilNomorAntrian') }}" class="nav-link">Antrian</a></li>
                <li><a href="{{ url('/obat') }}" class="nav-link">Pemesanan Obat</a></li>
                <li><button class="nav-link btn btn-primary py-1 px-3" data-toggle="modal" data-target="#login">Login</button></li>

              </ul>
              </nav>

            </div>

          <div class="toggle-button d-inline-block d-lg-none"><a href="#" class="site-menu-toggle py-5 js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

        </div>
      </div>

    </header>

    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12">
            <div class="text-center mb-5">
              <div class="block-heading-1">
                <span>Apotek Enggal Sae</span>
                 <h2>Detail Nomor Antrian</h2>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="block-team-member-1 text-left rounded" style="border: 5px solid grey; width: 400px;">
                  <center><h2>Apotek Enggal Sae</h2><hr>
                    <p class="px-3 mb-4 mt-3">
                      <span style="color: black;">Nomor Antrian</span> <br>
                        <h1 style="color: green">? - ?</h1> <br>
                    </p>
                  </center>
                </div>
              </div>

              <div class="col-lg-6">
                  <form action="{{url('formAntrianPost')}}" method="post">

                    {{csrf_field()}}

                    <div class="form-group">
                      <label><b>Dokter</b></label>
                      <select name="dokter" class="form-control">
                          <option value="">Pilih Dokter</option>
                          @foreach($jadwalhari as $dokter)
                      <option value="{{$dokter->PraktikDokter->id_praktik}}">{{$dokter->PraktikDokter->nama_dokter}}</option>
                      @endforeach
                        </select>
                    @if ($errors->has('dokter'))
                        <span class="text-danger"><p class="text-right">* {{ $errors->first('dokter') }}</p></span>
                    @endif
                    </div>
                    <div class="form-group">
                      <label><b>Nama Pasien</b></label>
                      <input type="text" class="form-control" name="nama_pasien"placeholder="Masukkan Nama Pasien">
                      @if ($errors->has('nama_pasien'))
                        <span class="text-danger"><p class="text-right">* {{ $errors->first('nama_pasien') }}</p></span>
                    @endif
                    </div>

                    <div class="form-group">
                      <label><b>Nomor Telepon</b></label>
                      <input type="text" class="form-control" name="no_telp" placeholder="Masukkan Nomer Telepon">
                      @if ($errors->has('no_telp'))
                        <span class="text-danger"><p class="text-right">* {{ $errors->first('no_telp') }}</p></span>
                    @endif
                    </div>
                    <div class="form-group">
                      <label><b>Alamat</b></label>
                      <textarea class="form-control" name="alamat" placeholder="Masukkan Alamat"></textarea>
                      @if ($errors->has('alamat'))
                        <span class="text-danger"><p class="text-right">* {{ $errors->first('alamat') }}</p></span>
                    @endif
                    </div>

                    <div class="form-group"> 
                        <input type="reset" class="btn btn-secondary"  value="Batal">
                        <input type="submit" class="btn btn-primary" value="Ambil Antrian">
                    </div>

                  </form>
              </div>
            </div>

          </div>
        </div>

        </div>
      </div>
    </div>




    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-5">
                <h2 class="footer-heading mb-4">About Us</h2>
                <p>Apotek Enggal Sae Jatibarang Indramayu Jawa Barat</p>
              </div>
              <div class="col-md-3 ml-auto">
                <h2 class="footer-heading mb-4">Features</h2>
                <ul class="list-unstyled">
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Services</a></li>
                  <li><a href="#">Testimonials</a></li>
                  <li><a href="#">Contact Us</a></li>
                </ul>
              </div>
              <!-- <div class="col-md-3">

              </div> -->
            </div>
          </div>
          <div class="col-md-4 ml-auto">

            <div class="mb-5">
              <h2 class="footer-heading mb-4">Subscribe to Newsletter</h2>
              <form action="#" method="post">
                <div class="input-group mb-3">
                  <input type="text" class="form-control border-secondary text-white bg-transparent" placeholder="Enter Email" aria-label="Enter Email" aria-describedby="button-addon2">
                  <div class="input-group-append">
                    <button class="btn btn-primary text-white" type="button" id="button-addon2">Subscribe</button>
                  </div>
                </div>
              </div>


              <h2 class="footer-heading mb-4">Follow Us</h2>
                <a href="" class="smoothscroll pl-0 pr-3"><span class="icon-facebook"></span></a>
                <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
            </form>
          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class="border-top pt-5">
            <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
            </div>
          </div>

        </div>
      </div>
    </footer>

  </div>

<!-- Modal -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Login</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div >
            <div id="card-title">
            <img src="images/logo.png" alt="logo">

                <div class="underline-title"></div>
            </div>
            </div>
            @if(\Session::has('alert'))
                <div class="alert alert-danger">
                    <div><i class="fas fa-ban"></i>{{Session::get('alert')}}</div>
                </div>
            @endif
            @if(\Session::has('alert-success'))
                <div class="alert alert-success">
                    <div><i class="fas fa-sign-out-alt"></i>{{Session::get('alert-success')}}</div>
                </div>
            @endif
            <form action="{{ url('/loginPasienPost') }}" method="post" class="form">
                {{ csrf_field() }}
            <label for="user-email" style="padding-top:13px">&nbsp;Email</label>
                <input
                id="user-email"
                class="form-content"
                type="email"
                name="email"
                autocomplete="on"
                required />
                <div class="form-border"></div>
                <label for="user-password" style="padding-top:22px">&nbsp;Password</label>
                <input
                id="user-password"
                class="form-content"
                type="password"
                name="password"
                required />
                <div class="form-border"></div>
                <div class="text-right mt-3">
                    <p>Belum Punya Akun?
                        <a href="{{ url('daftar') }}"> Daftar</a>
                    </p>
                </div>
                <input id="submit-btn" type="submit" name="submit" value="LOGIN" />

            </form>
          </div>
        <div class="modal-footer">
          <!--<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="button" class="btn btn-primary">Login</button>-->
        </div>
      </div>
    </div>
  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/jquery.sticky.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/main.js"></script>

  </body>
</html>
