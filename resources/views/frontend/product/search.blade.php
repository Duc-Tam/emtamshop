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
              <li class='active'>Sản phẩm</li>
            </ul>
          </div>
          <!-- /.breadcrumb-inner --> 
        </div>
        <!-- /.container --> 
      </div>
    <div class="row">
        <!-- ============================================== SIDEBAR ============================================== -->
        <div class="col-xs-12 col-sm-12 col-md-3 sidebar">
            <!-- ================================== TOP NAVIGATION ================================== -->
            @include('layouts.sidebar')
            <div class="sidebar-module-container">
                <div class="sidebar-filter"> 
                  <!-- ============================================== SIDEBAR CATEGORY ============================================== -->
                  <div class="sidebar-widget wow fadeInUp">
                    <h3 class="section-title">shop by</h3>
                    <div class="widget-header">
                      <h4 class="widget-title">Category</h4>
                    </div>
                    <div class="sidebar-widget-body">
                      <div class="accordion">
                        <div class="accordion-group">
                          <div class="accordion-heading"> <a href="#collapseOne" data-toggle="collapse" class="accordion-toggle collapsed"> Camera </a> </div>
                          <!-- /.accordion-heading -->
                          <div class="accordion-body collapse" id="collapseOne" style="height: 0px;">
                            <div class="accordion-inner">
                              <ul>
                                <li><a href="#">gaming</a></li>
                                <li><a href="#">office</a></li>
                                <li><a href="#">kids</a></li>
                                <li><a href="#">for women</a></li>
                              </ul>
                            </div>
                            <!-- /.accordion-inner --> 
                          </div>
                          <!-- /.accordion-body --> 
                        </div>
                        <!-- /.accordion-group -->
                        
                        <div class="accordion-group">
                          <div class="accordion-heading"> <a href="#collapseTwo" data-toggle="collapse" class="accordion-toggle collapsed"> Desktops </a> </div>
                          <!-- /.accordion-heading -->
                          <div class="accordion-body collapse" id="collapseTwo" style="height: 0px;">
                            <div class="accordion-inner">
                              <ul>
                                <li><a href="#">gaming</a></li>
                                <li><a href="#">office</a></li>
                                <li><a href="#">kids</a></li>
                                <li><a href="#">for women</a></li>
                              </ul>
                            </div> 
                          </div> 
                        </div>
                        
                        <div class="accordion-group">
                          <div class="accordion-heading"> <a href="#collapseThree" data-toggle="collapse" class="accordion-toggle collapsed"> Pants </a> </div>
                         
                          <div class="accordion-body collapse" id="collapseThree" style="height: 0px;">
                            <div class="accordion-inner">
                              <ul>
                                <li><a href="#">gaming</a></li>
                                <li><a href="#">office</a></li>
                                <li><a href="#">kids</a></li>
                                <li><a href="#">for women</a></li>
                              </ul>
                            </div> 
                          </div> 
                        </div>
                        
                        <div class="accordion-group">
                          <div class="accordion-heading"> <a href="#collapseFour" data-toggle="collapse" class="accordion-toggle collapsed"> Bags </a> </div>
                          <!-- /.accordion-heading -->
                          <div class="accordion-body collapse" id="collapseFour" style="height: 0px;">
                            <div class="accordion-inner">
                              <ul>
                                <li><a href="#">gaming</a></li>
                                <li><a href="#">office</a></li>
                                <li><a href="#">kids</a></li>
                                <li><a href="#">for women</a></li>
                              </ul>
                            </div>
                          </div> 
                        </div>
                        <div class="accordion-group">
                          <div class="accordion-heading"> <a href="#collapseFive" data-toggle="collapse" class="accordion-toggle collapsed"> Hats </a> </div>
                          <div class="accordion-body collapse" id="collapseFive" style="height: 0px;">
                            <div class="accordion-inner">
                              <ul>
                                <li><a href="#">gaming</a></li>
                                <li><a href="#">office</a></li>
                                <li><a href="#">kids</a></li>
                                <li><a href="#">for women</a></li>
                              </ul>
                            </div> 
                          </div>
                        </div>
                        <div class="accordion-group">
                          <div class="accordion-heading"> <a href="#collapseSix" data-toggle="collapse" class="accordion-toggle collapsed"> Accessories </a> </div>
                          <div class="accordion-body collapse" id="collapseSix" style="height: 0px;">
                            <div class="accordion-inner">
                              <ul>
                                <li><a href="#">gaming</a></li>
                                <li><a href="#">office</a></li>
                                <li><a href="#">kids</a></li>
                                <li><a href="#">for women</a></li>
                              </ul>
                            </div> 
                          </div>
                        </div>
                      </div> 
                    </div> 
                  </div> 
                  <!-- ============================================== SIDEBAR CATEGORY : END ============================================== --> 
                  
                  <!-- ============================================== PRICE SILDER============================================== -->
                  <!-- ============================================== PRICE SILDER : END ============================================== --> 
                  <!-- ============================================== MANUFACTURES============================================== --> 
                  <!-- ============================================== COMPARE============================================== -->
                  <div class="sidebar-widget wow fadeInUp outer-top-vs">
                    <h3 class="section-title">Compare products</h3>
                    <div class="sidebar-widget-body">
                      <div class="compare-report">
                        <p>You have no <span>item(s)</span> to compare</p>
                      </div> 
                    </div> 
                  </div>
                  <!-- ============================================== COMPARE: END ============================================== --> 
                  <!-- ============================================== PRODUCT TAGS ============================================== -->
                  <div class="sidebar-widget product-tag wow fadeInUp outer-top-vs">
                    <h3 class="section-title">Product tags</h3>
                    <div class="sidebar-widget-body outer-top-xs">
                      <div class="tag-list"> <a class="item" title="Phone" href="category.html">Phone</a> <a class="item active" title="Vest" href="category.html">Vest</a> <a class="item" title="Smartphone" href="category.html">Smartphone</a> <a class="item" title="Furniture" href="category.html">Furniture</a> <a class="item" title="T-shirt" href="category.html">T-shirt</a> <a class="item" title="Sweatpants" href="category.html">Sweatpants</a> <a class="item" title="Sneaker" href="category.html">Sneaker</a> <a class="item" title="Toys" href="category.html">Toys</a> <a class="item" title="Rose" href="category.html">Rose</a> </div> 
                    </div>
                  </div>
                </div>
              </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
            <!-- ========================================== SECTION – HERO ========================================= -->
            @include('frontend.components.slider') 
            <!-- ============================================== NEW PRODUCT ============================================== -->
            <div class="clearfix filters-container m-t-10">
              <h3 class="section-title">Tìm thấy: {{ count($productsearch) }} sản phẩm.</h3>
            </div>
            <!-- ============================================== NEW PRODUCT : END ============================================== -->
            <div class="search-result-container ">
                <div id="myTabContent" class="tab-content category-list">
                  <div class="tab-pane active " id="grid-container">
                    <div class="category-product">
                      <div class="row">
                        @foreach ($productsearch as $product)
                        <div class="col-sm-6 col-md-4 wow fadeInUp">
                          <div class="products edit-product">
                            <div class="product">
                              <div class="product-image">
                                <div class="image-all"> <a href="{{ route('product.detail',['slug'=>$product->p_slug,'id'=>$product->id]) }}"><img  src="{{ $product->image_path }}" alt=""></a> </div>
                                @if ($product->p_hot==0)
                                    <div class="tag new"><span>new</span></div> 
                                    @elseif($product->p_hot==1)
                                    <div class="tag hot"><span>hot</span></div>
                                    @else
                                    <div class="tag sale"><span>sale</span></div>  
                                @endif
                              </div>
                              <!-- /.product-image -->
                              
                              <div class="product-info text-left" style="text-align: center;">
                                <h3 class="name" style="height: 30px"><a href="{{ route('product.detail',['slug'=>$product->p_slug,'id'=>$product->id]) }}">{{ $product->p_name }}</a></h3>
                                <div class="rating rateit-small"></div>
                                <div class="description"></div>
                                <div class="product-price"> <span class="price">{{ number_format($product->p_price) }}</span> <span class="price-before-discount">$ 800</span> </div>
                                <!-- /.product-price --> 
                                
                              </div>
                              <!-- /.product-info -->
                              <div class="cart clearfix animate-effect">
                                <div class="action">
                                  <ul class="list-unstyled">
                                    <li class="add-cart-button btn-group">
                                      <a href="{{ route('addToCart',['id'=> $product->id]) }}" class=""><button data-toggle="tooltip" class="btn btn-primary icon" type="button" title="Add Cart"><i class="fa fa-shopping-cart"></i></button></a>
                                      <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                  </li>
                                    <li class="lnk wishlist"> <a class="add-to-cart" href="{{ route('product.detail',['slug'=>$product->p_slug,'id'=>$product->id]) }}" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                                    <li class="lnk"> <a class="add-to-cart" href="{{ route('product.detail',['slug'=>$product->p_slug,'id'=>$product->id]) }}" title="Compare"> <i class="fa fa-signal"></i> </a> </li>
                                  </ul>
                                </div>
                                <!-- /.action --> 
                              </div>
                              <!-- /.cart --> 
                            </div>
                            <!-- /.product --> 
                            
                          </div>
                          <!-- /.products --> 
                        </div>
                        <!-- /.item -->
                        @endforeach
                      </div>
                      <!-- /.row --> 
                    </div>
                    <!-- /.category-product --> 
                    
                  </div>
                  <!-- /.tab-pane -->
                  <!-- /.tab-pane #list-container --> 
                </div>
                <!-- /.tab-content -->
                <div class="clearfix filters-container">
                  {{-- <div class="text-right">
                    @include('partials.pagination', ['paginator' => $products])
                  </div> --}}
                  <!-- /.text-right --> 
                  
                </div>
                <!-- /.filters-container --> 
                
              </div>
            <!-- ============================================== WIDE PRODUCTS ============================================== -->
        </div>
    </div>
    @include('layouts.brands')
</div>
@endsection
