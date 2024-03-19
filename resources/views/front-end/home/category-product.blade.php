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
                                    <div class="title module-title product-category-holder">
                                        <ul class="category-home-menu">
                                            <li class="{{ request()->route()->getName() === 'home_page' ? 'active' : '' }}">
                                                <a href="{{ route('home_page') }}">new arrivals</a>
                                            </li>
                                            @foreach ($categories as $category)
                                            <li class="{{ request()->is('category/' . $category->slug) ? 'active' : '' }}">
                                                <a href="{{ route('category.products', $category->slug) }}">{{ $category->title }}</a>
                                            </li>
                                            @endforeach
                                            <li class="{{ request()->route()->getName() === 'all_product_home' ? 'active' : '' }}">
                                                <a class="last-child" href="{{ route('all_product_home') }}">All</a>
                                            </li>
                                        </ul>
                                    </div>
                                        <div class="product-grid">
                                            @include('front-end.home.all-product')
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
