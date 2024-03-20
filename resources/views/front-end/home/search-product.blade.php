@php
    $title = 'home';
@endphp
@extends('front-end.layouts.app')
@section('page_content')
    <div class="grid-rows">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                <li data-target="#carousel-example-generic" data-slide-to="3"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="front-end/assets/image/slider/slider-1.png" alt="" width="100%">
                </div>
                <div class="item">
                    <img src="front-end/assets/image/slider/slider-1.png" alt="" width="100%">
                </div>
                <div class="item">
                    <img src="front-end/assets/image/slider/slider-1.png" alt="" width="100%">
                </div>
                <div class="item">
                    <img src="front-end/assets/image/slider/slider-1.png" alt="" width="100%">
                </div>
            </div>
        </div>
    </div>
    <div class="grid-rows">
        <div class="grid-row grid-row-bottom-1">
            <div class="grid-cols">
                <div class="grid-col grid-col-bottom-1-1">
                    <div class="grid-items">
                        <div class="grid-item grid-item-bottom-1-1-1">
                            <div class="module module-products module-products-169 module-products-grid">
                                <div class="module-body">
                                    <div class="module-item module-item-1">
                                        <div class="title module-title product-category-holder">
                                            <ul class="category-home-menu">
                                                <li
                                                    class="{{ request()->route()->getName() === 'home_page' ? 'active' : '' }}">
                                                    <a href="{{ route('home_page') }}">new arrivals</a>
                                                </li>
                                                @foreach ($categories as $category)
                                                    <li
                                                        class="{{ request()->is('category/' . $category->slug) ? 'active' : '' }}">
                                                        <a
                                                            href="{{ route('category.products', $category->slug) }}">{{ $category->title }}</a>
                                                    </li>
                                                @endforeach
                                                <li
                                                    class="{{ request()->route()->getName() === 'all_product_home' ? 'active' : '' }}">
                                                    <a class="last-child" href="{{ route('all_product_home') }}">All</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product-grid">
                                        @foreach ($products as $product)
                                            <div class="product-layout  has-extra-button">
                                                <div class="product-thumb">
                                                    <div class="image">
                                                        <div class="quickview-button">
                                                            <a class="btn btn-quickview" data-toggle="tooltip"
                                                                data-tooltip-class="module-products-169 module-products-grid quickview-tooltip"
                                                                data-placement="top" title="Quickview" onclick="quickview('154')"><span
                                                                    class="btn-text">Quickview</span></a>
                                                        </div>
                                                        <a href="{{ route('product_details', ['slug' => $product->slug]) }}" class="product-img ">
                                                            @if (isset($product->photo))
                                                                <div class="ph__product__img">
                                                                    <img src="{{ asset('storage/products/' . $product->photo) }}" width="250" height="250"
                                                                        alt="No Product Image Found" class="img-responsive img-first" />
                                                                </div>
                                                            @else
                                                                <div class="ph__product__not__img">
                                                                    <img src="{{ asset('assets/images/others/error.png') }}" width="250" height="250"
                                                                        alt="No Image Found" class="img-responsive img-first" />
                                                                </div>
                                                            @endif
                                                        </a>
                                                        {{-- @if (isset($product->product_type))
                                                            <div class="product-labels">
                                                                <span
                                                                    class="product-label product-label-28 product-label-diagonal">
                                                                    <b>{{ $product->product_type }}</b>
                                                                </span>
                                                            </div>
                                                        @endif --}}
                                                    </div>
                                                    <div class="caption">
                                                        <div class="name">
                                                            <a href="{{ route('product_details', ['slug' => $product->slug]) }}">
                                                                {{ Str::limit($product->title, 30, '...') }}
                                                            </a>
                                                        </div>
                                                        @php
                                                            $disPrice = $product->price - $product->discount_amount;
                                                        @endphp
                                                        <div class="price">
                                                            <div>
                                                                @if ($product->discount_amount > 0)
                                                                    <span class="price-new"> {{ $disPrice }} ৳
                                                                    </span>
                                                                    <span class="price-old"> {{ $product->price }} ৳
                                                                    </span>
                                                                @else
                                                                    <span class="price-new"> {{ $product->price }} ৳
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="extra-group nh__order__confirm">
                                                            @if ($product->product_type == 'REG')
                                                                <div class="nh__order__confirm__btn">
                                                                    <a href="#" class="btn btn-extra btn-extra-46 add--to--checkout-btn "
                                                                        data-checkout_id="{{ $product->id }}">
                                                                        <span class="btn-text">অর্ডার করুণ</span>
                                                                    </a>
                                                                    <div class="nh__cart__icon">
                                                                        <i class="fa fa-cart-plus add--to--cart-btn" data-product_id="{{ $product->id }}"
                                                                            aria-hidden="true"></i>
                                                                    </div>
                                                                </div>
                                                            @elseif($product->product_type == 'PRE')
                                                                <div class="nh__order__confirm__btn">
                                                                    <a href="#" class="btn btn-extra btn-extra-46 add--to--checkout-btn "
                                                                        data-checkout_id="{{ $product->id }}">
                                                                        <span class="btn-text">প্রি অর্ডার করুণ</span>
                                                                    </a>
                                                                    <div class="nh__cart__icon">
                                                                        <i class="fa fa-cart-plus add--to--cart-btn" data-product_id="{{ $product->id }}"
                                                                            aria-hidden="true"></i>
                                                                    </div>
                                                                </div>
                                                            @else
                                                                <div class="nh__order__confirm__btn">
                                                                    <a href="#" class="btn btn-extra btn-extra-46 add--to--checkout-btn"
                                                                        style="background: #F16128 !important" disabled>
                                                                        <span class="btn-text">স্টক আউট</span>
                                                                    </a>
                                                                </div>
                                                            @endif
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

            $("body").on("click", '.add--to--cart-btn', function(e) {
                e.preventDefault();
                let that = this;
                let productid = $(that).data('product_id');
                if ('' === productid) {
                    return;
                }
                $.ajax({
                    url: "/product-add-cart",
                    type: 'post',
                    contentType: 'application/json',
                    data: JSON.stringify({
                        productid,
                        // userid: {{ optional(Auth::user())->id }}
                    }),
                    success: function(data) {
                        console.log(data);
                        let {
                            product_count
                        } = data;

                        toastr.success('Product Added to Your Cart', '');
                        toastr.options = {
                            "closeButton": true,
                            "progressBar": true,
                            "timeOut": "1500",
                        }
                        $("#cart-items").removeClass("count-zero").html(product_count);
                    },
                    error: function(error) {
                        console.log('error1st', error);
                    }
                });
            });

            // After clicking order now button redirect checkout page
            $("body").on("click", '.add--to--checkout-btn ', function(e) {
                e.preventDefault();
                let that = this;
                let productid = $(that).data('checkout_id');
                if ('' === productid) {
                    return;
                }
                $.ajax({
                    url: "/product-add-cart",
                    type: 'post',
                    contentType: 'application/json',
                    data: JSON.stringify({
                        productid,
                        // userid: {{ optional(Auth::user())->id }}
                    }),
                    success: function(data) {
                        console.log(data);
                        let {
                            productid,
                            product_count,
                            sessionId,
                        } = data;
                        window.location.href = '/checkout-details?productid=' + productid +
                            '&product_count=' + product_count + '&sessionId=' + sessionId;
                    },
                    error: function(error) {
                        console.log('error1st', error);
                    }
                });
            });
        })(jQuery);
    </script>
@endsection
