@extends("layouts.master")

@section("title", 'Shop')

@section("content")
<section class="breadcrumb-section">
    <h2 class="sr-only">Site Breadcrumb</h2>
    <div class="container">
        <div class="breadcrumb-contents">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('client.index')}}">Home</a></li>
                    <li class="breadcrumb-item active">Shop</li>
                </ol>
            </nav>
        </div>
    </div>
</section>
<main class="inner-page-sec-padding-bottom">
    <div class="container">
        <div class="shop-toolbar mb--30">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-2 col-md-2 col-sm-6">
                    <!-- Product View Mode -->
                    <div class="product-view-mode">
                        <a href="#" class="sorting-btn" data-target="grid-four">
                            <span class="grid-four-icon">
                                <i class="fas fa-grip-vertical"></i><i class="fas fa-grip-vertical"></i>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 mt--10 mt-md--0 ">
                    <div class="sorting-selection">
                        <span>Sort By:</span>
                        <select class="form-control nice-select sort-select mr-0">
                            <option value="" selected="selected">Default Sorting</option>
                            <option value="a-z">Sort
                                By:Name (A - Z)</option>
                            <option value="z-a">Sort
                                By:Name (Z - A)</option>
                            <option value="l-h">Sort
                                By:Price (Low &gt; High)</option>
                            <option value="h-l">Sort
                                By:Price (High &gt; Low)</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="shop-product-wrap with-pagination with-pagination row space-db--30 shop-border grid-four">
            @foreach($products as $product)
            <div class="col-lg-4 col-sm-6">
                <div class="product-card ">
                    <div class="product-grid-content">
                        <div class="product-header">
                            <a href="" class="author">
                                {{$product->author}}
                            </a>
                            <h3><a href="{{route('client.shop.detail', $product->id)}}">{{$product->title}}</a></h3>
                        </div>
                        <div class="product-card--body">
                            <div class="card-image">
                                <img src="{{ asset($product->img)}}" alt="">
                                <div class="hover-contents">
                                    <a href="{{route('client.shop.detail', $product->id)}}" class="hover-image">
                                        <img src="{{ asset($product->img)}}" alt="">
                                    </a>
                                    <div class="hover-btns">
                                        <a href="{{ route('client.add',$product->id)}}" class="single-btn">
                                            <i class="fas fa-shopping-basket"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="price-block">
                                <span class="price">₼{{$product->price}}</span>
                                <span class="price-discount">{{$product->percent}}%</span>
                            </div>
                        </div>
                    </div>
                    <div class="product-list-content">
                        <div class="card-image">
                            <img src="{{ asset('front/assets//image/products/product-3.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        <!-- Pagination Block -->

        {!! $products->withQueryString()->links('pagination::bootstrap-5') !!}

    </div>
</main>
</div>
<!--=================================
  Brands Slider
===================================== -->

@endsection
@push('scripts')
<script>
    $(document).ready(function() {
        let url = '{{url()->current()}}';
        $('.sort-select').on('change', function() {
            console.log($(this).val());
            window.location.href = '?sort_by=' + $(this).val();
        });
    });
</script>
@endpush