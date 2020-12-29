<div class="container">
   <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
         <!-- ============================================================= LOGO ============================================================= -->
         <div class="logo"> <a href="{{ URL::to('/trang-chu') }}"> <img src="{{ asset('frontend/assets/images/logonew.png') }}" alt="logo" class="logonew"> </a> </div>
         <!-- ============================================================= LOGO : END ============================================================= --> 
      </div>
      <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder">
         <!-- ============================================================= SEARCH AREA ============================================================= -->
         <div class="search-area">
            <form method="POST" action="{{ route('product.search') }}" autocomplete="off">
               @csrf
               <div class="control-group">
                  <ul class="categories-filter animate-dropdown">
                     <li class="dropdown">
                        <a class="dropdown-toggle"  data-toggle="dropdown" href="category.html">Categories <b class="caret"></b></a>
                        <ul class="dropdown-menu" role="menu" >
                           <li class="menu-header">Computer</li>
                           <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Clothing</a></li>
                           <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Electronics</a></li>
                           <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Shoes</a></li>
                           <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Watches</a></li>
                        </ul>
                     </li>
                  </ul>
                  <input type="text" style="width: 74%" class="search-field" name="key" id="key" placeholder="Search here..." />
                  <div id="search_ajax">
                  </div>
                  <div class="clearfix"></div>
                  <button type="submit" class="search-button" style="margin-top: -44px;"></button> 
               </div>
            </form>
         </div> 
        <!-- ============================================================= SEARCH AREA : END ============================================================= --> 
      </div>
      <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row">
         <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->
         <div class="dropdown dropdown-cart">
               @if (session()->get('cart') != null)
                  <a href="{{ route('cart.index') }}" class="dropdown-toggle lnk-cart">
                  <div class="items-cart-inner">
                     <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
                     <div class="basket-item-count"><span class="count">{{ count(session()->get('cart')) }}</span></div>
                     <div class="total-price-basket"> <span class="lbl">GIỎ HÀNG -</span></div>
                  </div>
                  </a>
               @else
                  <a href="{{ route('cart.index') }}" class="dropdown-toggle lnk-cart">
                     <div class="items-cart-inner">
                        <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
                        <div class="basket-item-count"><span class="count">0</span></div>
                        <div class="total-price-basket"> <span class="lbl">GIỎ HÀNG -</span></div>
                     </div>
                  </a>
               @endif
               {{-- @php
               $total = 0; 
               @endphp
            @if (session()->get('cart'))
            @foreach ($carts as $cartitem)
               @php
               $total += $cartitem['price'] * $cartitem['quantity'];
               @endphp
            <ul class="dropdown-menu">
               <li>
                  <div class="cart-item product-summary">
                     <div class="row">
                        <div class="col-xs-4">
                           <div class="image"> <a href="detail.html"><img src="{{ $cartitem['image'] }}" alt=""></a> </div>
                        </div>
                        <div class="col-xs-7">
                           <h3 class="name"><a href="index.php?page-detail">{{ $cartitem['name'] }}</a></h3>
                           <div class="price">{{ number_format($cartitem['price']) }} VND</div>
                        </div>
                        <div class="col-xs-1 action"> <a href="#"><i class="fa fa-trash"></i></a> </div>
                     </div>
                  </div>
                  <!-- /.cart-item -->
                  <div class="clearfix"></div>
                  <hr>
                  <div class="clearfix cart-total">
                     <div class="pull-right"> <span class="text">Tổng tiền :</span><span class='price'>{{ number_format($total) }} VND</span> </div>
                     <div class="clearfix"></div>
                     <a href="checkout.html" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a> 
                  </div>
                  <!-- /.cart-total--> 
               </li>
            </ul>
            @endforeach
            @endif --}}
            <!-- /.dropdown-menu--> 
         </div>
         <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= --> 
      </div> 
   </div>
</div>