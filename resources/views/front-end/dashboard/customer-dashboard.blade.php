@php
    $title = 'customerdashboard';
@endphp
@extends('front-end.layouts.app')
@section('page_content')
    <div id="account-account" class="container">
        <ul class="breadcrumb">
            <li><a href="{{ route('home_page') }}"><i class="fa fa-home"></i></a></li>
            <li><a href="javascript:void(0)">Account</a></li>
        </ul>
        {{-- <div class="row">
            <div id="content" class="account-page col-sm-9">
                <h1 class="title page-title" style="margin:30px 0 15px 0">My Account</h1>
                <div class="my-account">
                    <ul class="list-unstyled account-list" style="padding-bottom: 30px;">
                        <li class="edit-info">
                            <a href="{{ route('customer_profile_update') }}">Edit your account information</a>
                        </li>
                        <li class="edit-pass">
                            <a href="{{ route('customer_password') }}">Change your password</a>
                        </li>
                        <li class="edit-address">
                            <a href="javascript:void(0)">Modify your
                                address book entries</a></li>
                        <li class="edit-wishlist">
                            <a href="javascript:void(0)">Modify your wish list</a>
                        </li>
                        <li class="logout-icon">
                            <a href="{{ route('customer_logout') }}">Logout</a>
                        </li>
                    </ul>
                </div>
                <div class="my-orders">
                    <h2 class="title" style="line-height: 1.5">My Orders</h2>
                    <ul class="list-unstyled account-list">
                        <li class="edit-order">
                            <a href="{{ route('customer_order_history') }}">View your order history</a>
                        </li>
                        <li class="edit-downloads">
                            <a href="javascript:void(0)">Downloads</a>
                        </li>
                        <li class="edit-returns">
                            <a href="javascript:void(0)">View your return requests</a>
                        </li>
                        <li class="edit-transactions">
                            <a href="javascript:void(0)">Your Transactions</a>
                        </li>
                        <li class="edit-recurring">
                            <a href="javascript:void(0)">Recurring payments</a>
                        </li>
                    </ul>
                </div>

            </div>
        </div> --}}


        <div class="user__dasboard__section__wrapp">
            <div class="user__dashboard__mobile__icon">

            </div>
            <div class="user__dasboard__section row">
                <x-left-sidebar/>
                <div class="user__dasboard__section__right col-xs-12 col-sm-9 ">
                    <div class="user__dasboard__content">
                        <div class="user__dasboard__content__title">
                            <p>dashboard</p>
                        </div>
                        <div class="user__dasboard__box__holder__wrapp">
                        <div class="user__dasboard__box__holder row">
                            <div class="user__dasboard__box__item col-xs-6 col-sm-6 col-md-3">
                                <div class="user__dasboard__box__bg">
                                    <h3>Order</h3>
                                    <span>10</span>
                                </div>
                            </div>
                            <div class="user__dasboard__box__item col-xs-6 col-sm-6 col-md-3">
                                <div class="user__dasboard__box__bg">
                                    <h3>processing</h3>
                                    <span>20</span>
                                </div>
                            </div>
                            <div class="user__dasboard__box__item col-xs-6 col-sm-6 col-md-3">
                                <div class="user__dasboard__box__bg">
                                    <h3>receive order </h3>
                                    <span>10</span>
                                </div>
                            </div>
                            <div class="user__dasboard__box__item col-xs-6 col-sm-6 col-md-3">
                                <div class="user__dasboard__box__bg">
                                    <h3>in Cart</h3>
                                    <span>02</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
