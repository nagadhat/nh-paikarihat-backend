<!-- Side Nav START -->
<div class="side-nav">
    <div class="side-nav-inner">
        <ul class="side-nav-menu scrollable">
            @if (auth()->user()->is_admin == 0)
                <li>
                    <a href="{{ route('user_dashboard') }}" class="{{ Route::currentRouteName() == 'user_dashboard' ? 'parent-menu-active' : '' }}">
                        <span class="icon-holder">
                            <i class="fas fa-home"></i>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle" href="javascript:void(0);">
                        <span class="icon-holder">
                            <i class="fas fa-clipboard-list"></i>
                        </span>
                        <span class="title">Order</span>
                        <span class="arrow">
                            <i class="arrow-icon"></i>
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="{{ Route::currentRouteName() == 'orders' ? 'active' : '' }}">
                            <a href="{{ route('orders') }}">Orders</a>
                        </li>
                        <li class="{{ Route::currentRouteName() == 'return_orders' ? 'active' : '' }}">
                            <a href="{{ route('return_orders') }}">Returns</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle" href="javascript:void(0);">
                        <span class="icon-holder">
                            <i class="fas fa-dolly-flatbed"></i>
                        </span>
                        <span class="title">Product</span>
                        <span class="arrow">
                            <i class="arrow-icon"></i>
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="{{ Route::currentRouteName() == 'categories.index' ? 'active' : '' }}">
                            <a href="{{ route('categories.index') }}">Categories</a>
                        </li>
                        <li class="{{ Route::currentRouteName() == 'brands.index' ? 'active' : '' }}">
                            <a href="{{ route('brands.index') }}">Brands</a>
                        </li>
                        <li class="{{ Route::currentRouteName() == 'products.index' ? 'active' : '' }}">
                            <a href="{{ route('products.index') }}">Products</a>
                        </li>
                        <li class="{{ Route::currentRouteName() == 'product_variations' ? 'active' : '' }}">
                            <a href="{{ route('product_variations') }}">Variations</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle" href="javascript:void(0);">
                        <span class="icon-holder">
                            <i class="fas fa-clipboard-list"></i>
                        </span>
                        <span class="title">Landing Page</span>
                        <span class="arrow">
                            <i class="arrow-icon"></i>
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="{{ Route::currentRouteName() == 'landing_page_list' ? 'active' : '' }}">
                            <a href="{{ route('landing_page_list') }}">Page List</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle" href="javascript:void(0);">
                        <span class="icon-holder">
                            <i class="fas fa-clipboard-list"></i>
                        </span>
                        <span class="title">POS</span>
                        <span class="arrow">
                            <i class="arrow-icon"></i>
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="{{ Route::currentRouteName() == 'pos' ? 'active' : '' }}">
                            <a href="{{ route('pos') }}">POS</a>
                        </li>
                        <li class="{{ Route::currentRouteName() == 'pos_sales' ? 'active' : '' }}">
                            <a href="{{ route('pos_sales') }}">Sales</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('a-couriers.index') }}" class="{{ Route::currentRouteName() == 'a-couriers.index' ? 'parent-menu-active' : '' }}">
                        <span class="icon-holder">
                            <i class="fas fa-truck"></i>
                        </span>
                        <span class="title">Couriers</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle" href="javascript:void(0);">
                        <span class="icon-holder">
                            <i class="fas fa-cart-plus"></i>
                        </span>
                        <span class="title">Purchase</span>
                        <span class="arrow">
                            <i class="arrow-icon"></i>
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="{{ Route::currentRouteName() == 'create_purchase' ? 'active' : '' }}">
                            <a href="{{ route('create_purchase') }}">Create Purchase</a>
                        </li>
                        <li class="{{ Route::currentRouteName() == 'purchase_list' ? 'active' : '' }}">
                            <a href="{{ route('purchase_list') }}">Purchase List</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle" href="javascript:void(0);">
                        <span class="icon-holder">
                            <i class="fas fa-users"></i>
                        </span>
                        <span class="title">Contact</span>
                        <span class="arrow">
                            <i class="arrow-icon"></i>
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="{{ Route::currentRouteName() == 'customers.index' ? 'active' : '' }}">
                            <a href="{{ route('customers.index') }}">Customers</a>
                        </li>
                        <li class="{{ Route::currentRouteName() == 'suppliers.index' ? 'active' : '' }}">
                            <a href="{{ route('suppliers.index') }}">Suppliers</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('tickets.index') }}" class="{{ Route::currentRouteName() == 'tickets.index' ? 'parent-menu-active' : '' }}">
                        <span class="icon-holder">
                            <i class="fas fa-ticket-alt"></i>
                        </span>
                        <span class="title">Support Tickets</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle" href="javascript:void(0);">
                        <span class="icon-holder">
                            <i class="fas fa-th-large"></i>
                        </span>
                        <span class="title">Template</span>
                        <span class="arrow">
                            <i class="arrow-icon"></i>
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="{{ Route::currentRouteName() == 'themes.index' ? 'active' : '' }}">
                            <a href="{{ route('themes.index') }}">Landing Pages</a>
                        </li>
                        <li class="{{ Route::currentRouteName() == 'my-themes.index' ? 'active' : '' }}">
                            <a href="{{ route('my-themes.index') }}">My Templates</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('subscription.index') }}" class="{{ Route::currentRouteName() == 'subscription.index' ? 'parent-menu-active' : '' }}">
                        <span class="icon-holder">
                            <i class="fas fa-donate"></i>
                        </span>
                        <span class="title">Subscription</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle" href="javascript:void(0);">
                        <span class="icon-holder">
                            <i class="fas fa-chart-pie"></i>
                        </span>
                        <span class="title">Report</span>
                        <span class="arrow">
                            <i class="arrow-icon"></i>
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="">Sales Report</a>
                        </li>
                        <li>
                            <a href="">Purchase Report</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('settings') }}" class="{{ Route::currentRouteName() == 'settings' ? 'parent-menu-active' : '' }}">
                        <span class="icon-holder">
                            <i class="far fa-sun"></i>
                        </span>
                        <span class="title">Settings</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a href="">
                        <span class="icon-holder">
                            <i class="fas fa-plug"></i>
                        </span>
                        <span class="title">Add-ons</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a href="">
                        <span class="icon-holder">
                            <i class="fab fa-rocketchat"></i>
                        </span>
                        <span class="title">Bulk SMS</span>
                    </a>
                </li>
            @else
                <li class="nav-item dropdown">
                    <a href="">
                        <span class="icon-holder">
                            <i class="fas fa-home"></i>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a href="{{ route('packages.index') }}">
                        <span class="icon-holder">
                            <i class="fas fa-clipboard-list"></i>
                        </span>
                        <span class="title">Packages</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a href="{{ route('couriers.index') }}">
                        <span class="icon-holder">
                            <i class="fas fa-truck"></i>
                        </span>
                        <span class="title">Couriers</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a href="{{ route('support_tickets') }}">
                        <span class="icon-holder">
                            <i class="fas fa-ticket-alt"></i>
                        </span>
                        <span class="title">Support Tickets</span>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</div>
<!-- Side Nav END -->
