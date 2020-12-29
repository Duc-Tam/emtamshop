<div class="top-bar animate-dropdown">
  <style>
    #account1 li:hover{
      background: #e1e1e1;
    }
  </style>
    <div class="container">
        <div class="header-top-inner">
            @if (Auth::check())
            <div class="cnt-block">
                <ul class="list-unstyled list-inline">
                    <li class="dropdown dropdown-small">
                        <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><i class="icon fa fa-user" style="color: white;"></i><span class="value">Xin chào: {{ Auth::user()->name }}</span><b class="caret"></b></a>
                        <ul class="dropdown-menu" id="account1">
                            <li><a href="{{ route('account.logout') }}">Đăng xuất</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="cnt-account" style="padding: 7px 12px;">
                <ul class="list-unstyled">
                <li><a href="{{ route('account.index') }}"><i class="icon fa fa-heart"></i>Quản lý tài khoản</a></li>
                </ul>
            </div>
            @else
            <div class="cnt-account" style="padding: 7px 12px;">
                <ul class="list-unstyled">
                <li><a href="{{ route('account.login') }}"><i class="icon fa fa-registered"></i>Đăng ký</a></li>
                <li><a href="{{ route('account.login') }}"><i class="icon fa fa-lock"></i>Đăng nhập</a></li>
                </ul>
            </div>
            @endif
            <div class="cnt-block">
                <ul class="list-unstyled list-inline">
                  <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">USD </span><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                      <li><a href="#">USD</a></li>
                      <li><a href="#">INR</a></li>
                      <li><a href="#">GBP</a></li>
                    </ul>
                  </li>
                  <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">English </span><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                      <li><a href="#">English</a></li>
                      <li><a href="#">French</a></li>
                      <li><a href="#">German</a></li>
                    </ul>
                  </li>
                </ul>
                <!-- /.list-unstyled --> 
              </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>