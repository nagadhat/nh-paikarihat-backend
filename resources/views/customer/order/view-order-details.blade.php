@php
    $title = 'Order Summires';
@endphp
@extends('layouts.app')

@section('page_content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <div class="card">
                        <div class="card-header py-2">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <h4 class="mb-0">{{ $title }}</h4>
                                </div>
                                <div class="col-md-6 text-right">
                                    <a href="{{ route('orders') }}" class="btn btn-danger">Go Back</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
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
                                            {{-- <tr>
                                                <td>
                                                    Email:
                                                </td>
                                                <td>{{ $order->customer_email }}</td>
                                            </tr> --}}
                                            <tr>
                                                <td>
                                                    Delivery Address:
                                                </td>
                                                <td>{{ $order->customer_address }}</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    {{-- print invoice button --}}
                                    {{-- <a href="#" class="btn btn-success rounded" target="_blank"><i
                                            class="fas fa-print"></i>
                                    </a> --}}

                                </div>
                                <div class="col-md-6">
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
                                                    Update Payment Status:
                                                </td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-primary dropdown-toggle"
                                                            data-toggle="dropdown" data-display="static"
                                                            aria-expanded="false">
                                                            Payment Status
                                                        </button>
                                                        <div
                                                            class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
                                                            <a href="{{ route('payment_status_update', ['id' => $order->id, 'paystatus' => 1]) }}"
                                                                class="dropdown-item" type="button">Unpaid </a>
                                                            <a href="{{ route('payment_status_update', ['id' => $order->id, 'paystatus' => 2]) }}"
                                                                class="dropdown-item" type="button">Paid</a>
                                                        </div>
                                                    </div>
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
        <div class="row">
            <div class="col-lg-9">
                <div class="card mt-4">
                    <div class="card-header py-2">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h4 class="mb-0">Order Details</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="#"></a>
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
                                @foreach ($orderProductList as $item)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td style="min-width: 300px">
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
                                            &#2547;
                                                {{ $item->unit_price }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- payment History start --}}
                {{-- <div class="card mt-4">
                    <div class="card-header py-2">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h3 class="mb-0">Payment History</h3>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="#"></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pb-0">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Paid On</th>
                                        <th>Payer Name</th>
                                        <th>Phone Number</th>
                                        <th>Payment Gateway</th>
                                        <th>Payment Method</th>
                                        <th>Bank Name</th>
                                        <th>TxId/DC</th>
                                        <th>Amount</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>...</td>
                                        <td>...</td>
                                        <td>...</td>
                                        <td>...</td>
                                        <td>...</td>
                                        <td>...</td>
                                        <td>...</td>
                                        <td>...</td>
                                        <td>...</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> --}}
            </div>
            <div class="col-lg-3">
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
    </div>
@endsection
