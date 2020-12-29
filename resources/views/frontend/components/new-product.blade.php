<div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
    <div class="more-info-tab clearfix">
        <h3 class="new-product-title pull-left">SẢN PHẨM MỚI</h3>
        <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
            <li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab">All</a></li>
            <li><a data-transition-type="backSlide" href="#smartphone" data-toggle="tab">Asus</a></li>
            <li><a data-transition-type="backSlide" href="#laptop" data-toggle="tab">Gear</a></li>
            <li><a data-transition-type="backSlide" href="#apple" data-toggle="tab">Monitor</a></li>
        </ul>
        <!-- /.nav-tabs -->
    </div>
    <div class="tab-content outer-top-xs">
        <div class="tab-pane in active" id="all">
            <div class="product-slider">
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                    @foreach ($productnew as $item)
                    <div class="item item-carousel">
                        <div class="products edit-product">
                            <div class="product">
                                <div class="product-image">
                                    <div class="image-new">
                                        <a href="{{ route('product.detail',['slug'=>$item->p_slug,'id'=>$item->id]) }}"><img src="{{ $item->image_path }}" alt="" /></a>
                                    </div>
                                    <!-- /.image -->
                                    @if ($item->p_hot==0)
                                    <div class="tag new"><span>new</span></div> 
                                    @elseif($item->p_hot==1)
                                    <div class="tag hot"><span>hot</span></div>
                                    @else
                                    <div class="tag sale"><span>sale</span></div>  
                                    @endif
                                </div>
                                <div class="product-info text-left" style="text-align: center;">
                                    <h3 class="name" style="height: 60px"><a href="detail.html">{{ $item->p_name }}</a></h3>
                                    <div class="rating rateit-small"></div>
                                    <div class="description"></div>
                                    <div class="product-price"><span class="price">{{ number_format($item->p_price) }} đ</span> <span class="price-before-discount"></span></div>
                                </div>
                                <!-- /.product-info -->
                                <div class="cart clearfix animate-effect">
                                    <div class="action">
                                        <ul class="list-unstyled">
                                            <li class="add-cart-button btn-group">
                                                <a href="{{ route('addToCart',['id'=> $item->id]) }}" class=""><button data-toggle="tooltip" class="btn btn-primary icon" type="button" title="Add Cart"><i class="fa fa-shopping-cart"></i></button></a>
                                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                            </li>
                                            <li class="lnk wishlist">
                                                <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a>
                                            </li>
                                            <li class="lnk">
                                                <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="tab-pane" id="smartphone">
            <div class="product-slider">
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
                    @foreach ($proAsus as $itemAsus)
                    <div class="item item-carousel">
                        <div class="products edit-product">
                            <div class="product">
                                <div class="product-image">
                                    <div class="image-new">
                                        <a href="{{ route('product.detail',['slug'=>$itemAsus->p_slug,'id'=>$item->id]) }}"><img src="{{ $itemAsus->image_path }}" alt="" /></a>
                                    </div>
                                    <!-- /.image -->
                                    @if ($itemAsus->p_hot==0)
                                    <div class="tag new"><span>new</span></div> 
                                    @elseif($itemAsus->p_hot==1)
                                    <div class="tag hot"><span>hot</span></div>
                                    @else
                                    <div class="tag sale"><span>sale</span></div>  
                                    @endif
                                </div>
                                <!-- /.product-image -->
                                <div class="product-info text-left" style="text-align: center;">
                                    <h3 class="name" style="height: 60px"><a href="{{ route('product.detail',['slug'=>$itemAsus->p_slug,'id'=>$item->id]) }}">{{ $itemAsus->p_name }}</a></h3>
                                    <div class="rating rateit-small"></div>
                                    <div class="description"></div>
                                    <div class="product-price"><span class="price">{{ number_format($itemAsus->p_price) }} đ</span> <span class="price-before-discount">$ 800</span></div>
                                </div>
                                <!-- /.product-info -->
                                <div class="cart clearfix animate-effect">
                                    <div class="action">
                                        <ul class="list-unstyled">
                                            <li class="add-cart-button btn-group">
                                                <a href="{{ route('addToCart',['id'=> $itemAsus->id]) }}" class=""><button data-toggle="tooltip" class="btn btn-primary icon" type="button" title="Add Cart"><i class="fa fa-shopping-cart"></i></button></a>
                                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                            </li>
                                            <li class="lnk wishlist">
                                                <a class="add-to-cart" href="{{ route('product.detail',['slug'=>$itemAsus->p_slug,'id'=>$item->id]) }}" title="Wishlist"> <i class="icon fa fa-heart"></i> </a>
                                            </li>
                                            <li class="lnk">
                                                <a class="add-to-cart" href="{{ route('product.detail',['slug'=>$itemAsus->p_slug,'id'=>$item->id]) }}" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach 
                </div>
                <!-- /.home-owl-carousel -->
            </div>
            <!-- /.product-slider -->
        </div>
        <!-- /.tab-pane -->

        <div class="tab-pane" id="laptop">
            <div class="product-slider">
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
                    @foreach ($proGear as $itemGear)
                    <div class="item item-carousel">
                        <div class="products edit-product">
                            <div class="product">
                                <div class="product-image">
                                    <div class="image-new">
                                        <a href="detail.html"><img src="{{ $itemGear->image_path }}" alt="" /></a>
                                    </div>
                                    <!-- /.image -->
                                    @if ($itemGear->p_hot==0)
                                    <div class="tag new"><span>new</span></div> 
                                    @elseif($itemGear->p_hot==1)
                                    <div class="tag hot"><span>hot</span></div>
                                    @else
                                    <div class="tag sale"><span>sale</span></div>  
                                    @endif
                                </div>
                                <!-- /.product-image -->
                                <div class="product-info text-left" style="text-align: center;">
                                    <h3 class="name" style="height: 60px"><a href="{{ route('product.detail',['slug'=>$itemGear->p_slug,'id'=>$itemGear->id]) }}">{{ $itemGear->p_name }}</a></h3>
                                    <div class="rating rateit-small"></div>
                                    <div class="description"></div>
                                    <div class="product-price"><span class="price">{{ number_format($itemGear->p_price) }} đ</span> <span class="price-before-discount"></span></div>
                                </div>
                                <!-- /.product-info -->
                                <div class="cart clearfix animate-effect">
                                    <div class="action">
                                        <ul class="list-unstyled">
                                            <li class="add-cart-button btn-group">
                                                <a href="{{ route('addToCart',['id'=> $itemGear->id]) }}" class=""><button data-toggle="tooltip" class="btn btn-primary icon" type="button" title="Add Cart"><i class="fa fa-shopping-cart"></i></button></a>
                                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                            </li>
                                            <li class="lnk wishlist">
                                                <a class="add-to-cart" href="{{ route('product.detail',['slug'=>$itemGear->p_slug,'id'=>$itemGear->id]) }}" title="Wishlist"> <i class="icon fa fa-heart"></i> </a>
                                            </li>
                                            <li class="lnk">
                                                <a class="add-to-cart" href="{{ route('product.detail',['slug'=>$itemGear->p_slug,'id'=>$itemGear->id]) }}" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- /.tab-pane -->

        <div class="tab-pane" id="apple">
            <div class="product-slider">
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
                    @foreach ($proMoniter as $itemMonitor)
                    <div class="item item-carousel">
                        <div class="products edit-product">
                            <div class="product">
                                <div class="product-image">
                                    <div class="image-new">
                                        <a href="detail.html"><img src="{{ $itemMonitor->image_path }}" alt="" /></a>
                                    </div>
                                    @if ($itemMonitor->p_hot==0)
                                    <div class="tag new"><span>new</span></div> 
                                    @elseif($itemMonitor->p_hot==1)
                                    <div class="tag hot"><span>hot</span></div>
                                    @else
                                    <div class="tag sale"><span>sale</span></div>  
                                    @endif
                                </div>
                                <div class="product-info text-left" style="text-align: center;">
                                    <h3 class="name" style="height: 60px"><a href="{{ route('product.detail',['slug'=>$itemMonitor->p_slug,'id'=>$itemMonitor->id]) }}">{{ $itemGear->p_name }}</a></h3>
                                    <div class="rating rateit-small"></div>
                                    <div class="description"></div>
                                    <div class="product-price"><span class="price">{{ number_format($itemMonitor->p_price) }} đ</span> <span class="price-before-discount"></span></div>
                                </div>
                                <!-- /.product-info -->
                                <div class="cart clearfix animate-effect">
                                    <div class="action">
                                        <ul class="list-unstyled">
                                            <li class="add-cart-button btn-group">
                                                <a href="{{ route('addToCart',['id'=> $itemMonitor->id]) }}" class=""><button data-toggle="tooltip" class="btn btn-primary icon" type="button" title="Add Cart"><i class="fa fa-shopping-cart"></i></button></a>
                                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                            </li>
                                            <li class="lnk wishlist">
                                                <a class="add-to-cart" href="{{ route('product.detail',['slug'=>$itemMonitor->p_slug,'id'=>$itemMonitor->id]) }}" title="Wishlist"> <i class="icon fa fa-heart"></i> </a>
                                            </li>
                                            <li class="lnk">
                                                <a class="add-to-cart" href="{{ route('product.detail',['slug'=>$itemMonitor->p_slug,'id'=>$itemMonitor->id]) }}" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- /.tab-pane -->
    </div>
</div>