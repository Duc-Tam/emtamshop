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
            <h4 class="section-title">Đơn hàng</h4>
            <div class="table-tran" style="margin-bottom: 50px;">
                <table class="table update_cart_url">
                    <thead>
                       <tr>
                          <th class="cart-description item">Mã đơn</th>
                          <th class="cart-product-name item" style="width:25%">Thông tin</th>
                          <th class="cart-sub-total item">Tổng tiền</th>
                          <th class="cart-qty item">Tình trạng</th>
                          <th class="cart-total last-item">Action</th>
                       </tr>
                    </thead>
                    @foreach ($transaction as $item)
                    <tbody>
                        <tr>
                            <td class="row-info">#order{{ $item->id }}</td>
                            <td class="row-info">{{ $item->address }}</td>
                            <td class="row-info">{{ number_format($item->total_money) }} VND</td>
                            <td class="row-info">
                                <span class="label label-{{ $item->getStatus($item->status)['class'] }}">
                                    {{ $item->getStatus($item->status)['name'] }}
                                </span>
                            </td>
                            <td class="row-info">
                                <a href="{{ route('account.trandetail', ['id'=>$item->id]) }}" title="info" class="btn btn-info"><i class="fa fa-eye"> View</i></a>
                                @if ($item->status==1)
                                    <a href="{{ route('account.cancel', ['id'=>$item->id]) }}" title="cancel" class="btn btn-danger"><i class="fa fa-trash-o"> Hủy</i></a>
                                @endif
                            </td>
                        </tr>
                     </tbody>
                    @endforeach
                    <!-- /tbody -->
                 </table>
            </div>
        </div>
    </div>
</div>
@include('layouts.brands')
<style>
    .row-info{
        padding: 10px !important;"
    }
    
</style>
</div>
@endsection