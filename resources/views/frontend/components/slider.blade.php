<div id="hero">
    <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
      @foreach ($slider as $item)
      <div class="item">
        <img class="slider-image" src="{{ $item->images_path }}" alt="">
        {{-- <div class="container-fluid">
          <div class="caption bg-color vertical-center text-left">
            <div class="slider-header fadeInDown-1">Top Brands</div>
            <div class="big-text fadeInDown-1">{{ $item->name }}</div>
            <div class="excerpt fadeInDown-2 hidden-xs"> <span>{{ $item->description }}.</span> </div>
            <div class="button-holder fadeInDown-3"> <a href="index.php?page=single-product" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a> </div>
          </div>
          <!-- /.caption --> 
        </div> --}}
        <!-- /.container-fluid --> 
      </div>
      @endforeach
      <!-- /.item --> 
      
    </div>
    <!-- /.owl-carousel --> 
  </div>