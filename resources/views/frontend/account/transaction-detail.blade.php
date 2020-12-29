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
                   <li class='active'>Chi tiết đơn hàng</li>
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
            <h4 class="section-title">Thông tin mua hàng</h4>
            <div class="info-khach" style="margin-left: 10px;">
                <p>Tên Khách: {{ $transaction->name }}</p>
                <p>Số ĐT: {{ $transaction->phone }}</p>
                <p>Địa chỉ: {{ $transaction->address }}</p>
                <p>Trạng thái đơn: 
                    <span class="label label-{{ $transaction->getStatus($transaction->status)['class'] }}">
                        {{ $transaction->getStatus($transaction->status)['name'] }}
                    </span>
                </p>
            </div>
            <div class="table-tran" style="margin-bottom: 50px;">
                <h5 class="section-title">Chi tiết sản phẩm</h5>
                <table class="table update_cart_url">
                    <thead>
                       <tr>
                          <th class="cart-description item">Mã sp</th>
                          <th class="cart-product-name item" style="width:25%">Tên SP</th>
                          <th class="cart-sub-total item">Ảnh</th>
                          <th class="cart-qty item">Giá</th>
                          <th class="cart-qty item">Số lượng</th>
                          <th class="cart-total last-item">Tổng tiền</th>
                       </tr>
                    </thead>
                    @foreach ($order as $item)
                    <tbody>
                        <tr>
                            <td class="row-info">#order{{ $item->id }}</td>
                            <td class="row-info">{{ $item->product->p_name }}</td>
                            <td class="row-info">
                                <img src="{{ $item->product->image_path }}" alt="" style="width:80px;height:80px;">
                            </td>
                            <td class="row-info">{{ number_format($item->price) }} VND</td>
                            <td class="row-info">{{ $item->quantity }}
                            </td>
                            <td class="row-info">{{ number_format($item->price*$item->quantity) }} VND</td>
                        </tr>
                     </tbody>
                    @endforeach
                    <!-- /tbody -->
                </table>
                @if ($transaction->status==1)
                    <a href="{{ route('account.cancel', ['id'=>$transaction->id]) }}" title="cancel" class="btn btn-danger" style="margin-left: 20px;"><i class="fa fa-trash-o"> Hủy đơn</i></a>  
                @endif
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