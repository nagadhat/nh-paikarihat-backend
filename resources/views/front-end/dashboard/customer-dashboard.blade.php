@php
    $title = 'customerdashboard';
@endphp
@extends('front-end.layouts.app')
@section('page_content')
    <div id="account-account" class="container">
        <div class="mobile__toggle__menu__icon">
            <ul class="breadcrumb">
                <li><a href="{{ route('home_page') }}"><i class="fa fa-home"></i></a></li>
                <li><a href="javascript:void(0)">Account</a></li>
            </ul>
            <div class="user__dashboard__mobile__icon" onclick="userLeftSidebar()">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </div>
        </div>
        <x-mobile-left-sidebar/>
        <div class="user__dasboard__section__wrapp">
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
                                    <span>{{ isset($CustomerProductCount) ? $CustomerProductCount :'0' }}</span>
                                </div>
                            </div>
                            <div class="user__dasboard__box__item col-xs-6 col-sm-6 col-md-3">
                                <div class="user__dasboard__box__bg">
                                    <h3>processing</h3>
                                    <span>{{ isset($ProcessingProductCount) ? $ProcessingProductCount : '0'}}</span>
                                </div>
                            </div>
                            <div class="user__dasboard__box__item col-xs-6 col-sm-6 col-md-3">
                                <div class="user__dasboard__box__bg">
                                    <h3>receive order </h3>
                                    <span>{{ isset($DeliveredProductCount) ?  $DeliveredProductCount : '0'}}</span>
                                </div>
                            </div>
                            <div class="user__dasboard__box__item col-xs-6 col-sm-6 col-md-3">
                                <div class="user__dasboard__box__bg">
                                    <h3>in Cart</h3>
                                    <span>{{ isset($CustomerCartCount) ? $CustomerCartCount : '0'}}</span>
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

