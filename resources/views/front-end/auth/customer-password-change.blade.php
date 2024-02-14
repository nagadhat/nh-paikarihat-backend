@php
    $title = 'passwordupdate';
@endphp
@extends('front-end.layouts.app')
@section('page_content')
    <ul class="breadcrumb">
        <li><a href="{{ route('home_page') }}"><i class="fa fa-home"></i></a></li>
        <li><a href="{{ route('customer_dashboard') }}">Account</a></li>
        <li><a href="javascript:void(0)">Change Password</a></li>
    </ul>
    <div id="account-password" class="container">
        {{-- <div class="row">
            <div id="content" class="col-sm-9">
                <h1 class="title page-title" style="color: #000;margin:30px 0 15px 0;">Change Password</h1>

                <form action="{{ route('customer_password_update') }}" method="post" enctype="multipart/form-data"
                    class="form-horizontal">
                    @csrf
                    <fieldset>
                        <legend>Your Password</legend>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-password">Current Password</label>
                            <div class="col-sm-10">
                                <input type="password" name="current_password" value="" placeholder="Password"
                                    id="input-password" class="form-control">
                            </div>
                            <div style="margin-top:10px;width:100%">
                                @error('current_password')
                                    <div class="alert alert-danger" style="width:60%">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-password">New Password</label>
                            <div class="col-sm-10">
                                <input type="password" name="new_password" value="" placeholder="Password"
                                    id="input-password" class="form-control">
                            </div>
                            <div style="margin-top:10px;width:100%">
                                @error('new_password')
                                    <div class="alert alert-danger" style="width:60%">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-confirm">Confirm Password </label>
                            <div class="col-sm-10">
                                <input type="password" name="new_password_confirmation" value=""
                                    placeholder="Password Confirm" id="input-confirm" class="form-control">
                            </div>
                            <div style="margin-top:10px;width:100%">
                                @error('new_password_confirmation')
                                    <div class="alert alert-danger" style="width:60%">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </fieldset>
                    <div class="buttons clearfix">
                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary"><span>Continue</span></button>
                        </div>
                        <div class="pull-left">
                            <a href="{{ route('customer_dashboard') }}" class="btn btn-default">Back
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div> --}}

        <div class="user__dasboard__section__wrapp account__information__area customer__password__change__area">
            <div class="user__dasboard__section row">
                <div class="user__dasboard__section__left col-xs-12 col-sm-3 ">
                    <div class="user__dasboard__sidebar">
                        <div class="user__dasboard__profile">
                            <div class="user__dasboard__photo">
                                <img src="{{ asset('front-end/assets/image/user-photo/user1.jpg') }}" alt="">
                            </div>
                            <div class="user__dasboard__profile__info">
                                <div class="name">Anjam Akash</div>
                                <div class="phone">01258758574</div>
                            </div>
                        </div>
                        <div class="user__dasboard__menu">
                            <a href="#" class="active"><i class="fa fa-server" aria-hidden="true"></i> Dashboard</a>
                            <a href="#"><i class="fa fa-history" aria-hidden="true"></i> order history </a>
                            <a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Account </a>
                            <a href="#"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Change Password</a>
                            <a href="#"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
                        </div>
                    </div>
                </div>
                <div class="user__dasboard__section__right customer__password__change col-xs-12 col-sm-9 ">
                    <div class="user__dasboard__content">
                        <div class="account__information__form">
                            <h1 class="title page-title" style="color: #000;"> Change Password
                            </h1>
                            <form action="{{ route('customer_password_update') }}" method="post" enctype="multipart/form-data"
                    class="form-horizontal">
                    @csrf
                    <fieldset>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-password">Current Password</label>
                            <div class="col-sm-10">
                                <input type="password" name="current_password" value="" placeholder="Password"
                                    id="input-password" class="form-control">
                            </div>
                            <div style="margin-top:10px;width:100%">
                                @error('current_password')
                                    <div class="alert alert-danger" style="width:60%">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-password">New Password</label>
                            <div class="col-sm-10">
                                <input type="password" name="new_password" value="" placeholder="Password"
                                    id="input-password" class="form-control">
                            </div>
                            <div style="margin-top:10px;width:100%">
                                @error('new_password')
                                    <div class="alert alert-danger" style="width:60%">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-confirm">Confirm Password </label>
                            <div class="col-sm-10">
                                <input type="password" name="new_password_confirmation" value=""
                                    placeholder="Password Confirm" id="input-confirm" class="form-control">
                            </div>
                            <div style="margin-top:10px;width:100%">
                                @error('new_password_confirmation')
                                    <div class="alert alert-danger" style="width:60%">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </fieldset>
                    <div class="account__information__button">
                        <div class="back__button">
                            <a href="{{ route('customer_dashboard') }}" class=" ">Back </a>
                        </div>
                        <div class="continue__button">
                            <button type="submit"><span>Continue</span></button>
                        </div>
                    </div>
                </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>


    </div>
@endsection
