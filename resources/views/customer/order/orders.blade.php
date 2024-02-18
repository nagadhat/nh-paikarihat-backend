@php
    $title = 'Orders';
@endphp
@extends('layouts.app')
@section('page_content')
    <div class="col-12">
        <div class="card">
            <div class="card-header py-2">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h3 class="mb-0">{{ $title }}</h3>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="#"></a>
                    </div>
                </div>
            </div>
            <x-alert />
            <div class="card-body">
                <div class="d-flex overflow-auto pb-3" id="akash-btn-mbl-scroll">
                    <button type="button" class="btn btn-sm btn-primary mx-1 btn-toggle-active">
                        <a href="{{ route('orders') }}" class="text-white"> All Order</a>
                    </button>
                    <button type="button" class="btn btn-sm btn-primary mx-1 btn-toggle-active">
                        <a href="{{ route('order_filter', ['status' => '1']) }}"class="text-white"> Pendding</a>
                    </button>
                    <button type="button" class="btn btn-sm btn-primary mx-1 btn-toggle-active">
                        <a href="{{ route('order_filter', ['status' => '2']) }}"class="text-white"> Confirm</a>
                    </button>
                    <button type="button" class="btn btn-sm btn-primary mx-1 btn-toggle-active">
                        <a href="{{ route('order_filter', ['status' => '3']) }}"class="text-white"> Processing</a>
                    </button>
                    <button type="button" class="btn btn-sm btn-primary mx-1 btn-toggle-active">
                        <a href="{{ route('order_filter', ['status' => '4']) }}"class="text-white"> Delivered</a>
                    </button>
                    <button type="button" class="btn btn-sm btn-primary mx-1 btn-toggle-active">
                        <a href="{{ route('order_filter', ['status' => '5']) }}"class="text-white"> Cancelled</a>
                    </button>
                    {{-- <button type="button" class="btn btn-sm btn-primary mx-1 btn-toggle-active" >
                        Order Return
                    </button> --}}
                    {{-- <button type="button" class="btn btn-sm btn-primary mx-1 btn-toggle-active" >
                        Follow Up
                    </button> --}}
                </div>
                <div class="table-responsive mt-4">
                    <table class="table table-bordered" id="table">
                        <thead>
                            <tr>
                                <th>#SL</th>
                                <th>Order Date</th>
                                <th>Order Number </th>
                                <th>Customer Name</th>
                                <th>Customer Phone</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Payment Status</th>
                                <th>Order Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ordersdetails as $order)
                                <tr>
                                    <td> {{ $order->id }} </td>
                                    <td> {{ $order->created_at }} </td>
                                    <td>{{ $order->order_prefix . $order->order_code }}</td>
                                    <td> {{ $order->customer_name }} </td>
                                    <td> {{ $order->customer_phone }} </td>
                                    <td> {{ $order->total_quantity }} </td>
                                    <td> {{ $order->total_amount }} </td>
                                    <td>
                                        @if ($order->payment_status == 1)
                                            <span class="badge bg-primary text-white">Unpaid</span>
                                        @else
                                            <span class="badge bg-success text-white">Paid</span>
                                        @endif
                                    </td>
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
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary dropdown-toggle"
                                                data-toggle="dropdown" data-display="static" aria-expanded="false">
                                                Actions
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
                                                <a href="{{ route('view_order_details', ['id' => $order->id]) }}"
                                                    class="dropdown-item" type="button">inspect</a>
                                                <a href="{{ route('order_status', ['id' => $order->id, 'status' => 1]) }}"
                                                    class="dropdown-item" type="button">Pendding</a>
                                                <a href="{{ route('order_status', ['id' => $order->id, 'status' => 2]) }}"
                                                    class="dropdown-item" type="button">Confirm</a>
                                                <a href="{{ route('order_status', ['id' => $order->id, 'status' => 3]) }}"
                                                    class="dropdown-item" type="button">Processing</a>
                                                <a href="{{ route('order_status', ['id' => $order->id, 'status' => 4]) }}"
                                                    class="dropdown-item" type="button">Delivered</a>
                                                <a href="{{ route('order_status', ['id' => $order->id, 'status' => 5]) }}"
                                                    class="dropdown-item" type="button">Cancelled</a>
                                                <a href="{{ route('order_invoice', $order->id) }}" class="dropdown-item"
                                                    type="button">Invoice</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page_js')
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                "order": [
                    [0, "desc"]
                ]
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Add click event to all buttons
            $('.btn-toggle-active').click(function() {
                // Remove 'active' class from all buttons
                $('.btn-toggle-active').removeClass('active');
                // Add 'active' class to the clicked button
                $(this).addClass('active');
            });
        });
    </script>
@endsection
