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

    <!-- Site Title -->
    <title>Purchase Invoice</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('back-end/css/invoice.css') }}">
    <link rel="stylesheet" href="{{ asset('back-end/css/purchase-invoice.css') }}">
</head>

<body>
    <div class="cs-container">
        <div class="">
        </div>
        <div class="cs-invoice cs-style1">
            <div class="cs-invoice_in" id="download_section">
                <div class="cs-invoice_head cs-type1 cs-mb25">
                    <div class="cs-invoice_left cs-text_left">
                        <p style="color: black">
                            Hotline: 09647-444-444<br>
                            Email: support@nagadhat.com.bd<br>
                            Web: paikarihat.nagadhat.com
                        </p>
                    </div>
                    <div style="margin-top: 20px;">
                        <h4>Purchase Invoice</h4>
                    </div>
                    <div class="cs-invoice_right cs-text_right" style="padding-bottom: 0%">
                        <div class="cs-logo"><img
                                src="{{ asset('front-end/assets/image/Paikari-Hat-logo-260-X-114.png') }}"
                                style="height: 72px;" alt="Brand Logo"></div>
                    </div>
                </div>
                <div class="cs-invoice_head cs-mb20">
                    <div class="cs-invoice_left">
                        <p style="color: black;">
                            <span style="color: black;font-weight: bold;">Company Name:</span>
                            {{ isset($purchaseOrderrDetails->getSupplier->company) ? $purchaseOrderrDetails->getSupplier->company : '' }}
                            </span>
                            <br>
                            <span style="color: black;font-weight: bold;">Name:</span>
                            {{ isset($purchaseOrderrDetails->getSupplier->name) ? $purchaseOrderrDetails->getSupplier->name : '' }}
                            </span>
                            <br>
                            <span style="color: black;font-weight: bold;">Supplier Details:</span><br>
                            {{ isset($purchaseOrderrDetails->getSupplier->phone) ? $purchaseOrderrDetails->getSupplier->phone : '' }},
                            {{ isset($purchaseOrderrDetails->getSupplier->address) ? $purchaseOrderrDetails->getSupplier->address : '' }}.
                            </span>
                        </p>
                    </div>
                    <div class="cs-invoice_right">
                        <p class="cs-invoice_number cs-primary_color cs-mb0"><b class="cs-primary_color">
                                Purchase No:</b> #PO{{ $purchaseOrderrDetails->id }}
                        </p>
                        <p class="cs-invoice_date cs-primary_color cs-m0"><b class="cs-primary_color">Date:
                            </b>
                            {{ isset($purchaseOrderrDetails->created_at) ? $purchaseOrderrDetails->created_at->format('d/m/y g:i A') : '' }}
                        </p>
                        <p class="cs-invoice_date cs-primary_color cs-m0"><b class="cs-primary_color">Payment Status:
                            </b>
                            <span
                                style="background: #F1632B; padding-top:1px; padding-right:10px;
                                padding-bottom:1px; padding-left: 10px;  border: 2px;
                                border-radius: 25px; font-weight: bold;">
                                @if ($purchaseOrderrDetails->status == 1)
                                   <span class="badge bg-primary text-white">Partial</span>
                                @elseif ($purchaseOrderrDetails->status == 2)
                                    <span class="badge bg-primary text-white">Paid</span>
                                @else
                                    <span class="badge bg-primary text-white">Unpaid</span>
                                @endif
                            </span>
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
                                            <th class="cs-width_1 cs-semi_bold cs-primary_color cs-focus_bg">Product
                                                Name
                                            </th>
                                            <th class="cs-width_1 cs-semi_bold cs-primary_color cs-focus_bg">Qty</th>
                                            <th class="cs-width_3 cs-semi_bold cs-primary_color cs-focus_bg">P.Price
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($purchaseProductList as $product)
                                            @php
                                                $image = empty($product->purchaseOrderProductToProduct->photo)
                                                    ? asset('assets/images/others/error.png')
                                                    : asset(
                                                        'storage/products/' .
                                                            $product->purchaseOrderProductToProduct->photo,
                                                    );
                                            @endphp
                                            <tr>
                                                <td style="color: #0d0101">{{ $loop->index + 1 }}</td>
                                                <td class="cs-width_3" style="color: #0d0101">
                                                    <img class="img-fit rounded" style="width:50px"
                                                        src="{{ $image }}">
                                                </td>
                                                <td class="cs-width_4" style="color: black">
                                                    {{ isset($product->purchaseOrderProductToProduct) ? $product->purchaseOrderProductToProduct->title : '--' }}
                                                </td>
                                                <td class="cs-width_2" style="color: black">
                                                    {{ isset($product->quantity) ? $product->quantity : '' }}
                                                </td>
                                                <td class="cs-width_1" style="color: black">
                                                    ৳
                                                    {{ isset($product->purchase_amount) ? $product->purchase_amount : '' }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="margin-top: 10px">
                    <h4>Payment History</h4>
                </div>
                <div class="row purchase-history_area-row">
                    <div class="col-8 history-col">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">#Sl</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Method</th>
                                        <th scope="col">Note</th>
                                        <th scope="col">Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($purchasePaymentList as $payment)
                                        <tr>
                                            <td scope="row">{{ $loop->index + 1 }}</td>
                                            <td> {{ isset($payment->created_at) ? $payment->created_at->format('d/m/y g:i A') : '' }}
                                            </td>
                                            <td>
                                                @if ($payment->payment_method == 0)
                                                    <span>Cash</span>
                                                @elseif($payment->payment_method == 1)
                                                    <span>Bank</span>
                                                @elseif($payment->payment_method == 2)
                                                    <span>Bkash</span>
                                                @elseif($payment->payment_method == 3)
                                                    <span>Nagad</span>
                                                @elseif($payment->payment_method == 4)
                                                    <span>Rocket</span>
                                                @else
                                                    <span>No Payment</span>
                                                @endif
                                            </td>
                                            <td>{{ $payment->id }}{{ $payment->trxn_id }}({{ $payment->payment_note }})</td>
                                            <td>{{ $payment->paid_amount }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-4 history-col">
                        <div class="cs-round_border">
                            <div class="cs-table_responsive">
                                <table>
                                    <tbody style="color: #000000">
                                        <tr>
                                            <td style="font-weight:bold">Subtotal</td>
                                            <td style="text-align: right">৳
                                                {{ $subTotal }}
                                            </td>
                                        </tr>
                                        {{-- <tr>
                                            <td style="font-weight:bold">Shipping</td>
                                            <td style="text-align: right">৳
                                                {{ $discountTotal }}
                                            </td>
                                        </tr> --}}
                                        <tr>
                                            <td style="font-weight:bold">Discount</td>
                                            <td style="text-align: right">৳
                                                {{ $discountTotal }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:bold">Shipping Charge</td>
                                            <td style="text-align: right">
                                                ৳
                                                {{ isset($purchaseOrderrDetails->shipping_charge) ? $purchaseOrderrDetails->shipping_charge : 0 }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:bold">Total</td>
                                            <td style="text-align: right">
                                                ৳
                                                {{ isset($purchaseOrderrDetails->total_amount) ? $purchaseOrderrDetails->total_amount : 0 }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:bold;">Paid Amount </td>
                                            <td style="text-align: right; color: green">
                                                ৳
                                                {{ isset($purchaseOrderrDetails->paid_amount) ? $purchaseOrderrDetails->paid_amount : 0 }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:bold">Payable </td>
                                            <td style="text-align: right;color: red">
                                                ৳
                                                {{ isset($purchaseOrderrDetails->paid_amount) ? $purchaseOrderrDetails->due_amount : 0 }}
                                            </td>
                                        </tr>
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
                </div><!-- .cs-note -->
            </div>
            <div class="cs-invoice_btns cs-hide_print">
                <a href="javascript:window.print()" class="cs-invoice_btn cs-color1" style="margin-right: 30px">
                    <span>Download</span>
                </a>
                <a href="{{ route('purchase_list') }}" class="cs-invoice_btn cs-color3" style="background: #000">
                    <span>Go Back</span>
                </a>
            </div>
            <div class="footer__invoice">
                <i class="fas fa-map-marker-alt"></i>
                <p>
                    <i class="fa fa-map-marker" aria-hidden="true" style="color: #fff; font-size: 20px;"></i>
                    Khaja Super Market, 2nd to 7th Floor,
                    Kallyanpur Bus Stop, Mirpur Road, Dhaka-1207
                </p>
            </div>
        </div>
    </div>
</body>

</html>
