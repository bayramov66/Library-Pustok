@extends("layouts.master")

@section("title", 'Home')


@section("content")
<section class="hero-area hero-slider-4 ">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 offset-lg-3">
                <div class="sb-slick-slider" data-slick-setting='{
                                                                    "autoplay": true,
                                                                    "autoplaySpeed": 8000,
                                                                    "slidesToShow": 1,
                                                                    "dots":true
                                                                    }'>
                    @foreach($slides as $slide)
                    <div class="single-slide bg-image bg-overlay--dark" data-bg="{{ asset($slide->image_path)}}">
                        <div class="home-content text-center">
                            <div class="row justify-content-end">
                                <div class="col-lg-8">
                                    <h1 class="v2">{{$slide->title}}</h1>
                                    <h2>{{$slide->head}}</h2>
                                    <a href="{{route('client.shop')}}" class="btn btn--yellow">
                                        Shop Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>
<!--=================================
        Home Features Section
    ===================================== -->

<!--=================================
        Home Category Gallery
    ===================================== -->
<section class="mt-4 section-margin">
    <h2 class="sr-only">Category Gallery Section</h2>
    <div class="container">
        <div class="category-gallery-block">
            @foreach($images as $image)
            <a href="#" class="single-block hr-large">
                <img src="{{ asset($image->img)}}" alt="">
            </a>
            @endforeach
        </div>
    </div>
</section>
<!--=================================
        Home Two Column Section
    ===================================== -->
