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
                                                                            <font color="#ff0000">সম্মানিত ক্রেতা</font>,
                                                                            অর্ডারটি কনফার্ম করতে আপনার নাম, সম্পূর্ণ
                                                                            ঠিকানা, মোবাইল নাম্বার লিখে <font
                                                                                color="#ff0000">অর্ডার কনফার্ম করুন</font>
                                                                            বাটনে ক্লিক করুন, ২৪ ঘন্টার মধ্যে আপনার সাথে
                                                                            যোগাযোগ করা হবে । ধন্যবাদ
                                                                        </b></div>
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
                    <div class="cart-table">
                        @if ($carts->isNotEmpty())
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <td class="text-center td-image">নাম ও ছবি</td>
                                            {{-- <td class="text-left td-name">Product Name</td> --}}

                                            <td class="text-center td-qty">কোয়ান্টিটি</td>
                                            {{-- <td class="text-center td-price">Unit Price</td> --}}
                                            <td class="text-center td-total">মোট বিল</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($carts as $cart)
                                            <tr>
                                                <td class=" td-image">
                                                    <div class="" style="padding-bottom:10px">
                                                        <img src="{{ asset('storage/products/' . $cart->product->photo) }}"
                                                            alt="image" class="image-responsive "
                                                            style="width: 60px;height:60px">
                                                    </div>

                                                    <p>{{ Str::limit($cart->product->title, $limit = 10, $end = '...') }}
                                                    </p>
                                                </td>


                                                <td class="text-center td-qty">
                                                    <div class="input-group btn-block cart--quantity--btn">
                                                        <div class="stepper">
                                                            <input type="text" name="quantity"
                                                                value="{{ $cart->quantity }}" size="1"
                                                                class="form-control" min="1">
                                                            <span>
                                                                <i class="fa fa-angle-up" data-product_id="{{ $cart->product_id }}"></i>
                                                                <i class="fa fa-angle-down" data-product_id="{{ $cart->product_id }}"></i>
                                                            </span>
                                                        </div>
                                                        <span class="input-group-btn">
                                                            <a href="{{ route('product_delete_cart', $cart->id) }}"
                                                                class="btn btn-remove">
                                                                <i class="fa fa-times-circle"></i>
                                                            </a>
                                                        </span>
                                                    </div>
                                                </td>
                                                {{-- <td class="text-center td-price">{{ $cart->unit_price }} TAKA</td> --}}
                                                <td class="text-center td-total">{{ $cart->unit_price }} TAKA</td>
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
                                                    <td class="text-right"><strong>প্রোডাক্টের মূল্য:</strong></td>
                                                    <td class="text-right">2,550 TAKA</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right"><strong><b>ডেলিভারী চার্জ</b>:</strong></td>
                                                    <td class="text-right">150 TAKA</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right"><strong>মোট বিল:</strong></td>
                                                    <td class="text-right">2,700 TAKA</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="buttons clearfix">
                                    <div class="pull-left"><a href="#" class="btn btn-default"><span>Continue
                                                Shopping</span></a></div>
                                    <div class="pull-right"><a href="{{ route('checkout_details', $cart->product_id) }}"
                                            class="btn btn-primary"><span>Checkout</span></a></div>
                                </div>
                            </div>
                        @else
                            <h5 style="padding-bottom: 30px; color: black;">Your shopping cart is empty!</h5>
                            <div class="pull-left" style="padding-bottom: 30px;"><a href="{{ route('home_page') }}" class="btn btn-default"><span>
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
            $("body").on("click", '.fa-angle-up', function(e) {
                e.preventDefault();

                let that = this;
                let productid = $(that).data('product_id');
                if ('' === productid) {
                    return;
                }
                $.ajax({
                    url: "/product-increment",
                    type: 'post',
                    contentType: 'application/json',
                    data: JSON.stringify({
                        productid,
                        userid: {{ optional(Auth::user())->id }},
                        type:"increment"
                    }),
                    success: function(data) {
                        console.log(data);
                        let {
                            message,
                            quantity
                        } = data;
                        if ('working'===message) {
                            // console.log($(that).parent('span').prev('input[name="quantity"]').html());
                            $(that).parent('span').prev('input[name="quantity"]').val(quantity);
                            location.reload();

                        }

                    },
                    error: function(error) {
                        console.log('error1st', error);
                    }
                });
            });
            $("body").on("click", '.fa-angle-down', function(e) {
                e.preventDefault();

                let that = this;
                let productid = $(that).data('product_id');
                if ('' === productid) {
                    return;
                }
                $.ajax({
                    url: "/product-increment",
                    type: 'post',
                    contentType: 'application/json',
                    data: JSON.stringify({
                        productid,
                        userid: {{ optional(Auth::user())->id }},
                        type:"decrement"
                    }),
                    success: function(data) {
                        console.log(data);
                        let {
                            message,
                            quantity
                        } = data;
                        if ('working'===message) {
                            // console.log($(that).parent('span').prev('input[name="quantity"]').html());
                            $(that).parent('span').prev('input[name="quantity"]').val(quantity);
                            location.reload();
                        }
                    },
                    error: function(error) {
                        console.log('error1st', error);
                    }
                });
            });
        })(jQuery);
    </script>
@endsection
