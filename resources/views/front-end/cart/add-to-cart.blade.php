@php
    $title = 'Shopping Cart';
@endphp
@extends('front-end.layouts.app')
@section('page_content')
    <ul class="breadcrumb">
        <li><a href="{{ route('home_page') }}"><i class="fa fa-home"></i></a></li>
        <li><a href="javascript:voide(0)">{{ $title }}</a></li>
    </ul>
    <div id="checkout-cart" class="container">
        <div class="row">
            <div id="content" class="col-sm-12">
                <h1 class="title page-title cart-page-title">{{ $title }}
                </h1>
                <div id="content-top">
                    <div class="grid-rows">
                        <div class="grid-row grid-row-content-top-1">
                            <div class="grid-cols">
                                <div class="grid-col grid-col-content-top-1-1">
                                    <div class="grid-items">
                                        <div class="grid-item grid-item-content-top-1-1-1">
                                            <div class="module module-blocks module-blocks-288 blocks-grid">
                                                <div class="module-body cart-module-body">
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
                                                                        </b></div>
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

                <div class="cart-page nh--paikarihat">
                    <form action="#" method="post"
                        enctype="multipart/form-data" class="cart-table">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td class="text-center td-image">নাম ও ছবি</td>
                                        <td class="text-left td-name">Product Name</td>
                                        <td class="text-center td-model">Model</td>
                                        <td class="text-center td-qty">কোয়ান্টিটি</td>
                                        <td class="text-center td-price">Unit Price</td>
                                        <td class="text-center td-total">মোট বিল</td>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td class="text-center td-image"> <a href="https://careforbd.com/Skin-Spray">
                                            <img
                                                    src="https://careforbd.com/image/cache/catalog/Products/Skin-Spray/skin%20logo%201-60x60.jpeg"
                                                    alt="Antibacterial Wormwood Spray"
                                                    title="Antibacterial Wormwood Spray">
                                                </a>
                                        </td>
                                        <td class="text-left td-name">
                                            <a href="https://careforbd.com/Skin-Spray">Antibacterial Wormwood Spray</a>
                                        </td>
                                        <td class="text-center td-model">Skin-Spray</td>
                                        <td class="text-center td-qty">
                                            <div class="input-group btn-block cart--quantity--btn">
                                                <div class="stepper">
                                                    <input type="text" name="quantity[38877]" value="1"
                                                        size="1" class="form-control" min="1">
                                                    <span>
                                                        <i class="fa fa-angle-up"></i>
                                                        <i class="fa fa-angle-down"></i>
                                                    </span>
                                                </div>
                                                <span class="input-group-btn">
                                                    <button type="submit" data-toggle="tooltip" title=""
                                                        class="btn btn-update" data-original-title="Update"><i
                                                            class="fa fa-refresh"></i></button>
                                                    <button type="button" data-toggle="tooltip" title=""
                                                        class="btn btn-remove" onclick="cart.remove('38877');"
                                                        data-original-title="Remove"><i
                                                            class="fa fa-times-circle"></i></button>
                                                </span>
                                            </div>
                                        </td>
                                        <td class="text-center td-price">850 TAKA</td>
                                        <td class="text-center td-total">850 TAKA</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center td-image"> <a
                                                href="https://careforbd.com/Height-Growth-Herbal-Patch-3-Packet-30PC"><img
                                                    src="https://careforbd.com/image/cache/catalog/Products/Health/Height-Growth-Herbal-Patch-3-Packet-30PC-60x60.JPG"
                                                    alt="Height Growth Herbal Patch 3 Packet (30PC)"
                                                    title="Height Growth Herbal Patch 3 Packet (30PC)"></a> </td>
                                        <td class="text-left td-name"><a
                                                href="https://careforbd.com/Height-Growth-Herbal-Patch-3-Packet-30PC">Height
                                                Growth Herbal Patch 3 Packet (30PC)</a> </td>
                                        <td class="text-center td-model">Height-Patch-3 Packet-30PC</td>
                                        <td class="text-center td-qty">
                                            <div class="input-group btn-block cart--quantity--btn">
                                                <div class="stepper">
                                                    <input type="text" name="quantity[38876]" value="1"
                                                        size="1" class="form-control">
                                                    <span>
                                                        <i class="fa fa-angle-up"></i>
                                                        <i class="fa fa-angle-down"></i>
                                                    </span>
                                                </div>
                                                <span class="input-group-btn">
                                                    <button type="submit" data-toggle="tooltip" title=""
                                                        class="btn btn-update" data-original-title="Update"><i
                                                            class="fa fa-refresh"></i></button>
                                                    <button type="button" data-toggle="tooltip" title=""
                                                        class="btn btn-remove" onclick="cart.remove('38876');"
                                                        data-original-title="Remove"><i
                                                            class="fa fa-times-circle"></i></button>
                                                </span>
                                            </div>
                                        </td>
                                        <td class="text-center td-price">850 TAKA</td>
                                        <td class="text-center td-total">850 TAKA</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center td-image"> <a
                                                href="https://careforbd.com/Yellow-Teeth-Whitening-Toothpaste"><img
                                                    src="https://careforbd.com/image/cache/catalog/Products/Health/Yellow-Teeth-Whitening-Toothpaste-60x60.jpg"
                                                    alt="হলুদ দাঁত সাদা করার টুথপেস্ট"
                                                    title="হলুদ দাঁত সাদা করার টুথপেস্ট"></a> </td>
                                        <td class="text-left td-name"><a
                                                href="https://careforbd.com/Yellow-Teeth-Whitening-Toothpaste">হলুদ দাঁত
                                                সাদা করার টুথপেস্ট</a> </td>
                                        <td class="text-center td-model">Toothpaste</td>
                                        <td class="text-center td-qty">
                                            <div class="input-group btn-block cart--quantity--btn">
                                                <div class="stepper">
                                                    <input type="text" name="quantity[38875]" value="1"
                                                        size="1" class="form-control">
                                                    <span>
                                                        <i class="fa fa-angle-up"></i>
                                                        <i class="fa fa-angle-down"></i>
                                                    </span>
                                                </div>
                                                <span class="input-group-btn">
                                                    <button type="submit" data-toggle="tooltip" title=""
                                                        class="btn btn-update" data-original-title="Update"><i
                                                            class="fa fa-refresh"></i></button>
                                                    <button type="button" data-toggle="tooltip" title=""
                                                        class="btn btn-remove" onclick="cart.remove('38875');"
                                                        data-original-title="Remove"><i
                                                            class="fa fa-times-circle"></i></button>
                                                </span>
                                            </div>
                                        </td>
                                        <td class="text-center td-price">850 TAKA</td>
                                        <td class="text-center td-total">850 TAKA</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </form>
                    <div class="cart-bottom">
                        <div class="panels-total">
                            <div class="cart-total">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td class="text-right"><strong>প্রোডাক্টের মূল্য:</strong></td>
                                            <td class="text-right">2,550 TAKA</td>
                                        </tr>
                                        <tr>
                                            <td class="text-right"><strong><b>ডেলিভারী চার্জ</b>:</strong></td>
                                            <td class="text-right">150 TAKA</td>
                                        </tr>
                                        <tr>
                                            <td class="text-right"><strong>মোট বিল:</strong></td>
                                            <td class="text-right">2,700 TAKA</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="buttons clearfix">
                            <div class="pull-left"><a href="https://careforbd.com/index.php?route=common/home"
                                    class="btn btn-default"><span>Continue Shopping</span></a></div>
                            <div class="pull-right"><a href="https://careforbd.com/index.php?route=checkout/checkout"
                                    class="btn btn-primary"><span>Checkout</span></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
