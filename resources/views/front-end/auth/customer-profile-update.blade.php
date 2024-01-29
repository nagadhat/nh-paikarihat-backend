@php
    $title = 'PasswordUpdate';
@endphp
@extends('front-end.layouts.app')
@section('page_content')
    <div id="account-edit" class="container">
        <ul class="breadcrumb">
            <li><a href="{{ route('home_page') }}"><i class="fa fa-home"></i></a></li>
            <li><a href="{{ route('customer_dashboard') }}">Account</a></li>
            <li><a href="javascript:void(0)">Edit Information</a></li>
        </ul>
        <div class="row">
            <div id="content" class="col-sm-9">
                <h1 class="title page-title">My Account Information</h1>
                <form action="{{ route('customer_profile_update_save') }}" method="post" enctype="multipart/form-data"
                    class="form-horizontal">
                    @csrf
                    <div id="account">
                        <legend>Your Personal Details</legend>
                        <div class="form-group required account-firstname">
                            <label class="col-sm-2 control-label" for="input-firstname">Name </label>
                            <div class="col-sm-10">
                                <input type="text" name="name" value="{{ $user->name }}" placeholder="First Name"
                                    id="input-firstname" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group required account-lastname">
                            <label class="col-sm-2 control-label" for="input-lastname">Address</label>
                            <div class="col-sm-10">
                                <input type="text" name="address" value="{{ $user->address }}" placeholder="Last Name"
                                    id="input-lastname" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group required account-email">
                            <label class="col-sm-2 control-label" for="input-email">E-Mail</label>
                            <div class="col-sm-10">
                                <input type="email" name="email" value="{{ $user->email }}" placeholder="E-Mail"
                                    id="input-email" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group required account-telephone">
                            <label class="col-sm-2 control-label" for="input-telephone">Telephone</label>
                            <div class="col-sm-10">
                                <input type="tel" name="telephone" value="{{ $user->phone }}" placeholder="Telephone"
                                    id="input-telephone" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="buttons clearfix">
                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary"><span>Continue</span></button>
                        </div>
                        <div class="pull-left">
                            <a href="{{ route('customer_dashboard') }}" class="btn btn-default">Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
