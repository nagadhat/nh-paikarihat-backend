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
                    <table class="table table-bordered" id="table">
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
                                    <td>({{ $item->supplier_details->company }}) - {{ $item->supplier_details->name }},
                                        {{ $item->supplier_details->phone }}</td>
                                    <td>{{ date('dS F, Y', strtotime($item->date)) }}</td>
                                    <td>&#2547; {{ number_format($item->shipping_charge, 2) }}</td>
                                    <td>&#2547; {{ number_format($item->total_amount, 2) }}</td>
                                    <td>&#2547; {{ number_format($item->paid_amount, 2) }}</td>
                                    <td>&#2547; {{ number_format($item->due_amount, 2) }}</td>
                                    <td>
                                        <span class="badge bg-primary text-light">
                                            @if ($item->payment_status == 1)
                                                Partial
                                            @elseif ($item->payment_status == 2)
                                                Paid
                                            @else
                                                Upaid
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary dropdown-toggle"
                                                data-toggle="dropdown" data-display="static" aria-expanded="false">
                                                Actions
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">

                                                <a href="{{ route('inspect_purchase', $item->id) }}" class="dropdown-item"
                                                    type="button">View</a>
                                                <a href="{{ route('edit_purchase', $item->id) }}" class="dropdown-item"
                                                    type="button">Manage Purchase</a>
                                                <a href="#" class="dropdown-item" data-toggle="modal" type="button"
                                                    data-target="#editModal_{{ $item->id }}">Payment</a>
                                                <a href="{{ route('purchase_invoice', $item->id) }}" class="dropdown-item"
                                                    type="button">Invoice</a>
                                            </div>
                                        </div>
                                        {{-- start modal for update payment --}}
                                        <div class="modal fade" id="editModal_{{ $item->id }}" tabindex="-1"
                                            aria-labelledby="editModalLabel_{{ $item->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4>Edit Payment</h4>
                                                        <button type="button" class="close" data-dismiss="modal">
                                                            <i class="anticon anticon-close"></i>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-left">
                                                        <form action="{{ route('purchase_payment_history', ['id' => $item->id]) }}" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="" class="form-label">Due Amount :</label>
                                                                <input type="text" name="due_amount" value="{{ $item->due_amount }}" placeholder=""
                                                                    class="form-control" readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="" class="form-label">Paid Amount :</label>
                                                                <input type="text" name="paid_amount" value="" placeholder=""
                                                                    id="" class="form-control" required>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="" class="form-label">Payment Method:</label>
                                                                <select name="payment_method" id="payment-method" class="form-control" required>
                                                                    <option value="">Choose Payment Method</option>
                                                                    <option value="0">Cash</option>
                                                                    <option value="1">Bank</option>
                                                                    <option value="2">Bkash</option>
                                                                    <option value="3">Nagad</option>
                                                                    <option value="4">Rocket</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="" class="form-label">Note:</label>
                                                                <textarea name="payment_note" class="form-control" placeholder=""></textarea>
                                                            </div>
                                                            <div class="text-right">
                                                                <button type="submit" class="btn btn-sm btn-primary">Save</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
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
@endsection
