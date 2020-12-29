@extends('master-frontend')
@section('css')
    <link rel="stylesheet" href="{{ asset('frontend/product/home/image.css') }}">
@endsection
@section('content')
<!-- ============================================== SCROLL TABS ============================================== -->
<div class="container">
    <div class="row">
        <!-- ============================================== SIDEBAR ============================================== -->
        <div class="col-xs-12 col-sm-12 col-md-3 sidebar">
            <!-- ================================== TOP NAVIGATION ================================== -->
            @include('layouts.sidebar')
            @include('layouts.hot-deals') 
            @include('layouts.specials-offer') 
            @include('layouts.product-tags') 
            @include('layouts.special-deals') 
            @include('layouts.newsletter') 
            @include('layouts.testimonials')
        </div>
        <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
            <!-- ========================================== SECTION – HERO ========================================= -->
            @include('frontend.components.slider')
            @include('layouts.infobox')
            <!-- ============================================== NEW PRODUCT ============================================== -->
            @include('frontend.components.new-product')
            <!-- ============================================== NEW PRODUCT : END ============================================== -->
            <!-- ============================================== WIDE PRODUCTS ============================================== -->
            <div class="wide-banners wow fadeInUp outer-bottom-xs">
                <div class="row">
                    <div class="col-md-7 col-sm-7">
                        <div class="wide-banner cnt-strip">
                            <div class="image"><img class="img-responsive" src="{{ asset('frontend/assets/images/banners/bannerhome1.jpg') }}" alt="" /></div>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-5">
                        <div class="wide-banner cnt-strip">
                            <div class="image"><img class="img-responsive" src="{{ asset('frontend/assets/images/banners/bannerhome.jpg') }}" alt="" /></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
            <!-- ============================================== FEATURED PRODUCTS ============================================== -->
            @include('frontend.components.featured-product')
            <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->
            <!-- ============================================== WIDE PRODUCTS ============================================== -->
            <div class="wide-banners wow fadeInUp outer-bottom-xs">
                <div class="row">
                    <div class="col-md-12">
                        <div class="wide-banner cnt-strip">
                            <div class="image"><img class="img-responsive" src="{{ asset('frontend/assets/images/banners/banner.jpg') }}" alt="" /></div>
                            <div class="strip strip-text">
                                <div class="strip-inner">
                                    <h2 class="text-right">
                                        New Mens Fashion<br />
                                        <span class="shopping-needs">Save up to 40% off</span>
                                    </h2>
                                </div>
                            </div>
                            <div class="new-label">
                                <div class="text">NEW</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
            <!-- ============================================== BEST SELLER ============================================== -->
            @include('frontend.components.best-seller')
            <!-- ============================================== BEST SELLER : END ============================================== -->

            <!-- ============================================== BLOG SLIDER ============================================== -->
            @include('frontend.components.blog-slider')
            <!-- ============================================== BLOG SLIDER : END ============================================== -->

            <!-- ============================================== FEATURED PRODUCTS ============================================== -->
            @include('frontend.components.new-arriavls')
            <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->
        </div>
    </div>
    @include('layouts.brands')
</div>
@endsection
