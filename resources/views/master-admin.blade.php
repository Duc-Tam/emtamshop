<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/favicon.ico" type="image/ico"/>
    @yield('title')
    <!-- Bootstrap -->
    <link href="{{asset('admins/asset/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('admins/css/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('admins/asset/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{asset('admins/asset/iCheck/skins/flat/green.css')}}" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="{{asset('admins/asset/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="{{asset('admins/css/custom.min.css')}}" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="{{asset('admins/css/mycss.css')}}" rel="stylesheet">
    <link href="{{asset('admins/css/select2.min.css')}}" rel="stylesheet">
    @yield('css')
</head>
<body class="nav-md">
<div class="container body">
    <div class="main_container">
        @include('partials.siderbar')
        <!-- top navigation -->
        @include('partials.header')
        <!-- /top navigation -->
        <!-- page content -->
        @yield('content')
        <!-- /page content -->
        <!-- footer -->
        @include('partials.footer')
        <!-- /footer -->
    </div>
</div>
<!-- jQuery -->
<script src="{{asset('admins/js/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('admins/asset/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('admins/js/fastclick/lib/fastclick.js')}}"></script>
<!-- NProgress -->
<script src="{{asset('admins/asset/nprogress/nprogress.js')}}"></script>
<!-- bootstrap-progressbar -->
<script src="{{asset('admins/asset/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
<!-- iCheck -->
<script src="{{asset('admins/asset/iCheck/icheck.min.js')}}"></script>
<!-- Custom Theme Scripts -->
<script src="{{asset('admins/js/custom.min.js')}}"></script>
<!---->
@yield('js')
</body>
</html>