<section class="section-margin">
    <h1 class="sr-only">Promotion Section</h1>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="home-left-side text-center text-lg-left">
                    <div class="single-block">
                        <h3 class="home-sidebar-title">
                            BEST SELLERS
                        </h3>
                        <div class="product-slider product-list-slider multiple-row sb-slick-slider home-4-left-sidebar" data-slick-setting='{
                                            "autoplay": true,
                                            "autoplaySpeed": 8000,
                                            "slidesToShow":1,
                                            "rows":4,
                                            "dots":true
                                        }' data-slick-responsive='[
                                            {"breakpoint":1200, "settings": {"slidesToShow": 1} },
                                            {"breakpoint":992, "settings": {"slidesToShow": 2, "rows":2} },
                                            {"breakpoint":768, "settings": {"slidesToShow": 2, "rows":2} },
                                            {"breakpoint":575, "settings": {"slidesToShow": 1} },
                                            {"breakpoint":490, "settings": {"slidesToShow": 1} }
                                        ]'>
                            @foreach ($best_seller as $product)
                            <div class="single-slide">
                                <div class="product-card card-style-list">
                                    <div class="card-image">
                                        <img src="{{ asset($product->img)}}" alt="">
                                    </div>
                                    <div class="product-card--body">
                                        <div class="product-header">
                                            <a href="#" class="author">
                                                {{$product->author}}
                                            </a>
                                            <h3><a href="{{route('client.shop.detail', '$product->id')}}">{{$product->title}}</a></h3>
                                        </div>
                                        <div class="price-block">
                                            <span class="price">£{{$product->price}}</span>
                                            <span class="price-discount">{{$product->percent}}%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>



                </div>
            </div>
            <div class="col-lg-8">
                <div class="home-right-side">
                    <div class="single-block">
                        <div class="sb-custom-tab text-lg-left text-center">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="shop-tab" data-toggle="tab" href="#shop" role="tab" aria-controls="shop" aria-selected="true">
                                        Featured Products
                                    </a>
                                    <span class="arrow-icon"></span>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="men-tab" data-toggle="tab" href="#men" role="tab" aria-controls="men" aria-selected="true">
                                        New Arrivals
                                    </a>
                                    <span class="arrow-icon"></span>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="woman-tab" data-toggle="tab" href="#woman" role="tab" aria-controls="woman" aria-selected="false">
                                        Most view products
                                    </a>
                                    <span class="arrow-icon"></span>
                                </li>
                            </ul>
                            <div class="tab-content space-db--30" id="myTabContent">
                                <div class="tab-pane active" id="shop" role="tabpanel" aria-labelledby="shop-tab">
                                    <div class="product-slider multiple-row slider-border-multiple-row  sb-slick-slider" data-slick-setting='{
                        "autoplay": true,
                        "autoplaySpeed": 8000,
                        "slidesToShow": 3,
                        "rows":2,
                        "dots":true
                    }' data-slick-responsive='[
                        {"breakpoint":992, "settings": {"slidesToShow": 3} },
                        {"breakpoint":768, "settings": {"slidesToShow": 2} },
                        {"breakpoint":480, "settings": {"slidesToShow": 1} },
                        {"breakpoint":320, "settings": {"slidesToShow": 1} }
                    ]'>

                                        @foreach($productimgs as $image)
                                        <div class="single-slide">
                                            <div class="product-card">
                                                <div class="product-header">
                                                    <a href="" class="author">
                                                        {{$image->author}}
                                                    </a>
                                                    <h3><a href="{{route('client.shop.detail', $image->id)}}">{{$image->title}}</a></h3>
                                                </div>
                                                <div class="product-card--body">
                                                    <div class="card-image">
                                                        <img src="{{ asset($image->img)}}" alt="">
                                                        <div class="hover-contents">
                                                            <a href="{{route('client.shop.detail', $image->id)}}" class="hover-image">
                                                                <img src="{{ asset($image->img)}}" alt="">
                                                            </a>
                                                            <div class="hover-btns">
                                                                <a href="{{ route('client.add',$image->id)}}" class="single-btn">
                                                                    <i class="fas fa-shopping-basket"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="price-block">
                                                        <span class="price">₼{{$image->price}}</span>
                                                        <span class="price-discount">{{$image->percent}}%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach

                                    </div>
                                </div>
                                <div class="tab-pane" id="men" role="tabpanel" aria-labelledby="men-tab">
                                    <div class="product-slider multiple-row slider-border-multiple-row  sb-slick-slider" data-slick-setting='{
                                    "autoplay": true,
                                    "autoplaySpeed": 8000,
                                    "slidesToShow": 3,
                                    "rows":2,
                                    "dots":true
                                    }' data-slick-responsive='[
                            {"breakpoint":992, "settings": {"slidesToShow": 3} },
                            {"breakpoint":768, "settings": {"slidesToShow": 2} },
                            {"breakpoint":480, "settings": {"slidesToShow": 1} },
                            {"breakpoint":320, "settings": {"slidesToShow": 1} }
                        ]'>

                                        @foreach($arrivals as $image)
                                        <div class="single-slide">
                                            <div class="product-card">
                                                <div class="product-header">
                                                    <a href="" class="author">
                                                        {{$image->author}}
                                                    </a>
                                                    <h3><a href="{{route('client.shop.detail', $image->id)}}">{{$image->title}}</a></h3>
                                                </div>
                                                <div class="product-card--body">
                                                    <div class="card-image">
                                                        <img src="{{ asset($image->img)}}" alt="">
                                                        <div class="hover-contents">
                                                            <a href="{{route('client.shop.detail', $image->id)}}" class="hover-image">
                                                                <img src="{{ asset($image->img)}}" alt="">
                                                            </a>
                                                            <div class="hover-btns">
                                                                <a href="{{ route('client.add',$image->id)}}" class="single-btn">
                                                                    <i class="fas fa-shopping-basket"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="price-block">
                                                        <span class="price">₼{{$image->price}}</span>
                                                        <span class="price-discount">{{$image->percent}}%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane" id="woman" role="tabpanel" aria-labelledby="woman-tab">
                                    <div class="product-slider multiple-row slider-border-multiple-row  sb-slick-slider" data-slick-setting='{
                                    "autoplay": true,
                                    "autoplaySpeed": 8000,
                                    "slidesToShow": 3,
                                    "rows":2,
                                    "dots":true
                                }' data-slick-responsive='[
                                        {"breakpoint":992, "settings": {"slidesToShow": 3} },
                                        {"breakpoint":768, "settings": {"slidesToShow": 2} },
                                        {"breakpoint":480, "settings": {"slidesToShow": 1} },
                                        {"breakpoint":320, "settings": {"slidesToShow": 1} }
                                    ]'>

                                        @foreach($most_views as $image)
                                        <div class="single-slide">
                                            <div class="product-card">
                                                <div class="product-header">
                                                    <a href="" class="author">
                                                        {{$image->author}}
                                                    </a>
                                                    <h3><a href="{{route('client.shop.detail', $image->id)}}">{{$image->title}}</a></h3>
                                                </div>
                                                <div class="product-card--body">
                                                    <div class="card-image">
                                                        <img src="{{ asset($image->img)}}" alt="">
                                                        <div class="hover-contents">
                                                            <a href="{{route('client.shop.detail', $image->id)}}" class="hover-image">
                                                                <img src="{{ asset($image->img)}}" alt="">
                                                            </a>
                                                            <div class="hover-btns">
                                                                <a href="{{ route('client.add',$image->id)}}" class="single-btn">
                                                                    <i class="fas fa-shopping-basket"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="price-block">
                                                        <span class="price">₼{{$image->price}}</span>
                                                        <span class="price-discount">{{$image->percent}}%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
</section>

<!--=================================
    Footer
===================================== -->
</div>
<!--=================================
  Brands Slider
===================================== -->

@endsection
