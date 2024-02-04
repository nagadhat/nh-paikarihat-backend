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
                                                        placeholder="আপনার নাম লিখুন"
                                                        value="{{ !empty($userdata['name']) ? $userdata['name'] : '' }}"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="text-input form-group required">
                                                <div class="col-xs-12">
                                                    <label class="control-label" for="phone">
                                                        <span class="text" title=""><b>মোবাইল নম্বর</b></span>
                                                    </label>
                                                </div>
                                                <div class="col-xs-12">
                                                    <input type="text" name="customer_phone"
                                                        value="{{ !empty($userdata['phone']) ? $userdata['phone'] : '' }}"
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
                                                    <input type="text" name="customer_address"
                                                        value="{{ !empty($userdata['address']) ? $userdata['address'] : '' }}"
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
                                                            value="outside_dhaka" onclick="showOutsideDhaka()">Outside
                                                        Dhaka
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
                                                    {{-- <input type="hidden" name="product_id" value="{{ $cartItems->id }}"> --}}
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
                                                                    ইউনিট প্রাইস:
                                                                </td>
                                                                <td class="qc-quantity" style="font-weight: bold; text-align:center">
                                                                    কোয়ান্টিটি:
                                                                </td>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $i = 1;
    //dd($totaldiscount);
                                   ?>
                                                            @foreach ($cartItems as $products)
                                                                <tr>
                                                                    <td class="">
                                                                        <input type="hidden" name="product_id[]"
                                                                            value="{{ $products->product->id }}">
                                                                        @if (isset($products->product->photo))
                                                                            <div class=" ph__checkout__photo">
                                                                                <img src="{{ asset('storage/products/' . $products->product->photo) }}"
                                                                                    class="img-responsive mobile-image"
                                                                                    style="width:120px; height:100px !important;object-fit: cover;"
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
                                                                        <p>{{ Str::limit($products->product->title, 30, '...') ? Str::limit($products->product->title, 30, '...') : '' }}

                                                                        </p>
                                                                    </td>
                                                                    <td class="qc-price  ">
                                                                        {{ isset($products->unit_price) ? $products->unit_price : '' }}
                                                                        TAKA
                                                                    </td>
                                                                    <td class="qc-quantity" >
                                                                        <div class="input-group input-group-sm">

                                                                            <div class="qty-container " style="width:100%;">
                                                                                <input type="hidden"
                                                                                    id="product_id_{{ $i }}"
                                                                                    value="{{ $products->id }}">
                                                                                <button
                                                                                    class="qty-btn-minus btn-danger btn-cornered mr-2"
                                                                                    onClick="manageQuantity({{ $i }}, 'decrement')"
                                                                                    type="button"
                                                                                    style="background-color: red; margin-right: 5px">
                                                                                    <i class="fa fa-chevron-down"></i>
                                                                                </button>
                                                                                <input type="number"
                                                                                    id="CurrentQty_{{ $i }}"
                                                                                    name="total_quantity" min="1"
                                                                                    value="{{ $products->quantity }}"
                                                                                    class="input-qty input-cornered" />
                                                                                <button
                                                                                    class="qty-btn-plus btn-danger btn-cornered ml-1"
                                                                                    onClick="manageQuantity({{ $i }}, 'increment')"
                                                                                    type="button"
                                                                                    data-product_id="{{ $products->id }}"
                                                                                    style="background-color: red;margin-left:5px">
                                                                                    <i class="fa fa-chevron-up"></i>
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                                $i++;
                                                                ?>
                                                            @endforeach
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
                                                                    {{ isset($totalprice) ? $totalprice : '' }}
                                                                    TAKA</span>
                                                                <input id="productPriceval" type="hidden" name="price"
                                                                    value="{{ isset($totalprice) ? $totalprice : '' }}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label class="col-sm-9 col-xs-6 control-label">
                                                                <b>ডিসকাউন্ট</b>
                                                            </label>
                                                            <div class="col-sm-3 col-xs-6 form-control-static text-right" id="discount_increment">
                                                                {{ isset($totaldiscount) ? $totaldiscount : '' }} TAKA

                                                                <input type="hidden" id="Discount"
                                                                    name="discount_amount"
                                                                    value="{{ isset($totaldiscount) ? $totaldiscount : '' }}">
                                                            </div>
                                                        </div>
                                                        {{-- <div class="row">
                                                            <label class="col-sm-9 col-xs-6 control-label">
                                                                <b>সাবটোটাল</b>
                                                            </label>
                                                            <div class="col-sm-3 col-xs-6 form-control-static text-right">
                                                                <span id="subtotal">
                                                                    {{ $products->quantity * ($products->price - $products->discount_amount) }}

                                                                </span>
                                                                TAKA
                                                            </div>
                                                        </div> --}}
                                                        <div class="row">
                                                            <label class="col-sm-9 col-xs-6 control-label">
                                                                <b>ডেলিভারী চার্জ</b>
                                                            </label>
                                                            <div class="col-sm-3 col-xs-6 form-control-static text-right">
                                                                <p id="insideDhakaCharge" class="text-white">
                                                                    <span> 60 TAKA</span>

                                                                </p>
                                                                <p id="outsideDhakaCharge" class="text-white"
                                                                    style="display: none">
                                                                    <span> 120 TAKA</span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <label class="col-sm-9 col-xs-6 control-label"
                                                                style="font-weight: bold">
                                                                মোট বিল
                                                            </label>
                                                            <input type="hidden" name="order_total"
                                                                value="{{ $totalprice + $totaldiscount }}">
                                                            <input type="hidden" id="discount_amount"
                                                                name="discount_amount" value="{{ $totaldiscount }}">
                                                            <div class="col-sm-3 col-xs-6 form-control-static text-right"
                                                                id="grandTotal">
                                                                {{ isset($totalprice) && isset($totaldiscount) ? $totalprice + 60 - $totaldiscount : '' }} TAKA
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
        (function($) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });
        })(jQuery);

        function manageQuantity(i, type) {
            let productid = $('#product_id_' + i).val();
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
                        quantity,
                        totaldiscount
                    } = data;

                    if ('working' === message) {
                        $('#CurrentQty_' + i).val(quantity);
                        let delivery_area = $('input[name="delivery_area"]:checked').val();
                        var discount_amount = $('#discount_amount').val();

                        if (delivery_area == 'inside_dhaka') {
                            var grandTotal = (parseFloat(totalprice) + 60) - parseFloat(discount_amount);
                        } else {
                            var grandTotal = (parseFloat(totalprice) + 120) - parseFloat(discount_amount);
                        }

                        $('#grandTotal').html(grandTotal + ' TAKA');
                        $('input[name="order_total"]').val(grandTotal);

                        $('#productPriceval').val(totalprice);
                        $('#productPrice').html(totalprice + ' TAKA');
                        $("#discount_increment").html(parseFloat(totaldiscount) + ' TAKA');
                    }
                },
                error: function(error) {
                    console.log('error1st', error);
                }
            });
        };

        // delivery area functoin
        function showInsideDhaka() {
            var discount = $("#Discount").val();
            var productPriceval = $("#productPriceval").val();

            var grandTotal = (parseFloat(productPriceval) + 60) - discount;
            $('#grandTotal').html(grandTotal + ' TAKA');
            $('input[name="order_total"]').val(grandTotal);

            document.getElementById("insideDhakaCharge").style.display = "block";
            document.getElementById("outsideDhakaCharge").style.display = "none";
        }

        function showOutsideDhaka() {
            var discount = $("#Discount").val();
            var productPriceval = $("#productPriceval").val();
            var grandTotal = (parseFloat(productPriceval) + 120) - discount;
            $('#grandTotal').html(grandTotal + ' TAKA');
            $('input[name="order_total"]').val(grandTotal);

            document.getElementById("insideDhakaCharge").style.display = "none";
            document.getElementById("outsideDhakaCharge").style.display = "block";
        }
    </script>
@endsection
