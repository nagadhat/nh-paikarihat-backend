@php
    $title = 'checkout';

@endphp

@extends('front-end.layouts.app')
@section('page_content')
    <?php
    if (isset($product_count)) {
        // dd($product_count);
    }
    ?>
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
                                                                    <div style="text-align: justify;"
                                                                        class="add__to__carttop"><b>
                                                                            <font color="#f16027">সম্মানিত ক্রেতা</font>,
                                                                            অর্ডারটি কনফার্ম করতে আপনার নাম, সম্পূর্ণ
                                                                            ঠিকানা, মোবাইল নাম্বার লিখে <font
                                                                                color="#f16027">অর্ডার কনফার্ম করুন</font>
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
                        <div class="qc-col-1 col-md-4 mobile__view nh__checkout__page">
                            <div id="payment_address" class="qc-step" data-col="1" data-row="0">

                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <p class="description"> </p>
                                        @if (!Auth::check())
                                            <div class="text-input form-group required">
                                                <div class="col-xs-12">
                                                    <label class="radio-inline" for="notUserCheck">
                                                        <input type="radio" name="user_check" id="notUserCheck"
                                                            value="" checked>
                                                        Without Registration
                                                    </label>

                                                    <label class="radio-inline" for="UserCheck">

                                                        <input type="radio" name="user_check" id="UserCheck"
                                                            value="">
                                                        Existing User
                                                    </label>
                                                </div>
                                            </div>
                                        @endif

                                        @if (Auth::check())
                                            <div class="text-input form-group">
                                                <div class="col-xs-12">
                                                    <label class="control-label" for="name">
                                                        <span class="text" title=""><b>ডেলিভারী ইনফোরমেশন
                                                            </b></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="text-input form-group required">
                                                <div class="col-xs-12" style="padding-top:10px">
                                                    <label class="control-label" for="name">
                                                        <span class="text" title=""><b>নাম</b></span>
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
                                                        <span class="text" title=""><b>মোবাইল</b></span>
                                                    </label>
                                                </div>
                                                <div class="col-xs-12">
                                                    <input type="number" name="customer_phone" value="{{ !empty($userdata['phone']) ? $userdata['phone'] : '' }}" class="form-control customer_num" placeholder="মোবাইল নম্বর লিখুন" required 
                                                    onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                                </div>
                                            </div>
                                            <div class="text-input form-group required">
                                                <div class="col-xs-12">
                                                    <label class="control-label" for="address">
                                                        <span class="text" title=""><b>ঠিকানা</b></span>
                                                    </label>
                                                </div>
                                                <div class="col-xs-12">
                                                    <textarea name="customer_address" class="form-control nh__customer__address" autocomplete="on"
                                                        placeholder="ডেলিভারী ঠিকানা লিখুন" required>{{ !empty($userdata['address']) ? $userdata['address'] : '' }}
                                                        </textarea>
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
                                                            value="inside_dhaka" onclick="showInsideDhaka()"
                                                            checked>Inside
                                                        Dhaka
                                                    </label>

                                                    <label class="radio-inline" for="outsideDhaka">
                                                        <input type="radio" name="delivery_area" id="outsideDhaka"
                                                            value="outside_dhaka" onclick="showOutsideDhaka()">Outside
                                                        Dhaka
                                                    </label>
                                                </div>
                                            </div>
                                        @else
                                            <div class="text-input form-group required">
                                                <div class="col-xs-12" style="padding-top:10px">
                                                    <label class="control-label" for="name">
                                                        <span class="text" title=""><b>আপনার নাম</b></span>
                                                    </label>
                                                </div>
                                                <div class="col-xs-12">
                                                    <input type="text" name="customer_name" class="form-control"
                                                        placeholder="আপনার নাম লিখুন" value="" required>
                                                </div>
                                            </div>
                                            <div class="text-input form-group required">
                                                <div class="col-xs-12">
                                                    <label class="control-label" for="phone">
                                                        <span class="text" title=""><b>মোবাইল নম্বর</b></span>
                                                    </label>
                                                </div>
                                                <div class="col-xs-12">
                                                    <input type="number" name="customer_phone" value="" class="form-control customer_num" placeholder="মোবাইল নম্বর লিখুন" required 
                                                    onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                                </div>
                                            </div>
                                            <div class="text-input form-group required">
                                                <div class="col-xs-12">
                                                    <label class="control-label" for="address">
                                                        <span class="text" title=""><b>ডেলিভারী ঠিকানা</b></span>
                                                    </label>
                                                </div>
                                                <div class="col-xs-12">
                                                    <textarea name="customer_address" class="form-control nh__customer__address" autocomplete="on"
                                                        placeholder="ডেলিভারী ঠিকানা লিখুন" required>
                                                        </textarea>
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
                                                            value="inside_dhaka" onclick="showInsideDhaka()"
                                                            checked>Inside
                                                        Dhaka
                                                    </label>

                                                    <label class="radio-inline" for="outsideDhaka">
                                                        <input type="radio" name="delivery_area" id="outsideDhaka"
                                                            value="outside_dhaka" onclick="showOutsideDhaka()">Outside
                                                        Dhaka
                                                    </label>
                                                </div>
                                            </div>
                                        @endif
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
                                                @if ($cartItems->isEmpty())
                                                    <div style="text-align: center; padding: 30px 0;">
                                                        <h5>Your shopping product is empty!</h5>
                                                        <a href="{{ route('home_page') }}" style="color:white; background: #F16027; padding: 5px 15px; ">
                                                            Continue Shoping
                                                        </a>
                                                    </div>
                                                @else
                                                    <div class="table-responsive">
                                                        <table
                                                            class="table table-bordered qc-cart checkout__border__color">
                                                            <thead>
                                                                <tr>
                                                                    <td class="qc-image">নাম ও ছবি:
                                                                    </td>
                                                                    <td class="qc-quantity">
                                                                        ইউনিট প্রাইস:
                                                                    </td>
                                                                    <td class="qc-quantity" style=" text-align:center">
                                                                        কোয়ান্টিটি:
                                                                    </td>
                                                                    <td class="text-center td-total">মোট প্রোডাক্টের মূল্য
                                                                    </td>
                                                                    <td class="text-center td-total">ডিলিট প্রোডাক্ট</td>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @php
                                                                    $i = 1;
                                                                @endphp

                                                                @foreach ($cartItems as $products)
                                                                    <tr class="checkout__br__color">
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
                                                                            <p>
                                                                                {{-- {{ Str::limit($products->product->title, 30, '...') ? Str::limit($products->product->title, 30, '...') : '' }} --}}
                                                                                {{ $products->product->title }}
                                                                            </p>
                                                                            <p
                                                                                style="background:{{ $products->product->product_type == 'PRE' ? '#FED430' : 'none' }}; color:#000; width:max-content; padding:2px 8px;font-weight:700 ">
                                                                                @if ($products->product->product_type != 'REG')
                                                                                    Pre Order
                                                                                @endif
                                                                            </p>
                                                                        </td>
                                                                        <td class="qc-price">
                                                                            @if($products->product->discount_amount > 0)
                                                                                <span>{{ $products->unit_price - $products->product->discount_amount }}
                                                                                    ৳ </span> <br>
                                                                                <del class="" style="color: #F16027">
                                                                                    {{ isset($products->unit_price) ? $products->unit_price : '' }} ৳
                                                                                </del>
                                                                            @else
                                                                                <span>
                                                                                    {{ $products->unit_price - $products->product->discount_amount }} ৳ 
                                                                                </span>
                                                                            @endif     
                                                                        </td>
                                                                        <td class="qc-quantity">
                                                                            <div class="input-group input-group-sm">
                                                                                <div class="qty-container nh__product__qty__area"
                                                                                    style="width:100%;">
                                                                                    <div class="nh__product__qty">
                                                                                        <input type="text"
                                                                                            id="CurrentQty_{{ $i }}"
                                                                                            name="total_quantity"
                                                                                            min="1"
                                                                                            value="{{ $products->quantity }}"
                                                                                            onChange="manualIncrement(this.value,  {{ $products->id }}, {{ $products->unit_price }}, {{ $i }})"
                                                                                            class="input-qty input-cornered" />
                                                                                    </div>
                                                                                    <div
                                                                                        class="nh__product__qty nh--product--qty">
                                                                                        <div
                                                                                            class="nh__product__qty__inner">
                                                                                            <button
                                                                                                class="qty-btn-plus btn-danger btn-cornered ml-1"
                                                                                                onClick="manageQuantity({{ $i }}, 'increment')"
                                                                                                type="button"
                                                                                                data-product_id="{{ $products->id }}">
                                                                                                <i
                                                                                                    class="fa fa-chevron-up"></i>
                                                                                            </button>
                                                                                        </div>
                                                                                        <div
                                                                                            class="nh__product__qty__inner">
                                                                                            <input type="hidden"
                                                                                                id="product_id_{{ $i }}"
                                                                                                value="{{ $products->id }}">
                                                                                            <input type="hidden"
                                                                                                name=""
                                                                                                id="unit_price_{{ $i }}"
                                                                                                value="{{ $products->unit_price }}">
                                                                                            <button
                                                                                                class="qty-btn-minus btn-danger btn-cornered mr-2"
                                                                                                onClick="manageQuantity({{ $i }}, 'decrement')"
                                                                                                type="button"
                                                                                                @if ($products->quantity == 1) disabled @endif>
                                                                                                <i
                                                                                                    class="fa fa-chevron-down"></i>
                                                                                            </button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td class="text-center td-total"
                                                                            id="subTotal_{{ $i }}">
                                                                            {{ ($products->unit_price - $products->product->discount_amount) * $products->quantity }}
                                                                            ৳
                                                                        </td>
                                                                        <td style="text-align: center">
                                                                            <span class="input-group-btn">
                                                                                <a href="{{ route('product_delete_cart', $products->id) }}"
                                                                                    class="btn btn-remove cart_item__remove">
                                                                                    <i class="fa fa-trash-o"
                                                                                        aria-hidden="true"></i>
                                                                                </a>
                                                                            </span>
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
                                                        <div class="form-horizontal qc-totals checkout__details__price">
                                                            <div class="row">
                                                                <label class="col-sm-9 col-xs-6 control-label">
                                                                    সাবটোটাল
                                                                </label>
                                                                <div
                                                                    class="col-sm-3 col-xs-6 form-control-static text-right">
                                                                    <span id="productPrice">
                                                                        {{ isset($totalprice) ? $totalprice : '' }} ৳
                                                                    </span>
                                                                    <input id="productPriceval" type="hidden"
                                                                        name="price"
                                                                        value="{{ isset($totalprice) ? $totalprice : '' }}">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <label class="col-sm-9 col-xs-6 control-label">
                                                                    ডিসকাউন্ট
                                                                </label>
                                                                <div class="col-sm-3 col-xs-6 form-control-static text-right"
                                                                    id="discount_increment">
                                                                    {{ isset($totaldiscount) ? $totaldiscount : '' }} ৳

                                                                    <input type="hidden" id="Discount"
                                                                        name="discount_amount_old"
                                                                        value="{{ isset($totaldiscount) ? $totaldiscount : '' }}">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <label class="col-sm-9 col-xs-6 control-label">
                                                                    ডেলিভারী চার্জ
                                                                </label>
                                                                <div
                                                                    class="col-sm-3 col-xs-6 form-control-static text-right">
                                                                    <p id="insideDhakaCharge" class="text-white">
                                                                        <span> 60 ৳</span>

                                                                    </p>
                                                                    <p id="outsideDhakaCharge" class="text-white"
                                                                        style="display: none">
                                                                        <span> 120 ৳</span>
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
                                                                    {{ isset($totalprice) && isset($totaldiscount) ? $totalprice + 60 - $totaldiscount : '' }}
                                                                    ৳
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
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

        function manualIncrement(p_qty, p_id, p_up, i) {
            let subTotal = p_up * p_qty;
            $("#subTotal_" + i).html(subTotal + ' ৳');
            orderSubmit(p_id, 'manual', i, p_qty, p_up);
        }

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

            orderSubmit(productid, type, i, qty, unit_price);
        };

        function orderSubmit(productid, type, i, qty, unit_price) {

            $.ajax({
                url: "/product-increment",
                type: 'post',
                contentType: 'application/json',
                data: JSON.stringify({
                    productid,
                    type: type,
                    qty: qty,
                    unit_price: unit_price
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
                            var grandTotal = (parseFloat(totalprice) + 60) - parseFloat(totaldiscount);
                        } else {
                            var grandTotal = (parseFloat(totalprice) + 120) - parseFloat(totaldiscount);
                        }
                        $('#Discount').val(totaldiscount);
                        $("#discount_amount").val(totaldiscount);
                        $('#grandTotal').html(grandTotal + ' ৳');
                        $('input[name="order_total"]').val(grandTotal);

                        $('#productPriceval').val(totalprice);
                        $('#productPrice').html(totalprice + ' ৳');

                        $("#discount_increment").html(parseFloat(totaldiscount) + ' TAKA');
                        location.reload();
                    }
                },
                error: function(error) {
                    console.log('error1st', error);
                }
            });
        }

        // delivery area functoin
        function showInsideDhaka() {
            var discount = $("#discount_amount").val();
            var productPriceval = $("#productPriceval").val();
            var grandTotal = (parseInt(productPriceval) + 60) - +discount;
            // console.log(grandTotal, "grand total");
            // console.log(discount, "discount");
            // console.log(productPriceval, "productPriceval");
            $('#grandTotal').html(grandTotal + ' ৳');
            $('input[name="order_total"]').val(grandTotal);

            document.getElementById("insideDhakaCharge").style.display = "block";
            document.getElementById("outsideDhakaCharge").style.display = "none";
        }

        function showOutsideDhaka() {
            var discount = $("#discount_amount").val();
            var productPriceval = $("#productPriceval").val();
            var grandTotal = (parseInt(productPriceval) + 120) - +discount;
            // console.log(grandTotal, "grand total");
            // console.log(discount, "discount");
            // console.log(productPriceval, "productPriceval");
            $('#grandTotal').html(grandTotal + ' ৳');
            $('input[name="order_total"]').val(grandTotal);

            document.getElementById("insideDhakaCharge").style.display = "none";
            document.getElementById("outsideDhakaCharge").style.display = "block";
        };



        $(document).ready(function() {
            $('input[name="user_check"]').change(function() {
                if ($(this).attr('id') === 'UserCheck') {
                    window.location.href =
                        "/customer-login?session_id={{ !empty($cartItems) && count($cartItems) > 0 ? $cartItems[0]->session_id : '' }}";
                }
            });
        });
    </script>
@endsection
