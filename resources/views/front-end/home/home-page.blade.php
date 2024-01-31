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
                    <img src="front-end/assets/image/slider/c1-1100x400.png" alt="" width="100%">
                </div>
                <div class="item">
                    <img src="front-end/assets/image/slider/c22-1100x400.png" alt="" width="100%">
                </div>
                <div class="item">
                    <img src="front-end/assets/image/slider/c11-1100x400.png" alt="" width="100%">
                </div>
                <div class="item">
                    <img src="front-end/assets/image/slider/c55-1100x400.png" alt="" width="100%">
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="grid-rows">
  <div class="grid-row-4 grid-row-top-1">
    <div class="grid-cols-lg">
      <div class="grid-col grid-col-top-1-2">
        <div class="grid-items">
          <div class="grid-item">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                <li data-target="#carousel-example-generic" data-slide-to="3"></li>
              </ol>
              <div class="carousel-inner" role="listbox">
                <div class="item active">
                  <img src="front-end/assets/image/slider/c1-1100x400.png" alt="">
                </div>
                <div class="item">
                  <img src="front-end/assets/image/slider/c22-1100x400.png" alt="">
                </div>
                <div class="item">
                  <img src="front-end/assets/image/slider/c11-1100x400.png" alt="">
                </div>
                <div class="item">
                  <img src="front-end/assets/image/slider/c55-1100x400.png" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> --}}
    <div class="grid-rows">
        <div class="grid-row grid-row-bottom-1">
            <div class="grid-cols">
                <div class="grid-col grid-col-bottom-1-1">
                    <div class="grid-items">
                        <div class="grid-item grid-item-bottom-1-1-1">
                            <div class="module module-products module-products-169 module-products-grid">
                                <div class="module-body">
                                    <div class="module-item module-item-1">
                                        <h3 class="title module-title">নতুন পণ্য</h3>
                                        <div class="product-grid">
                                            @foreach ($products as $product)
                                                <div class="product-layout  has-extra-button">
                                                    <div class="product-thumb">
                                                        <div class="image">
                                                            <div class="quickview-button">
                                                                <a class="btn btn-quickview" data-toggle="tooltip"
                                                                    data-tooltip-class="module-products-169 module-products-grid quickview-tooltip"
                                                                    data-placement="top" title="Quickview"
                                                                    onclick="quickview('154')"><span
                                                                        class="btn-text">Quickview</span></a>
                                                            </div>
                                                            <a href="{{ route('product_details', ['slug' => $product->slug]) }}"
                                                                class="product-img ">
                                                                @if (isset($product->photo))
                                                                    <div class="ph__product__img">
                                                                        <img src="{{ asset('storage/products/' . $product->photo) }}"
                                                                            width="250" height="250"
                                                                            alt="No Product Image Found"
                                                                            class="img-responsive img-first" />
                                                                    </div>
                                                                @else
                                                                    <div class="ph__product__not__img">
                                                                        <img src="{{ asset('assets/images/others/error.png') }}"
                                                                            width="250" height="250"
                                                                            alt="No Image Found"
                                                                            class="img-responsive img-first" />
                                                                    </div>
                                                                @endif
                                                            </a>
                                                            {{-- <div class="product-labels">
                                                                <span
                                                                    class="product-label product-label-28 product-label-diagonal"><b>-26
                                                                        %</b></span>
                                                            </div> --}}
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
                                                                        <span class="price-new">{{ $disPrice }}
                                                                            TAKA</span>
                                                                        <span class="price-old">{{ $product->price }}
                                                                            TAKA</span>
                                                                    @else
                                                                        <span class="price-new">{{ $product->price }}
                                                                            TAKA</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="extra-group">
                                                                <div>
                                                                    <a href="{{ route('checkout_details', ['checkout' => $product->slug]) }}"
                                                                        class="btn btn-extra btn-extra-46 add--to--cart-btn"
                                                                        data-product_id="{{ $product->id }}"
                                                                        data-loading-text="<span class='btn-text'>অর্ডার করুণ</span>">


                                                                        <span class="btn-text">অর্ডার করুণ</span>
                                                                    </a>
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
@endsection
@section('scripts')
<script>
alert('hello ');
    let ajax_container = document.querySelector(".extra-group");
console.log('ajax_container',ajax_container);
ajax_container.addEventListener("click", function(e) {
    e.preventDefault();
    let that = this;
    if ( '' !== e.target.dataset.product_id ) {
        return;
    }

    fetch('/product-add-cart', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
        },
        body: JSON.stringify({ data: '{{ $product->id }}' }),
    })
    .then(response => response.json())
    .then(data => {
        console.log(data);
        alert(data.message);
    })
    .catch(error => {
        console.error(error);
    });
</script>

@endsection
