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
                            <div class="nh__cart__icon">
                                <i class="fa fa-cart-plus add--to--cart-btn" aria-hidden="true"
                                    style="background: #F69873 !important; cursor:not-allowed;" disabled></i>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endforeach
