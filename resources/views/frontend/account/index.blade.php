@extends('master-frontend')
@section('content')
@section('css')
<link rel="stylesheet" href="{{ asset('frontend/product/home/transaction.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/product/home/image.css') }}">
@endsection
<!-- ============================================== SCROLL TABS ============================================== -->
<div class="container">
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                <li><a href="#">Home</a></li>
                <li class='active'>Tài khoản</li>
                </ul>
            </div>
            <!-- /.breadcrumb-inner -->
        </div>
        <!-- /.container -->
    </div>
    <div class="main">
        <div class="col-md-3 col-sm-3 account">
            <div class="profile clearfix1">
                <img style="width:20%;" src="{{ asset('frontend/assets/images/user.png') }}" alt="..." class="img-circle profile_img">
                <div class="profile">
                    <span>Xin chào,</span>
                    <h4 style="color: blue">{{ Auth::user()->name }}</h4>
                </div>
            </div>
            <div class="list-info">
                <a href="{{ route('account.index') }}"><i class="fa fa-user acount-icon"></i> Thông tin tài khoản</a>
                <a class="active" href="{{ route('account.traninfo') }}"><i class="fa fa-book book-icon"></i> Đơn mua</a>
                <a href=""><i class="fa fa-bell notice-icon"></i> Thông báo</a>
                <a href=""><i class="fa fa-unlock password-icon"></i> Đổi mật khẩu</a>
            </div>
        </div>
        <div class="col-md-9 col-sm-9 info-account">
            <div class="col-md-6 col-sm-6 create-new-account">
                <h4 class="section-title">Thông tin tài khoản</h4>
                <form action="" method="post" class="register-form outer-top-xs" role="form">
                    @csrf
                    <div class="form-group">
                        <label class="info-title">Địa chỉ Email<span>*</span></label>
                        <input disabled type="email" name="email" value="{{ Auth::user()->email }}" class="form-control unicase-form-control text-input" id="exampleInputEmail2" >
                    </div>
                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">Họ và Tên<span>*</span></label>
                        <input disabled type="text" name="name" value="{{ Auth::user()->name }}" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
                    </div>
                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">Số điện thoại<span>*</span></label>
                        <input disabled type="number" name="phone" value="{{ Auth::user()->phone }}" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
                    </div>
                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">Mật khẩu <span>*</span></label>
                        <input disabled type="password" name="password" value="{{ bcrypt(Auth::user()->password) }}" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
                    </div>
                    <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Cập nhật</button>
                </form> 
            </div> 
        </div>
    </div>
</div>
   <!-- /.breadcrumb -->
   @include('layouts.brands')
</div>
@endsection