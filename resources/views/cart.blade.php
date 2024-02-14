@extends("layouts.master")

@section("title", 'Cart')


@section("content")
<section class="breadcrumb-section">
    <h2 class="sr-only">Site Breadcrumb</h2>
    <div class="container">
        <div class="breadcrumb-contents">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('client.index')}}">Home</a></li>
                    <li class="breadcrumb-item active">Cart</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<main class="cart-page-main-block inner-page-sec-padding-bottom">
    <form action="{{route('client.cart.update')}}" method="post">
        @csrf
        <div class="cart_area cart-area-padding  ">
            <div class="container">
                <div class="page-section-title">
                    <h1>Shopping Cart</h1>
                </div>
                <div class="row">
                    <div class="col-12">
                        <!-- Cart Table -->
                        <div class="cart-table table-responsive mb--40">
                            <table class="table">
                                <!-- Head Row -->
                                <thead>
                                    <tr>
                                        <th class="pro-thumbnail">Image</th>
                                        <th class="pro-title">Product</th>
                                        <th class="pro-price">Price</th>
                                        <th class="pro-quantity">Quantity</th>
                                        <th class="pro-subtotal">Total</th>
                                        <th class="pro-remove"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Product Row -->
                                    @foreach($cartItems as $cartItem)
                                    <tr>
                                        <td class="pro-thumbnail"><a href="#"><img src="{{asset($cartItem->options['image'])}}" alt="Product"></a></td>
                                        <td class="pro-title"><a href="#">{{ $cartItem->name }}</a></td>
                                        <td class=" pro-price"><span>₼{{ $cartItem->price }}</span></td>
                                        <td class="pro-quantity">
                                            <div class="pro-qty">
                                                <div class="count-input-block">
                                                    <input type="number" name="qty[{{$cartItem->rowId}}]" data-price="{{$cartItem->price}}" data-id="{{$cartItem->id}}" class="form-control text-center qty_cart" value="{{$cartItem->qty}}">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="pro-subtotal subtotal_price" data-id="{{$cartItem->id}}"><span>₼{{ $cartItem->price * $cartItem->qty }}</span></td>
                                        <td class="pro-remove"><a href="{{ route('client.remove', $cartItem->rowId)}}"><i class="far fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                    <!-- Product Row -->
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="cart-section-2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12 d-flex">
                        <div class="cart-summary">
                            <div class="cart-summary-wrap">
                                <h4><span>Cart Summary</span></h4>
                                <h2>Grand Total <span class="text-primary grand_total">₼{{ Cart::subtotal()}}</span></h2>
                            </div>
                            <div class="cart-summary-button">
                                <a href="{{ route('client.checkout')}}" class="checkout-btn c-btn btn--primary">Checkout</a>
                                <button class="update-btn c-btn btn-outlined">Update Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</main>

@endsection

@push('scripts')
<script>
    $(document).ready(function() {

        let total = 0;

        $('.qty_cart').on('change', function(e) {
            total = 0;
            $('.qty_cart').each((i, elem) => {
                if ($(elem).data('id') != $(this).data('id')) {
                    total += +$(elem).val() * +$(elem).data('price');
                }
            });
            $(this).val($(this).val() > 1 ? $(this).val() : 1);
            const price = $(this).val() * $(this).data('price');
            const id = $(this).data('id');
            $(`.subtotal_price[data-id=${id}]`).text('₼' + price.toFixed(2));
            total += +price;
            $('.grand_total').text('₼' + total.toFixed(2))
        })
    });
</script>
@endpush
