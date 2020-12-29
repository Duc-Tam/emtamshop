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
               <li><a href="#">Home</a></li>
               <li class='active'>Giỏ Hàng</li>
            </ul>
         </div>
         <!-- /.breadcrumb-inner -->
      </div>
      <!-- /.container -->
   </div>
   <div class="body-content outer-top-xs">
      <div class="container">
         @php
            $total = 0; 
         @endphp
         @if (session()->get('cart') != null)
         <div class="row ">
            <div class="shopping-cart">
               <div class="shopping-cart-table ">
                  <div class="table-responsive">
                     <table class="table update_cart_url" data-url="{{ route('cart.update') }}">
                        <thead>
                           <tr>
                              <th class="cart-description item">Ảnh</th>
                              <th class="cart-product-name item" style="width:25%">Tên Sản Phẩm</th>
                              <th class="cart-sub-total item">Giá</th>
                              <th class="cart-qty item">Số lượng</th>
                              <th class="cart-total last-item">Tổng cộng</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($carts as $id => $cart)
                           @php
                               $total += $cart['price'] * $cart['quantity'];
                           @endphp
                           <tr>
                              {{-- <td class="romove-item"><a href="{{ route('cart.delete',['id'=>$id]) }}" title="cancel" class="icon"><i class="fa fa-trash-o"></i></a></td> --}}
                              <td class="cart-image">
                                 <a class="entry-thumbnail" href="">
                                 <img src="{{ $cart['image'] }}" alt="">
                                 </a>
                              </td>
                              <td class="cart-product-name-info">
                                 <h4 class='cart-product-description'><a href="">{{ $cart['name'] }}</a></h4>
                                 <div class="row">
                                    <div class="col-sm-4">
                                       <div class="rating rateit-small"></div>
                                    </div>
                                    <div class="col-sm-8">
                                       <div class="reviews">
                                          (06 Reviews)
                                       </div>
                                    </div>
                                 </div>
                              </td>
                              <td class="cart-product-sub-total"><span class="cart-sub-total-price">{{ number_format($cart['price']) }} VND</span></td>
                              <td class="cart-product-quantity">
                                 <div class="quant-input" style="height: 20px;">
                                    <input type="number" name="quantity" value="{{ $cart['quantity'] }}" min="1">
                                 </div>
                                 <a href="" data-id="{{ $id }}" class="btn btn-primary product-edit cart_update"><i class="fa fa-edit"></i></a>
                                 <a href="{{ route('cart.delete',['id'=>$id]) }}" title="cancel" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
                              </td>
                              {{-- <td class="cart-product-edit"><a href="" data-id="{{ $id }}" class="product-edit cart_update"><i class="fa fa-edit"></i></a></td> --}}
                              <td class="cart-product-grand-total"><span class="cart-grand-total-price">{{ number_format($cart['price']*$cart['quantity'] ) }} VND</span></td>
                           </tr>
                           @endforeach
                        </tbody>
                        <!-- /tbody -->
                     </table>
                     <!-- /table -->
                  </div>
               </div>
               <!-- /.estimate-ship-tax -->
               <div class="col-md-12 cart-shopping-total">
                  <table class="table">
                     <thead>
                        <tr>
                           <th>
                              <div class="cart-grand-total">
                                 Tổng tiền<span class="inner-left-md">{{ number_format($total) }} VND</span>
                              </div>
                           </th>
                        </tr>
                     </thead>
                     <!-- /thead -->
                     <tbody style="display: flex;float: right;">
                        <tr>
                           <td>
                              <div class="shopping-cart-btn">
                                 <span class="">
                                 <a href="{{ URL::to('/trang-chu') }}" class="btn btn-upper btn-primary checkout-btn" style="float: right;">Tiếp tục mua hàng</a>
                                 </span>
                              </div>
                           </td>
                        </tr>
                        <tr>
                           <td>
                              <div class="cart-checkout-btn pull-right">
                                 <a href="{{ route('account.checkout') }}"><button type="submit" class="btn btn-primary checkout-btn">TIẾN HÀNH THANH TOÁN</button></a>
                                 <span class="">Checkout with multiples address!</span>
                              </div>
                           </td>
                        </tr>
                     </tbody>
                     <!-- /tbody -->
                  </table>
                  <!-- /table -->
               </div>
               <!-- /.cart-shopping-total -->			
            </div>
            @else
               <div class="body-content outer-top-xs">
                  <div class="container">
                     <div class="page-container" style="text-align: center;margin-bottom:80px;">
                        <p style="margin: 50px 0px 20px;font-size:20px">Không có sản phẩm nào trong giỏ hàng của bạn</p>
                        <a href="{{ URL::to('/trang-chu') }}" class="btn btn-upper btn-primary checkout-btn">Tiếp tục mua hàng</a>
                     </div>
                  </div>
               </div>
            @endif
         </div>
         <!-- /.row -->
         <!-- ============================================== BRANDS CAROUSEL ============================================== -->
         <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	
      </div>
   </div>
</div>
@section('js')
<script>
   function cartUpdate(event) {
      event.preventDefault();
      let urlUpdate = $('.update_cart_url').data('url');
      let id = $(this).data('id');
      let quantity = $(this).parents('tr').find('input').val();
      $.ajax({
         type: "GET",
         url: urlUpdate,
         data: {id: id, quantity: quantity},
         success: function (data) {
            toastr.success('Cập nhật thành công');
            location.reload();
         },
         error: function(){
            
         }
      })
   }
   $ (function () {
      $('.cart_update').on('click', cartUpdate);
   });
</script>
@endsection
@endsection