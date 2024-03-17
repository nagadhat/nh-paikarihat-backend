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
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="row align-items-center">
                                <div class="col-md-10">
                                    <select name="customer_name" id="" class="select2">
                                        <option value="">--Select--</option>
                                        <option value="">test1</option>
                                        <option value="">test2</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <div class="btn btn-primary" data-toggle="modal" data-target="#customerModal">+</div>
                                </div>
                            </div>
                        </div>

                        <!-- Create user Modal start-->
                        <div class="modal fade" id="customerModal" tabindex="-1" aria-labelledby="customerModalLabel"
                            aria-hidden="true">
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
                                                <label for="" class="form-label">Name<span
                                                        class="text-danger"><sup>*</sup></span>
                                                    :</label>
                                                <input type="text" id="" name="name" class="form-control" placeholder="Enter name">
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="form-label">Email (Optional):</label>
                                                <input type="text" id="" name="email" class="form-control" placeholder="Enter email" >
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="form-label">Phone<span
                                                        class="text-danger"><sup>*</sup></span>
                                                    :</label>
                                                <input type="number" id="" name="phone" class="form-control" placeholder="Enter Phone" 
                                                onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="form-label">Alternative Phone:</label>
                                                <input type="number" id="" name="phone_2" class="form-control" placeholder="Enter alternative phone" 
                                                onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="form-label">Address:</label>
                                                <textarea name="address" id="" class="form-control" placeholder="Enter Address"></textarea>
                                            </div>
                                            <div class="text-right">
                                                <button type="submit"
                                                    class="btn btn-sm btn-primary">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Create User Modal end-->
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-9">
                                    <input type="text" @change="getCustomer()" v-model="input_customer"
                                        placeholder="Enter customer's username.." class="form-control">
                                </div>
                                <div class="col-md-3 text-right">
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
                            <input type="text" v-model="input_product" @change="getProducts()"
                                placeholder="Enter product's barcode, brand or name.." class="form-control">

                            <div id="sugessions" class="sugessions" :class="{ 'd-none': products.length == 0 }">
                                <ul>
                                    <li v-for="item in products" @click="addToCart(item.id)">@{{ item.title }}
                                        (Qty: @{{ item.quantity }})</li>
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
                                <td>@{{ key + 1 }}</td>
                                <td style="max-width: 300px">
                                    <div class="row">
                                        <div class="col-2 col-md-3">
                                            <img v-if="item.product_details.photo === null" :src="default_photo"
                                                alt="" width="60" class="img-fluid rounded">
                                            <img v-else :src="getImageUrl(item.product_details.photo)" alt=""
                                                width="60" class="img-fluid rounded">
                                        </div>
                                        <div class="col">
                                            @{{ item.product_details.title }}
                                        </div>
                                    </div>
                                </td>
                                <td style="min-width: 100px">@{{ item.product_details.quantity }}</td>
                                <td style="min-width: 100px">
                                    <span>&#2547; @{{ item.product_details.price }}</span>

                                </td>
                                <td style="width: 250px">
                                    <div class="row align-items-center justify-content-center">
                                        <div class="col-3 text-right">
                                            <button class="btn btn-rounded btn-primary btn-icon btn-sm"
                                                @click.prevent="decreaseCart(item.product_details.id)">
                                                <i class="fa fa-minus" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                        <div class="col-6 p-0">
                                            <input type="number" @change.prevent="updateToCart(item.product_details.id, key)"
                                                min="1" v-model="item.quantity"
                                                :max="item.product_details.quantity" class="form-control">
                                        </div>
                                        <div class="col-3 text-left">
                                            <button class="btn btn-rounded btn-primary btn-icon btn-sm"
                                                @click.prevent="addToCart(item.product_details.id, key)">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                                <td style="min-width: 100px">&#2547; @{{ item.product_price }}</td>
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
                        <div class="col-md-3 text-right">
                            <form action="{{ route('pos_sale') }}" method="POST">
                                @csrf
                                <input type="hidden" name="customer_id" :value="customer_info.id">
                                <input type="hidden" name="discount_amount" :value="discount_amount">
                                <button type="submit" class="btn btn-primary">Save & Print</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page_js')
    <script src="{{ asset('assets/js/pos/index.js') }}"></script>
    <script>
        $('.select2').select2();
    </script>
@endsection
