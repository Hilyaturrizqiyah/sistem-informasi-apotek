<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Dashboard Apoteker</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">

<link href="{{ asset('admin/cssadmin.css') }}" rel="stylesheet">
</head>
<body>
    <div class="align-content-center">
        @if(\Session::has('alert'))
                    <div class="alert alert-danger alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      <h6><i class="fas fa-ban"></i><b> Peringatan !</b></h6>
                      {{Session::get('alert')}}
                    </div>
                  @endif
                  @if(\Session::has('alert-success'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <h6><i class="fas fa-sign-out-alt"></i><b> Success!!</b></h6>
                        {{Session::get('alert-success')}}
                    </div>
                  @endif
    
        <div class="align-content-center col-md-8 text-center">
            <div class="main-card card align-center">
                <div class="card-body"><h5 class="card-title">Login Apoteker</h5>
                    <form class="user" method="post" action="{{url('apoteker/loginPost')}}" >
                        {{csrf_field()}}
                        <div class="form-group">
                            <input type="text" id="email" name="email" class="form-control"         placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input type="password" id="password" name="password" class="form-control"placeholder="Password">
                        </div>
                   
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Login">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
<script type="text/javascript" src="{{ asset('admin/assets/scripts/main.js') }}"></script>
</html>
