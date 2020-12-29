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
               <li class='active'>Blog</li>
            </ul>
         </div>
         <!-- /.breadcrumb-inner -->
      </div>
      <!-- /.container -->
   </div>
   <!-- /.breadcrumb -->
   <div class="body-content">
      <div class="container">
         <div class="row">
            <div class="blog-page">
               <div class="col-md-9 col-sm-8 col-xs-12">
                   @foreach ($blogs as $blog)
                    <div class="blog-post col-md-6 col-sm-12 col-xs-12">
                        <a href="{{ route('blogs.detail',['slug'=>$blog->b_slug,'id'=>$blog->id]) }}"><img class="img-responsive" src="{{ $blog->b_image }}" alt=""></a>
                        <h1><a href="{{ route('blogs.detail',['slug'=>$blog->b_slug,'id'=>$blog->id]) }}">{{ $blog->b_name }}</a></h1>
                        <span class="author">{{ $blog->b_author }}</span>
                        <span class="date-time">{{ ($blog->created_at)->format('d/m/Y') }}</span>
                        <p>{!! $blog->b_desc !!}...</p>
                        <a href="{{ route('blogs.detail',['slug'=>$blog->b_slug,'id'=>$blog->id]) }}" class="btn btn-upper btn-primary read-more">Xem Thêm</a>
                    </div>
                    @endforeach				
               </div>
               <div class="col-md-3 sidebar">
                  <div class="sidebar-module-container">
                     <div class="search-area outer-bottom-small">
                        <form>
                           <div class="control-group">
                              <input placeholder="Type to search" class="search-field">
                              <a href="#" class="search-button"></a>   
                           </div>
                        </form>
                     </div>
                     <div class="home-banner outer-top-n outer-bottom-xs">
                        <img src="{{ asset('frontend/assets/images/banners/bannerhome1.jpg') }}" alt="Image" style="width:100%">
                     </div>
                     <!-- ==============================================CATEGORY============================================== -->
                     <!-- ============================================== CATEGORY : END ============================================== -->						
                     <div class="sidebar-widget outer-bottom-xs wow fadeInUp">
                        <h3 class="section-title">tab widget</h3>
                        <ul class="nav nav-tabs">
                           <li class="active"><a href="#popular" data-toggle="tab">Tin mới nhất</a></li>
                           <li><a href="#recent" data-toggle="tab">Tin gần đây</a></li>
                        </ul>
                        <div class="tab-content" style="padding-left:0">
                           <div class="tab-pane active m-t-20" id="popular">
                              <div class="blog-post inner-bottom-30 " >
                                 <img class="img-responsive" src="{{ asset('frontend/assets/images/blog-post/blog_big_01.jpg') }}" alt="">
                                 <h4><a href="blog-details.html">Simple Blog Post</a></h4>
                                 <span class="review">6 Comments</span>
                                 <span class="date-time">12/06/16</span>
                                 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                              </div>
                           </div>
                           <div class="tab-pane m-t-20" id="recent">
                              <div class="blog-post inner-bottom-30" >
                                 <img class="img-responsive" src="{{ asset('frontend/assets/images/blog-post/blog_big_03.jpg') }}" alt="">
                                 <h4><a href="blog-details.html">Simple Blog Post</a></h4>
                                 <span class="review">6 Comments</span>
                                 <span class="date-time">5/06/16</span>
                                 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- ============================================== PRODUCT TAGS : END ============================================== -->					
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   @include('layouts.brands')
</div>
@endsection