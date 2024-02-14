@php
    $title = 'Order History';
@endphp
@extends('front-end.layouts.app')
@section('page_content')
    <div id="account-edit" class="container">
        <div class="mobile__toggle__menu__icon">
            <ul class="breadcrumb">
                <li><a href="{{ route('home_page') }}"><i class="fa fa-home"></i></a></li>
                <li><a href="{{ route('customer_dashboard') }}">Account</a></li>
                <li><a href="javascript:void(0)">Order History</a></li>
            </ul>

        </div>
        <x-mobile-left-sidebar/>

        <div class="user__dasboard__section__wrapp account__information__area">
            <div class="user__dasboard__section row">
                <x-left-sidebar />
                <div class="user__dasboard__section__right col-xs-12 col-sm-9 ">
                    <div class="user__dasboard__content">
                        <div class="account__information__form__table">
                            <h1 class="title page-title" style="color: #000;"> Order History</h1>
                            <div class="table-responsive ">
                                <table class="table table-bordered" id="table">
                                    <thead>
                                        <tr>
                                            <th>#SL</th>
                                            <th>Invoice ID</th>
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
                                                <td class="order__history__option">
                                                    <a href="{{ route('customer_order_details', $order->id) }}"
                                                        class="order__details__customer" title="Order Details">
                                                        <i class="fa fa-eye" aria-hidden="true" style="font-size:20px"></i>
                                                    </a>

                                                    <a href="{{ route('invoice_order', $order->id) }}"
                                                        class="order__invoice__customer" style="margin-left: 20px;"
                                                        title="Order Invoice">
                                                        <i class="fa fa-print" aria-hidden="true"
                                                            style="font-size: 20px"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="bg__product__pagination" style="padding-top: 15px">
                                {{ $orderdetails->links() }}
                            </div>
                            {{-- <div class="order__detsils__customer__btn">
                                <a href="{{ route('customer_dashboard') }}" class="btn btn-default">Back</a>
                            </div> --}}
                        </div>
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
