@php
    use Illuminate\Support\Str;
    $title = 'Shopping Cart';

@endphp
@extends('front-end.layouts.app')
@section('page_content')
    <ul class="breadcrumb">
        <li><a href="{{ route('home_page') }}"><i class="fa fa-home"></i></a></li>
        <li><a href="javascript:voide(0)">{{ $title }}</a></li>
    </ul>
    <div id="checkout-cart" class="container">

        <div class="row">
            <div id="content" class="col-sm-12">
                <h1 class="title page-title cart-page-title">{{ $title }}
                </h1>
                <div id="content-top">
                    <div class="grid-rows">
                        <div class="grid-row grid-row-content-top-1">
                            <div class="grid-cols">
                                <div class="grid-col grid-col-content-top-1-1">
                                    <div class="grid-items">
                                        <div class="grid-item grid-item-content-top-1-1-1">
                                            <div class="module module-blocks module-blocks-288 blocks-grid">
                                                <div class="module-body cart-module-body">
                                                    <div class="module-item module-item-1 no-expand">
                                                        <div class="block-body expand-block">
                                                            <div class="block-wrapper">
                                                                <div class="block-content  block-html">
                                                                    <div style="text-align: justify;"><b>
                                                                            <font color="#f16027">সম্মানিত ক্রেতা</font>,
                                                                            অর্ডারটি কনফার্ম করতে <font color="#f16027">
                                                                                Checkout</font>
                                                                            বাটনে ক্লিক করে পরবর্তী স্টেপে প্রবেশ করুন ,
                                                                            অথবা আপনি যদি আরও প্রোডাক্ট
                                                                            ক্রয় করতে চান তাহলে <font color="#f16027">
                                                                                Continue Shopping</font> বাটনে ক্লিক করুন।
                                                                        </b>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="cart-page nh--paikarihat">
                    {{-- <form action="#" method="post" enctype="multipart/form-data" class="cart-table"> --}}
                    <div class="cart-table custom--cart-page">
                        @if ($carts->isNotEmpty())
                            <div class="table-responsive">
                                <table class="table table-bordered nh__cart__table">
                                    <thead>
                                        <tr>
                                            <td class="text-center td-image">নাম ও ছবি</td>
                                            <td class="text-center td-image">প্রোডাক্টের মূল্য</td>
                                            <td class="text-center td-qty">কোয়ান্টিটি</td>
                                            <td class="text-center td-total">মোট প্রোডাক্টের মূল্য</td>
                                            <td class="text-center td-total">ডিলিট প্রোডাক্ট</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($carts as $key => $cart)
                                            <tr class="cart__tr_bg_color">
                                                <td class=" td-image">
                                                    <div class="" style="padding-bottom:10px">
                                                        <img src="{{ asset('storage/products/' . $cart->product->photo) }}"
                                                            alt="image" class="image-responsive "
                                                            style="width: 60px;height:60px">
                                                    </div>
                                                    <p>
                                                        {{-- {{ Str::limit($cart->product->title, $limit = 10, $end = '...') }} --}}
                                                        {{ $cart->product->title }}
                                                    </p>
                                                    <p
                                                        style="background:{{ $cart->product->product_type == 'PRE' ? '#FED430' : 'none' }}; color:#000; width:max-content; padding:2px 8px;font-weight:700 ">
                                                        @if ($cart->product->product_type != 'REG')
                                                            Pre Order
                                                        @endif
                                                    </p>

                                                </td>
                                                <td class=" td-image">
                                                    <p>
                                                        {{ $cart->product->price - $cart->product->discount_amount }} ৳
                                                    </p>
                                                    <del class="qc-price-del-color">
                                                         {{ $cart->product->price }} ৳
                                                    </del>
                                                </td>
                                                <td class="text-center td-qty">
                                                    <div class="input-group btn-block cart--quantity--btn">
                                                        <div class="stepper">
                                                            <input type="hidden" name=""
                                                                id="unit_price_{{ $key }}"
                                                                value="{{ $cart->unit_price }}">
                                                            <input type="hidden" name=""
                                                                id="product_id_{{ $key }}"
                                                                value="{{ $cart->id }}">
                                                            <input type="text" name="quantity"
                                                                value="{{ $cart->quantity }}" size="1"
                                                                id="CurrentQty_{{ $key }}" class="form-control"
                                                                min="1" readonly>
                                                            <span>
                                                                <i class="fa fa-angle-up"
                                                                    onClick="manageQuantity({{ $key }}, 'increment')"></i>
                                                                <i class="fa fa-angle-down"
                                                                    onClick="manageQuantity({{ $key }}, 'decrement')"></i>
                                                            </span>
                                                        </div>

                                                    </div>
                                                </td>
                                                <td class="text-center td-price"> {{ $cart->unit_price }} ৳</td>
                                                <td class="text-center td-total" id="subTotal_{{ $key }}">
                                                     {{ ($cart->unit_price -$cart->product->discount_amount) * $cart->quantity }} ৳
                                                </td>
                                                <td>
                                                    <span class="input-group-btn">
                                                        <a href="{{ route('product_delete_cart', $cart->id) }}"
                                                            class="btn btn-remove cart_item__remove">
                                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                        </a>
                                                    </span>
                                                </td>
                                            </tr>
                                        @empty
                                            <p>Your shopping cart is empty!</p>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            {{-- </form> --}}
                            <div class="cart-bottom">
                                <div class="panels-total">
                                    <div class="cart-total">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td class="text-right"><strong>মোট বিল:</strong></td>
                                                    <td class="text-right" id="totalPrice"> {{ $totalprice }} ৳</td>
                                                </tr>
                                                {{-- <tr>
                                                    <td class="text-right"><strong><b>ডেলিভারী চার্জ</b>:</strong></td>
                                                    <td class="text-right">150 TAKA</td>
                                                </tr> --}}
                                                {{-- <tr>
                                                    <td class="text-right"><strong>মোট বিল:</strong></td>
                                                    <td class="text-right">{{ $totalprice }} TAKA</td>
                                                </tr> --}}
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="buttons clearfix">
                                    <div class="pull-left add_to_cart_continue_btn"><a href="{{ route('home_page') }}"
                                            class="btn btn-default"><span>Continue
                                                Shopping</span></a></div>
                                    <div class="pull-right add_to_cart_checkout_btn"><a href="{{ route('checkout_details', $cart->product_id) }}"
                                            class="btn btn-primary"><span>Checkout</span></a></div>
                                </div>
                            </div>
                        @else
                            <h4 style="margin-top: 20px;color: black;">Your shopping cart is empty!</h4>
                            <div class="back__to__hom" style="padding-bottom: 30px;"><a href="{{ route('home_page') }}"
                                    class="btn btn-default"><span>
                                        Continue Shopping</span></a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        (function($) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });
        })(jQuery);

        function manageQuantity(i, type) {
            let productid = $('#product_id_' + i).val();
            let unit_price = $('#unit_price_' + i).val();

            let qty = $('#CurrentQty_' + i).val();

            if (type == "increment") {
                qty++;
            } else {
                if (qty > 1) {
                    qty--;
                }
            }

            let subTotal = unit_price * qty;
            $("#subTotal_" + i).html(subTotal + ' ৳');

            $.ajax({
                url: "/product-increment",
                type: 'post',
                contentType: 'application/json',
                data: JSON.stringify({
                    productid,
                    type: type
                }),
                success: function(data) {
                    let {
                        totalprice,
                        message,
                        quantity
                    } = data;
                    if ('working' === message) {
                        if ($("#checkout-cart").length) {
                            $('#CurrentQty_' + i).val(quantity);
                            $('#totalPrice').html(totalprice + ' ৳');
                        } else {
                            $('#CurrentQty_' + i).val(quantity);
                            $('#totalPrice').html(totalprice + ' ৳');
                        }
                        location.reload();
                    }
                },
                error: function(error) {
                    console.log('error1st', error);
                }
            });
        };
    </script>
@endsection
