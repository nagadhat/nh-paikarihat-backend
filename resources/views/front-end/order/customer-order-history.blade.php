@php
    $title = 'Order History';
@endphp
@extends('front-end.layouts.app')
@section('page_content')
    <div id="account-edit" class="container">
        <ul class="breadcrumb">
            <li><a href="{{ route('home_page') }}"><i class="fa fa-home"></i></a></li>
            <li><a href="{{ route('customer_dashboard') }}">Account</a></li>
            <li><a href="javascript:void(0)">Order History</a></li>
        </ul>
        <div class="row">
            <div id="content" class="col-sm-9">
                <div class="col-12" style="margin-top: 30px;">
                    <div class="card">
                        <div class="card-header py-2">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <h3 class="mb-0">{{ $title }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive mt-4">
                                <table class="table table-bordered" id="table">
                                    <thead>
                                        <tr>
                                            <th>#SL</th>
                                            <th>Order Id</th>
                                            <th>Date</th>
                                            <th>Order Status</th>
                                            <th>Payment Status</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orderdetails as $order)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $order->order_prefix . $order->order_code }}</td>
                                                <td>{{ $order->created_at }}</td>
                                                <td>
                                                    @if ($order->status == 1)
                                                        <span class="badge bg-primary text-white">Pendding</span>
                                                    @elseif($order->status == 2)
                                                        <span class="badge bg-success text-black">Confirm</span>
                                                    @elseif($order->status == 3)
                                                        <span class="badge bg-success text-black">Processing</span>
                                                    @elseif($order->status == 4)
                                                        <span class="badge bg-success text-black">Delivered</span>
                                                    @elseif($order->status == 5)
                                                        <span class="badge bg-danger text-white">Cancelled</span>
                                                    @else
                                                        <span class="badge bg-warning text-black">Inactive</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($order->payment_status == 1)
                                                        <span class="badge bg-primary text-white">Unpaid</span>
                                                    @else
                                                        <span class="badge bg-success text-white">Paid</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('customer_order_details', $order->id) }}" class="" title="Order Details">
                                                        <i class="fa fa-share-square-o" aria-hidden="true" style="font-size: 23px"></i>
                                                    </a>

                                                    <a href="{{ route('invoice_order', $order->id) }}" style="margin-left: 20px;" title="Order Invoice">
                                                        <i class="fa fa-print" aria-hidden="true" style="font-size: 23px"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg__product__pagination" style="padding-top: 15px">
                    {{ $orderdetails->links() }}
                </div>
                <div class="buttons clearfix">
                    <div class="pull-left">
                        <a href="{{ route('customer_dashboard') }}" class="btn btn-default">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            // init data table
            $('#table').DataTable();
        });
    </script>
@endsection
