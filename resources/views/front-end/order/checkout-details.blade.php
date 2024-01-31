@php
    $title = 'checkout';
@endphp

@extends('front-end.layouts.app')
@section('page_content')

    <div class="container" id="container">
        <ul class="breadcrumb qc-breadcrumb" style="padding: 8px">
            <li><a href="#"><i class="fa fa-home"></i> </a></li>
            <li><a href="#"><b style="font-size: 20px">অর্ডার ইনফরমেশন</b> </a></li>
        </ul>
        <div class="row py-3">
            <div id="content" class="col-sm-12" style="padding: 30px">
                <div id="content-top">
                    <div class="grid-rows">
                        <div class="grid-row grid-row-content-top-1">
                            <div class="grid-cols">
                                <div class="grid-col grid-col-content-top-1-1">
                                    <div class="grid-items">
                                        <div class="grid-item grid-item-content-top-1-1-1">
                                            <div class="module module-blocks module-blocks-288 blocks-grid">
                                                <div class="module-body">
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
                <div class="row" style="padding: 25px 0">
                    <form class="form-horizontal" action="{{ route('order_product') }}" method="POST">
                        @csrf
                        <div class="qc-col-1 col-md-4 mobile__view">
                            <div id="payment_address" class="qc-step" data-col="1" data-row="0">
                                <div class="">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <p class="description"> </p>
                                            <div class="text-input form-group required">
                                                <div class="col-xs-12">
                                                    <label class="control-label" for="name">
                                                        <span class="text" title=""><b>আপনার নাম</b></span>
                                                    </label>
                                                </div>
                                                <div class="col-xs-12">
                                                    <input type="text" name="customer_name" class="form-control"
                                                        placeholder="আপনার নাম লিখুন" value="{{ !empty(auth()->user()->name)??auth()->user()->name }}" required>
                                                </div>
                                            </div>
                                            <div class="text-input form-group required">
                                                <div class="col-xs-12">
                                                    <label class="control-label" for="phone">
                                                        <span class="text" title=""><b>মোবাইল নম্বর</b></span>
                                                    </label>
                                                </div>
                                                <div class="col-xs-12">
                                                    <input type="text" name="customer_phone" value="{{ !empty(auth()->user()->phone)??auth()->user()->phone }}"
                                                        class="form-control" placeholder="মোবাইল নম্বর লিখুন" required>
                                                </div>
                                            </div>
                                            <div class="text-input form-group required">
                                                <div class="col-xs-12">
                                                    <label class="control-label" for="address">
                                                        <span class="text" title=""><b>ডেলিভারী ঠিকানা</b></span>
                                                    </label>
                                                </div>
                                                <div class="col-xs-12">
                                                    <input type="text" name="customer_address" value="{{ !empty(auth()->user()->address)??auth()->user()->address }}"
                                                        class="form-control" autocomplete="on"
                                                        placeholder="ডেলিভারী ঠিকানা লিখুন" required>
                                                </div>
                                            </div>
                                            <div class="text-input form-group required" data-sort="16">
                                                <div class="col-xs-12">
                                                    <label class="control-label" for="payment_address_zone_id">
                                                        <span class="text" title="">
                                                            <b>ডেলিভারী এরিয়া</b>
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="col-xs-12">
                                                    <label class="radio-inline" for="insideDhaka">
                                                        <input type="radio" id="insideDhaka" name="delivery_area"
                                                            value="inside_dhaka" onclick="showInsideDhaka()" checked>Inside
                                                        Dhaka
                                                    </label>

                                                    <label class="radio-inline" for="outsideDhaka">
                                                        <input type="radio" name="delivery_area" id="outsideDhaka"
                                                            value="outside_dhaka" onclick="showOutsideDhaka()">Outside Dhaka
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 mobile__view">
                            <div class="row">
                                <div class="qc-col-2 col-md-12 mobile__view__overflow">
                                    <div id="cart_view" class="qc-step" data-col="2" data-row="0">
                                        <div class="panel panel-default ">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <span class="icon">
                                                        <i class=""></i>
                                                    </span>
                                                    <span class="text">অর্ডার ইনফরমেশন </span>
                                                    <input type="hidden" name="product_id" value="{{ $products->id }}">
                                                </h4>
                                            </div>
                                            <div class="qc-checkout-product panel-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered qc-cart">
                                                        <thead>
                                                            <tr>
                                                                <td class="qc-image" style="font-weight: bold">নাম ও ছবি:
                                                                </td>
                                                                <td class="qc-quantity" style="font-weight: bold">
                                                                    কোয়ান্টিটি:
                                                                </td>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="">
                                                                    @if (isset($products->photo))
                                                                        <div class=" ph__checkout__photo">
                                                                            <img src="{{ asset('storage/products/' . $products->photo) }}"
                                                                                class="img-responsive mobile-image"
                                                                                alt="product image" />
                                                                        </div>
                                                                    @else
                                                                        <div class="ph__checkout__photo ">
                                                                            <img src="{{ asset('assets/images/others/error.png') }}"
                                                                                class="img-responsive mobile-image"
                                                                                alt="product image" />
                                                                        </div>
                                                                    @endif
                                                                    <br>
                                                                    <p>{{ isset($products->title) ? $products->title : '' }}
                                                                    </p>
                                                                </td>
                                                                <td class="qc-quantity" style="padding-bottom: 70px;">
                                                                    <div class="input-group input-group-sm">
                                                                        {{-- <input type="text" name="stock" value="1"
                                                                        class="qc-product-qantity form-control text-center">
                                                                    <span class="input-group-btn">
                                                                        <button class="btn btn-danger delete">
                                                                            <i class="fa fa-times"></i>
                                                                        </button>
                                                                    </span> --}}
                                                                        <div class="qty-container">
                                                                            {{-- <button
                                                                                class="qty-btn-minus btn-danger btn-cornered mr-2"
                                                                                onclick="updateOrderDetails('minus')"
                                                                                type="button"
                                                                                style="background-color: red; margin-right: 5px">
                                                                                <i class="fa fa-chevron-down"></i>
                                                                            </button> --}}
                                                                            <input type="number" id="CurrentQty"
                                                                                name="total_quantity" min="1"
                                                                                value="1"
                                                                                onchange="updateOrderDetails('input')"
                                                                                class="input-qty input-cornered" />
                                                                            {{-- <button
                                                                                class="qty-btn-plus btn-danger btn-cornered ml-1"
                                                                                onclick="updateOrderDetails('plus')"
                                                                                type="button"
                                                                                style="background-color: red;margin-left:5px">
                                                                                <i class="fa fa-chevron-up"></i>
                                                                            </button> --}}
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="qc-price hidden-xs hidden">
                                                                    {{ isset($products->price) ? $products->price : '' }}
                                                                    TAKA</td>
                                                                {{-- <td class="qc-total hidden">850 TAKA</td> --}}
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="form-horizontal">
                                                    <div class="form-horizontal qc-totals">
                                                        <div class="row">
                                                            <label class="col-sm-9 col-xs-6 control-label"
                                                                style="font-weight: bold">
                                                                প্রোডাক্টের মূল্য
                                                            </label>
                                                            <div class="col-sm-3 col-xs-6 form-control-static text-right">
                                                                <span id="productPrice">
                                                                    {{ isset($products->price) ? $products->price : '' }}
                                                                    TAKA</span>
                                                                <input type="hidden" name="price"
                                                                    value="{{ $products->price }}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label class="col-sm-9 col-xs-6 control-label">
                                                                <b>ডিসকাউন্ট</b>
                                                            </label>
                                                            <div class="col-sm-3 col-xs-6 form-control-static text-right">
                                                                @php
                                                                    $dis = isset($products->discount_amount) ? $products->discount_amount : '0';
                                                                @endphp
                                                                <del>{{ $dis }} TAKA</del>
                                                                <input type="hidden" id="Discount"
                                                                    name="discount_amount" value="{{ $dis }}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label class="col-sm-9 col-xs-6 control-label">
                                                                <b>সাবটোটাল</b>
                                                            </label>
                                                            <div class="col-sm-3 col-xs-6 form-control-static text-right">
                                                                <span id="subtotal">
                                                                    {{ $products->quantity * ($products->price - $products->discount_amount) }}

                                                                </span>
                                                                TAKA
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label class="col-sm-9 col-xs-6 control-label">
                                                                <b>ডেলিভারী চার্জ</b>
                                                            </label>
                                                            <div class="col-sm-3 col-xs-6 form-control-static text-right">
                                                                <p id="insideDhakaCharge" class="text-white">
                                                                    <span>{{ $products->inside_dhaka }} TAKA</span>
                                                                </p>
                                                                <p id="outsideDhakaCharge" class="text-white"
                                                                    style="display: none">
                                                                    <span id="abc">{{ $products->outside_dhaka }}
                                                                        TAKA</span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <label class="col-sm-9 col-xs-6 control-label"
                                                                style="font-weight: bold">
                                                                মোট বিল
                                                            </label>
                                                            <div class="col-sm-3 col-xs-6 form-control-static text-right">
                                                                <span id="grandTotal">
                                                                    {{ $products->quantity * ($products->price - $products->discount_amount) }}
                                                                    TAKA
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="qc-col-4 col-md-12">
                                    <div id="payment_view" class="qc-step" data-col="4" data-row="0">
                                        <div class="buttons">
                                            <div class="pull-right">
                                                <input type="submit" value="অর্ডার কনফার্ম করুণ" id="button-confirm"
                                                    data-loading-text="Loading..." class="btn btn-primary">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        var buttonPlus = $(".qty-btn-plus");
        var buttonMinus = $(".qty-btn-minus");

        var incrementPlus = buttonPlus.click(function() {
            var $n = $(this)
                .parent(".qty-container")
                .find(".input-qty");
            $n.val(Number($n.val()) + 1);
        });

        var incrementMinus = buttonMinus.click(function() {
            var $n = $(this)
                .parent(".qty-container")
                .find(".input-qty");
            var amount = Number($n.val());
            if (amount > 0) {
                $n.val(amount - 1);
            }
        });
    </script>
    <script>
        function placeOrder() {
            alert("Order Placed Sucessfully");
        }

        // Global Start
        var subtotal = getData();
        document.getElementById('grandTotal').innerText = '৳ ' + (subtotal + 60);
        document.getElementById('subtotal').innerText = subtotal + 60;
        document.getElementById('subtotal').innerText = subtotal;
        // Global end

        var checkShipping = 1;

        function showInsideDhaka() {
            //Inside
            checkShipping = 1;
            var subtotal = getData();

            document.getElementById('grandTotal').innerText = '৳ ' + (subtotal + 60);
            document.getElementById('subtotal').innerText = subtotal + 60;
            document.getElementById('subtotal').innerText = subtotal;

            document.getElementById("insideDhakaCharge").style.display = "block";
            document.getElementById("outsideDhakaCharge").style.display = "none";
        }

        function showOutsideDhaka() {
            // Outside
            checkShipping = 2;
            var subtotal = getData();
            var deliveryCharge = 120;

            document.getElementById('grandTotal').innerText = '৳ ' + (subtotal + deliveryCharge);
            document.getElementById('subtotal').innerText = subtotal;

            document.getElementById("insideDhakaCharge").style.display = "none";
            document.getElementById("outsideDhakaCharge").style.display = "block";
        }


        function updateOrderDetails(type) {
            var input = parseInt(document.getElementById('CurrentQty').value);
            if (type == 'plus') {
                input++;
            }
            if (type == 'minus' && input > 0) {
                input--;
            }
            var subtotal = getData();

            if (checkShipping == 1) {
                let shippingCharge = 60;
                var grandTotal = subtotal + shippingCharge;
                document.getElementById('grandTotal').innerText = '৳ ' + grandTotal;
                document.getElementById('subtotal').innerText = '৳ ' + (subtotal + shippingCharge);
            } else if (checkShipping == 2) {
                var deliveryCharge = 120;
                var grandTotal = subtotal + deliveryCharge;
                document.getElementById('grandTotal').innerText = '৳ ' + grandTotal;
                document.getElementById('subtotal').innerText = '৳ ' + (subtotal + deliveryCharge);
            }
        }


        function getData() {
            var quantity = $("#CurrentQty").val();
            var discountAmount = $("#Discount").val();
            var price = parseFloat(document.getElementById('productPrice').innerText);
            var subtotal = quantity * (price - discountAmount);
            return subtotal;
        }
    </script>
@endsection
