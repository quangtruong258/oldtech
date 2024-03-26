<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> oldtech@domain.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="{{ route('order.history') }}">Lịch sử đơn hàng</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="{{ route('customer.index') }}"><img src="frontend/images/home/logo.png"
                                alt="" /></a>
                    </div>
                    {{-- <div class="btn-group pull-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                USA
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#">Canada</a></li>
                                <li><a href="#">UK</a></li>
                            </ul>
                        </div>

                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                DOLLAR
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#">Canadian Dollar</a></li>
                                <li><a href="#">Pound</a></li>
                            </ul>
                        </div>
                    </div> --}}
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            {{-- <li><a href="#"><i class="fa fa-user"></i> Account</a></li> --}}
                            {{-- <li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li> --}}
                            {{-- <li><a href="checkout.html"><i class="fa fa-crosshairs"></i> Checkout</a></li> --}}
                            <li><a href="{{ route('cart.index') }}"><i class="fa fa-shopping-cart"></i>
                                    ({{ $carts->sum('quantity') }})</a></li>

                            @if (auth('cus')->check())
                                <li><a href="{{ route('customer.account.profile') }}">
                                        <i class="fa fa-user"></i>
                                        {{ auth('cus')->user()->name }}
                                    </a>
                                </li>
                                <li><a href="{{ route('customer.logout') }}">Đăng xuất</a></li>
                            @else
                                <li><a href="{{ route('customer.account.login') }}"><i class="fa fa-lock"></i>Đăng
                                        nhập</a></li>
                                <li><a href="{{ route('customer.account.register') }}">Đăng ký</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="{{ route('customer.index') }}" class="active">Trang chủ</a></li>
                            <li class="dropdown"><a href="#">Danh mục<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    @foreach ($categories as $category)
                                        <li><a
                                                href="{{ route('home.category', $category->id) }}">{{ $category->ten }}</a>
                                        </li>
                                    @endforeach

                                    <li><a href="product-details.html">Product Details</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                    <li><a href="cart.html">Cart</a></li>
                                    {{-- @if (auth('cus')->check())
                                        <li><a href="{{ route('customer.logout') }}">Đăng xuất</a></li>
                                        <li><a href="login.html">{{ auth('cus')->user()->name }}</a></li>
                                    @else
                                        <li><a href="login.html">Đăng nhập</a></li>
                                        <li><a href="login.html">Đăng ký</a></li>
                                    @endif --}}
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">Chính sách bảo hành<i class=""></i></a>

                            </li>
                            <li><a href="404.html">Phương thức vận chuyển</a></li>
                            <li><a href="contact-us.html">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <form action="{{ route('customer.search') }}" method="POST">
                        @csrf
                        <div class="search_box pull-right">
                            <input type="text" placeholder="Search" name="keyword" />
                            <button class="btn btn-warning" type="submit"  value="" name="search_product"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->
