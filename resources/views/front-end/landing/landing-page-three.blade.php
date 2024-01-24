<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="app-url" content="{{ URL::to('/') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="description"
        content="Nagadhat Bangladesh Ltd is your ultimate online shopping destination in Dhaka and across Bangladesh, offering a vast selection of over 1 million products. With our extensive range, we bring convenience and variety right to your fingertips. Whether you're in Dhaka or anywhere else in Bangladesh, we've got you covered with our multiple outlets conveniently located across the country.">

    {{-- og meta --}}
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">

    @if (isset($product))
        <meta property="og:title" content="{{ $product['title'] }}">
        <meta property="og:description"
            content="{{ substr(strip_tags($product['long_description']), 0, 200) . '....' }}">
        <meta property="og:image"
            content="{{ isset($product['photo']) && $product['photo'] != '' ? $product->photo : 'https://nagadhat.com.bd/web-files/og-meta.png' }}">
    @else
        <meta property="og:title" content="Order now from nagadhat.com.bd: Visit our website for exclusive offers.">
        <meta property="og:description"
            content="Nagadhat Bangladesh Ltd is your ultimate online shopping destination in Dhaka and across Bangladesh, offering a vast selection of over 1 million products. With our extensive range, we bring convenience and variety right to your fingertips. Whether you're in Dhaka or anywhere else in Bangladesh, we've got you covered with our multiple outlets conveniently located across the country.">
        <meta property="og:image" content="https://nagadhat.com.bd/web-files/og-meta.png">
    @endif
    {{-- /og meta --}}

    {{-- facebook domain verification --}}
    <meta name="facebook-domain-verification" content="f5xejsz6newphrvysr0zhll2lyidpf" />
    {{-- end facebook domain verification --}}

    {{-- Meta Pixel Code --}}
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '476888784314638');
        fbq('track', 'PageView');
    </script>

    <noscript>
        <img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=476888784314638&ev=PageView&noscript=1" />
    </noscript>
    {{-- meta pixel end --}}

    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-P7FHQPT');
    </script>
    <!-- End Google Tag Manager -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('front-end/assets/css/bootstrap-4.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front-end/assets/css/landing-page-three.css') }}" />
    {{-- font-awesome --}}
    <link rel="stylesheet" href="{{ asset('front-end/assets/css/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/assets/css/css/line-awesome.min.css') }}">
    <title>Multifunctional Wireless Charger</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('front-end/assets/image/landing/favicon.png') }}">
    <style>
        .backimg {
            background-size: cover;
            padding: 0px 0 45px
        }

        @media (max-width: 767px) {
            a.bg {
                position: relative;
                padding: 11px  17px;
                /* color: #bb3d3e; */
                color: #9049AF;
                background: #fff;
                background-size: 180% auto;
                display: inline-block;
                transition: .2s;
                font-weight: 600;
                border-radius: 10px;
                font-size: 22px;
                line-height: 42px;
                transition: all .2s;
                transform: scale(.9);
            }
        }

        @media (max-width: 767px) {
            a.bg2 {
                position: relative;
                padding: 8px 12px;
                color: #fff;
                /* background: #BB3D3E; */
                background: #9049AF;
                background-size: 180% auto;
                display: inline-block;
                transition: .2s;
                font-weight: 600;
                border-radius: 10px;
                font-size: 20px;
                line-height: 42px;
                transition: all .2s;
                transform: scale(.9);
            }

        }

        @media (max-width: 767px) {
            a.bg3 {
                position: relative;
                padding: 3px 8px;
                /* color: #BB3D3E; */
                color: #9049AF;
                /* background: #BB3D3E; */
                background-size: 180% auto;
                display: inline-block;
                transition: .2s;
                font-weight: 600;
                /* border: 4px solid #BB3D3E; */
                /* border: 4px solid #9049AF; */
                font-size: 18px;
                line-height: 42px;
                transition: all .2s;
                transform: scale(.9);
            }

        }

        @media (max-width: 767px) {
            .Landing__23__ShippingIcon {
                padding: 40px;
                text-align: center;
                box-shadow: 0 5px 15px rgba(0, 0, 0, .35);
                transition: all .2s;
                border-radius: 10px;
                outline: 1px dashed #bb3d3e;
                outline-offset: -10px
            }
        }

        @media (max-width: 767px) {
            .mobile-hide {
                display: none;
            }
        }

        .card {
            box-shadow: 0 5px 15px rgba(0, 0, 0, .35);
            transition: all .2s;
            border-radius: 10px;
            /* outline: 1px dashed #bb3d3e; */
            outline: 1px dashed #9049AF;
            outline-offset: -10px;
        }

        .card-img-top {
            width: 40%;
        }

        .card-body {
            padding: 1rem;
        }

        .mx-auto {
            display: block;
            margin-left: auto;
            margin-right: auto;
            padding-top: 13px;
        }

        .card:hover {
            /* background-color: #bb3d3e; */
            background-color: #9049AF;
        }

        .card:hover .card-text {
            color: white !important;
        }
    </style>
