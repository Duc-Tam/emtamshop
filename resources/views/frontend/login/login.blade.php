@extends('master-frontend')
@section('content')
@section('css')
    <link rel="stylesheet" href="{{ asset('frontend/product/home/image.css') }}">
@endsection
<!-- ============================================== SCROLL TABS ============================================== -->
<div class="container">
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="home.html">Home</a></li>
                    <li class='active'>Login</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->
    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                @endif
    <div class="body-content">
        <div class="container">
            <div class="sign-in-page">
                <div class="row">
                    <!-- Sign-in -->			
    <div class="col-md-6 col-sm-6 sign-in">
        <h4 class="">Đăng nhập</h4>
        <p class="">Hello, Welcome to your account.</p>
        <div class="social-sign-in outer-top-xs">
            <a href="#" class="facebook-sign-in"><i class="fa fa-facebook"></i> Đăng nhập với Facebook</a>
            <a href="#" class="twitter-sign-in"><i class="fa fa-twitter"></i> Đăng nhập với Twitter</a>
        </div>
        <form action="{{ route('account.postlogin') }}" method="post" class="register-form outer-top-xs" role="form">
            @csrf
            <div class="form-group {{ $errors->first('email') ? 'has-error': '' }}">
                <label class="info-title" for="exampleInputEmail1">Email <span>*</span></label>
                <input type="email" name="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
            </div>
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <div class="form-group {{ $errors->first('password') ? 'has-error': '' }}">
                <label class="info-title" for="exampleInputPassword1">Mật khẩu<span>*</span></label>
                <input type="password" name="password" class="form-control unicase-form-control text-input" id="exampleInputPassword1" >
            </div>
            @error('password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <div class="radio outer-xs">
                  <label>
                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Ghi nhớ tôi!
                  </label>
                  <a href="#" class="forgot-password pull-right">Quên mật khẩu ?</a>
            </div>
              <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Đăng nhập</button>
        </form>					
    </div>
    <!-- Sign-in -->
    
    <!-- create a new account -->
    <div class="col-md-6 col-sm-6 create-new-account">
        <h4 class="checkout-subtitle">Đăng ký</h4>
        <p class="text title-tag-line">Create your new account.</p>
        <form action="{{ route('account.postRegister') }}" method="post" class="register-form outer-top-xs" role="form">
            @csrf
            <div class="form-group {{ $errors->first('email') ? 'has-error': '' }}">
                <label class="info-title" for="exampleInputEmail2">Địa chỉ Email<span>*</span></label>
                <input type="email" name="email" class="form-control unicase-form-control text-input" id="exampleInputEmail2" >
            </div>
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <div class="form-group {{ $errors->first('name') ? 'has-error': '' }}">
                <label class="info-title" for="exampleInputEmail1">Họ và Tên<span>*</span></label>
                <input type="text" name="name" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
            </div>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <div class="form-group {{ $errors->first('phone') ? 'has-error': '' }}">
                <label class="info-title" for="exampleInputEmail1">Số điện thoại<span>*</span></label>
                <input type="number" name="phone" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
            </div>
            @error('phone')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <div class="form-group {{ $errors->first('password') ? 'has-error': '' }}">
                <label class="info-title" for="exampleInputEmail1">Mật khẩu <span>*</span></label>
                <input type="text" name="password" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
            </div>
            @error('password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Đăng ký</button>
        </form>
        
        
    </div>	
   </div><!-- /.row -->
    </div><!-- /.sigin-in-->
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->
            @include('layouts.brands')
    <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
    </div><!-- /.body-content -->
</div>
@endsection
