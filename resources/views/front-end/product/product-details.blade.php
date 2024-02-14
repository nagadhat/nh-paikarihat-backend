@php
    $title = 'checkjs';
@endphp
@extends('front-end.layouts.app')
@section('page_content')
    <div id="product-product" class="container">
        <div class="row">
            <div id="content" class="">
                <div class="product-info has-extra-button ">
                    <div class="product-left">
                        <div class="product-image direction-vertical xzoom-container">
                            <div class="product-image-wrapper">
                                @if (isset($products->photo))
                                    <div class="ph__feature__image">
                                        <img class="xzoom img-fluid" id="xzoom-default"
                                            src="{{ asset('storage/products/' . $products->photo) }}"
                                            xoriginal="{{ asset('storage/products/' . $products->photo) }}"
                                            alt="product image" />
                                    </div>
                                @else
                                    <div class="ph__feature__image ">
                                        <img src="{{ asset('assets/images/others/error.png') }}" class="img-fluid"
                                            alt="product image" />
                                    </div>
                                @endif
                            </div>
                            <div class="xzoom-thumbs">
                                <div class="ph__multiple__image">
                                    @php
                                        $products['multiple_photo'] = explode(',', $products->multiple_photo);
                                    @endphp

                                    @foreach ($products->multiple_photo as $image)
                                        @php
                                            $imagePath = public_path($image);
                                        @endphp
                                        <div class="ph__multiple__image__item xzoom-thumbs">
                                            <a href="{{ asset($image) }}">
                                                <img src="@if (file_exists($imagePath) && is_file($imagePath)) {{ asset($image) }}@else{{ asset('assets/images/others/error.png') }} @endif"
                                                    alt="" class="img-fluid xzoom-gallery"
                                                    xpreview="{{ asset($image) }}">
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-right">
                        <h1 class="title page-title "
                            style="color:#000000;margin-bottom:10px; text-transform: capitalize; text-align:left;padding:0">
                            {{ isset($products->title) ? $products->title : 'No Title Found' }}
                        </h1>
                        <div id="product" class="product-details">
                            <div class="product-price-group">
                                <div class="price-wrapper">
                                    <div class=" ph__price__group">
                                        <div class="ph__price__group_item product__sku">
                                            <span>Sku:</span>
                                            <strong>
                                                {{ isset($products->sku) ? $products->sku : 'No Sku Found' }}
                                            </strong>
                                        </div>
                                        {{-- <div class=" ph__price__group_item">
                                            <span>Price:</span>
                                            <strong>
                                                {{ isset($products->price) ? $products->price : 'No Price Found' }} ৳
                                            </strong>
                                        </div>
                                        <div class="product-price-old">1,200 ৳ </div> --}}
                                        @php
                                            $disPrice = $products->price - $products->discount_amount;
                                        @endphp
                                        <div class="ph__price__group">
                                            <div class="ph__price__group_item">
                                                <span>Price:</span>
                                                @if ($products->discount_amount > 0)
                                                    <strong>
                                                        <span class="price-new">{{ $disPrice }} ৳ </span>
                                                        <span class="price-old">
                                                            <del> {{ $products->price }} ৳ </del>
                                                        </span>
                                                    </strong>
                                                @else
                                                    <strong>
                                                        <small class="price-new">{{ $products->price }} ৳ </small>
                                                    </strong>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="button-group-page">
                                <div class="buttons-wrapper ph__cart__group">
                                    <div class="stepper-group cart-group ph__cart__qt__group">
                                        {{-- <div class="stepper">
                                            <label class="control-label" for="product-quantity">Qty</label>
                                            <input id="product-quantity" type="text" name="quantity" value="1"
                                                min="1" class="form-control" />
                                            <input id="product-id" type="hidden" name="product_id" value="154" />
                                            <span>
                                                <i class="fa fa-angle-up"></i>
                                                <i class="fa fa-angle-down"></i>
                                            </span>
                                        </div> --}}
                                        <div class="extra-group">
                                            <a class="btn btn-extra btn-extra-46 btn-1-extra nh__product__detail"
                                                href="{{ route('checkout_details', ['checkout' => $products->slug]) }}"
                                                data-detail_id="{{ $products->id }}"
                                                data-loading-text="<span class='btn-text'>অর্ডার করুণ</span>">
                                                @if ($products->product_type == 'REG')
                                                    <span class="btn-text">অর্ডার করুণ</span>
                                                @else
                                                    <span class="btn-text">প্রি অর্ডার করুণ</span>
                                                @endif
                                            </a>
                                        </div>

                                    </div>
                                    <div class="wishlist-compare">
                                        <a class="btn main__add__to__cart"
                                            data-main_add_cart_product="{{ $products->id }}"
                                            href="{{ route('checkout_details', ['checkout' => $products->slug]) }}">
                                            <span class="btn-text ">
                                                <i class="fa fa-cart-plus " aria-hidden="true"></i>
                                                Add to Cart
                                            </span>
                                        </a>
                                    </div>
                                </div>
                                <div class="hotline_number">
                                    <strong>
                                        <i class="fa fa-phone-square" aria-hidden="true"></i> 09647 444 444
                                    </strong>
                                </div>
                            </div>
                        </div>
                        <div class="product-blocks blocks-bottom">
                            <div class="product-blocks-bottom product-blocks-58 grid-rows">
                                <div class="grid-row grid-row-58-1">
                                    <div class="grid-cols">
                                        <div class="grid-col grid-col-58-1-1">
                                            <div class="grid-items">
                                                <div class="grid-item grid-item-58-1-1-1">
                                                    <div  class="nh__product__long__text">
                                                        {{ isset($products->short_description) ? $products->short_description : '' }}
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
                <div class="product-blocks blocks-default">
                    <div class="product_extra product_blocks product_blocks-default">
                        <div class="product_extra-242">
                            <h3 class="title module-title">Description</h3>
                            <div class="block-body expand-block">
                                <div class="block-wrapper">
                                    <div class="block-content ph__long_text">
                                        <p>
                                            {!! $products->description ?? 'No Description Found' !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="content-bottom">
                    <div class="grid-rows">
                        <div class="grid-row grid-row-content-bottom-1">
                            <div class="grid-cols">
                                <div class="grid-col grid-col-content-bottom-1-1">
                                    <div class="grid-items">
                                        <div class="grid-item grid-item-content-bottom-1-1-1">
                                            <div class="module module-products module-products-253 module-products-grid">
                                                <div class="module-body">
                                                    <div class="tab-container">
                                                        <ul class="nav nav-tabs">
                                                            <li class="tab-1 active related__product__title">
                                                                <a href="#products-6561913ab7033-tab-1"
                                                                    data-toggle="tab">Related Products</a>
                                                            </li>
                                                        </ul>
                                                        <div class="tab-content related__product__content">
                                                            <div class="module-item module-item-1 tab-pane active"
                                                                id="products-6561913ab7033-tab-1">
                                                                <div class="product-grid">
                                                                    @foreach ($relatedProducts as $product)
                                                                        <div class="product-layout  has-extra-button">
                                                                            <div class="product-thumb">
                                                                                <div class="image">
                                                                                    <a href="{{ route('product_details', ['slug' => $product->slug]) }}"
                                                                                        class="product-img ">
                                                                                        @if (isset($product->photo))
                                                                                            <div
                                                                                                class="ph__product__img__related">
                                                                                                <img src="{{ asset('storage/products/' . $product->photo) }}"
                                                                                                    width="250"
                                                                                                    height="250"
                                                                                                    alt="No Image Found"
                                                                                                    class="img-responsive img-first" />
                                                                                            </div>
                                                                                        @else
                                                                                            <div
                                                                                                class="ph__product__img__related">
                                                                                                <img src="{{ asset('assets/images/others/error.png') }}"
                                                                                                    width="250"
                                                                                                    height="250"
                                                                                                    alt="No Image Found"
                                                                                                    class="img-responsive img-first" />
                                                                                            </div>
                                                                                        @endif
                                                                                    </a>
                                                                                </div>
                                                                                <div class="caption">
                                                                                    <div class="name">
                                                                                        <a
                                                                                            href="{{ route('product_details', ['slug' => $product->slug]) }}">
                                                                                            {{ Str::limit($product->title, 30, '...') }}
                                                                                        </a>
                                                                                    </div>
                                                                                    @php
                                                                                        $disPrice = $product->price - $product->discount_amount;
                                                                                    @endphp
                                                                                    <div class="price">
                                                                                        <div>
                                                                                            @if ($product->discount_amount > 0)
                                                                                                <span
                                                                                                    class="price-new"> {{ $disPrice }} ৳  </span>
                                                                                                <span
                                                                                                    class="price-old"> {{ $product->price }} ৳ </span>
                                                                                            @else
                                                                                                <span
                                                                                                    class="price-new"> {{ $product->price }} ৳ </span>
                                                                                            @endif
                                                                                        </div>
                                                                                    </div>
                                                                                    <div
                                                                                        class="extra-group nh__order__confirm">
                                                                                        <div
                                                                                            class="nh__order__confirm__btn">
                                                                                            <a class="btn btn-extra btn-extra-46 add--to--checkout-btn"
                                                                                                href="{{ route('checkout_details', ['checkout' => $product->slug]) }}"
                                                                                                data-checkout_id="{{ $product->id }}">
                                                                                                @if ($product->product_type == 'REG')
                                                                                                    <span
                                                                                                        class="btn-text">অর্ডার
                                                                                                        করুণ</span>
                                                                                                @else
                                                                                                    <span
                                                                                                        class="btn-text">প্রি
                                                                                                        অর্ডার করুণ</span>
                                                                                                @endif
                                                                                            </a>
                                                                                            <div class="nh__cart__icon">
                                                                                                <i class="fa fa-cart-plus add--to--cart-btn"
                                                                                                    data-product_id="{{ $product->id }}"
                                                                                                    aria-hidden="true"></i>
                                                                                            </div>
                                                                                        </div>
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
                        </div>
                    </div>
                </div>

                <div id="content-bottom-last" style="padding-bottom: 30px;">
                    <div class="grid-rows">
                        <div class="grid-row grid-row-content-bottom-1">
                            <div class="grid-cols">
                                <div class="grid-col grid-col-content-bottom-1-1">
                                    <div class="grid-items">
                                        <div class="grid-item grid-item-content-bottom-1-1-1">
                                            <div class="module module-products module-products-253 module-products-grid">
                                                <div class="module-body">
                                                    <div class="tab-container recent__view__product__area">
                                                        <ul class="nav nav-tabs">
                                                            <li class="tab-1 active">
                                                                <a href="#products-6561913ab7033-tab-1"
                                                                    data-toggle="tab">Recent View Products</a>
                                                            </li>
                                                        </ul>
                                                        <div class="tab-content">
                                                            <div class="module-item module-item-1 tab-pane active"
                                                                id="products-6561913ab7033-tab-1">
                                                                <div class="product-grid">
                                                                    @foreach ($recentlyViewedProducts as $product)
                                                                        <div class="product-layout  has-extra-button">
                                                                            <div class="product-thumb">
                                                                                <div class="image">
                                                                                    <a href="{{ route('product_details', ['slug' => $product->slug]) }}"
                                                                                        class="product-img ">
                                                                                        @if (isset($product->photo))
                                                                                            <div
                                                                                                class="ph__product__img__related">
                                                                                                <img src="{{ asset('storage/products/' . $product->photo) }}"
                                                                                                    width="250"
                                                                                                    height="250"
                                                                                                    alt="No Image Found"
                                                                                                    class="img-responsive img-first" />
                                                                                            </div>
                                                                                        @else
                                                                                            <div
                                                                                                class="ph__product__img__related">
                                                                                                <img src="{{ asset('assets/images/others/error.png') }}"
                                                                                                    width="250"
                                                                                                    height="250"
                                                                                                    alt="No Image Found"
                                                                                                    class="img-responsive img-first" />
                                                                                            </div>
                                                                                        @endif
                                                                                    </a>
                                                                                </div>
                                                                                <div class="caption">
                                                                                    <div class="name">
                                                                                        <a
                                                                                            href="{{ route('product_details', ['slug' => $product->slug]) }}">
                                                                                            {{ Str::limit($product->title, 30, '...') }}
                                                                                        </a>
                                                                                    </div>
                                                                                    @php
                                                                                        $disPrice = $product->price - $product->discount_amount;
                                                                                    @endphp
                                                                                    <div class="price">
                                                                                        <div>
                                                                                            @if ($product->discount_amount > 0)
                                                                                                <span
                                                                                                    class="price-new"> {{ $disPrice }} ৳  </span>
                                                                                                <span
                                                                                                    class="price-old"> {{ $product->price }} ৳  </span>
                                                                                            @else
                                                                                                <span
                                                                                                    class="price-new"> {{ $product->price }} ৳  </span>
                                                                                            @endif
                                                                                        </div>
                                                                                    </div>
                                                                                    <div
                                                                                        class="extra-group nh__order__confirm">
                                                                                        <div
                                                                                            class="nh__order__confirm__btn">
                                                                                            <a class="btn btn-extra btn-extra-46 add--to--recent--product"
                                                                                                href="{{ route('checkout_details', ['checkout' => $product->slug]) }}"
                                                                                                data-recent_product_id="{{ $product->id }}">
                                                                                                @if ($product->product_type == 'REG')
                                                                                                    <span
                                                                                                        class="btn-text">অর্ডার
                                                                                                        করুণ</span>
                                                                                                @else
                                                                                                    <span
                                                                                                        class="btn-text">প্রি
                                                                                                        অর্ডার করুণ</span>
                                                                                                @endif
                                                                                            </a>
                                                                                            <div class="nh__cart__icon">
                                                                                                <i class="fa fa-cart-plus add--cart--recent--product"
                                                                                                    data-recent_cart_id="{{ $product->id }}"
                                                                                                    aria-hidden="true"></i>
                                                                                            </div>
                                                                                        </div>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('front-end/assets/javascript/header.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('front-end/assets/productslider/xzoom.css') }}" />
    <script src=" {{ asset('front-end/assets/productslider/js/jquery.js') }}"></script>
    <script src=" {{ asset('front-end/assets/productslider/js/xzoom.js') }}"></script>
    <script>
        $(".xzoom, .xzoom-gallery").xzoom({
            tint: '#333',
            Xoffset: 15
        });

        $(window).resize(function(){
        var windowWidth = $(window).width();
        // If width is 1024px, remove the class
        if(windowWidth === 1024) {
            $('body').removeClass('xzoom-preview');
        }
    });
    </script>
    <script>
        (function($) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });

            /***********Start product detils right side button **********/

            // function to product details to checkout page
            $("body").on("click", '.nh__product__detail', function(e) {
                e.preventDefault();
                let that = this;
                let productid = $(that).data('detail_id');
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
                            productid
                        } = data;

                        console.log(productid);
                        window.location.href = '/checkout-details/{productid}';
                    },
                    error: function(error) {
                        console.log('error1st', error);
                    }
                });
            });

             // function to product details to cart page
            $("body").on("click", '.main__add__to__cart', function(e) {
                e.preventDefault();
                let that = this;
                let productid = $(that).data('main_add_cart_product');
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
                        console.log(product_count);
                    },
                    error: function(error) {
                        console.log('error1st', error);
                    }
                });
            });


            /***********End product detils right side button **********/

            /***********Start related product **********/

            // function to related product after clicking  order button redirect to checkout page
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
                        console.log(product_count);
                    },
                    error: function(error) {
                        console.log('error1st', error);
                    }
                });
            });

            // After clicking add to cart button product added to cart
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
                        } = data;
                        console.log(productid);
                        // Redirect to the checkout_details page
                        window.location.href = '/checkout-details/{productid}';
                    },
                    error: function(error) {
                        console.log('error1st', error);
                    }
                });
            });

            /***********End related product **********/

            /***********Start recent product **********/

            // After clicking recent product order now button
            $("body").on("click", '.add--to--recent--product ', function(e) {
                e.preventDefault();
                let that = this;
                let productid = $(that).data('recent_product_id');
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
                        } = data;
                        console.log(productid);
                        // Redirect to the checkout_details page
                        window.location.href = '/checkout-details/{productid}';
                    },
                    error: function(error) {
                        console.log('error1st', error);
                    }
                });
            });

            // After clicking recent product add cart icon
            $("body").on("click", '.add--cart--recent--product', function(e) {
                e.preventDefault();
                let that = this;
                let productid = $(that).data('recent_cart_id');
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
                        console.log(product_count);
                    },
                    error: function(error) {
                        console.log('error1st', error);
                    }
                });
            });

            /***********End recent product **********/


        })(jQuery);
    </script>
@endsection
