@php
    $title = 'Create Purchase';
@endphp
@extends('layouts.app')

@section('page_content')
    <div class="col-12" v-cloak>
        <div class="card">
            <div class="card-header py-2">
                <h3 class="mb-0">{{ $title }}</h3>
            </div>
            <div class="card-body">

                {{-- alert --}}
                <x-alert />

                <form action="{{ route('store_purchase') }}" method="POST">
                    @csrf
                    <div class="row" style="align-items: center">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="form-label">Select Supplier:</label>
                                <select name="supplier" id="supplier" class="select2">
                                    <option value="">Select Supplier</option>
                                    @foreach ($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                data-target="#supplierModal">
                                +
                            </button>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" class="form-label">Date<span
                                        class="text-danger"><sup>*</sup></span>:</label>
                                <input type="date" name="purchase-date" placeholder="" id="purchase-date"
                                    class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="" class="form-label">Select Products<span
                                        class="text-danger"><sup>*</sup></span> :</label>
                                <select name="" id="purchase-product" class="select2">
                                    <option value="">Select Products</option>
                                    @foreach ($products as $item)
                                        <option value="{{ $item->id }}">
                                            ({{ $item->sku }})
                                            - {{ $item->title }}
                                        </option>
                                    @endforeach
                                </select>
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
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="purchase-cart-items"></tbody>
                            <tfoot>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Sub-Total: <span id="sub-total"></span></td>
                                    <td>Discount: <span id="discount-total"></span></td>
                                    <td>Total: <span id="grand-total"></span></td>
                                    <td></td>
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
                                <input type="number" name="shipping-charge" placeholder="Shipping Charge"
                                    id="shipping-charge" value="0" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="form-label">Total Amount<span
                                        class="text-danger"><sup>*</sup></span>:</label>
                                <input type="number" name="total-amount" placeholder="Total Amount" id="total-amount-2"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="form-label">Purchase Status:</label>
                                <select name="purchase-status" id="purchase-status" class="form-control">
                                    <option value="0">Select Purchase Status</option>
                                    <option value="1">Ordered</option>
                                    <option value="2">Order Received</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="form-label">Payment Status<span
                                        class="text-danger"><sup>*</sup></span>:</label>
                                <select name="payment-status" id="payment-status" class="form-control" required>
                                    <option value="">Select Payment Status</option>
                                    <option value="0">Pending</option>
                                    <option value="1">Partial</option>
                                    <option value="2">Paid</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="form-label">Payment Method<span
                                        class="text-danger"><sup>*</sup></span>:</label>
                                <select name="payment-method" id="payment-method" class="form-control" required>
                                    <option value="">Choose Payment Method</option>
                                    <option value="0">Cash</option>
                                    <option value="1">Bank</option>
                                    <option value="2">Bkash</option>
                                    <option value="3">Nagad</option>
                                    <option value="4">Rocket</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="form-label">Paid Amount<span
                                        class="text-danger"><sup>*</sup></span>:</label>
                                <input type="number" name="paid-amount" placeholder="Paid Amount" id="paid-amount"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="" class="form-label">Payment Comment</label>
                                <textarea name="comment" id="comment" rows="8" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="supplierModal" tabindex="-1" aria-labelledby="supplierModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Create Supplier</h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="anticon anticon-close"></i>
                    </button>
                </div>
                <div class="modal-body text-left">
                    <div class="alert bg-primary text-light mb-2" v-if="error != ''">
                        @{{ error }}
                    </div>
                    <div>
                        <div class="form-group">
                            <label for="" class="form-label">Name<span class="text-danger"><sup>*</sup></span>
                                :</label>
                            <input type="text" placeholder="name" v-model="name" id="" class="form-control"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Phone<span class="text-danger"><sup>*</sup></span>
                                :</label>
                            <input type="text" placeholder="phone" v-model="phone" id=""
                                class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Email:</label>
                            <input type="email" placeholder="email" v-model="email" id=""
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Company<span class="text-danger"><sup>*</sup></span>
                                :</label>
                            <input type="text" placeholder="company" v-model="company" id=""
                                class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Address:</label>
                            <textarea id="" class="form-control" placeholder="address" v-model="address"></textarea>
                        </div>
                        <div class="text-right">
                            <button type="button" class="btn btn-sm btn-primary"
                                @click.prevent="saveSupplier()">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page_js')
    <script src="{{ asset('assets/js/purchase/index.js') }}"></script>
    <script>
        var today = new Date();
        var formattedDate = today.toISOString().substr(0, 10);
        document.getElementById("purchase-date").value = formattedDate;
    </script>
    <script>
        $(document).ready(function() {
            // init data table
            $('#table').DataTable();

            // init select2
            $('.select2').select2();

            // load purchase cart products, if exists
            loadPurchaseCartProducts();
        });

        // on form submit
        $('form').submit(function() {
            var supplier = $('#supplier').val();
            var paidAmount = $('#paid-amount').val();

            console.log(supplier, supplier === '');

            // Check supplier and paid amount
            if (supplier == '' || paidAmount == '') {
                var alertMessage;

                if (supplier == '') {
                    alertMessage = 'Supplier not selected.';
                } else {
                    alertMessage = 'Paid Amount is empty.';
                }

                Swal.fire({
                    icon: 'error',
                    title: 'Wait!',
                    text: alertMessage,
                    showConfirmButton: false,
                    timer: 1200
                });

                return false;
            }
        });

        // add product to purchase cart
        $('#purchase-product').on('change', function() {
            var productId = this.value;
            $.ajax({
                // url: '/user/api/create-purchase-cart/' + productId,
                url: "{{ route('create.purchase.cart', ':productId') }}".replace(':productId', productId),
                type: 'GET',
                success: function(response) {
                    loadPurchaseCartProducts();
                }
            });
        });


        // function to load purchase cart products
        let total_amount = 0;
        function loadPurchaseCartProducts() {
            let sub_total = 0;
            let grand_total = 0;
            let discount_total = 0;

            $.ajax({
                // url: '/user/api/load-purchase-carts',
                url: "{{ route('load.purchase.carts') }}",
                type: 'get',
                success: function(response) {
                    // console.log(response);
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
                                        <input type="hidden" name="loopCounter" value="${j}">
                                    </td>
                                    <td>
                                        <input type="number" onblur="updateProduct(${response[j]["id"]})" name="quantity${j}" class="form-control form-control-sm" id="quantity${response[j]["id"]}" value="${response[j]["quantity"]}">
                                    </td>
                                    <td>
                                        <input type="number" onblur="updateProduct(${response[j]["id"]})" class="form-control form-control-sm" id="mrp${response[j]["id"]}" value="${response[j]["mrp"]}">
                                    </td>
                                    <td>
                                        <input type="number" onblur="updateProduct(${response[j]["id"]})" name="purchase_amount${j}" class="form-control form-control-sm" id="purchase_amount${response[j]["id"]}" value="${response[j]["purchase_amount"]}">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control form-control-sm" id="" readonly value="${response[j]["sub_total"]}">
                                    </td>
                                    <td>
                                        <input type="number" onblur="updateProduct(${response[j]["id"]})" name="discount_amount${j}" class="form-control form-control-sm" id="discount_amount${response[j]["id"]}" value="${response[j]["discount_amount"]}">
                                    </td>
                                    <td>
                                        <input type="number" name="total_amount${j}" class="form-control form-control-sm" id="" readonly value="${response[j]["total_amount"]}">
                                    </td>
                                    <td>
                                        <input type="text" name="lot_no${j}" class="form-control form-control-sm" id="lot_no${response[j]["id"]}" readonly value="${response[j]["lot_no"] ? response[j]["lot_no"] : ''}">
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-danger m-1" type="button" onclick="removeProduct(${response[j]["id"]})">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
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
                        total_amount = grand_total;


                    } else {
                        $("#purchase-cart-items").html("");

                        $("#sub-total").html(0);
                        $("#grand-total").html(0);
                        $("#discount-total").html(0);
                    }
                }
            });
        }

        // function to update purchase cart product
        function updateProduct(_id) {
            var _quantity = $('#quantity' + _id).val();
            var _purchase_amount = $('#purchase_amount' + _id).val();
            var _discount_amount = $('#discount_amount' + _id).val();
            var _lot_no = $('#lot_no' + _id).val();
            var _mrp = $('#mrp' + _id).val();

            $.ajax({
                url: '/user/api/update-purchase-cart',
                type: 'post',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: _id,
                    quantity: _quantity,
                    discount_amount: _discount_amount,
                    purchase_amount: _purchase_amount,
                    lot_no: _lot_no,
                    mrp: _mrp
                },
                success: function(response) {
                    // console.log(response);

                    Swal.fire({
                        icon: 'success',
                        title: 'Hey!',
                        text: 'Product updated successfully.',
                        showConfirmButton: false,
                        timer: 1200
                    });

                    // load cart products
                    loadPurchaseCartProducts();
                }
            });
        }

        // function to remove purchase cart product
        function removeProduct(_id) {
            $.ajax({
                url: '/user/api/remove-purchase-cart/' + _id,
                type: 'get',
                success: function(response) {
                    // console.log(response);

                    Swal.fire({
                        icon: 'success',
                        title: 'Hey!',
                        text: 'Product removed successfully.',
                        showConfirmButton: false,
                        timer: 1200
                    });

                    // load cart products
                    loadPurchaseCartProducts();
                }
            });
        }

        // update total amount
        $('#shipping-charge').on('change', function() {
            let shippingCharge = document.getElementById('shipping-charge');
            let paidAmount = document.getElementById('paid-amount');

            paidAmount.value = total_amount + parseInt(shippingCharge.value);
        });
    </script>
@endsection
