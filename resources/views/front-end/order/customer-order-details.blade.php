@php
    $title = 'Order Details';
@endphp
@extends('front-end.layouts.app')
@section('page_content')
    <div id="account-edit" class="container">
        <ul class="breadcrumb">
            <li><a href="{{ route('home_page') }}"><i class="fa fa-home"></i></a></li>
            <li><a href="{{ route('customer_dashboard') }}">Account</a></li>
            <li><a href="javascript:void(0)">Order Details</a></li>
        </ul>
        <div class="row">
            <div id="content" class="col-sm-9 customer__new__order_info">
                <div class="row customer__new__order_row">
                    <div class="col-md-12" style="margin-top: 30px">
                        <div>
                            <div class="card">
                                <div class="card-header py-2">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            <h4 class="mb-0">{{ $title }}</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="customer__orders">
                                        <div class="customer__orderitem">
                                            <table class="table table-borderless">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <span>
                                                                Invoice:
                                                            </span>
                                                        </td>
                                                        <td>{{ $order->order_prefix . $order->order_code }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Customer Name:
                                                        </td>
                                                        <td>{{ $order->customer_name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Phone:
                                                        </td>
                                                        <td>{{ $order->customer_phone }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Email:
                                                        </td>
                                                        <td>{{ $order->customer_email }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Delivery Address:
                                                        </td>
                                                        <td>{{ $order->customer_address }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="customer__orderitem">
                                            <table class="table table-borderless">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            Order Date:
                                                        </td>
                                                        <td>{{ $order->created_at->format('d F, Y | h:i A') }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Order Status:
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
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Payment Status:
                                                        </td>
                                                        <td>
                                                            @if ($order->payment_status == 1)
                                                                <span style="font-size:12px" class="badge bg-info text-dark px-3 py-2 text-md font-weight-bold">Unpaid</span>
                                                            @elseif ($order->payment_status == 2)
                                                                <span style="font-size:12px" class="badge bg-success text-dark px-3 py-2 text-md font-weight-bold">Paid</span>
                                                                @else
                                                                <span style="font-size:12px" class="badge bg-success text-dark px-3 py-2 text-md font-weight-bold">Not Approve</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="customer__orders customer--orders--box" >
                    <div class="customer__orderitem customer--orderitem">
                        <div class="card mt-4">
                            <div class="card-header py-2">
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <h4 class="mb-0">Product Details</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pb-0 table-responsive">
                                <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th width="30%">Image</th>
                                            <th width="30%">Product Name</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($customerOrderProduct as $item)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>
                                                    @php
                                                        $photo = empty($item->photo) ? asset('assets/images/others/error.png') : asset('storage/products/' . $item->photo);
                                                    @endphp
                                                    <div class="row align-items-center">
                                                        <img class="img-fluid rounded" src="{{ $photo }}"
                                                            style="max-width: 60px" alt="">
                                                    </div>
                                                </td>
                                                <td> {{ $item->product_name }}</td>
                                                <td>{{ $item->quantity }}</td>
                                                <td>
                                                    &#2547; {{ $item->unit_price }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="customer__orderitem customer--orderitem">
                        <div class="card mt-4">
                            <div class="card-header py-2">
                                <h4 class="mb-0">Order Amount</h4>
                            </div>
                            <div class="card-body pb-0">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <td class="w-50 fw-600">Subtotal</td>
                                            <td class="text-right">
                                                <span class="strong-600">
                                                    &#2547;
                                                    {{ $order->total_amount  }}
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-50 fw-600">Shipping</td>
                                            <td class="text-right">
                                                <span class="text-italic">&#2547;
                                                    {{ isset($order->delivery_area) ? $order->delivery_area : '' }}
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-50 fw-600">Discount</td>
                                            <td class="text-right">
                                                <span class="text-italic">&#2547;
                                                    {{ isset($order->discount_amount) ? $order->discount_amount : '' }}
                                                </span>
                                            </td>
                                        </tr>
                                        <tr class="border-top">
                                            <td class="w-50 fw-600">TOTAL</td>
                                            <td class="text-right">
                                                <strong>
                                                    <span>&#2547;
                                                         {{ isset($order->total_amount ) ?  ($order->total_amount - $order->discount_amount) + $order->delivery_area : '--' }}
                                                    </span>
                                                </strong>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                    <div class="order__detsils__customer__btn">
                        <a href="{{ route('customer_dashboard') }}" class="btn btn-default">Back</a>
                    </div>

            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script></script>
@endsection
