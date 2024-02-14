<div class="user_mobilemenu_dashboard">
    <div class="user_dasboard_sidebar">
        <div class="user_dasboard_profile">
            <div class="user_dasboard_photo">
                <img src="{{ asset('front-end/assets/image/user-photo/user1.jpg') }}" alt="">
            </div>
            <div class="user_dasboardprofile_info">
                <div class="name">Anjam Akash</div>
                <div class="phone">01258758574</div>
            </div>
            <div class="user_dasboardprofile_crose"onclick="userLeftSidebar()">
                <i class="fa fa-times" aria-hidden="true"></i>
            </div>
        </div>
        <div class="user_dasboard_menu">
            <a href="{{ route('customer_dashboard') }}" class="active"><i class="fa fa-server" aria-hidden="true"></i>
                Dashboard</a>
            <a href="{{ route('customer_order_history') }}"><i class="fa fa-history" aria-hidden="true"></i> order
                history </a>
            <a href="{{ route('customer_profile_update') }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                Account </a>
            <a href="{{ route('customer_password') }}"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Change
                Password</a>
            <a href="{{ route('customer_logout') }}"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
        </div>
    </div>
</div>
