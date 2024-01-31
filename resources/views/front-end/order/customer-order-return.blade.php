@php
    $title = 'Order History';
@endphp
@extends('front-end.layouts.app')
@section('page_content')
    <div id="account-return" class="container">
        <ul class="breadcrumb">
            <li><a href="{{ route('home_page') }}"><i class="fa fa-home"></i></a></li>
            <li><a href="{{ route('customer_dashboard') }}">Account</a></li>
            <li><a href="javascript:void(0)">Product Returs</a></li>
        </ul>
        <div class="row" style="margin-top: 30px">
            <div id="content" class="col-sm-9">
                <p>Please complete the form below to request an RMA number.</p>
                <form action="{{ route('order_return_request') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                    @csrf
                    <fieldset>
                        <legend>Order Return Request</legend>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-firstname">Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="customer_name" value="" placeholder="First Name"
                                 class="form-control" required>
                                @error('customer_name')
                                 <div class="alert alert-danger" style="width:60%">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="input-email">E-Mail</label>
                            <div class="col-sm-10">
                                <input type="text" name="customer_email" value="" placeholder="E-Mail"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-telephone">Phone</label>
                            <div class="col-sm-10">
                                <input type="text" name="customer_phone" value="" placeholder="Telephone"
                                class="form-control" required>
                            </div>
                            @error('customer_phone')
                              <div class="alert alert-danger" style="width:60%">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-product">Product Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="product_name" value="" placeholder="Product Name"
                                 class="form-control" required>
                            </div>
                            @error('product_name')
                                <div class="alert alert-danger" style="width:60%">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-quantity">Total Amount</label>
                            <div class="col-sm-10">
                                <input type="text" name="total_amount"  placeholder="Quantity"
                                 class="form-control" required>
                            </div>
                            @error('total_amount')
                                <div class="alert alert-danger" style="width:60%">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-quantity">Quantity</label>
                            <div class="col-sm-10">
                                <input type="text" name="total_quantity" value="1" placeholder="Quantity"
                                 class="form-control" required>
                            </div>
                            @error('total_quantity')
                                <div class="alert alert-danger" style="width:60%">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-order-id">Order Code</label>
                            <div class="col-sm-10">
                                <input type="text" name="order_code" value="" placeholder="Order ID"
                                 class="form-control" required>
                            </div>
                            @error('order_code')
                                <div class="alert alert-danger" style="width:60%">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group required">
                            <label class="col-sm-2 control-label" for="input-order-id">Order Date</label>
                            <div class="col-sm-10">
                                <input type="datetime-local" name="order_date" value="" placeholder="Order ID"
                                 class="form-control" required>
                            </div>
                            @error('order_date')
                                <div class="alert alert-danger" style="width:60%">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Reason for Return</label>
                            <div class="col-sm-10">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="return_reason" value="1">
                                        Dead On Arrival</label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="return_reason" value="2">
                                        Faulty, please supply details</label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="return_reason" value="3">
                                        Order Error</label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="return_reason" value="4">
                                        Other, please supply details</label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="return_reason" value="5">
                                        Received Wrong Item</label>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="buttons clearfix" style="padding-bottom: 30px">
                        <div class="pull-left">
                            <a href="{{ route('customer_dashboard') }}" class="btn btn-default">Back</a>
                        </div>
                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary"><span>Continue</span></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
