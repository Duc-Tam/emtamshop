<div class="sidebar-widget product-tag wow fadeInUp tags">
    <h3 class="section-title">Product tags</h3>
    <div class="sidebar-widget-body outer-top-xs">
      <div class="tag-list">
        @foreach ($tags as $tagitem)
        <a class="item" title="Phone" href="category.html">{{ $tagitem->name }}</a> 
        @endforeach
      </div> 
    </div>
</div>