<div class="site-wrapper" id="top">
    <div class="site-header header-4 mb--20 d-none d-lg-block">

        <div class="header-middle pt--10 pb--10">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3">
                        <a href="{{ route('client.index')}}" class="site-brand">
                            <img src="{{ asset('front/assets/image/logo.png')}}" alt="">
                        </a>
                    </div>
                    <div class="col-lg-5">
                        <div class="header-search-block">
                            <form action="{{ route('client.search') }}" method="GET">
                                <input type="text" name="query" placeholder="Axtarış" value="{{ isset($query) ? $query : '' }}">
                                <button onclick="searchProducts()">Search</button>
                            </form>
                        </div>
                    </div>
                    <d iv class="col-lg-4">
                        <div class="main-navigation flex-lg-right">
                            @auth
                            <div class="cart-widget">
                                <div class="login-block">
                                    <a href="{{ route('client.account') }}">{{ auth()->user()->name }}</a>
                                    <a href="{{ route('client.logout') }}" class="font-weight-bold">Logout</a>
                                </div>
                                <div class="cart-block">
                                    <div class="cart-total">
                                        <span class="text-number">
                                            {{Cart::count()}}
                                        </span>
                                        <span class="text-item">
                                            Shopping Cart
                                        </span>
                                        <span class="price">
                                            ₼{{Cart::subtotal()}}
                                            <i class="fas fa-chevron-down"></i>
                                        </span>
                                    </div>
                                    <div class="cart-dropdown-block">
                                        <div class=" single-cart-block ">
                                            @foreach (Cart::content() as $cart)
                                            <div class="cart-product">
                                                <a href="{{route('client.shop.detail', $cart->id)}}" class="image">
                                                    <img src="{{asset($cart->options['image'])}}"" alt="">
                                                </a>
                                                <div class=" content">
                                                    <h3 class="title"><a href="{{route('client.shop.detail', 'slug')}}">{{$cart->name}}</a>
                                                    </h3>
                                                    <p class="price"><span class="qty">{{$cart->qty}} ×</span> ₼{{$cart->price}}</p>
                                                    <a href="{{ route('client.remove', $cart->rowId)}}" class="cross-btn"><i class="fas fa-times"></i></a>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class=" single-cart-block ">
                                        <div class="btn-block">
                                            <a href="{{ route('client.cart')}}" class="btn">View Cart <i class="fas fa-chevron-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="cart-widget">
                            <div class="login-block">
                                <a href="{{ route('client.login') }}" class="font-weight-bold">Login</a> <br>
                                <span>or</span><a href="{{ route('client.register')}}">Register</a>
                            </div>
                            <div class="cart-block">
                                <div class="cart-total">
                                    <span class="text-number">
                                        {{Cart::count()}}
                                    </span>
                                    <span class="text-item">
                                        Shopping Cart
                                    </span>
                                    <span class="price">
                                        ₼{{Cart::subtotal()}}
                                        <i class="fas fa-chevron-down"></i>
                                    </span>
                                </div>
                                <div class="cart-dropdown-block">
                                    <div class=" single-cart-block ">
                                        @foreach (Cart::content() as $cart)
                                        <div class="cart-product">
                                            <a href="{{route('client.shop.detail', $cart->id)}}" class="image">
                                                <img src="{{asset($cart->options['image'])}}"" alt="">
                                                </a>
                                                <div class=" content">
                                                <h3 class="title"><a href="{{route('client.shop.detail', $cart->id)}}">{{$cart->name}}</a>
                                                </h3>
                                                <p class="price"><span class="qty">{{$cart->qty}} ×</span> ₼{{$cart->price}}</p>
                                                <a class="cross-btn" href="{{ route('client.remove', $cart->rowId)}}"><i class="fas fa-times"></i></a>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class=" single-cart-block ">
                                    <div class="btn-block">
                                        <a href="{{ route('client.cart')}}" class="btn">View Cart <i class="fas fa-chevron-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endauth
                </div>
                </d>
            </div>
        </div>
    </div>
    <div class="header-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <nav class="category-nav  primary-nav {{ request()->routeIs('client.index') ? 'show' : '' }}">
                        <div>
                            <a href="javascript:void(0)" class="category-trigger"><i class="fa fa-bars"></i>Browse
                                categories</a>
                            <ul class="category-menu">
                                @foreach($categories as $category)
                                <li class="cat-item has-children">
                                    <a href="{{route('client.shop', $category->slug)}}">{{$category->title}}</a>
                                    @if($category->subcategories && $category->subcategories->count() > 0)
                                    <ul class="sub-menu">
                                        @foreach($category->subcategories as $cat)
                                        <li><a href="{{route('client.shop', $cat->slug)}}">{{$cat->title}}</a></li>
                                        @endforeach
                                    </ul>
                                    @endif
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header-phone ">
                        <div class="icon">
                            <i class="fas fa-headphones-alt"></i>
                        </div>
                        <div class="text">
                            <p>Free Support 24/7</p>
                            <p class="font-weight-bold number">{{$settings->phone}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="main-navigation flex-lg-right">
                        <ul class="main-menu menu-right li-last-0">
                            <li class="menu-item has-children">
                                <a href="{{ route('client.index')}}">Home </a>
                            </li>
                            <!-- Shop -->
                            <li class="menu-item has-children mega-menu">
                                <a href="{{ route('client.shop')}}">shop</a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('client.contact')}}">Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="site-mobile-menu">
    <header class="mobile-header d-block d-lg-none pt--10 pb-md--10">
        <div class="container">
            <div class="row align-items-sm-end align-items-center">
                <div class="col-md-4 col-7">
                    <a href="{{ route('client.index')}}" class="site-brand">
                        <img src="{{ asset('front/assets/image/logo.png')}}" alt="">
                    </a>
                </div>
                <div class="col-md-5 order-3 order-md-2">
                    <nav class="category-nav   ">
                        <div>
                            <a href="javascript:void(0)" class="category-trigger"><i class="fa fa-bars"></i>Browse
                                categories</a>
                            <ul class="category-menu">
                                <li class="cat-item has-children">
                                    <a href="#">Arts & Photography</a>
                                    <ul class="sub-menu">
                                        <li><a href="#">Bags & Cases</a></li>
                                        <li><a href="#">Binoculars & Scopes</a></li>
                                        <li><a href="#">Digital Cameras</a></li>
                                        <li><a href="#">Film Photography</a></li>
                                        <li><a href="#">Lighting & Studio</a></li>
                                    </ul>
                                </li>
                                <li class="cat-item has-children mega-menu"><a href="#">Biographies</a>
                                    <ul class="sub-menu">
                                        <li class="single-block">
                                            <h3 class="title">WHEEL SIMULATORS</h3>
                                            <ul>
                                                <li><a href="#">Bags & Cases</a></li>
                                                <li><a href="#">Binoculars & Scopes</a></li>
                                                <li><a href="#">Digital Cameras</a></li>
                                                <li><a href="#">Film Photography</a></li>
                                                <li><a href="#">Lighting & Studio</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="cat-item has-children"><a href="#">Business & Money</a>
                                    <ul class="sub-menu">
                                        <li><a href="">Brake Tools</a></li>
                                        <li><a href="">Driveshafts</a></li>
                                        <li><a href="">Emergency Brake</a></li>
                                        <li><a href="">Spools</a></li>
                                    </ul>
                                </li>
                                <li class="cat-item has-children"><a href="#">Calendars</a>
                                    <ul class="sub-menu">
                                        <li><a href="">Brake Tools</a></li>
                                        <li><a href="">Driveshafts</a></li>
                                        <li><a href="">Emergency Brake</a></li>
                                        <li><a href="">Spools</a></li>
                                    </ul>
                                </li>
                                <li class="cat-item has-children"><a href="#">Children's Books</a>
                                    <ul class="sub-menu">
                                        <li><a href="">Brake Tools</a></li>
                                        <li><a href="">Driveshafts</a></li>
                                        <li><a href="">Emergency Brake</a></li>
                                        <li><a href="">Spools</a></li>
                                    </ul>
                                </li>
                            </ul>
                            </li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="col-md-3 col-5  order-md-3 text-right">
                    <div class="mobile-header-btns header-top-widget">
                        <ul class="header-links">
                            <li class="sin-link">
                                <a href="{{ route('client.cart')}}" class="cart-link link-icon"><i class="ion-bag"></i></a>
                            </li>
                            <li class="sin-link">
                                <a href="javascript:" class="link-icon hamburgur-icon off-canvas-btn"><i class="ion-navicon"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--Off Canvas Navigation Start-->
    <aside class="off-canvas-wrapper">
        <div class="btn-close-off-canvas">
            <i class="ion-android-close"></i>
        </div>
        <div class="off-canvas-inner">
            <!-- search box start -->
            <div class="search-box offcanvas">
                <form>
                    <input type="text" placeholder="Search Here">
                    <button class="search-btn"><i class="ion-ios-search-strong"></i></button>
                </form>
            </div>
            <!-- search box end -->
            <!-- mobile menu start -->
            <div class="mobile-navigation">
                <!-- mobile menu navigation start -->
                <nav class="off-canvas-nav">
                    <ul class="mobile-menu main-mobile-menu">
                        <li class="menu-item-has-children">
                            <a href="{{ route('client.index')}}">Home</a>

                        </li>

                        <li class="menu-item-has-children">
                            <a href="{{ route('client.shop',  $category->slug)}}">Shop</a>
                        </li>

                        <li><a href="{{ route('client.contact')}}">Contact</a></li>
                    </ul>
                </nav>
                <!-- mobile menu navigation end -->
            </div>
            <!-- mobile menu end -->
            <nav class="off-canvas-nav">
                <ul class="mobile-menu menu-block-2">
                    <li class="menu-item-has-children">
                        <a href="#">Currency - USD $ <i class="fas fa-angle-down"></i></a>
                        <ul class="sub-menu">
                            <li> <a href="{{ route('client.cart')}}">USD $</a></li>
                            <li> <a href="{{ route('client.checkout')}}">EUR €</a></li>
                        </ul>
                    </li>

                    <li class="menu-item-has-children">
                        <a href="#">My Account <i class="fas fa-angle-down"></i></a>
                        <ul class="sub-menu">
                            <li><a href="">My Account</a></li>
                            <li><a href="">Order History</a></li>
                            <li><a href="">Transactions</a></li>
                            <li><a href="">Downloads</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <div class="off-canvas-bottom">
                <div class="contact-list mb--10">
                    <a href="" class="sin-contact"><i class="fas fa-mobile-alt"></i>{{$settings->phone}}</a>
                    <a href="" class="sin-contact"><i class="fas fa-envelope"></i>{{$settings->email}}</a>
                </div>
                <div class="off-canvas-social">
                    <a href="{{$settings->url_fb}}" class="single-icon"><i class="fab fa-facebook-f"></i></a>
                    <a href="{{$settings->url_tw}}" class="single-icon"><i class="fab fa-twitter"></i></a>
                    <a href="{{$settings->url_yt}}" class="single-icon"><i class="fab fa-youtube"></i></a>
                    <a href="{{$settings->url_gp}}" class="single-icon"><i class="fab fa-google-plus-g"></i></a>
                </div>
            </div>
        </div>
    </aside>
    <!--Off Canvas Navigation End-->
</div>
<div class="sticky-init fixed-header common-sticky">
    <div class="container d-none d-lg-block">
        <div class="row align-items-center">
            <div class="col-lg-4">
                <a href="{{ route('client.index')}}" class="site-brand">
                    <img src="{{ asset('front/assets/image/logo.png')}}" alt="">
                </a>
            </div>
            <div class="col-lg-8">
                <div class="main-navigation flex-lg-right">
                    <ul class="main-menu menu-right ">
                        <li class="menu-item has-children">
                            <a href="{{ route('client.index')}}">Home </a>

                        </li>
                        <!-- Shop -->
                        <li class="menu-item has-children mega-menu">
                            <a href="{{ route('client.shop',  $category->slug)}}">shop </a>

                        </li>

                        <li class="menu-item">
                            <a href="{{ route('client.contact')}}">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</div>