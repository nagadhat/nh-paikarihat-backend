@php
    $title = 'Add Sales';
@endphp
@extends('layouts.app')

@section('page_css')
    <style>
        #sugessions {
            width: 98%;
            height: 30vh;
            position: absolute;
            top: 80%;
            left: 50%;
            transform: translateX(-50%);
            background: white;
            z-index: 1000;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            border-radius: 4px;
            overflow-y: scroll
        }

        #sugessions ul {
            list-style: none;
            padding: 0;
        }

        #sugessions ul li {
            padding: 10px 30px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
            cursor: pointer;
        }

        #sugessions ul li:hover {
            background: #e4dada;
        }
    </style>
@endsection

@section('page_content')
    <div class="col-12" v-cloak>
        <div class="card">
            <div class="card-header py-2">
                <h4 class="mb-0">{{ $title }}</h4>
            </div>
            <div class="card-body">
                {{-- alert --}}
                <x-alert />
                <div class="row">
                    <div class="col-12">
                        <label for="" class="form-label">Select Customer</label>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="row align-items-center">
                                <div class="col-md-10">
                                    <select name="customer_name" onchange="changeCustomer(this.value)" id="account_head"
                                        class="select2">
                                        <option value="">--Select--</option>
                                        @foreach ($customers as $customer)
                                            <option value="{{ $customer->name }}"
                                                @if (session('new_customer_id') == $customer->id) selected @endif>{{ $customer->name }}
                                                &nbsp; ({{ $customer->phone }})</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <div class="btn btn-primary" data-toggle="modal" data-target="#customerModal">+</div>
                                </div>
                                <div class="col">
                                    <a href="" class="btn btn-warning text-dark">Reset</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="" class="form-label">Search Product</label>
                            <input type="text" name="input_product" id="input_product"
                                placeholder="Enter product's name or sku .." class="form-control">
                            <div id="suggestions" class="suggestions">
                                <ul id="productList" style="padding-top: 15px;" class="pos-product">
                                    {{-- product diplay from ajax --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="table-responsive mt-5">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>SL#</th>
                                <th>Product</th>
                                <th>Stock</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(item, key) in cart_items">
                                <td>....</td>
                                <td style="max-width: 300px">
                                    <div class="row">
                                        <div class="col-2 col-md-3">

                                        </div>
                                        <div class="col">

                                        </div>
                                    </div>
                                </td>
                                <td style="min-width: 100px"></td>
                                <td style="min-width: 100px">
                                    <span>&#2547;</span>
                                </td>
                                <td style="width: 250px">
                                    <div class="row align-items-center justify-content-center">

                                    </div>
                                </td>
                                <td style="min-width: 100px">&#2547; </td>
                                <td>
                                    <button class="btn btn-sm btn-warning text-dark"
                                        @click.prevent="removeCart(item.product_details.id)">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-12 mt-4 font-weight-bold text-center">
                    <div class="row mb-3 border-top border-bottom py-3">
                        <div class="col-md-6">
                            Discount: <span id="discount_amount">
                                @{{ discount_amount }}
                            </span>
                        </div>
                        <div class="col-md-6">
                            Total: <span id="grand_total">
                                @{{ total_amount }}
                            </span>
                        </div>
                    </div>
                    <div class="row align-items-end mt-4">
                        <div class="col-md-3">
                            <label for="" class="form-label">Discount</label>
                            <input type="number" id="discount" v-model="discount_amount" @keyup="calculateTotal()"
                                class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="" class="form-label">Amount Received</label>
                            <input type="number" id="amount_received" v-model="amount_received" @keyup="amountToReturn()"
                                class="form-control" required>
                        </div>
                        {{-- <div class="col-md-3">
                            <label for="" class="form-label">Amount to Return</label>
                            <input type="number" id="amount_to_return" v-model="amount_to_return" class="form-control"
                                disabled>
                        </div> --}}
                        <div class="col-md-3">
                            <strong>Account Head: <span id="accountHead"></span></strong>
                        </div>
                        <div class="col-md-3 text-right">
                            <form action="{{ route('pos_sale') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary">Save & Print</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Create user Modal start-->
    <div class="modal fade" id="customerModal" tabindex="-1" aria-labelledby="customerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Create Customer</h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="anticon anticon-close"></i>
                    </button>
                </div>
                <div class="modal-body text-left">
                    <form action="{{ route('add_new_customer') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="" class="form-label">Name<span class="text-danger"><sup>*</sup></span>
                                :</label>
                            <input type="text" id="" name="name" class="form-control"
                                placeholder="Enter name">
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Email (Optional):</label>
                            <input type="text" id="" name="email" class="form-control"
                                placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Phone<span class="text-danger"><sup>*</sup></span>
                                :</label>
                            <input type="number" id="" name="phone" class="form-control"
                                placeholder="Enter Phone"
                                onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Alternative Phone:</label>
                            <input type="number" id="" name="phone_2" class="form-control"
                                placeholder="Enter alternative phone"
                                onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Address:</label>
                            <textarea name="address" id="" class="form-control" placeholder="Enter Address"></textarea>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-sm btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Create User Modal end-->
@endsection
@section('page_js')
    <script src="{{ asset('assets/js/pos/index.js') }}"></script>
    <script>
        function changeCustomer(acc_head) {
            $("#accountHead").text(acc_head);
        }
        $(document).ready(function() {
            var acc_head = $("#account_head option:selected").val();
            $("#accountHead").text(acc_head);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#input_product').on('input', function() {
                var searchTerm = $(this).val();
                if (searchTerm.length >= 2) {
                    $.ajax({
                        url: "{{ route('product.suggestions') }}",
                        type: 'GET',
                        data: {
                            searchTerm: searchTerm
                        },
                        success: function(response) {
                            $('#productList').empty();
                            $.each(response, function(index, product) {
                                $('#productList').append(
                                    '<li style="cursor:pointer;list-style:none" data-product-id="' +
                                    product.id + '">' +
                                    product.title +
                                    ' - ' + product.sku + '</li>');
                            });
                        }
                    });
                } else {
                    $('#productList').empty();
                }
            });

            $('#productList').on('click', 'li', function() {
                var productId = $(this).data('product-id');
                var quantity = 1;
                var customerId = 1;

                $.ajax({
                    url: "{{ route('cart.add') }}",
                    type: 'POST',
                    data: {
                        productId: productId,
                        quantity: quantity,
                        customerId: customerId
                    },
                    success: function(response) {
                        if (response.success) {
                            alert(response.message);
                        } else {
                            alert('Failed to add product to cart: ' + response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        alert('Item not added in the cart');
                    }
                });
            });

        });
    </script>
    <script>
        $('.select2').select2();
    </script>
@endsection
