<?php

?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="ThemeMarch">

    <link rel="stylesheet" href="{{ asset('front-end/sweetalert2/sweetalert2.min.css') }}">

    <!-- Site Title -->
    <title>Product Invoice</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/invoice.css') }}">
</head>

<body>
    <div class="cs-container">
        <div class="">
        </div>
        @if(session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        <div class="cs-invoice cs-style1">
            <div class="cs-invoice_in" id="download_section">
                <div class="cs-invoice_head cs-type1 cs-mb25">
                    <div class="cs-invoice_left cs-text_left">
                        <p style="color: black">
                            Address: Khaja Super Market, 2nd to 7th Floor,<br> Kallyanpur Bus Stop, Mirpur Road,
                            Dhaka-1207<br>
                            Call: 09647-444-444<br>
                            Email: support@nagadhat.com.bd<br>
                            Web: nagadhat.com.bd
                        </p>
                    </div>
                    <div class="cs-invoice_right cs-text_right" style="padding-bottom: 0%">
                        <div class="cs-logo"><img src="{{ asset('front-end/assets/image/Paikari-Hat-logo-260-X-114.png') }}"
                                style="height: 72px;" alt="Brand Logo"></div>
                    </div>
                </div>
                <div class="cs-invoice_head cs-mb20">
                    <div class="cs-invoice_left">
                        <p style="color: black;">
                            <span style="color: black;font-weight: bold;">Name:</span>
                                {{ isset($orderDetails->customer_name) ? $orderDetails->customer_name : ''}}
                                <br><span style="color: black;font-weight: bold;">Phone:</span>
                                {{ isset($orderDetails->customer_phone) ? $orderDetails->customer_phone : ''}}
                                <br><span style="color: black;font-weight: bold;">Shipping Address:</span>
                                {{ isset($orderDetails->customer_address) ? $orderDetails->customer_address : ''}}
                            </span>
                        </p>
                    </div>
                    <div class="cs-invoice_right">
                        <p class="cs-invoice_number cs-primary_color cs-mb0"><b class="cs-primary_color">Invoice
                                No:</b>
                                  # {{ $orderDetails->order_prefix .  $orderDetails->order_code}}
                        </p>
                        <p class="cs-invoice_date cs-primary_color cs-m0"><b class="cs-primary_color">Date:
                            </b>{{ isset($orderDetails->created_at) ? $orderDetails->created_at->format('d/m/y g:i A') : ''}}</p>
                        <p class="cs-invoice_date cs-primary_color cs-m0"><b class="cs-primary_color">Payment Status:
                            </b>
                            <span
                                style="background: #a4e208; padding-top:1px; padding-right:10px;
                                padding-bottom:1px; padding-left: 10px;  border: 2px;
                                border-radius: 25px; font-weight: bold;">

                                    @if ($orderDetails->payment_status == 1)
                                        <span
                                            class="badge bg-primary text-white">Unpaid</span>
                                    @else
                                        <span
                                            class="badge bg-success text-white">Paid</span>
                                    @endif
                            <span>
                        </p>
                        <p class="cs-invoice_date cs-primary_color cs-m0"><b class="cs-primary_color">Order Status:
                            </b>
                            @php
                                if ($orderDetails->status == 1) {
                                    $status = 'Pending';
                                } elseif ($orderDetails->status == 2) {
                                    $status = 'Confirm';
                                } elseif ($orderDetails->status == 3) {
                                    $status = 'Processing';
                                } elseif ($orderDetails->status == 4) {
                                    $status = 'Delivered';
                                } elseif ($orderDetails->status == 5) {
                                    $status = 'Cancelled';
                                } else {
                                    $status = '--';
                                }
                            @endphp
                            <span
                                style="background: #a4e208; padding-top:1px; padding-right:10px;
                                padding-bottom:1px; padding-left: 10px; border: 2px;
                                border-radius: 25px; font-weight: bold;">
                                {{ $status}}
                            <span>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="cs-table cs-style1 mb-4">
                        <div class="cs-round_border" style="padding-bottom: 30px">
                            <div class="cs-table_responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="cs-width_1 cs-semi_bold cs-primary_color cs-focus_bg">#SL</th>
                                            <th class="cs-width_1 cs-semi_bold cs-primary_color cs-focus_bg">Image
                                            </th>
                                            <th class="cs-width_1 cs-semi_bold cs-primary_color cs-focus_bg">Product Name
                                            </th>
                                            <th class="cs-width_1 cs-semi_bold cs-primary_color cs-focus_bg">Qty</th>
                                            <th class="cs-width_3 cs-semi_bold cs-primary_color cs-focus_bg">Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orderProductsDetailslist as $product)
                                            @php
                                                $image = empty($product->photo) ? asset('assets/images/others/error.png') : asset('storage/products/' . $product->photo);
                                            @endphp
                                            <tr>
                                                <td style="color: #0d0101">{{ $loop->index + 1 }}</td>
                                                <td class="cs-width_3" style="color: #0d0101">
                                                    <img class="img-fit rounded" style="width:50%;"
                                                        src="{{$image}}">
                                                </td>
                                                <td class="cs-width_4" style="color: black">
                                                    {{ isset($product->product_name) ? $product->product_name: ''}}
                                                </td>
                                                <td class="cs-width_2" style="color: black">
                                                    {{ isset($product->quantity) ? $product->quantity: ''}}
                                                </td>
                                                <td class="cs-width_1" style="color: black">
                                                    ৳  {{ isset($product->unit_price) ? $product->unit_price: ''}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="cs-table cs-style1 mb-4">
                        <div class="cs-round_border">
                            <div class="cs-table_responsive">
                                <table>
                                    <tbody style="color: #000000">
                                        <tr>
                                            <td style="font-weight:bold">Subtotal</td>
                                            <td style="text-align: right">৳
                                               {{ $orderDetails->total_amount - (is_numeric($orderDetails->delivery_area) ? $orderDetails->delivery_area : 0) }}

                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:bold">Shipping</td>
                                            <td style="text-align: right">৳
                                                {{ isset($orderDetails->delivery_area) ? $orderDetails->delivery_area : ''}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:bold">Discount</td>
                                            <td style="text-align: right">৳
                                                {{ isset($orderDetails->discount_amount) ? $orderDetails->discount_amount : ''}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:bold">Total</td>
                                            <td style="text-align: right">৳ {{ isset($orderDetails->total_amount) ? $orderDetails->total_amount: '--' }}</td>
                                        </tr>
                                        {{-- <tr>
                                            <td style="font-weight:bold">Paid</td>
                                            <td style="text-align: right">৳
                                                {{ $orderPaymentDetails->count() > 0 ? $orderPaymentDetails->sum('transaction_amound') : 0 }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:bold">Due</td>
                                            <td style="text-align: right">৳
                                                {{ $finalAmount - $orderPaymentDetails->sum('transaction_amound') }}
                                            </td>
                                        </tr> --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cs-note">
                    <div class="cs-note_left">
                        <svg xmlns="#" class="ionicon" viewBox="0 0 512 512">
                            <path
                                d="M416 221.25V416a48 48 0 01-48 48H144a48 48 0 01-48-48V96a48 48 0 0148-48h98.75a32 32 0 0122.62 9.37l141.26 141.26a32 32 0 019.37 22.62z"
                                fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" />
                            <path d="M256 56v120a32 32 0 0032 32h120M176 288h160M176 368h160" fill="none"
                                stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="32" />
                        </svg>
                    </div>
                    {{-- <div class="cs-note_right">
                        <p class="cs-mb0"><b class="cs-primary_color cs-bold">Note:</b></p>
                        <p class="cs-m0">
                            {{ isset($orderDetailss['delivery_note']) ? $orderDetailss['delivery_note'] : 'No Note Found' }}</p>
                    </div> --}}
                </div><!-- .cs-note -->
            </div>
            <div class="cs-invoice_btns cs-hide_print">
                <a href="javascript:window.print()" class="cs-invoice_btn cs-color1" style="margin-right: 30px">
                    {{-- <svg xmlns="#" class="ionicon" viewBox="0 0 512 512">
                        <path
                            d="M384 368h24a40.12 40.12 0 0040-40V168a40.12 40.12 0 00-40-40H104a40.12 40.12 0 00-40 40v160a40.12 40.12 0 0040 40h24"
                            fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" />
                        <rect x="128" y="240" width="256" height="208" rx="24.32" ry="24.32"
                            fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" />
                        <path d="M384 128v-24a40.12 40.12 0 00-40-40H168a40.12 40.12 0 00-40 40v24" fill="none"
                            stroke="currentColor" stroke-linejoin="round" stroke-width="32" />
                        <circle cx="392" cy="184" r="24" />
                    </svg> --}}
                    <span>Download</span>
                </a>
                <a href="{{  route('home_page') }}" class="cs-invoice_btn cs-color3">
                    <span>Go Back</span>
                </a>
            </div>
        </div>
    </div>

    {{-- <div class="cs-container">
        <div class="cs-invoice cs-style1">
            <div class="cs-invoice_btns cs-hide_print">
                <a href="{{ route('landing-order-tracking') }}" class="cs-invoice_btn cs-color2" style="margin-right: 30px">
                    Go Back
                </a>
                <a href="{{ route('tracking-invoice-id', $_GET) }}" class="cs-invoice_btn cs-color3">
                    {{ route('order_track', $orderDetails->id) }}
                    Track Order
                </a>
            </div>
        </div>
    </div> --}}


    <script src="{{ asset('front-end/assets/theme/lib/jquery/jquery-2.1.1.minf13b.js') }}"></script>
    <script src="{{ asset('front-end/sweetalert2/sweetalert2.all.min.js') }}"></script>
    @include('sweetalert::alert')
</body>

</html>
