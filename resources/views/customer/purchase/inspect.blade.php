@php
    $title = 'Inspect Purchase';
@endphp
@extends('layouts.app')

@section('page_content')
    <div class="col-12">
        <div class="card">
            <div class="card-header py-2">
                <h3 class="mb-0">{{ $title }}</h3>
            </div>
            <div class="card-body">

                {{-- alert --}}
                <x-alert />

                <div class="row" style="align-items: center">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="form-label">Select Supplier:</label>
                            <input type="text" name="" value="{{ $supplier->name }}" id=""
                                class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="form-label">Date<span class="text-danger"><sup>*</sup></span>
                                :</label>
                            <input type="date" name="purchase-date" placeholder="" id="purchase-date"
                                class="form-control" value="{{ $purchase->date }}" readonly>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="table-responsive my-5">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>SL#</th>
                                <th style="min-width: 160px">Product Name</th>
                                <th style="min-width: 100px">Quantity</th>
                                <th style="min-width: 100px">MRP</th>
                                <th style="min-width: 160px">Purchase Amount</th>
                                <th style="min-width: 160px">Sub-Total</th>
                                <th style="min-width: 160px">Discount Amount</th>
                                <th style="min-width: 160px">Total Amount</th>
                                <th style="min-width: 160px">Barcode</th>
                            </tr>
                        </thead>
                        <tbody id="purchase-cart-items"></tbody>
                        @foreach ($purchaseProductList as $item)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ isset($item->purchaseOrderProductToProduct) ? $item->purchaseOrderProductToProduct->title : '--' }}
                                </td>
                                <td>{{ isset($item->quantity) ? $item->quantity : '--' }}</td>
                                <td>{{ isset($item->mrp) ? $item->mrp : '--' }}</td>
                                <td>{{ isset($item->purchase_amount) ? $item->purchase_amount : '--' }}</td>
                                <td>{{ $item->purchase_amount * $item->quantity }}</td>
                                <td>{{ isset($item->discount_amount) ? $item->discount_amount : '--' }}</td>
                                <td>{{ $item->purchase_amount * $item->quantity - $item->discount_amount }}</td>
                                <td>{{ isset($item->lot_no) ? $item->lot_no : '--' }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Sub-Total: <span id="sub-total">{{ $subTotal }}</span></td>
                                <td>Discount: <span id="discount-total">{{ $discountTotal }}</span></td>
                                <td>Total: <span id="grand-total">{{ $grandTotal }}</span></td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <hr>
                <div class="row mt-5">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="form-label">Shipping Charge:</label>
                            <input type="number" name="shipping-charge" placeholder="Shipping Charge" id="shipping-charge"
                                value="{{ isset($purchase->shipping_charge) ? $purchase->shipping_charge : 0 }}"
                                class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="form-label">Total Amount<span
                                    class="text-danger"><sup>*</sup></span>:</label>
                            <input type="number" name="total-amount" value="{{ $purchase->total_amount }}"
                                placeholder="Total Amount" id="total-amount-2" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="form-label">Purchase Status:</label>
                            <select name="purchase-status" id="purchase-status" class="form-control" readonly>
                                <option value="0" {{ $purchase->purchase_status == 0 ? 'selected' : '' }}>
                                    Select Purchase Status</option>
                                <option value="1" {{ $purchase->purchase_status == 1 ? 'selected' : '' }}>Ordered
                                </option>
                                <option value="2" {{ $purchase->purchase_status == 2 ? 'selected' : '' }}>Order
                                    Received</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="form-label">Payment Status<span
                                    class="text-danger"><sup>*</sup></span>:</label>
                            <select name="payment-status" id="payment-status" class="form-control" readonly>
                                <option value="0" {{ $purchase->payment_status == 0 ? 'selected' : '' }}>Select Payment Status</option>
                                {{-- <option value="0">Pending</option> --}}
                                <option value="2" {{ $purchase->payment_status == 2 ? 'selected' : '' }}>Paid</option>
                                <option value="1" {{ $purchase->payment_status == 1 ? 'selected' : '' }}>Due</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="form-label">Payment Method<span
                                    class="text-danger"><sup>*</sup></span>:</label>
                            <select name="payment-method" id="payment-method" class="form-control" readonly>
                                <option value="">Choose Payment Method</option>
                                <option value="0"
                                    {{ $purchase->purchase_payments->payment_method == 0 ? 'selected' : '' }}>Cash
                                </option>
                                <option value="1"
                                    {{ $purchase->purchase_payments->payment_method == 1 ? 'selected' : '' }}>Bank
                                </option>
                                <option value="2"
                                    {{ $purchase->purchase_payments->payment_method == 2 ? 'selected' : '' }}>Bkash
                                </option>
                                <option value="3"
                                    {{ $purchase->purchase_payments->payment_method == 3 ? 'selected' : '' }}>Nagad
                                </option>
                                <option value="4"
                                    {{ $purchase->purchase_payments->payment_method == 4 ? 'selected' : '' }}>Rocket
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="form-label">Paid Amount<span
                                    class="text-danger"><sup>*</sup></span>:</label>
                            <input type="number" name="paid-amount" value="{{ $purchase->paid_amount }}"
                                placeholder="Paid Amount" id="paid-amount" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="" class="form-label">Payment Comment</label>
                            <textarea name="comment" id="comment" rows="8" class="form-control" readonly>{{ $purchase->purchase_payments->payment_comment }}</textarea>
                        </div>
                    </div>
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

            // init select2
            $('.select2').select2();
        });
    </script>

    <script>
        $(document).ready(function() {
            // load purchase cart products, if exists
            loadPurchaseCartProducts();
        });

        // function to load purchase cart products
        function loadPurchaseCartProducts() {
            let sub_total = 0;
            let grand_total = 0;
            let discount_total = 0;

            $.ajax({
                url: '/user/api/load-purchase-carts',
                type: 'get',
                success: function(response) {
                    console.log(response);

                    if (response != '') {
                        let productContent = "";

                        for (let j = 0; j < response.length; j++) {
                            sub_total += response[j]["sub_total"];
                            grand_total += response[j]["total_amount"];
                            discount_total += response[j]["discount_amount"];

                            productContent += `
                                <tr style="text-align:center">
                                    <td>${j + 1}</td>
                                    <td>
                                        ${response[j]["title"]}
                                        <input readonly type="hidden" name="loopCounter" value="${j}">
                                    </td>
                                    <td>
                                        <input readonly type="number" onblur="updateProduct(${response[j]["id"]})" name="quantity${j}" class="form-control form-control-sm" id="quantity${response[j]["id"]}" value="${response[j]["quantity"]}">
                                    </td>
                                    <td>
                                        <input readonly type="number" onblur="updateProduct(${response[j]["id"]})" class="form-control form-control-sm" id="mrp${response[j]["id"]}" value="${response[j]["mrp"]}">
                                    </td>
                                    <td>
                                        <input readonly type="number" onblur="updateProduct(${response[j]["id"]})" name="purchase_amount${j}" class="form-control form-control-sm" id="purchase_amount${response[j]["id"]}" value="${response[j]["purchase_amount"]}">
                                    </td>
                                    <td>
                                        <input readonly type="number" class="form-control form-control-sm" id="" readonly value="${response[j]["sub_total"]}">
                                    </td>
                                    <td>
                                        <input readonly type="number" onblur="updateProduct(${response[j]["id"]})" name="discount_amount${j}" class="form-control form-control-sm" id="discount_amount${response[j]["id"]}" value="${response[j]["discount_amount"]}">
                                    </td>
                                    <td>
                                        <input readonly type="number" name="total_amount${j}" class="form-control form-control-sm" id="" readonly value="${response[j]["total_amount"]}">
                                    </td>
                                    <td>
                                        <input readonly type="text" name="lot_no${j}" class="form-control form-control-sm" id="lot_no${response[j]["id"]}" readonly value="${response[j]["lot_no"] ? response[j]["lot_no"] : ''}">
                                    </td>
                                </tr>
                            `;
                        }
                        $("#purchase-cart-items").html(productContent);

                        $("#sub-total").html(sub_total);
                        $("#grand-total").html(grand_total);
                        $("#discount-total").html(discount_total);
                        $("#total-amount-2").val(grand_total);
                        $("#paid-amount").val(grand_total);

                    } else {
                        $("#purchase-cart-items").html("");

                        $("#sub-total").html(0);
                        $("#grand-total").html(0);
                        $("#discount-total").html(0);
                    }
                }
            });
        }
    </script>
@endsection
