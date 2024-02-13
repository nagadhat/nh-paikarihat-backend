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
                    <h1 class="nh__login__title" style=" color:black; font-size:20px;">Forgot Password ?</h1>
                    @if (Session::has('success'))
                        <div class="alert aler-success bg-success">{{ session()->get('success') }}</div>
                    @endif
                    @if (Session::has('fail'))
                        <div class="alert aler-danger">{{ session()->get('fail') }}</div>
                    @endif
                    <form action="{{ route('forgot_password_update') }}" method="post" enctype="multipart/form-data"
                        class="register-form form-horizontal">
                        @csrf
                        <div id="account">
                            <div class="register__form__top">
                                <div class="form-group required account-firstname">
                                    <label class="col-sm-2 control-label" for="input-firstname">Phone</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="phone" id="input-phone"
                                            class="form-control col-md-12 {{ $errors->has('phone') ? 'is-invalid' : '' }}"
                                            placeholder="Phone" value="{{ old('phone') }}" required>
                                        @error('phone')
                                            <div class="alert alert-danger col-md-12" style="margin-top:10px">
                                                {{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group required account-pass2">
                                    <label class="col-sm-2 control-label" for="input-confirm">New Password</label>
                                    <div class="col-sm-10 ">
                                        <input type="password" name="new_password" value="" placeholder="Password"
                                              id="input-password" class="form-control col-md-12" required>
                                        @error('confirm')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group required account-pass2">
                                    <label class="col-sm-2 control-label" for="input-confirm">Confirm Password</label>
                                    <div class="col-sm-10 ">
                                        <input type="password" name="new_password_confirmation" value=""
                                            placeholder="Password Confirm" id="input-confirm" class="form-control col-md-12" required>
                                        
                                        @error('confirm')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="buttons register__btn__area">
                                    <div class="pull-right register__btn">
                                        <button type="submit" class="btn btn-primary">Continue</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
