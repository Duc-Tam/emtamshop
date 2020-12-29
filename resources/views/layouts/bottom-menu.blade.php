<div class="container">
    <div class="yamm navbar navbar-default" role="navigation">
      <div class="navbar-header">
     <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> 
     <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>
      <div class="nav-bg-class">
        <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
          <div class="nav-outer">
            <ul class="nav navbar-nav">
              <li class="active dropdown yamm-fw"> <a href="home.html" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">&nbsp;&nbsp;&nbsp;Home&nbsp;&nbsp;&nbsp;</a> </li>
              <li class="dropdown mega-menu"> 
              <a href="{{ route('product.allproduct') }}">&nbsp;&nbsp;&nbsp;Sản Phẩm&nbsp;&nbsp;&nbsp;<span class="menu-label hot-menu hidden-xs">hot</span> </a>
              </li>
              <li class="dropdown hidden-sm"> <a href="">&nbsp;&nbsp;&nbsp;Health & Beauty &nbsp;&nbsp;&nbsp;<span class="menu-label new-menu hidden-xs">new</span> </a> </li>
              <li class="dropdown"> <a href="{{ route('blogs.index') }}">&nbsp;&nbsp;&nbsp;Tin công nghệ&nbsp;&nbsp;&nbsp;</a> </li>
              <li class="dropdown"> <a href="">&nbsp;&nbsp;&nbsp;Tin khuyến mãi&nbsp;&nbsp;&nbsp;</a> </li>
              <li class="dropdown"> <a href="">&nbsp;&nbsp;&nbsp;Quy định bảo hành&nbsp;&nbsp;&nbsp;</a> </li>
              <li class="dropdown"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">&nbsp;&nbsp;&nbsp;Giới thiệu&nbsp;&nbsp;&nbsp;</a></li>
              {{-- <li class="dropdown  navbar-right special-menu"> <a href="#">Todays offer</a> </li> --}}
            </ul>
            <!-- /.navbar-nav -->
            <div class="clearfix"></div>
          </div>
          <!-- /.nav-outer --> 
        </div>
        <!-- /.navbar-collapse --> 
        
      </div>
      <!-- /.nav-bg-class --> 
    </div>
    <!-- /.navbar-default --> 
  </div>