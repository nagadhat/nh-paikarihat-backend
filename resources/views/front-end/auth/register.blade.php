@php
    $title = 'Register';
@endphp
@extends('front-end.layouts.app')
@section('page_content')
    <div class="site-wrapper">
        <ul class="breadcrumb">
            <li><a href="{{ route('home_page') }}"><i class="fa fa-home"></i></a></li>
            <li><a href="{{ route('customer_login') }}">Account</a></li>
            <li><a href="javascript:void(0)">Register</a></li>
        </ul>
        <div id="account-register" class="container">
            <div class="row">
                <div id="content" class="col-sm-9 register-page">
                    <h1 class="title page-title" style="margin: 30px 0 15px 0; color:black; font-size:20px;">Register Account</h1>

                    <p>If you already have an account with us, please login at the <a
                            href="{{ route('customer_login') }}"><strong>login page</strong> </a>.</p>
                    <form action="javascript:void(0)" method="post"
                        enctype="multipart/form-data" class="register-form form-horizontal">
                        <div id="account">
                            <legend>Your Personal Details</legend>
                            <div class="form-group required account-customer-group" style="display:  none ;">
                                <label class="col-sm-2 control-label">Customer Group</label>
                                <div class="col-sm-10">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="customer_group_id" value="1" checked="checked">
                                            Default</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group required account-firstname">
                                <label class="col-sm-2 control-label" for="input-firstname">First Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="firstname" value="" placeholder="First Name"
                                        id="input-firstname" class="form-control">
                                </div>
                            </div>
                            <div class="form-group required account-lastname">
                                <label class="col-sm-2 control-label" for="input-lastname">Last Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="lastname" value="" placeholder="Last Name"
                                        id="input-lastname" class="form-control">
                                </div>
                            </div>
                            <div class="form-group required account-email">
                                <label class="col-sm-2 control-label" for="input-email">E-Mail</label>
                                <div class="col-sm-10">
                                    <input type="email" name="email" value="" placeholder="E-Mail"
                                        id="input-email" class="form-control">
                                </div>
                            </div>
                            <div class="form-group required account-telephone">
                                <label class="col-sm-2 control-label" for="input-telephone">Telephone</label>
                                <div class="col-sm-10">
                                    <input type="tel" name="telephone" value="" placeholder="Telephone"
                                        id="input-telephone" class="form-control">
                                </div>
                            </div>
                        </div>
                        <fieldset>
                            <legend>Your Password</legend>
                            <div class="form-group required">
                                <label class="col-sm-2 control-label account-pass" for="input-password">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" name="password" value="" placeholder="Password"
                                        id="input-password" class="form-control">
                                </div>
                            </div>
                            <div class="form-group required account-pass2">
                                <label class="col-sm-2 control-label" for="input-confirm">Password Confirm</label>
                                <div class="col-sm-10">
                                    <input type="password" name="confirm" value="" placeholder="Password Confirm"
                                        id="input-confirm" class="form-control">
                                </div>
                            </div>
                        </fieldset>


                        <div class="buttons">
                            <div class="pull-right">I have read and agree to the <a
                                    href="javascript:void(0)"
                                    class="agree"><b>Privacy Policy</b></a>
                                <input type="checkbox" name="agree" value="1" required>
                                <button type="submit" class="btn btn-primary"
                                    data-loading-text="<span>Continue</span>"><span>Continue</span></button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
