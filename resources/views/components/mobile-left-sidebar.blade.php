<div class="user__mobile__menu__dashboard">
    <div class="user__dasboard__sidebar">
        <div class="user__dasboard__profile">
            <div class="user__dasboard__photo">
                <img src="{{ !empty(user_info()->photo) ? asset(user_info()->photo) : asset('front-end/assets/image/user-photo/user1.jpg') }}" alt="">
            </div>
            <div class="user__dasboard__profile__info">
                <div class="name">{{ user_info()->name }}</div>
                <div class="phone">{{ user_info()->phone }}</div>
            </div>
            <div class="user__dasboard__profile__crose"onclick="userLeftSidebar()">
                <i class="fa fa-times" aria-hidden="true"></i>
            </div>
        </div>
        <div class="user__dasboard__menu">
            <a href="{{ route('customer_dashboard') }}" class="{{ request()->routeIs('customer_dashboard') ? 'active' : '' }}">
                <i class="fa fa-server" aria-hidden="true"></i>
                Dashboard
            </a>
            <a href="{{ route('customer_order_history') }}" class="{{ request()->routeIs('customer_order_history') ? 'active' : '' }}">
                <i class="fa fa-history" aria-hidden="true"></i>
                order history
            </a>
            <a href="{{ route('customer_profile_update') }}" class="{{ request()->routeIs('customer_profile_update') ? 'active' : '' }}">
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                Account
             </a>
            {{-- <a href="{{ route('customer_password') }}" class="{{ request()->routeIs('customer_password') ? 'active' : '' }}">
                <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                Change Password
            </a> --}}
            <a href="{{ route('customer_logout') }}"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
        </div>
    </div>
</div>
