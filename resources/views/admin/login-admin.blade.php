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
<body class="nav-md" style="background-color:#EDEDED">
    <div class="container body" style="padding:200px;width:48%">
        <!-- Default form login -->
            <form class="text-center border border-light p-5" action="" method="post">
                @csrf
                <p class="h2 mb-4">Admin | LTE</p>
                <p>Đăng nhập để tiếp tục</p>
                <input type="email" name="email" class="form-control mb-4" placeholder="E-mail" style="margin-bottom: 20px;">
                <input type="password" name="password" class="form-control mb-4" placeholder="Password">
                <button class="btn btn-info btn-block my-4" type="submit" style="margin-top: 30px;">Sign in</button>
            </form>
    <!-- Default form login -->
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
</body>
</html>