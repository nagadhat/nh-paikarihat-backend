@php
    $title = 'login';
@endphp
@extends('front-end.layouts.app')
@section('page_content')
    <div id="account-login" class="container">
        <div class="row">
            <div id="content" class="col-sm-9">
                <h1 class="title page-title">Account Login</h1>

                <div class="row login-box">
                    <div class="col-sm-6">
                        <div class="well">
                            <h2 class="title">New Customer</h2>
                            <p><strong>Register Account</strong></p>
                            <p>By creating an account you will be able to shop faster, be up to date on an order's status,
                                and keep track of the orders you have previously made.</p>
                            <div class="buttons">
                                <div class="pull-right">
                                    <a href="https://careforbd.com/index.php?route=account/register"
                                        class="btn btn-primary">Continue</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="well">
                            <h2 class="title">Returning Customer</h2>
                            <p><strong>I am a returning customer</strong></p>
                            <form action="https://careforbd.com/index.php?route=account/login" method="post"
                                enctype="multipart/form-data" class="form-horizontal login-form">
                                <div class="form-group">
                                    <label class="control-label" for="input-email">E-Mail Address</label>
                                    <input type="text" name="email" value="" placeholder="E-Mail Address"
                                        id="input-email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="input-password">Password</label>
                                    <input type="password" name="password" value="" placeholder="Password"
                                        id="input-password" class="form-control">
                                    <div><a href="https://careforbd.com/index.php?route=account/forgotten"
                                            target="_top">Forgotten Password</a></div>
                                </div>
                                <div class="buttons">
                                    <div class="pull-right">
                                        <button type="submit" class="btn btn-primary"
                                            data-loading-text="<span>Login</span>"><span>Login</span></button>
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
