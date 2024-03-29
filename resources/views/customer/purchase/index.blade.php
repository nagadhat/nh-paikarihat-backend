@php
    $title = 'Purchase List';
@endphp
@extends('layouts.app')

@section('page_content')
    <div class="col-12">
        <div class="card">
            <div class="card-header py-2">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h3 class="mb-0">Purchase List</h3>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="{{ route('create_purchase') }}" class="btn btn-primary">
                            Create Purchase
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">

                {{-- alert --}}
                <x-alert />

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>SL#</th>
                                <th>Purchase Number</th>
                                <th>Supplier</th>
                                <th>Date</th>
                                <th>Shipping Charge</th>
                                <th>Total Amount</th>
                                <th>Paid Amount</th>
                                <th>Due Amount</th>
                                <th>Payment Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($purchases as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>#PO{{ $item->id }}</td>
                                    <td>({{ $item->supplier_details->company }}) - {{ $item->supplier_details->name }}, {{ $item->supplier_details->phone }}</td>
                                    <td>{{ date('dS F, Y', strtotime($item->date)) }}</td>
                                    <td>&#2547; {{ number_format($item->shipping_charge, 2) }}</td>
                                    <td>&#2547; {{ number_format($item->total_amount, 2) }}</td>
                                    <td>&#2547; {{ number_format($item->paid_amount, 2) }}</td>
                                    <td>&#2547; {{ number_format($item->due_amount, 2) }}</td>
                                    <td>
                                        <span class="badge bg-primary text-light">
                                            @if ($item->payment_status == 0)
                                                Pending
                                            @elseif ($item->payment_status == 1)
                                                Partial
                                            @else
                                                Paid
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('inspect_purchase', $item->id) }}" class="btn btn-sm btn-info">Inspect</a>
                                            <a href="{{ route('edit_purchase', $item->id) }}" class="btn btn-sm btn-primary text-white">Edit</a>
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
