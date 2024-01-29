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
        <div class="row">
            <div id="content" class="col-sm-9">
                <h1 class="title page-title">Change Password</h1>

                <form action="#" method="post"
                    enctype="multipart/form-data" class="form-horizontal">
                    <fieldset>
                        <legend>Your Password</legend>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-password">Password</label>
                            <div class="col-sm-10">
                                <input type="password" name="password" value="" placeholder="Password"
                                    id="input-password" class="form-control">
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-confirm">Password Confirm</label>
                            <div class="col-sm-10">
                                <input type="password" name="confirm" value="" placeholder="Password Confirm"
                                    id="input-confirm" class="form-control">
                            </div>
                        </div>
                    </fieldset>
                    <div class="buttons clearfix">
                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary"><span>Continue</span></button>
                        </div>
                        <div class="pull-left">
                            <a href="{{ route('customer_dashboard') }}"
                                class="btn btn-default">Back
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection