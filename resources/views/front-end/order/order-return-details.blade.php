@php
    $title = 'Return Details';
@endphp
@extends('front-end.layouts.app')
@section('page_content')
    <div id="account-edit" class="container">
        <ul class="breadcrumb">
            <li><a href="{{ route('customer_dashboard') }}">Account</a></li>
            <li><a href="javascript:void(0)">Return Details</a></li>
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
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Product Name</th>
                                            <th>Order Code</th>
                                            <th>Amount</th>
                                            <th>Quantity</th>
                                            <th>Order Date</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orderReturn as $return)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $return->customer_name }}</td>
                                                <td>{{ $return->customer_phone }}</td>
                                                <td>{{ $return->product_name }}</td>
                                                <td>{{ $return->order_code }}</td>
                                                <td>{{ $return->total_amount }}</td>
                                                <td>{{ $return->total_quantity }}</td>
                                                <td>{{ $return->order_date }}</td>
                                                <td> 
                                                    @if ($return->status == 1)
                                                        <span class="badge bg-primary text-white">Pendding</span>
                                                    @elseif($return->status == 2)
                                                        <span class="badge bg-success text-black">Approved</span>
                                                    @else
                                                        <span class="badge bg-warning text-black">Inactive</span>
                                                    @endif
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
                    {{ $orderReturn->links() }}
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
