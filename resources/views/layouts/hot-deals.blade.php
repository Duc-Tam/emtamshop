<div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
    <h3 class="section-title">hot deals</h3>
    <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">
      @foreach ($hotdeal as $hotitem)
      <div class="item">
        <div class="products">
          <div class="hot-deal-wrapper">
            <div class="image"> <img src="{{ $hotitem->image_path }}" alt=""> </div>
            <div class="sale-offer-tag"><span>49%<br>
              off</span></div>
            <div class="timing-wrapper">
              <div class="box-wrapper">
                <div class="date box"> <span class="key">120</span> <span class="value">DAYS</span> </div>
              </div>
              <div class="box-wrapper">
                <div class="hour box"> <span class="key">20</span> <span class="value">HRS</span> </div>
              </div>
              <div class="box-wrapper">
                <div class="minutes box"> <span class="key">36</span> <span class="value">MINS</span> </div>
              </div>
              <div class="box-wrapper hidden-md">
                <div class="seconds box"> <span class="key">60</span> <span class="value">SEC</span> </div>
              </div>
            </div>
          </div>
          <!-- /.hot-deal-wrapper -->
          
          <div class="product-info text-left m-t-20">
            <h3 class="name" style="height: 40px"><a href="{{ route('product.detail',['slug'=>$hotitem->p_slug,'id'=>$hotitem->id]) }}">{{ $hotitem->p_name }}</a></h3>
            <div class="rating rateit-small"></div>
            <div class="product-price"> <span class="price">{{ number_format($hotitem->p_price) }}</span> <span class="price-before-discount">$800.00</span> </div>
            <!-- /.product-price --> 
            
          </div>
          <!-- /.product-info -->
          
          <div class="cart clearfix animate-effect">
            <div class="action">
              <div class="add-cart-button btn-group">
                <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                <a href="{{ route('addToCart',['id'=> $hotitem->id]) }}"><button class="btn btn-primary cart-btn" type="button">Add to cart</button></a>
              </div>
            </div>
            <!-- /.action --> 
          </div>
          <!-- /.cart --> 
        </div>
      </div>
      @endforeach
    </div>
    <!-- /.sidebar-widget --> 
  </div>