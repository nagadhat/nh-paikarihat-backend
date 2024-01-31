@php
    $title = 'Return Orders';
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
            <div class="card-body">
                <div class="d-flex overflow-auto pb-3" id="akash-btn-mbl-scroll">
                    <button type="button" class="btn btn-sm btn-primary mx-1 btn-toggle-active">
                        <a href="{{ route('return_orders') }}" class="text-white"> All Request</a>
                    </button>
                    <button type="button" class="btn btn-sm btn-primary mx-1 btn-toggle-active">
                        <a href="{{ route('return_order_filter', ['status' => '1']) }}"class="text-white"> Pendding</a>
                    </button>
                    <button type="button" class="btn btn-sm btn-primary mx-1 btn-toggle-active">
                        <a href="{{ route('return_order_filter', ['status' => '2']) }}"class="text-white">Approved</a>
                    </button>
                </div>
                <div class="table-responsive mt-4">
                    <table class="table table-bordered" id="table">
                        <thead>
                            <tr>
                                <th>SL#</th>
                                <th>Order Code</th>
                                <th>Order Date</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Quantity</th>
                                <th>Total Amount</th>
                                <th>Order Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orderReturn as $order)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $order->order_code }}</td>
                                    <td>{{ $order->order_date }}</td>
                                    <td>{{ $order->customer_name }}</td>
                                    <td>{{ $order->customer_phone }}</td>
                                    <td>{{ $order->total_quantity }}</td>
                                    <td>{{ $order->total_amount }}</td>
                                    <td>
                                        @if ($order->status == 1)
                                            <span class="badge bg-primary text-white">Pendding</span>
                                        @elseif($order->status == 2)
                                            <span class="badge bg-success text-black">Approved</span>
                                        @else
                                            <span class="badge bg-warning text-black">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary dropdown-toggle"
                                                data-toggle="dropdown" data-display="static" aria-expanded="false">
                                                Actions
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
                                                <a href="{{ route('return_order_status', ['id' => $order->id, 'status' => 1]) }}" class="dropdown-item" type="button">Pendding</a>
                                                <a href="{{ route('return_order_status', ['id' => $order->id, 'status' => 2]) }}" class="dropdown-item" type="button">Approved</a>
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
            // init data table
            $('#table').DataTable();
        });
    </script>
@endsection
