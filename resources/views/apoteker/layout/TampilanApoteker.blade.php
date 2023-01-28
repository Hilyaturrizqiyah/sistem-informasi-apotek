<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Dashboard Apoteker.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">

<link href="{{ asset('admin/cssadmin.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('admin/vendors/datatables-bs4/css/dataTables.bootstrap4.css') }}">

</head>
<body>

    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        
        <!-- header-->
        @include('apoteker.layout.HeaderApoteker')    
        <!--header-->

        <div class="app-main">
                
                <!--menu-->
                @include('apoteker.layout.MenuApoteker')      
                <!--menu--> 

                <div class="app-main__outer">
                    <!-- Content -->
                    @yield('content')
                    <!-- Content -->

                    <!-- Footer -->
                    @include('apoteker.layout.FooterApoteker')    
                    <!-- Footer -->

                </div>
        </div>
    </div>

<script type="text/javascript" src="{{ asset('admin/assets/scripts/main.js') }}"></script>
<!-- jQuery -->
<script type="text/javascript" src="{{ asset('admin/vendors/jquery/jquery.min.js') }}"></script>

<!-- Page level plugins -->
    <script type="text/javascript" src="{{ asset('admin/vendors/datatables/jquery.dataTables.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/vendors/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
    <!-- Page level custom scripts -->
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
</body>
</html>
