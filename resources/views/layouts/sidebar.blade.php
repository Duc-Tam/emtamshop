<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
    <nav class="yamm megamenu-horizontal">
      <ul class="nav">
        @foreach ($categorys as $category)
        @if ($category->catChildren->count()) 
            <li class="dropdown menu-item"> <a href="" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="{{ $category->icon }}" aria-hidden="true"></i>  {{ $category->name }}</a>     
        @else
        <li class="dropdown menu-item"> <a href="{{ route('product.category',['slug'=>$category->slug,'id'=>$category->id]) }}">
          <i class="{{ $category->icon }}" aria-hidden="true"></i>  {{ $category->name }}</a>   
        @endif  
        <ul class="dropdown-menu mega-menu">
            <li class="yamm-content">
              <div class="row">
                <div class="col-sm-12 col-md-3">
                  <ul class="links list-unstyled">
                    @foreach ($category->catChildren as $item)
                    <li><a href="{{ route('product.category',['slug'=>$item->slug,'id'=>$item->id]) }}">{{ $item->name }}</a></li>  
                    @endforeach
                  </ul>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row --> 
            </li>    
          </ul>
        @endforeach
      </ul>
      <!-- /.nav --> 
    </nav>
  </div>