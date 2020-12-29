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
                    <li class='active'>Thanh toán</li>
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
    <div class="col-md-8 col-sm-8 sign-in">
        @php
            $total = 0; 
         @endphp
         @if (session()->get('cart') != null)
        <div class="shopping-cart-table ">
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th></th>
                    <th style="text-align: center">Tên SP</th>
                    <th style="text-align: center">Giá</th>
                    {{-- <th>Số lượng</th> --}}
                    <th style="text-align: center">Thành tiền</th>
                  </tr>
                </thead>
                @foreach ($carts as $id => $cart)
                     @php
                         $total += $cart['price'] * $cart['quantity'];
                     @endphp
                <tbody>
                  <tr>
                    <td><img src="{{ $cart['image'] }}" alt=""  style="width:60px;height:60px"></td>
                    <td>{{ $cart['name'] }}</td>
                    <td>{{ number_format($cart['price']) }} x {{ $cart['quantity'] }}</td>
                    <td>{{ number_format($cart['price']*$cart['quantity'] ) }} VND</td>
                  </tr>
                </tbody>
                @endforeach
              </table>
              <div class="cart-grand-total" style="float: right;color:#84b943">
                Tổng tiền:<span class="inner-left-md"><b>{{ number_format($total) }} VND</b></span>
             </div>
        </div>
         @endif		
    </div>
    <!-- Sign-in -->
    
    <!-- create a new account -->
    <div class="col-md-4 col-sm-4 create-new-account" style="border-left:1px solid #e3e3e3">
        <h4 class="checkout-subtitle">THÔNG TIN THANH TOÁN</h4>
        <p class="text title-tag-line">Vui lòng nhập thông tin thanh toán.</p>
        <form action="{{ route('account.postPay') }}" method="post" class="register-form outer-top-xs" role="form">
            @csrf
            <div class="form-group {{ $errors->first('name') ? 'has-error': '' }}">
                <label class="info-title" for="exampleInputEmail1">Họ và Tên<span>*</span></label>
                <input type="text" name="name" class="form-control" value="{{ Auth::user()->name ?? ' ' }}">
            </div>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <div class="form-group {{ $errors->first('email') ? 'has-error': '' }}">
                <label class="info-title" for="exampleInputEmail2">Địa chỉ Email<span>*</span></label>
                <input type="email" name="email" class="form-control" value="{{ Auth::user()->email ?? ' ' }}">
            </div>
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <div class="form-group {{ $errors->first('phone') ? 'has-error': '' }}">
                <label class="info-title" for="exampleInputEmail1">Số điện thoại<span>*</span></label>
                <input type="number" name="phone" class="form-control" value="{{ Auth::user()->phone ?? ' ' }}">
            </div>
            @error('phone')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <div class="form-group {{ $errors->first('address') ? 'has-error': '' }}">
                <label class="info-title" for="exampleInputEmail1">Địa chỉ <span>*</span></label>
                <input type="text" name="address" class="form-control">
            </div>
            @error('address')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label class="info-title" for="exampleInputEmail1">Ghi chú thêm <span>*</span></label>
                <textarea name="description" class="form-control" cols="5" rows="3" autocomplete="off"></textarea>
            </div>
            <div class="form-group" aria-disabled="true">
                <label class="info-title" for="exampleInputEmail1">Tổng tiền <span>*</span></label>
                <input type="text" name="total_money" class="form-control" value="{{ ($total) }}" readonly>
            </div>
            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Tiến hành thanh toán</button>
        </form>
        
        
    </div>	
   </div>
    </div>
        @include('layouts.brands')
    <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
    </div>
</div>
@endsection