</head>
<body>
    <section>
        <div class="Landing__23__bg_div backimg imgmobile"
            style="background-image: url({{ asset('front-end/assets/image/landing/multi-charger/header-image.png') }});">
            <div class="container">
                <section class="Menubar" id="Menubar">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="menubar_MenubarContent__rb5Uq" id="MenubarContent">
                                    <div class="menubar_Logo__xF9pv" id="Logo">
                                        <img src="{{ asset('front-end/assets/image/landing/ph-logo.png') }}" decoding="async"
                                            data-nimg="1" loading="lazy" style="color: transparent;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="Landing__23__Reverce row mbl">
                    <div class="col-md-6  py-5">
                        <div class="Landing__23__BannerTxt">
                            <h1 class="fw-bold title">
                                একের ভিতর ছয়,<br> আর চিন্তা নয়
                            </h1>
                            <div class="Landing__23__HrBanner  hide-on-mobile"></div>
                            <h6 class="text-white" style="font-size: 30px;">স্মার্ট মানুষের স্মার্ট ডিভাইস  6 in 1 </h6>
                            <h6 class="text-white hide-on-mobile" style="font-size: 30px">Multifunctional Wireless Fast <br> Charging System Mobile Charger!</h6>
                            <a class="bg mt-3" href="#section1">
                                <svg stroke="currentColor" style="" fill="currentColor" stroke-width="0"
                                    viewBox="0 0 1024 1024" height="1em" width="1em"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M922.9 701.9H327.4l29.9-60.9 496.8-.9c16.8 0 31.2-12 34.2-28.6l68.8-385.1c1.8-10.1-.9-20.5-7.5-28.4a34.99 34.99 0 0 0-26.6-12.5l-632-2.1-5.4-25.4c-3.4-16.2-18-28-34.6-28H96.5a35.3 35.3 0 1 0 0 70.6h125.9L246 312.8l58.1 281.3-74.8 122.1a34.96 34.96 0 0 0-3 36.8c6 11.9 18.1 19.4 31.5 19.4h62.8a102.43 102.43 0 0 0-20.6 61.7c0 56.6 46 102.6 102.6 102.6s102.6-46 102.6-102.6c0-22.3-7.4-44-20.6-61.7h161.1a102.43 102.43 0 0 0-20.6 61.7c0 56.6 46 102.6 102.6 102.6s102.6-46 102.6-102.6c0-22.3-7.4-44-20.6-61.7H923c19.4 0 35.3-15.8 35.3-35.3a35.42 35.42 0 0 0-35.4-35.2zM305.7 253l575.8 1.9-56.4 315.8-452.3.8L305.7 253zm96.9 612.7c-17.4 0-31.6-14.2-31.6-31.6 0-17.4 14.2-31.6 31.6-31.6s31.6 14.2 31.6 31.6a31.6 31.6 0 0 1-31.6 31.6zm325.1 0c-17.4 0-31.6-14.2-31.6-31.6 0-17.4 14.2-31.6 31.6-31.6s31.6 14.2 31.6 31.6a31.6 31.6 0 0 1-31.6 31.6z">
                                    </path>
                                </svg>
                                অর্ডার করুন
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- only for mobile view --}}
    <section class="py-5 d-sm-none">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="card text-center" style="width: 10rem;">
                        <img src="{{ asset('front-end/assets/image/landing/multi-charger/power.png') }}" class="card-img-top mx-auto"
                            alt="Card Image">
                        <div class="card-body">
                            <h5 class="card-text fw-bold" style="color:#860A35">ওয়্যারলেস<br>চার্জিং</h5>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card text-center" style="width: 10rem;">
                        <img src="{{ asset('front-end/assets/image/landing/multi-charger/rotation.png') }}" class="card-img-top mx-auto"
                            alt="Card Image" style="width: 40%">
                        <div class="card-body">
                            <h5 class="card-text fw-bold" style="color:#860A35">ভোল্টেজ <br> প্রটেকশন</h5>
                        </div>
                    </div>
                </div>
                <div class="col-6 mt-3">
                    <div class="card text-center" style="width: 10rem;">
                        <img src="{{ asset('front-end/assets/image/landing/multi-charger/switch.png') }}" class="card-img-top mx-auto"
                            alt="Card Image" style="width: 40%">
                        <div class="card-body">
                            <h5 class="card-text fw-bold" style="color:#860A35; font-size: 19px;">
                                শর্ট সার্কিট <br> প্রটেকশন
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="col-6 mt-3">
                    <div class="card text-center" style="width: 10rem;">
                        <img src="{{ asset('front-end/assets/image/landing/multi-charger/key.png') }}" class="card-img-top mx-auto"
                            alt="Card Image" style="width: 40%">
                        <div class="card-body">
                            <h5 class="card-text fw-bold" style="color:#860A35; font-size: 19px;">
                                টেম্পারেচার <br> প্রটেকশন
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- only for mobile view end --}}
    <section class="py-5 mobile-hide">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="Landing__23__ShippingIcon">
                        <img class="Landing__23__ShipImg2" src="{{ asset('front-end/assets/image/landing//multi-charger/power.png') }}"
                            alt="">
                        <img class="Landing__23__ShipImg1" src="{{ asset('front-end/assets/image/landing//multi-charger/power.png') }}"
                            alt="">
                        <h4>ওয়্যারলেস<br>চার্জিং</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="Landing__23__ShippingIcon">
                        <img class="Landing__23__ShipImg2" src="{{ asset('front-end/assets/image/landing/multi-charger/rotation.png') }}"
                            alt="">
                        <img class="Landing__23__ShipImg1" src="{{ asset('front-end/assets/image/landing/multi-charger/rotation.png') }}"
                            alt="">
                        <h4>ওভার-ভোল্টেজ <br> প্রটেকশন</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="Landing__23__ShippingIcon">
                        <img class="Landing__23__ShipImg2"
                            src="{{ asset('front-end/assets/image/landing/multi-charger/switch.png') }}" alt="">
                        <img class="Landing__23__ShipImg1"
                            src="{{ asset('front-end/assets/image/landing/multi-charger/switch.png') }}" alt="">
                        <h4>শর্ট সার্কিট <br> প্রটেকশন</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="Landing__23__ShippingIcon">
                        <img class="Landing__23__ShipImg2" src="{{ asset('front-end/assets/image/landing/multi-charger/key.png') }}"
                            alt="">
                        <img class="Landing__23__ShipImg1" src="{{ asset('front-end/assets/image/landing/multi-charger/key.png') }}"
                            alt="">
                        <h4>টেম্পারেচার <br> প্রটেকশন</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="Landing__23__Features">
                        <h4>স্পেশাল ফিচার</h4>
                        <div class="Landing__23__Hr2"></div>
                        <ul>
                            <li> <img src="{{ asset('front-end/assets/image/landing/multi-charger/icon.png') }}" alt="">
                                <h5>বিল্ট ইন ফাস্ট চার্জিং প্রটোকল</h5>
                            </li>
                            <li> <img src="{{ asset('front-end/assets/image/landing/multi-charger/icon.png') }}" alt="">
                                <h5>শক্তিশালী বিল্ট ইন ব্যাটারি </h5>
                            </li>
                            <li> <img src="{{ asset('front-end/assets/image/landing/multi-charger/icon.png') }}" alt="">
                                <h5>হাইয়ার কনভার্শন রেট</h5>
                            </li>
                            <li> <img src="{{ asset('front-end/assets/image/landing/multi-charger/icon.png') }}" alt="">
                                <h5>USB Type C চার্জিং সিস্টেম</h5>
                            </li>
                            <li> <img src="{{ asset('front-end/assets/image/landing/multi-charger/icon.png') }}" alt="">
                                <h5>ইনপুট ভোল্টেজ সিস্টেম  9 Volts</h5>
                            </li>
                            <li> <img src="{{ asset('front-end/assets/image/landing/multi-charger/icon.png') }}" alt="">
                                <h5>এয়ারপড চার্জিং প্রটোকল</h5>
                            </li>
                            <li> <img src="{{ asset('front-end/assets/image/landing/multi-charger/icon.png') }}" alt="">
                                <h5>রেডিয়েশন ফ্রি</h5>
                            </li>
                            <li> <img src="{{ asset('front-end/assets/image/landing/multi-charger/icon.png') }}" alt="">
                                <h5>দৃষ্টিনন্দন ডিজাইন</h5>
                            </li>
                            <li> <img src="{{ asset('front-end/assets/image/landing/multi-charger/icon.png') }}" alt="">
                                <h5>দীর্ঘস্থায়ী </h5>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="Landing__23__FeaturesImgDiv">
                        <img src="{{ asset('front-end/assets/image/landing/multi-charger/main-feature.png') }}" alt=""
                            style="border-radius: 20px">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5 mt-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="VideoPlay">
                        <div class="video_VideoPlayers__7fEIf">
                            <div style="width: 640px; height: 360px;">
                                <div style="width: 100%; height: 100%;">
                                    <iframe frameborder="0" allowfullscreen=""
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        title="Nagadhat Product Launching Video | The First Automated E-Commerce Sales in Bangladesh."
                                        width="100%" height="100%" src="https://www.youtube.com/embed/VG5R_MHA5oE"
                                        id="widget2">
                                    </iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="Landing__23__VideoTxtDiv Landing__23__Features">
                        <h4>Multifunctional Wireless Charger</h4>
                        <div class="Landing__23__Hr2"></div>
                        <p class="text-justify">
                            এই মাল্টিফাংশনাল স্মার্ট ডিভাইসের সাহায্যে আপনার স্মার্টফোন, স্মার্ট ওয়াচ   সকল Type C এন্ড্রয়েড  অত্যন্ত  দ্রুত সময়ে চার্জ করতে পারবেন।
                            অ্যাপল এবং এন্ড্রয়েড উভয় টাইপের ডিভাইসের জন্যই এটি একটি পারফেক্ট হাইব্রিড  চার্জিং স্টেশন।
                            এই ডিভাইসের বিল্ট ইন মাল্টিপল প্রটেকশন ফাংশন আপনাকে সেইফ ও ফাস্ট চার্জিংয়ের নিশ্চয়তা দেয়।
                            এই ডিভাইসটি চার্জিংয়ের সময়  ওভার পাওয়ার সমস্যা থেকে আপনার ডিভাইসকে প্রটেকশন দেবে
                        </p>
                        <a class="bg2" href="#section1">
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024"
                                height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M922.9 701.9H327.4l29.9-60.9 496.8-.9c16.8 0 31.2-12 34.2-28.6l68.8-385.1c1.8-10.1-.9-20.5-7.5-28.4a34.99 34.99 0 0 0-26.6-12.5l-632-2.1-5.4-25.4c-3.4-16.2-18-28-34.6-28H96.5a35.3 35.3 0 1 0 0 70.6h125.9L246 312.8l58.1 281.3-74.8 122.1a34.96 34.96 0 0 0-3 36.8c6 11.9 18.1 19.4 31.5 19.4h62.8a102.43 102.43 0 0 0-20.6 61.7c0 56.6 46 102.6 102.6 102.6s102.6-46 102.6-102.6c0-22.3-7.4-44-20.6-61.7h161.1a102.43 102.43 0 0 0-20.6 61.7c0 56.6 46 102.6 102.6 102.6s102.6-46 102.6-102.6c0-22.3-7.4-44-20.6-61.7H923c19.4 0 35.3-15.8 35.3-35.3a35.42 35.42 0 0 0-35.4-35.2zM305.7 253l575.8 1.9-56.4 315.8-452.3.8L305.7 253zm96.9 612.7c-17.4 0-31.6-14.2-31.6-31.6 0-17.4 14.2-31.6 31.6-31.6s31.6 14.2 31.6 31.6a31.6 31.6 0 0 1-31.6 31.6zm325.1 0c-17.4 0-31.6-14.2-31.6-31.6 0-17.4 14.2-31.6 31.6-31.6s31.6 14.2 31.6 31.6a31.6 31.6 0 0 1-31.6 31.6z">
                                </path>
                            </svg>অর্ডার করুন
                        </a>
                        {{-- <a class="bg3" href="#footer2"> যোগাযোগ করুন </a> --}}
                        <a class="bg3" href="#section1">Call- 0190 6198502</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-3">
        <div class="container">
            <div class="swiper swiper-initialized swiper-horizontal swiper-pointer-events mySwiper">
                <div class="swiper-wrapper" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);">
                    <div class="swiper-slide swiper-slide-duplicate Landing__23__SliderImg swiper-slide-active"
                        data-swiper-slide-index="3" style="width: 354.333px; margin-right: 30px;">
                        <a href="/p/fast-wzarles-kar-carjar#">
                            <div class="Landing__23__Slider_CardDiv">
                                <img class="Landing__23__Slider_CardDivImg"
                                    src="{{ asset('front-end/assets/image/landing/multi-charger/main-1.png') }}" alt="img"
                                    style="border-radius: 15px;">
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide swiper-slide-duplicate Landing__23__SliderImg swiper-slide-next"
                        data-swiper-slide-index="4" style="width: 354.333px; margin-right: 30px;">
                        <a href="/p/fast-wzarles-kar-carjar#">
                            <div class="Landing__23__Slider_CardDiv">
                                <img class="Landing__23__Slider_CardDivImg"
                                    src="{{ asset('front-end/assets/image/landing/multi-charger/main-2.png') }}" alt="img"
                                    style="border-radius: 15px">
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide swiper-slide-duplicate Landing__23__SliderImg swiper-slide-next"
                        data-swiper-slide-index="4" style="width: 354.333px; margin-right: 30px;">
                        <a href="/p/fast-wzarles-kar-carjar#">
                            <div class="Landing__23__Slider_CardDiv">
                                <img class="Landing__23__Slider_CardDivImg"
                                    src="{{ asset('front-end/assets/image/landing/multi-charger/main.png') }}" alt="img"
                                    style="border-radius: 15px">
                            </div>
                        </a>
                    </div>
                </div>
                <div
                    class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-horizontal">
                    <span class="swiper-pagination-bullet"></span><span
                        class="swiper-pagination-bullet swiper-pagination-bullet-active"></span>
                </div>
            </div>
        </div>
    </section>
    <section class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div
                        class="swiper swiper-initialized swiper-horizontal swiper-pointer-events mySwiper swiper-backface-hidden">
                        <div class="swiper-wrapper"
                            style="transition-duration: 0ms; transform: translate3d(-1098px, 0px, 0px);">
                            <div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-active Landing__23__SliderImg"
                                data-swiper-slide-index="1" style="width: 549px;">
                                <a href="/p/fast-wzarles-kar-carjar#">
                                    <div class="Landing__23__Slider_CardDiv">
                                        <img class="Landing__23__Slider_CardDivImg"
                                            src="{{ asset('front-end/assets/image/landing/multi-charger/anima.gif') }}" alt="img">
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide swiper-slide-prev swiper-slide-duplicate-next Landing__23__SliderImg"
                                data-swiper-slide-index="0" style="width: 549px;">
                                <a href="/p/fast-wzarles-kar-carjar#">
                                    <div class="Landing__23__Slider_CardDiv">
                                        <img class="Landing__23__Slider_CardDivImg"
                                            src="{{ asset('front-end/assets/image/landing/multi-charger/anima.gif') }}" alt="img">
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide swiper-slide-active Landing__23__SliderImg"
                                data-swiper-slide-index="1" style="width: 549px;">
                                <a href="#">
                                    <div class="Landing__23__Slider_CardDiv">
                                        <img class="Landing__23__Slider_CardDivImg"
                                            src="{{ asset('front-end/assets/image/landing/multi-charger/anima.gif') }}" alt="img"
                                            style="border-radius: 15px">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="Landing__23__VideoTxtDiv Landing__23__Features">
                        <h4>স্পেশাল ফিচারঃ </h4>
                        <div class="Landing__23__Hr2"></div>
                        <p class="text-justify">
                            দারুণ সব ফিচারে সমৃদ্ধ এই স্মার্ট ডিভাইসটি আপনার লাইফে নিঃসন্দেহে ভ্যালু এড করবে,
                            বিল্ট ইন মাল্টিপল প্রটেকশন ফাংশন, বিদ্যুৎ সাশ্রয়ী, স্মার্ট কানেক্টিভিটি, ইন্টেলিজেন্ট ডিভাইস ম্যাচিং,
                            একবার চার্জ দিয়ে দীর্ঘ সময় পর্যন্ত ব্যবহার করা যায়, সহজে বহন যোগ্য, দীর্ঘ সময় ধরে ব্যবহার উপযোগী৷
                            বাংলাদেশে এই ডিভাইসটি আমরা আপনাদেরকে দিচ্ছি অত্যন্ত সাশ্রয়ী মূল্যে৷
                        </p>
                        <a class="bg2" href="#section1r"> <svg stroke="currentColor" fill="currentColor"
                                stroke-width="0" viewBox="0 0 1024 1024" height="1em" width="1em"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M922.9 701.9H327.4l29.9-60.9 496.8-.9c16.8 0 31.2-12 34.2-28.6l68.8-385.1c1.8-10.1-.9-20.5-7.5-28.4a34.99 34.99 0 0 0-26.6-12.5l-632-2.1-5.4-25.4c-3.4-16.2-18-28-34.6-28H96.5a35.3 35.3 0 1 0 0 70.6h125.9L246 312.8l58.1 281.3-74.8 122.1a34.96 34.96 0 0 0-3 36.8c6 11.9 18.1 19.4 31.5 19.4h62.8a102.43 102.43 0 0 0-20.6 61.7c0 56.6 46 102.6 102.6 102.6s102.6-46 102.6-102.6c0-22.3-7.4-44-20.6-61.7h161.1a102.43 102.43 0 0 0-20.6 61.7c0 56.6 46 102.6 102.6 102.6s102.6-46 102.6-102.6c0-22.3-7.4-44-20.6-61.7H923c19.4 0 35.3-15.8 35.3-35.3a35.42 35.42 0 0 0-35.4-35.2zM305.7 253l575.8 1.9-56.4 315.8-452.3.8L305.7 253zm96.9 612.7c-17.4 0-31.6-14.2-31.6-31.6 0-17.4 14.2-31.6 31.6-31.6s31.6 14.2 31.6 31.6a31.6 31.6 0 0 1-31.6 31.6zm325.1 0c-17.4 0-31.6-14.2-31.6-31.6 0-17.4 14.2-31.6 31.6-31.6s31.6 14.2 31.6 31.6a31.6 31.6 0 0 1-31.6 31.6z">
                                </path>
                            </svg>অর্ডার করুন
                        </a>
                        {{-- <a class="bg3" href="#section1"> যোগাযোগ করুন </a> --}}
                        <a class="bg3" href="#section1">Call- 0190 6198502</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="section1">
        <div class="Landing__23__section_gaps"></div>
        <div class="Landing__23__PlaceIn__OrderBg">
            <div class="container">
                <div class="Landing__23__PlaseInOdr">
                    <div id="placeAnOrder">
                        <section id="OrderConfirmFrom" class="order2_OrderConfirmFrom__ptc1e">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="order2_VarientMainDiv__2l0PH"></div>
                                    </div>
                                </div>
                                <form action="{{ route('order_landing_product') }} " method="post">
                                    @csrf
                                    <div class="row">
                                        <h2 class="text-white">জার্নিকে স্মুথ ও গতিশীল রাখতে আজই অর্ডার করুন।</h2>
                                        <div class="">
                                        </div>
                                        <div class="col-lg-7">
                                            <div id="OrderConfirmLeft" class="order2_OrderConfirmLeft__WjHVA">
                                                <h3 class="mt-3 fw-bold">Shipping Details</h3>
                                                <div id="NewUserFields">
                                                    <div id="CustomeInputName" class="order2_CustomeInput__H_xhv">
                                                        <input type="text" name="customer_name"
                                                            placeholder="আপনার নাম লিখুন *" required>
                                                    </div>
                                                    <div id="CustomeInputPhone" class="order2_CustomeInput__H_xhv">
                                                        <input type="text" name="customer_phone"
                                                            placeholder="আপনার মোবাইল নাম্বার লিখুন *" required>
                                                    </div>
                                                    <div id="CustomeInputAddress" class="order2_CustomeInput__H_xhv">
                                                        <input type="text" name="customer_address"
                                                            placeholder="আপনার সম্পূর্ণ ঠিকানা লিখুন *" required>
                                                    </div>
                                                </div>
                                                <div id="Payment" class="order2_Payment__Rm8N7">
                                                    <h3>Payment</h3>
                                                    <div id="CustomeInput"
                                                        class="order2_CustomeInput__H_xhv order2_d_flex__u2aK8">
                                                        <input type="checkbox" name="" id="CashOn"
                                                            checked="">
                                                        <label for="CashOn">ক্যাশ অন ডেলিভারি</label>
                                                    </div>
                                                    <div id="ArrowBg" class="order2_ArrowBg__tmGs_">
                                                        <p>Pay with cash on delivery.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <div class="col-lg-5">
                                            <div id="OrderConfirmRight" class="order2_OrderConfirmRight__FYYZv">
                                                <h3 class="fw-bold">Your order</h3>
                                                <ul>
                                                    <li>
                                                        <h4>Product</h4>
                                                        <h5 class="text-white">Total</h5>
                                                    </li>
                                                    <li>
                                                        @php
                                                            $imagePath = 'storage/products/' . $product->photo;
                                                            $image = file_exists($imagePath) ? asset($imagePath) : asset('assets/images/others/error.png');
                                                        @endphp
                                                        <div id="left"
                                                            class="order2_left__q_hHE order2_d_flex__u2aK8">
                                                            <div id="img" class="order2_img__8XMGU"><img
                                                                    src="{{ $image }}"
                                                                    alt="C13 Wireless Car Charger 15W"></div>
                                                            <p class="text-white fw-bold">{{ $product->title }}</p>
                                                        </div>
                                                        <div id="right"
                                                            class="order2_right__QSG_P order2_d_flex__u2aK8">
                                                            <input type="number" id="CurrentQty" name="total_quantity"
                                                                min="1" value="1"
                                                                onchange="updateOrderDetails(this)">
                                                            <h5 class="text-white">৳ <span
                                                                    id="productPrice">{{ $product->price }}</span>
                                                            </h5>
                                                            <input type="hidden" name="price"
                                                                value="{{ $product->price }}">
                                                        </div>
                                                    <li>
                                                        <h5 class="text-white fw-bold">Discount</h5>
                                                        <h5 class="text-white">
                                                            @php
                                                                $dis = isset($product->discount_amount) ? $product->discount_amount : '0';
                                                            @endphp
                                                            <del>৳ {{ $dis }}</del>
                                                            <input type="hidden" id="Discount"
                                                                name="discount_amount" value="{{ $dis }}">
                                                        </h5>
                                                    </li>
                                                    <li>
                                                        <h5 class="text-white fw-bold">Subtotal</h5>
                                                        <h5 class="text-white" id="subtotal">
                                                            ৳
                                                            {{ $product->quantity * ($product->price - $product->discount_amount) }}
                                                        </h5>
                                                    </li>
                                                    <li>
                                                        <div>
                                                            <h5 class="text-white fw-bold">Shipping</h5>
                                                            <div
                                                                class="custom-control custom-radio custom-control-inline">
                                                                <input type="radio" id="insideDhaka"
                                                                    name="delivery_area" class="custom-control-input"
                                                                    value="inside_dhaka" onclick="showInsideDhaka()"
                                                                    checked>
                                                                <label class="custom-control-label text-white"
                                                                    for="insideDhaka" style="font-size: 12px">Inside
                                                                    Dhaka</label>
                                                            </div>
                                                            <div
                                                                class="custom-control custom-radio custom-control-inline">
                                                                <input type="radio" id="outsideDhaka"
                                                                    value="outside_dhaka" name="delivery_area"
                                                                    class="custom-control-input"
                                                                    onclick="showOutsideDhaka()">
                                                                <label class="custom-control-label text-white" for="outsideDhaka"
                                                                    for="outsideDhaka" style="font-size: 12px">Outside
                                                                    Dhaka</label>
                                                            </div>
                                                        </div>

                                                        <div class="row text-end">
                                                            <h5 id="insideDhakaCharge" class="text-white">৳
                                                                <span>{{ $product->inside_dhaka }}</span>
                                                            </h5>
                                                            <h5 id="outsideDhakaCharge" class="text-white"
                                                                style="display: none">৳
                                                                <span >{{ $product->outside_dhaka }}</span>
                                                            </h5>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <h4>Grand Total</h4>
                                                        <h4 id="grandTotal">৳
                                                            {{ $product->quantity * ($product->price - $product->discount_amount) }}
                                                        </h4>
                                                    </li>
                                                </ul>
                                                <button type="submit">
                                                    <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                        viewBox="0 0 24 24" height="1em" width="1em"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M4.00436 6.41662L0.761719 3.17398L2.17593 1.75977L5.41857 5.00241H20.6603C21.2126 5.00241 21.6603 5.45012 21.6603 6.00241C21.6603 6.09973 21.6461 6.19653 21.6182 6.28975L19.2182 14.2898C19.0913 14.7127 18.7019 15.0024 18.2603 15.0024H6.00436V17.0024H17.0044V19.0024H5.00436C4.45207 19.0024 4.00436 18.5547 4.00436 18.0024V6.41662ZM6.00436 7.00241V13.0024H17.5163L19.3163 7.00241H6.00436ZM5.50436 23.0024C4.67593 23.0024 4.00436 22.3308 4.00436 21.5024C4.00436 20.674 4.67593 20.0024 5.50436 20.0024C6.33279 20.0024 7.00436 20.674 7.00436 21.5024C7.00436 22.3308 6.33279 23.0024 5.50436 23.0024ZM17.5044 23.0024C16.6759 23.0024 16.0044 22.3308 16.0044 21.5024C16.0044 20.674 16.6759 20.0024 17.5044 20.0024C18.3328 20.0024 19.0044 20.674 19.0044 21.5024C19.0044 22.3308 18.3328 23.0024 17.5044 23.0024Z">
                                                        </path>
                                                    </svg>Place Order BDT <span
                                                        id="orderAmount">{{ $product->quantity * ($product->price - $product->discount_amount) }}</span>
                                                </button>
                                                <section class="OrderOtp"></section>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="footer4_Footer4__OXjEB">
        <section class="footer4_Footer4Sec__Ugikm" id="footer2">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="footer4_FooterMainDiv__NDlXT">
                            <div class="footer4_FooterMainDiv1__GFsbF">
                                <a href="#">
                                    <h4> <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                            viewBox="0 0 24 24" height="1em" width="1em"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill="none" d="M0 0h24v24H0z"></path>
                                            <path
                                                d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5a2.5 2.5 0 010-5 2.5 2.5 0 010 5z">
                                            </path>
                                        </svg>
                                    </h4>
                                </a>
                                <p>
                                    Khaja Super Market, 2nd to 7th Floor, Kallyanpur Bus Stop,<br>
                                    Mirpur Road, Dhaka-1207.
                                </p>
                            </div>
                            <div>
                                <p>
                                    Hotline: 09647 444 444
                                </p>
                                <p>
                                    Phone: &nbsp;01906 198 502
                                </p>
                            </div>
                            <div>
                                <a href="https://www.facebook.com/nagadhat" target="_blank"
                                    style="font-size: 40px; margin-right: 10px;">
                                    <i class="fab fa-facebook"></i>
                                </a>
                                <a href="https://www.youtube.com/@NagadhatBangladeshLimited" target="_blank"
                                    style="font-size: 40px; margin-right: 10px;">
                                    <i class="fab fa-youtube"></i>
                                </a>
                                <a href="javascript: void(0)" style="font-size: 40px; margin-right: 10px;">
                                    <i class="fab fa-linkedin"></i>
                                </a>
                                <a href="javascript: void(0)" style="font-size: 40px; margin-right: 10px;">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </div>                        
                        </div>
                        <div id="tinyFooter2" class="footer4_tinyFooter2__3BkhN">
                            <div class="footer4_Hr__uQn4z"></div>
                            <div>
                                <p>© 2023 All Rights Reserved Designed by <a href="#">Nagadhat Bangladesh
                                        Limited</a> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="{{ asset('front-end/assets/javascript/jqury-3.js') }}"></script>
    <script src="{{ asset('jfront-end/assets/javascript/bootstrap-4.js') }}"></script>

    <!-- Google Tag Manager (noscript) -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P7FHQPT" height="0" width="0"
            style="display:none;visibility:hidden">
        </iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->

    <script>
        function placeOrder() {
            alert("Order Placed Sucessfully");
        }

        // Global Start
        var subtotal = getData();
        document.getElementById('grandTotal').innerText = '৳ ' + (subtotal + 60);
        document.getElementById('orderAmount').innerText = subtotal + 60;
        document.getElementById('subtotal').innerText = subtotal;
        // Global end

        let checkShipping = 1;

        function showInsideDhaka() {
            //Inside
            checkShipping = 1;
            var subtotal = getData();

            document.getElementById('grandTotal').innerText = '৳ ' + (subtotal + 60);
            document.getElementById('orderAmount').innerText = subtotal + 60;
            document.getElementById('subtotal').innerText = subtotal;

            document.getElementById("insideDhakaCharge").style.display = "block";
            document.getElementById("outsideDhakaCharge").style.display = "none";
        }


        function showOutsideDhaka() {
            //Outside
            checkShipping = 2;
            var subtotal = getData();
            document.getElementById('grandTotal').innerText = '৳ ' + (subtotal + 120);
            document.getElementById('orderAmount').innerText = subtotal + 120;
            document.getElementById('subtotal').innerText = subtotal;

            document.getElementById("insideDhakaCharge").style.display = "none";
            document.getElementById("outsideDhakaCharge").style.display = "block";
        }

        function updateOrderDetails(input) {
            //Quantity Change
            let shippingCharge = 120;
            if (checkShipping == 1) {
                shippingCharge = 60;
            }
            var subtotal = getData();
            document.getElementById('grandTotal').innerText = '৳ ' + (subtotal + shippingCharge);
            document.getElementById('orderAmount').innerText = subtotal + shippingCharge;
            document.getElementById('subtotal').innerText = subtotal;
        }

        function getData() {
            var quantity = $("#CurrentQty").val();
            var discountAmount = $("#Discount").val();
            var price = parseFloat(document.getElementById('productPrice').innerText);
            var subtotal = quantity * (price - discountAmount);
            return subtotal;
        }
    </script>
</body>

</html>
