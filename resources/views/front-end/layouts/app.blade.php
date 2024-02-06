
<!DOCTYPE html>
<html dir="ltr" lang="en"
    class="desktop win mozilla oc30 is-guest route-common-home store-0 skin-1 desktop-header-active mobile-sticky layout-1"
    data-jb="14218c54" data-jv="3.1.8" data-ov="3.0.3.8">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head typeof="og:website">
     <!-- Required meta tags -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <meta name="app-url" content="{{ URL::to('/') }}">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
     <meta name="description"
         content="Paikarihat Bangladesh Ltd is your ultimate online shopping destination in Dhaka and across Bangladesh, offering a vast selection of over 1 million products. With our extensive range, we bring convenience and variety right to your fingertips. Whether you're in Dhaka or anywhere else in Bangladesh, we've got you covered with our multiple outlets conveniently located across the country.">

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
             content="Paikarihat Bangladesh Ltd is your ultimate online shopping destination in Dhaka and across Bangladesh, offering a vast selection of over 1 million products. With our extensive range, we bring convenience and variety right to your fingertips. Whether you're in Dhaka or anywhere else in Bangladesh, we've got you covered with our multiple outlets conveniently located across the country.">
         <meta property="og:image" content="https://nagadhat.com.bd/web-files/og-meta.png">
     @endif
     {{-- /og meta --}}

     {{-- facebook domain verification --}}
     <meta name="facebook-domain-verification" content="f5xejsz6newphrvysr0zhll2lyidpf" />
     {{-- end facebook domain verification --}}

     <!-- Meta Pixel Code -->
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
         fbq('init', '599565935644837');
         fbq('track', 'PageView');
     </script>
     <noscript><img height="1" width="1" style="display:none"
             src="https://www.facebook.com/tr?id=599565935644837&ev=PageView&noscript=1" /></noscript>
     <!-- End Meta Pixel Code -->

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
    <title>Paikarihat Online Shopping</title>
    <link rel="icon" href="{{ asset('front-end/assets/image/landing/favicon.png') }}">
    <base />
    <link rel="preload" href="{{asset('front-end/assets/theme/icons/fonts/icomoon6654.woff2?v1')}}" as="font" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com/" crossorigin>
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <meta name="description" content="Pakarihat - Online shopping in Bangladesh" />
    <meta property="fb:app_id" content="" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Pakarihat Bangladesh" />
    <meta property="og:url" content="{{ route('home_page') }}" />
    <meta property="og:image" content="{{ asset('front-end/assets/image/Paikari-Hat-logo-260-X-114.png') }}" />
    <meta property="og:image:width" content="600" />
    <meta property="og:image:height" content="315" />
    <meta property="og:description" content="Paikarihat - Online shopping in Bangladesh" />



    <script src="{{ asset('front-end/assets/javascript/header.js') }}"></script>
    <link href="https://fonts.googleapis.com/css?family=Hind+Siliguri:700,500,400&amp;subset=bengali" type="text/css"
        rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('front-end/sweetalert2/sweetalert2.min.css') }}">
    <link href="{{ asset('front-end/assets/javascript/bootstrap/css/bootstrap.minf13b.css') }}" type="text/css"
        rel="stylesheet" media="all" />

    <link href="{{ asset('front-end/assets/javascript/font-awesome/css/font-awesome.minf13b.css') }}" type="text/css"
        rel="stylesheet" media="all" />

    <link href="{{ asset('front-end/assets/theme/icons/style.minimalf13b.css') }}" type="text/css" rel="stylesheet"
        media="all" />

    <link href="{{ asset('front-end/assets/theme/lib/masterslider/style/mastersliderf13b.css') }}" type="text/css"
        rel="stylesheet" media="all" />

    <link rel="stylesheet" type="text/css" href="{{ asset('front-end/assets/css/style.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('front-end/assets/css/product_carousel.css') }}" />

     {{-- data table css --}}
     <link href="{{ asset('assets/vendors/datatables/dataTables.bootstrap.min.css') }}" rel="stylesheet">
     <link rel="stylesheet" href="{{ asset('front-end/assets/css/toastr.min.css') }}">
     <link rel="stylesheet" type="text/css" href="{{ asset('front-end/assets/css/product-button.css') }}" />

    <style>
        header::before {
            background-image: radial-gradient(circle farthest-corner at 10% 20%, rgb(68 188 157) 0%, rgb(68 188 157) 90%);
            box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.1);
        }

        footer .grid-row-4 {
            background-image: radial-gradient(circle farthest-corner at 10% 20%, rgba(68 188 157) 0%, rgba(68 188 157) 90%);
            padding: 20px;
            box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.1);
        }
    </style>

</head>

