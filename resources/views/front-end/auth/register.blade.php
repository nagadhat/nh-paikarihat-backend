@php
    $title = 'Register';
@endphp
@extends('front-end.layouts.app')
@section('page_content')
    <div class="site-wrapper" style="padding-bottom:50px">
        <ul class="breadcrumb">
            <li><a href="{{ route('home_page') }}"><i class="fa fa-home"></i></a></li>
            <li><a href="{{ route('customer_login') }}">Account</a></li>
            <li><a href="javascript:void(0)">Register</a></li>
        </ul>
        <div id="account-register" class="container">
            <div class="row">
            <div id="content" class="col-sm-9 ">
                <div class=" nh__login__redesign__area nh--login--redesign--area">
                    <h1 class="nh__login__title" style=" color:black; font-size:20px;">Registration</h1>

                    @if (Session::has('success'))
                        <div class="alert aler-success bg-success">{{ session()->get('success') }}</div>
                    @endif
                    @if (Session::has('fail'))
                        <div class="alert aler-danger">{{ session()->get('fail') }}</div>
                    @endif
                    <form action="{{ route('customer_registered') }}" method="post" enctype="multipart/form-data"
                        class="register-form form-horizontal">
                        @csrf
                        <div id="account">

                            <div class="register__form__top">
                                <div class="form-group required account-firstname">
                                    <label class="col-sm-2 control-label" for="input-firstname">First Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="firstname" id="input-firstname"
                                            class="form-control col-md-12 {{ $errors->has('firstname') ? 'is-invalid' : '' }}"
                                            placeholder="First Name" value="{{ old('firstname') }}">
                                        @error('firstname')
                                            <div class="alert alert-danger col-md-12" style="margin-top:10px">
                                                {{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group required account-lastname">
                                    <label class="col-sm-2 control-label" for="input-lastname">Last Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="lastname" placeholder="Last Name" id="input-lastname"
                                            class="form-control col-md-12 {{ $errors->has('lastname') ? 'is-invalid' : '' }}"
                                            value="{{ old('lastname') }}">
                                        @error('lastname')
                                            <div class="alert alert-danger col-md-12" style="margin-top:10px">
                                                {{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group account-email">
                                    <label class="col-sm-2 control-label" for="input-email">E-Mail</label>
                                    <div class="col-sm-10">
                                        <input type="email" name="email" placeholder="E-Mail" id="input-email"
                                            class="form-control col-md-12 {{ $errors->has('email') ? 'is-invalid' : '' }} "
                                            value="{{ old('email') }}">
                                        @error('email')
                                            <div class="alert alert-danger col-md-12" style="margin-top:10px">
                                                {{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group required account-email">
                                    <label class="col-sm-2 control-label" for="input-address">Address</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="address" placeholder="Address" id="input-address"
                                            class="form-control col-md-12 {{ $errors->has('address') ? 'is-invalid' : '' }} "
                                            value="{{ old('address') }}">
                                        @error('address')
                                            <div class="alert alert-danger col-md-12" style="margin-top:10px">
                                                {{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group required account-telephone">
                                    <label class="col-sm-2 control-label" for="input-telephone">Phone</label>
                                    <div class="col-sm-10 ">
                                        <input type="tel" name="phone" placeholder="Phone" id="input-telephone"
                                            class="form-control col-md-12 {{ $errors->has('phone') ? 'is-invalid' : '' }} "
                                            value="{{ old('phone') }}">
                                        @error('phone')
                                            <div class="alert alert-danger col-md-12" style="margin-top:10px">
                                                {{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group required">
                                    <label class="col-sm-2 control-label account-pass" for="input-password">Password</label>
                                    <div class="col-sm-10 ">
                                        <input type="password" name="password" placeholder="Password" id="input-password"
                                            class="form-control col-md-12 {{ $errors->has('Password') ? 'is-invalid' : '' }} "
                                            value="{{ old('Password') }}">
                                        @error('password')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group required account-pass2">
                                    <label class="col-sm-2 control-label" for="input-confirm">Password Confirm</label>
                                    <div class="col-sm-10 ">
                                        <input type="password" name="confirm" placeholder="Password Confirm"
                                            id="input-confirm" class="form-control col-md-12">
                                        @error('confirm')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="buttons register__btn__area">
                                    <div class="pull-right register__btn">
                                        <input type="checkbox" name="agree" value="1" required>
                                        I have read and agree to the <a href="javascript:void(0)"
                                            class="agree"><b>Privacy Policy</b></a>
                                        <button type="submit" class="btn btn-primary">Continue</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="nh__existing__user">
                        <p>Existing User ? <a href="{{ route('customer_login') }}"> Login here </a>.
                    </p>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
