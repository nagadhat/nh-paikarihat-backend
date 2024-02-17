@php
    $title = 'login';
@endphp
@extends('front-end.layouts.app')
@section('page_content')
{{-- @dd($product_count) --}}
    <div id="account-login" class="container">
        <div>
            <ul class="breadcrumb">
                <li><a href="{{ route('home_page') }}"><i class="fa fa-home"></i></a></li>
                <li><a href="{{ route('customer_login') }}">Account</a></li>
                <li><a href="javascript:void(0)">Login</a></li>
            </ul>
        </div>
        <div class="row">
            <div id="content" class="col-sm-9 nh__login__section">

                <div class="row login-box">
                    <div class="col-sm-6 ">
                        <div class=" nh__login__redesign__area">
                            <h4 class="nh__login__title" style="color: black; ">Login to your account.</h4>

                            <form action="{{ route('login_customer') }}" method="post" enctype="multipart/form-data"
                                class="form-horizontal login-form">
                                <input type="hidden" name="checkout_sessionid" value="{{ $sessionexists }}">
                                @csrf
                                <div class="form-group required" style="padding-top: 20px;">
                                    <label class="control-label" for="input-phone">Phone</label>
                                    <input type="text" name="phone" value="" placeholder="Enter Phone Number"
                                        id="input-phone" class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }} " value="{{ old('phone') }}" required>
                                        @if ($errors->has('phone'))
                                        <div class="alert alert-danger col-md-12 " style="margin-top:10px">
                                            {{ $errors->first('phone') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group required" style="padding-top: 15px;">
                                    <label class="control-label" for="input-password">Password</label>
                                    <input type="password" name="password" value="" placeholder="Password"
                                        id="input-password"
                                        class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" required>
                                    @if ($errors->has('password'))
                                        <div class="alert alert-danger col-md-12 " style="margin-top:10px">
                                            {{ $errors->first('password') }}
                                        </div>
                                    @endif
                                    {{-- <div>
                                        <a href="#" target="_top">Forgotten Password</a>
                                    </div> --}}
                                </div>
                                <div class="nh__forgot__password">
                                    <a href="{{ route('forgot_password') }}">Forgot Password ?</a>
                                </div>
                                <div class="nh__login__btn__area" >
                                    <div class="nh__login__null"></div>
                                    <div class="nh__login__btn_item">
                                        <button type="submit" class="nh__login__btn">Login</button>
                                    </div>

                                </div>
                            </form>

                        <p class="create__new__user">
                            New to Paikarihat?
                            <a href="{{ route('customer_register') }}" style="color: #F26933">Create an account</a>
                        </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
