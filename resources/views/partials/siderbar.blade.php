<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a>
        </div>
        <div class="clearfix"></div>
        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="{{ asset('frontend/assets/images/avatar.jpg') }}" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{ Auth::user()->name }}</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->
        <br/>
        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    <li><a href="{{ URL::to('/admin-api') }}"><i class="fa fa-home"></i> Trang chủ</a></li>
                    @can('list_category')
                    <li><a href="{{ route('categories.index') }}"><i class="fa fa fa-building-o"></i> Danh mục</a></li>
                    @endcan
                    @can('list_product')
                    <li><a href="{{ route('product.index') }}"><i class="fa fa-newspaper-o"></i> Sản phẩm</a></li>   
                    @endcan
                    @can('list_slider')
                    <li><a href="{{ route('slider.index') }}"><i class="fa fa-sliders"></i> Silders</a></li>    
                    @endcan
                    @can('list_settings')
                    <li><a href="{{ route('settings.index') }}"><i class="fa fa-cog"></i> Settings</a></li>    
                    @endcan
                    @can('list_user')
                    <li><a href="{{ route('users.index') }}"><i class="fa fa-user"></i> Người dùng</a></li>    
                    @endcan
                    @can('list_transaction')
                    <li><a href="{{ route('transaction.index') }}"><i class="fa fa-product-hunt"></i> Đơn hàng</a></li>    
                    @endcan
                    @can('list_comments')
                    <li><a href="{{ route('comments.index') }}"><i class="fa fa-comments"></i>Bình luận</a></li>
                    <li><a href="{{ route('Adminblogs.index') }}"><i class="fa fa-comments"></i>Blog</a></li>    
                    @endcan
                    @can('list_user')
                    <li><a href="{{ route('roles.index') }}">Danh sách vai trò</a></li>
                    <li><a href="{{ route('permissions.create') }}">Thêm mới permission</a></li>   
                    @endcan
                    
                </ul>
            </div>
        </div>
        <!-- /sidebar menu -->
        <!-- /menu footer buttons -->
    </div>
</div>