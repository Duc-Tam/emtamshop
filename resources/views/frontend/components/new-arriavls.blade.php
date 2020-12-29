<section class="section wow fadeInUp new-arriavls">
    <h3 class="section-title">SẢN PHẨM MUA NHIỀU</h3>
    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
        @foreach ($productsale as $saleitem)  
        <div class="item item-carousel">
            <div class="products edit-product">
                <div class="product">
                    <div class="product-image">
                        <div class="image-new">
                            <a href="{{ route('product.detail',['slug'=>$saleitem->p_slug,'id'=>$saleitem->id]) }}"><img src="{{ $saleitem->image_path }}" alt="" /></a>
                        </div>
                        <div class="tag new"><span>sale</span></div>
                    </div>
                    <div class="product-info text-left" style="text-align: center">
                        <h3 class="name" style="height: 60px"><a href="{{ route('product.detail',['slug'=>$saleitem->p_slug,'id'=>$saleitem->id]) }}">{{ $saleitem->p_name }}</a></h3>
                        <div class="rating rateit-small"></div>
                        <div class="description"></div>
                        <div class="product-price"><span class="price">{{ number_format($saleitem->p_price) }}</span> <span class="price-before-discount">$ 800</span></div>
                    </div>
                    <div class="cart clearfix animate-effect">
                        <div class="action">
                            <ul class="list-unstyled">
                                <li class="add-cart-button btn-group">
                                    <a href="{{ route('addToCart',['id'=> $saleitem->id]) }}" class=""><button data-toggle="tooltip" class="btn btn-primary icon" type="button" title="Add Cart"><i class="fa fa-shopping-cart"></i></button></a>
                                    <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                </li>
                                <li class="lnk wishlist">
                                    <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a>
                                </li>
                                <li class="lnk">
                                    <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>