<body class="">

    <div class="mobile-container mobile-main-menu-container">
        <div class="mobile-wrapper-header">
            <span>সকল ক্যাটেগরিস</span>
            <a class="x"></a>
        </div>
        <div class="mobile-main-menu-wrapper">

        </div>
    </div>

    <div class="mobile-container mobile-filter-container">
        <div class="mobile-wrapper-header"></div>
        <div class="mobile-filter-wrapper"></div>
    </div>

    <div class="mobile-container mobile-cart-content-container">
        <div class="mobile-wrapper-header">
            <span>Your Cart</span>
            <a class="x"></a>
        </div>
        <div class="mobile-cart-content-wrapper cart-content"></div>
    </div>

    <div class="site-wrapper">
        {{-- header start --}}
        <header class="header-classic">
            <div class="header header-classic header-lg">
                <div class="top-bar navbar-nav">
                    <div class="top-menu top-menu-13">
                        @if (Route::has('customer_login'))
                            @auth
                                <ul class="j-menu">
                                    <li class="menu-item top-menu-item top-menu-item-1">
                                        <a href="{{ route('customer_dashboard') }}"><span class="links-text">Account</span></a>
                                    </li>
                                    <li class="menu-item top-menu-item top-menu-item-2">
                                        <a href="{{ route('customer_logout') }}">
                                            <span class="links-text">Logout</span>
                                        </a>
                                    </li>
                                </ul>
                            @else
                                <ul class="j-menu">
                                    <li class="menu-item top-menu-item top-menu-item-1">
                                        <a href="{{ route('home_page') }}"><span class="links-text">HOME</span></a>
                                    </li>
                                    <li class="menu-item top-menu-item top-menu-item-2">
                                        <a href="{{ route('customer_login') }}">
                                            <span class="links-text">MY ACCOUNT</span>
                                        </a>
                                    </li>
                                    <li class="menu-item top-menu-item top-menu-item-6">
                                        <a href="tel:09647 444 444"><span class="links-text">HOTLINE : 09647 444 444</span></a>
                                    </li>
                                </ul>
                            @endauth
                        @endif
                    </div>

                    <div class="language-currency top-menu">
                        <div class="desktop-language-wrapper">
                        </div>
                        <div class="desktop-currency-wrapper">
                        </div>
                    </div>
                    <div class="third-menu"></div>
                </div>
                <div class="mid-bar navbar-nav">
                    <div class="desktop-logo-wrapper">
                        <div id="logo">
                            <a href="{{ route('home_page') }}">
                                <img src="{{ asset('front-end/assets/image/Paikari-Hat-logo-260-X-114.png') }}" alt="Pakarihat"
                                    title="Pakarihat"/>
                            </a>
                        </div>
                    </div>
                    <div class="desktop-search-wrapper full-search default-search-wrapper">
                        <div id="search" class="dropdown">
                            <button class="dropdown-toggle search-trigger" data-toggle="dropdown"></button>
                            <div class="dropdown-menu j-dropdown">
                                <form action="{{ route('search_product') }}" method="GET">
                                    <div class="header-search">
                                        <input type="text" name="productsearch" value=""
                                            placeholder="পণ্য খুঁজুন এখানে......" class="search-input"
                                            data-category_id="" />
                                        <button type="submit" class="search-button"></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="classic-cart-wrapper">
                        <div class="top-menu secondary-menu"></div>
                        <div class="desktop-cart-wrapper default-cart-wrapper">
                            <div id="cart" class="dropdown">
                                <a data-toggle="dropdown" data-loading-text="Loading..."
                                    class="dropdown-toggle cart-heading" href="{{ route('add_to_cart') }}">
                                    <i class="fa fa-shopping-cart">
                                        <span class="cart-label">Cart</span>
                                    </i>
                                    <span id="cart-items" class="count-badge count-zero">0</span>
                                </a>
                                <div id="cart-content" class="dropdown-menu cart-content j-dropdown">
                                    <ul>
                                        <li>
                                            <p class="text-center cart-empty">Your shopping cart is empty!</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="desktop-cart-wrapper default-cart-wrapper">
                        <div id="cart" class="dropdown">
                            <a class="dropdown-toggle cart-heading" href="{{ route('add_to_cart') }}">
                                <i class="fa fa-shopping-cart">
                                    <span class="cart-label">Cart</span>
                                </i>
                                @if ($product_count >= 1)
                                    <span id="cart-items" class="count-badge">{{ $product_count }}</span>
                                @else
                                    <span id="cart-items" class="count-badge count-zero">0</span>
                                @endif
                            </a>
                        </div>
                    </div>
                </div>
                <div class="desktop-main-menu-wrapper menu-default  navbar-nav">
                </div>
            </div>
            <div class="mobile-header mobile-default mobile-2">
                <div class="mobile-top-bar">
                    <div class="mobile-top-menu-wrapper">
                        <div class="top-menu top-menu-13">
                            @if (Route::has('customer_login'))
                                @auth
                                    <ul class="j-menu">
                                        <li class="menu-item top-menu-item top-menu-item-2">
                                            <a href="{{ route('customer_dashboard') }}"><span class="links-text">
                                                    Account</span></a>
                                        </li>
                                        <li class="menu-item top-menu-item top-menu-item-1">
                                            <a href="{{ route('customer_logout') }}"><span class="links-text">Logout</span></a>
                                        </li>
                                    </ul>
                                @else
                                    <ul class="j-menu">
                                        <li class="menu-item top-menu-item top-menu-item-1">
                                            <a href="{{ route('home_page') }}"><span class="links-text">HOME</span></a>
                                        </li>
                                        <li class="menu-item top-menu-item top-menu-item-2">
                                            <a href="{{ route('customer_login') }}"><span class="links-text">MY
                                                    ACCOUNT</span></a>
                                        </li>
                                        <li class="menu-item top-menu-item top-menu-item-6">
                                            <a href="tel:09647 444 444"><span class="links-text">HOTLINE :
                                                09647 444 444</span></a>
                                        </li>
                                    </ul>
                                @endauth
                            @endif
                        </div>
                    </div>
                    <div class="language-currency top-menu">
                        <div class="mobile-currency-wrapper">
                        </div>
                        <div class="mobile-language-wrapper">
                        </div>
                    </div>
                </div>
                <div class="mobile-bar sticky-bar">
                    {{-- <div class="menu-trigger">
                        <button><span>Menu</span></button>
                    </div> --}}
                    <div class="mobile-logo-wrapper">
                    </div>
                    <div class="mobile-cart-wrapper mini-cart">
                    </div>
                </div>
                <div class="mobile-bar-group mobile-search-group">
                    <div class="mobile-search-wrapper full-search">

                    </div>
                </div>
            </div>
        </header>
        {{-- header end --}}

        @yield('page_content')

        {{-- footer start --}}
        <footer>
            <div class="grid-rows">
                <div class="grid-row grid-row-4">
                    <div class="grid-cols">
                        <div class="grid-col grid-col-1">
                            <div class="grid-items">
                                <div class="grid-item grid-item-1">
                                    <div class="links-menu links-menu-294">
                                        <ul class="module-body">
                                            <li class="menu-item links-menu-item links-menu-item-1">
                                                <a>
                                                    <span class="links-text">Paikarihat © 2023 - 2024</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid-col grid-col-2">
                            <div class="grid-items">
                                <div class="grid-item grid-item-1">
                                    <div class="icons-menu icons-menu-61">
                                        <ul>
                                            <li class="menu-item icons-menu-item icons-menu-item-1 icon-menu-icon">
                                                <a data-toggle="tooltip" data-tooltip-class="icons-menu-tooltip-61"
                                                    data-placement="top" title="Facebook"
                                                    href="javascript:void(0)">
                                                    <span class="links-text">Facebook</span>
                                                </a>
                                            </li>
                                            <li class="menu-item icons-menu-item icons-menu-item-3 icon-menu-icon">
                                                <a data-toggle="tooltip" data-tooltip-class="icons-menu-tooltip-61"
                                                    data-placement="top" title="Instagram"
                                                    href="javascript:void(0)">
                                                    <span class="links-text">Instagram</span>
                                                </a>
                                            </li>
                                            <li class="menu-item icons-menu-item icons-menu-item-5 icon-menu-icon">
                                                <a data-toggle="tooltip" data-tooltip-class="icons-menu-tooltip-61"
                                                    data-placement="top" title="YouTube"
                                                    href="javascript:void(0)">
                                                    <span class="links-text">YouTube</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid-col grid-col-3">
                            <div class="grid-items">
                                <div class="grid-item grid-item-1">
                                    <div class="links-menu links-menu-77">
                                        <ul class="module-body">
                                            <li class="menu-item links-menu-item links-menu-item-1">
                                                <a href="javascript:void(0)">
                                                    <span class="links-text">ওয়েবসাইট তৈরি করেছে Global Fast Coder</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        {{-- footer end --}}
        @php
            if ($title!='checkjs') {
                @endphp
                <script src="{{ asset('front-end/assets/theme/lib/modernizr/modernizr-customf13b.js') }}"></script>
                <script src="{{ asset('front-end/assets/theme/lib/jquery/jquery-2.1.1.minf13b.js') }}"></script>
                <script src="{{ asset('front-end/assets/javascript/bootstrap/js/bootstrap.minf13b.js') }}"></script>
               @php
            }
        @endphp
            <script src="{{ asset('front-end/assets/theme/lib/modernizr/modernizr-customf13b.js') }}"></script>
            <script src="{{ asset('front-end/assets/theme/lib/jquery/jquery-2.1.1.minf13b.js') }}"></script>
            <script src="{{ asset('front-end/assets/javascript/toastr.min.js') }}"></script>
            <script src="{{ asset('front-end/assets/javascript/script.js') }}" type="text/javascript"></script>
            <script src="{{ asset('front-end/sweetalert2/sweetalert2.all.min.js') }}"></script>

            {{-- data table js --}}
            <script src="{{ asset('assets/vendors/datatables/jquery.dataTables.min.js') }}"></script>
            <script src="{{ asset('assets/vendors/datatables/dataTables.bootstrap.min.js') }}"></script>

            @include('sweetalert::alert')
            {!! Toastr::message() !!}


        <!-- Google Tag Manager (noscript) -->
        <noscript>
            <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P7FHQPT" height="0" width="0"
                style="display:none;visibility:hidden">
            </iframe>
        </noscript>
        <!-- End Google Tag Manager (noscript) -->
        @yield('scripts')

    </div>
</body>

</html>
