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
               <li><a href="#">Products</a></li>
               <li class='active'>{{ $product->p_name }}</li>
            </ul>
         </div>
         <!-- /.breadcrumb-inner -->
      </div>
      <!-- /.container -->
   </div>
   <!-- /.breadcrumb -->
   <div class="body-content outer-top-xs">
      <div class='container'>
         <div class='row single-product'>
            <div class='col-md-3 sidebar'>
               <div class="sidebar-module-container">
                  <div class="home-banner outer-top-n">
                     <img src="{{ asset('frontend/assets/images/banners/bannerhome1.jpg') }}" alt="Image" width="99%">
                  </div>
                  <!-- ============================================== HOT DEALS ============================================== -->
                  @include('layouts.hot-deals') 
                  <!-- ============================================== HOT DEALS: END ============================================== -->
                  <!-- ============================================== NEWSLETTER ============================================== -->
                  <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small outer-top-vs">
                     <h3 class="section-title">Newsletters</h3>
                     <div class="sidebar-widget-body outer-top-xs">
                        <p>Sign Up for Our Newsletter!</p>
                        <form>
                           <div class="form-group">
                              <label class="sr-only" for="exampleInputEmail1">Email address</label>
                              <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Subscribe to our newsletter">
                           </div>
                           <button class="btn btn-primary">Subscribe</button>
                        </form>
                     </div>
                  </div>
                  <!-- /.sidebar-widget -->
                  <!-- ============================================== NEWSLETTER: END ============================================== -->
                  <!-- ============================================== Testimonials============================================== -->
                  <!-- ============================================== Testimonials: END ============================================== -->
               </div>
            </div>
            <!-- /.sidebar -->
            <div class='col-md-9'>
               <div class="detail-block">
                  <div class="row  wow fadeInUp">
                     <div class="col-xs-12 col-sm-6 col-md-5">
                        <ul id="imageGallery">
                              <li class="image-gallery" data-thumb="{{ $product->image_path }}" data-src="{{ $product->image_path }}">
                              <img style="width: 100%;" src="{{ $product->image_path }}" />
                              </li>
                              @foreach($product->images as $productImage)
                              <li id="galery-item" data-thumb="{{ $productImage->images_path }}" data-src="{{ $productImage->images_path }}">
                                 <img style="width: 100%;" src="{{ $productImage->images_path }}" />
                              </li>
                              @endforeach
                        </ul>
                        <!-- /.single-product-gallery -->
                     </div>
                     <!-- /.gallery-holder -->
                     <div class='col-sm-6 col-md-7 product-info-block'>
                        <div class="product-info">
                           <h1 class="name">{{ $product->p_name }}</h1>
                           <div class="rating-reviews m-t-20">
                              <div class="row">
                                 <div class="col-sm-3">
                                    <div class="rating rateit-small"></div>
                                 </div>
                                 <div class="col-sm-8">
                                    <div class="reviews">
                                       <a href="#" class="lnk">({{ count($comments) }} Reviews)</a>
                                    </div>
                                 </div>
                              </div>
                              <!-- /.row -->
                           </div>
                           <!-- /.rating-reviews -->
                           <div class="stock-container info-container m-t-10">
                              <div class="row">
                                 <div class="col-sm-2">
                                    <div class="stock-box">
                                       <span class="label">Tình trạng :</span>
                                    </div>
                                 </div>
                                 <div class="col-sm-9">
                                    <div class="stock-box">
                                       <span class="value">Còn hàng</span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="description-container m-t-20">
                              {!! $product->description !!}
                           </div>
                           <div class="price-container info-container m-t-20">
                              <div class="row">
                                 <div class="col-sm-7">
                                    <div class="price-box">
                                       <span class="price">{{ number_format($product->p_price) }} VND</span>
                                    </div>
                                 </div>
                                 <div class="col-sm-5">
                                    <div class="favorite-button m-t-10">
                                       <a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Wishlist" href="#">
                                           <i class="fa fa-heart"></i>
                                       </a>
                                       <a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Add to Compare" href="#">
                                          <i class="fa fa-signal"></i>
                                       </a>
                                       <a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="E-mail" href="#">
                                           <i class="fa fa-envelope"></i>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <!-- /.row -->
                           </div>
                           <!-- /.price-container -->
                           <div class="quantity-container info-container">
                              <div class="row">
                                 <div class="col-sm-2">
                                    <span class="label">Qty :</span>
                                 </div>
                                 <div class="col-sm-2">
                                    <div class="cart-quantity">
                                       <div class="quant-input">
                                          <div class="arrows">
                                             <div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
                                             <div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
                                          </div>
                                          <input type="text" value="1">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-sm-7">
                                    <a href="{{ route('addToCart',['id'=> $product->id]) }}" class="btn btn-primary cart"><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</a>
                                 </div>
                              </div>
                              <!-- /.row -->
                           </div>
                           <!-- /.quantity-container -->
                        </div>
                        <!-- /.product-info -->
                     </div>
                     <!-- /.col-sm-7 -->
                  </div>
                  <!-- /.row -->
               </div>
               <div class="product-tabs inner-bottom-xs  wow fadeInUp">
                  <div class="row">
                     <div class="col-sm-4">
                        <ul id="product-tabs" class="nav nav-tabs nav-tab-cell" style="
                        display: -webkit-inline-box;margin-left:25px" >
                           <li class="active"><a data-toggle="tab" href="#description">CHI TIẾT SẢN PHẨM</a></li>
                           <li><a data-toggle="tab" href="#tags">GIỚI THIỆU</a></li>
                           <li><a data-toggle="tab" href="#review">BÌNH LUẬN</a></li>
                        </ul>
                        <!-- /.nav-tabs #product-tabs -->
                     </div>
                     <div class="col-sm-12">
                        <div class="tab-content">
                           <div id="description" class="tab-pane in active">
                              @if ($attid == 0)
                              <div class="product-tab" style="font-size: 14px;">
                                 <h4 class="title"><b>Thông số {{ $product->p_name }}</b></h4>
                                 {!! $product->p_attr !!}
                              </div>
                              @else
                              <div class="product-tab">
                                 <h4 class="title"><b>Thông số {{ $product->p_name }}</b></h4>
                                 <table class="table-attr" style="box-sizing: border-box; ">
                                    <tbody>
                                       <tr><td class="table-left">CPU</td><td class="table-right">{{ $attr->lap_cpu }}</td></tr>
                                       <tr><td class="table-left">RAM</td><td class="table-right">{{ $attr->lap_ram }}</td></tr>
                                       <tr><td class="table-left">Ổ cứng</td><td class="table-right">{{ $attr->lap_main }}</td></tr>
                                       <tr><td class="table-left">Card đồ họa</td><td class="table-right">{{ $attr->lap_card }}</td></tr>
                                       <tr><td class="table-left">Màn hình</td><td class="table-right">{{ $attr->lap_screen }}</td></tr>
                                       <tr><td class="table-left">Cổng giao tiếp</td><td class="table-right">{{ $attr->lap_conggiaotiep }}</td></tr>
                                       <tr><td class="table-left">Audio</td><td class="table-right">{{ $attr->lap_audio }}</td></tr>
                                       <tr><td class="table-left">Chuẩn LAN</td><td class="table-right">{{ $attr->lap_LAN }}</td></tr>
                                       <tr><td class="table-left">Chuẩn WIFI</td><td class="table-right">{{ $attr->lap_WIFI }}</td></tr>
                                       <tr><td class="table-left">Bluetooth</td><td class="table-right">{{ $attr->lap_blutooth }}</td></tr>
                                       <tr><td class="table-left">Webcam</td><td class="table-right">{{ $attr->lap_system }}</td></tr>
                                       <tr><td class="table-left">Pin</td><td class="table-right">{{ $attr->lap_pin }}</td></tr>
                                       <tr><td class="table-left">Trọng lượng</td><td class="table-right">{{ $attr->lap_weight }}</td></tr>
                                       <tr><td class="table-left">Kích thước</td><td class="table-right">{{ $attr->lap_size }}</td></tr>
                                    </tbody>
                                 </table>
                              </div>
                              @endif
                           </div>
                           <!-- /.tab-pane -->
                           <div id="review" class="tab-pane">
                              <div class="product-tab">
                                 <h4 class="title">Đánh giá của khách hàng</h4>
                                 @foreach ($comments as $key => $item)
                                 <div class="product-reviews">
                                    <div class="reviews">
                                       <div class="review">
                                          <img src="{{ asset('frontend/assets/images/ava.png') }}" alt="" style="width:6%;margin-top: -20px;">
                                          <div class="review-title" style="margin-left: 15px;display: inline-block;"><span class="summary"><b>{{ $item->name }}</b></span><span class="date"><i class="fa fa-calendar"></i><span>{{ $item->created_at }}</span></span>
                                             <div class="text">"{{ $item->content }}."</div>
                                          </div>
                                          @foreach ($repcmt as $key => $comment)
                                          @if ($comment->parent_comment_id == $item->id)
                                             <div class="review-as" style="padding: 20px;margin-left:45px;display: flex">
                                                <img src="{{ asset('frontend/assets/images/avatar.jpg') }}" alt="" style="width:6%;">
                                                <div class="review-title" style="margin-left: 15px;"><span class="summary"><b>{{ $comment->name }}</b></span><span class="date"><i class="fa fa-calendar"></i>
                                                   <span>{{ $comment->created_at }}</span></span>
                                                   <div class="text">"{{ $comment->content }}."</div>
                                                </div>
                                             </div>
                                          @endif
                                          @endforeach
                                       </div>
                                    </div>
                                    <!-- /.reviews -->
                                 </div>
                                 @endforeach
                                 <!-- /.product-reviews -->
                                 <div class="product-add-review">
                                    <h4 class="title">Gửi câu hỏi về sản phẩm</h4>
                                    <!-- /.review-table -->
                                    <div class="review-form">
                                       <div class="form-container">
                                          <form role="form" method="POST" action="{{ route('product.comment',['id'=> $product->id]) }}" class="cnt-form">
                                             @csrf
                                             <div class="row">
                                                <div class="col-sm-6">
                                                   @if (isset(Auth::user()->id))
                                                   <div class="form-group">
                                                      <label for="exampleInputName">Tên của bạn <span class="astk">*</span></label>
                                                      <input type="text" name="name" class="form-control txt" id="exampleInputName" placeholder="" value="{{ Auth::user()->name }}">
                                                   </div> 
                                                   @else
                                                   <div class="form-group">
                                                      <label for="exampleInputName">Tên của bạn <span class="astk">*</span></label>
                                                      <input type="text" name="name" class="form-control txt" id="exampleInputName" placeholder="" value="">
                                                   </div>  
                                                   @endif
                                                </div>
                                                <div class="col-md-6">
                                                   <div class="form-group">
                                                      <label for="exampleInputReview">Nội dung <span class="astk">*</span></label>
                                                      <textarea class="form-control txt txt-review" name="content" id="exampleInputReview" rows="4" placeholder=""></textarea>
                                                   </div>
                                                   <!-- /.form-group -->
                                                </div>
                                             </div>
                                             <!-- /.row -->
                                             <div class="action text-right">
                                                <button class="btn btn-primary btn-upper">GỬI BÌNH LUẬN</button>
                                             </div>
                                             <!-- /.action -->
                                          </form>
                                          <!-- /.cnt-form -->
                                       </div>
                                       <!-- /.form-container -->
                                    </div>
                                    <!-- /.review-form -->
                                 </div>
                                 <!-- /.product-add-review -->
                              </div>
                              <!-- /.product-tab -->
                           </div>
                           <!-- /.tab-pane -->
                           <div id="tags" class="tab-pane">
                              <div class="product-tag">
                                 <p style="text-align: center">Thông tin đang được cập nhật.</p>
                              </div>
                              <!-- /.product-tab -->
                           </div>
                           <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                     </div>
                     <!-- /.col -->
                  </div>
                  <!-- /.row -->
               </div>
               <!-- /.product-tabs -->
               <!-- ============================================== UPSELL PRODUCTS ============================================== -->
               @include('frontend.components.upsell-product')
               <!-- /.section -->
               <!-- ============================================== UPSELL PRODUCTS : END ============================================== -->
            </div>
            <!-- /.col -->
            <div class="clearfix"></div>
         </div>
         <!-- /.row -->
         <!-- ============================================== BRANDS CAROUSEL ============================================== -->
         <!-- /.logo-slider -->
         <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
      </div>
      <!-- /.container -->
   </div>
   <!-- /.body-content -->
   @include('layouts.brands')
</div>
<style>
   .table-left{
      border: 1px solid #e3e3e3; width: 28.5209%; 
      background-color: #f7f7f7 !important;
      padding: 10px;
   }
   .table-right{
      padding: 10px;
   }
   table, tr, td {
  border: 1px solid #e3e3e3;
  border-collapse: collapse;
   }
   .table-attr{
      width: 100%;
      line-height: 30px;
   }
}
</style>
@endsection