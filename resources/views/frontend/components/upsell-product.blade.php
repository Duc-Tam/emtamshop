<section class="section featured-product wow fadeInUp">
    <h3 class="section-title">SẢN PHẨM LIÊN QUAN</h3>
    <div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">
       @foreach ($relatedproduct as $relateditem)
       @if($product->id != $relateditem->id)
       <div class="item item-carousel">
          <div class="products edit-product">
             <div class="product">
                <div class="product-image">
                   <div class="image-new">
                      <a href="{{ route('product.detail',['slug'=>$relateditem->p_slug,'id'=>$relateditem->id]) }}"><img  src="{{ $relateditem->image_path }}" alt=""></a>
                   </div>
                   <!-- /.image -->
                   @if ($relateditem->p_hot==0)
                  <div class="tag new"><span>new</span></div> 
                  @elseif($relateditem->p_hot==1)
                  <div class="tag hot"><span>hot</span></div>
                  @else
                  <div class="tag sale"><span>sale</span></div>  
                  @endif
                </div>
                <!-- /.product-image -->
                <div class="product-info text-left" style="text-align: center;">
                   <h3 class="name" style="height: 60px"><a href="{{ route('product.detail',['slug'=>$relateditem->p_slug,'id'=>$relateditem->id]) }}">{{ $relateditem->p_name }}</a></h3>
                   <div class="rating rateit-small"></div>
                   <div class="description"></div>
                   <div class="product-price">
                      <span class="price">
                        {{ number_format($relateditem->p_price) }}			</span>
                      <span class="price-before-discount"></span>
                   </div>
                   <!-- /.product-price -->
                </div>
                <!-- /.product-info -->
                <div class="cart clearfix animate-effect">
                   <div class="action">
                      <ul class="list-unstyled">
                        <li class="add-cart-button btn-group">
                           <a href="{{ route('addToCart',['id'=> $relateditem->id]) }}" class=""><button data-toggle="tooltip" class="btn btn-primary icon" type="button" title="Add Cart"><i class="fa fa-shopping-cart"></i></button></a>
                           <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                       </li>
                         <li class="lnk wishlist">
                            <a class="add-to-cart" href="detail.html" title="Wishlist">
                            <i class="icon fa fa-heart"></i>
                            </a>
                         </li>
                         <li class="lnk">
                            <a class="add-to-cart" href="detail.html" title="Compare">
                            <i class="fa fa-signal"></i>
                            </a>
                         </li>
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
       @endif
       @endforeach
       <!-- /.item -->
    </div>
    <!-- /.home-owl-carousel -->
 </section>