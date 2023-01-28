<!DOCTYPE html>
<html>
 <head>
  <title>Daftar</title>
  <link rel="icon" href="images/logo2.png">
 <!-- <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">-->
  <link rel="stylesheet" href="style.css">


 </head>
 <body>
<!-- <nav class="navbar navbar-expand-lg navbar-light">
 <a class="btn_2 d-none d-lg-block" href="{{ url('login') }}">LOGIN</a>
 </nav>-->
 	<div id="card">
			<div id="card-content">
		<div id="card-title">
		<img src="images/logo.png" alt="logo">
			<h2>Daftar</h2>
			<div class="underline-title"></div>
		</div>
		</div>
		@if(\Session::has('alert'))
                <div class="alert alert-danger mb-3" align="center" style="background-color: red; color:white; ">
                    <div>{{Session::get('alert')}}</div>
                </div>
            @endif
            @if(\Session::has('alert-success'))
                <div class="alert alert-success">
                    <div>{{Session::get('alert-success')}}</div>
                </div>
            @endif
		<form action="{{ url('/registerPasienPost') }}" method="post" class="form">
            {{ csrf_field() }}

					<label for="nama" style="padding-top:13px">&nbsp;Nama</label>
            <input id="nama" class="form-content" type="text" name="nama" autocomplete="on" />
            <div class="form-border"></div>
            @if ($errors->has('nama'))
                <span style="color: red"><p class="text-right">* {{ $errors->first('nama') }}</p></span>
            @endif

            <label for="user-email" style="padding-top:13px">&nbsp;No. HP</label>
            <input id="no_telepon" class="form-content" type="number" name="no_telepon" autocomplete="on" />
            <div class="form-border"></div>
            @if ($errors->has('no_telepon'))
                <span style="color: red""><p class="text-right">* {{ $errors->first('no_telepon') }}</p></span>
            @endif

            <label for="user-email" style="padding-top:13px">&nbsp;Alamat</label>
            <textarea id="alamat" class="form-content" type="text" name="alamat" autocomplete="on" > </textarea>
            <div class="form-border"></div>
            @if ($errors->has('alamat'))
                <span style="color: red""><p class="text-right">* {{ $errors->first('alamat') }}</p></span>
            @endif

            <label for="user-email" style="padding-top:13px">&nbsp;Email</label>
            <input id="user-email" class="form-content" type="email" name="email" autocomplete="on" />
            <div class="form-border"></div>
            @if ($errors->has('email'))
                <span style="color: red""><p class="text-right">* {{ $errors->first('email') }}</p></span>
            @endif

			<label for="user-password" style="padding-top:22px">&nbsp;Password</label>
			<input id="user-password" class="form-content" type="password" name="password" />
            <div class="form-border"></div>
            @if ($errors->has('password'))
                <span style="color: red""><p class="text-right">* {{ $errors->first('password') }}</p></span>
            @endif

            <label for="confirmation" style="padding-top:22px">&nbsp;Konfirmasi Password</label>
			<input id="confirmation" class="form-content" type="password" name="confirmation" />
            <div class="form-border"></div>
            @if ($errors->has('confirmation'))
                <span style="color: red""><p class="text-right">* {{ $errors->first('confirmation') }}</p></span>
            @endif


			<input id="submit-btn" type="submit" name="submit" value="DAFTAR" /><br> <br>
			<center>
                <a class="link" href="{{ url('/') }}">Cancel</a>
            </center>
		</form>
	  </div>
 </body>
</html>
