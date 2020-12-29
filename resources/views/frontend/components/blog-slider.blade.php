<section class="section latest-blog outer-bottom-vs wow fadeInUp">
    <h3 class="section-title">tin tức mới nhất</h3>
    <div class="blog-slider-container outer-top-xs">
        <div class="owl-carousel blog-slider custom-carousel">
            @foreach ($blogs as $blog)
            <div class="item">
                <div class="blog-post">
                    <div class="blog-post-image">
                        <div class="image">
                            <a href="{{ route('blogs.detail',['slug'=>$blog->b_slug,'id'=>$blog->id]) }}"><img class="blog-image" src="{{ $blog->b_image }}" alt="" /></a>
                        </div>
                    </div>
                    <!-- /.blog-post-image -->
                    <div class="blog-post-info text-left">
                        <h3 class="name"><a href="{{ route('blogs.detail',['slug'=>$blog->b_slug,'id'=>$blog->id]) }}">{{ $blog->b_name }}</a></h3>
                        <span class="info"><i class="fa fa-user"></i>  {{ $blog->b_author }} &nbsp;|&nbsp; <i class="fa fa-calendar"></i>  {{ ($blog->created_at)->format('d/m/Y') }} </span>
                        <p>{!! $blog->b_desc !!}</p>
                        <a href="{{ route('blogs.detail',['slug'=>$blog->b_slug,'id'=>$blog->id]) }}" class="lnk btn btn-primary">Xem thêm</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- /.owl-carousel -->
    </div>
    <!-- /.blog-slider-container -->
</section>