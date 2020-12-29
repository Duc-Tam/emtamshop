<div class="sidebar-widget outer-bottom-small wow fadeInUp">
    <h3 class="section-title">Special Offer</h3>
    <div class="sidebar-widget-body outer-top-xs">
      <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
        <div class="item">
          <div class="products special-product">
            @foreach ($hotoffer as $itemoffer)
            <div class="product" style="border-bottom: 1px solid #e3e3e3;">
              <div class="product-micro">
                <div class="row product-micro-row">
                  <div class="col col-xs-5">
                    <div class="product-image">
                      <div class="image"> <a href="{{ route('product.detail',['slug'=>$itemoffer->p_slug,'id'=>$itemoffer->id]) }}"> <img src="{{ $itemoffer->image_path }}" alt=""> </a> </div>
                    </div> 
                  </div>
                  <div class="col col-xs-7">
                    <div class="product-info">
                      <h3 class="name"><a href="{{ route('product.detail',['slug'=>$itemoffer->p_slug,'id'=>$itemoffer->id]) }}">{{ $itemoffer->p_name }}</a></h3>
                      <div class="rating rateit-small"></div>
                      <div class="product-price"> <span class="price">{{ number_format($itemoffer->p_price) }} đ</span> </div>
                    </div>
                  </div> 
                </div> 
              </div> 
            </div>
            @endforeach
          </div>
        </div>
        <div class="item">
          <div class="products special-product">
            @foreach ($hotdeal as $itemdeal)
            <div class="product" style="border-bottom: 1px solid #e3e3e3;">
              <div class="product-micro">
                <div class="row product-micro-row">
                  <div class="col col-xs-5">
                    <div class="product-image">
                      <div class="image"> <a href="{{ route('product.detail',['slug'=>$itemdeal->p_slug,'id'=>$itemdeal->id]) }}"> <img src="{{ $itemdeal->image_path }}" alt=""> </a> </div>
                    </div> 
                  </div>
                  <div class="col col-xs-7">
                    <div class="product-info">
                      <h3 class="name"><a href="{{ route('product.detail',['slug'=>$itemdeal->p_slug,'id'=>$itemdeal->id]) }}">{{ $itemdeal->p_name }}</a></h3>
                      <div class="rating rateit-small"></div>
                      <div class="product-price"> <span class="price">{{ number_format($itemdeal->p_price) }} đ</span> </div>
                    </div>
                  </div> 
                </div> 
              </div> 
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
    <!-- /.sidebar-widget-body --> 
  </div>