@php
    $title = 'Pos Sales';
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
                <div class="table-responsive mt-4">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>SL#</th>
                                <th>Order No</th>
                                <th>Order Date/Time</th>
                                <th>Customer</th>
                                <th>Total Amount</th>
                                <th>Payment Status</th>
                                <th>Order Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sales as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>#POS{{ $item->id . $item->order_code }}</td>
                                    <td>{{ $item->created_at->format('d F, Y | h:i A') }}</td>
                                    <td>
                                        @if ($item->customer_id == 0)
                                            {{ $item->customer_name }}
                                        @else
                                            {{ $item->customer_name }} <br>
                                            Phone: {{ $item->customer_phone }}
                                        @endif
                                    </td>
                                    <td>&#2547; {{ number_format($item->total_amount - $item->discount_amount, 2) }}</td>
                                    <td>
                                        <span class="badge bg-info text-dark">Paid</span>
                                    </td>
                                    <td>...</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary dropdown-toggle"
                                                data-toggle="dropdown" data-display="static" aria-expanded="false">
                                                Actions
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
                                                @php
                                                    $invoice = $item->order_prefix . $item->id . $item->order_code;
                                                @endphp
                                                <a href="{{ route('order_details', $invoice) }}" class="dropdown-item"
                                                    type="button">Inspect</a>
                                                <a href="#" class="dropdown-item" type="button">Print Invoice</a>
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
