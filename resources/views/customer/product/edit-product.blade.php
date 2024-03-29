@php
    $title = 'Edit Product';
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

                <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <label for="" class="form-label">Title<span class="text-danger"><sup>*</sup></span>
                                    :</label>
                                <input type="text" name="title" value="{{ $product->title }}" placeholder="title"
                                    id="" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="" class="form-label">SKU<span class="text-danger"><sup>*</sup></span>
                                    :</label>
                                <input type="text" name="sku" value="{{ $product->sku }}" placeholder="sku"
                                    id="" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="form-label">Photo<span class="text-danger"><sup>*</sup></span>
                                    :</label>
                                <div class="text-center pb-3">
                                    @php
                                        $photo = empty($product->photo) ? asset('assets/images/others/error.png') : asset('storage/products/' . $product->photo);
                                    @endphp

                                    @if (file_exists(public_path('storage/products/' . $product->photo)))
                                        <img src="{{ $photo }}" alt="" class="img-fluid" width="150"
                                            id="preview" height="100">
                                    @else
                                        <img src="{{ asset('assets/images/others/error.png') }}" class="img-fluid"
                                            width="150" height="100" alt="">
                                    @endif
                                </div>
                                <input type="file" name="photo" placeholder="photo" id=""
                                    onchange="loadFile(event)" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="form-label">Other Photo:</label>
                                <div class="pb-3 d-flex align-items-center justify-content-between multiple__image">
                                    @php
                                        $product['multiple_photo'] = explode(',', $product->multiple_photo);
                                    @endphp

                                    @foreach ($product->multiple_photo as $image)
                                        @php
                                            $imagePath = public_path($image);
                                        @endphp
                                        <div class="multiple__image px-2">
                                            <img src="@if (file_exists($imagePath) && is_file($imagePath)) {{ asset($image) }}@else{{ asset('assets/images/others/error.png') }} @endif"
                                                alt="" class="img-fluid"  width="150" height="100">
                                        </div>
                                    @endforeach
                                </div>
                                <input type="file" name="multiple_photo[]" placeholder="photo"
                                    onchange="multipleImageLoad(event)" class="form-control" multiple>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="form-label">Purchase Amount<span
                                        class="text-danger"><sup>*</sup></span> :</label>
                                <input type="text" name="purchase_amount" value="{{ $product->purchase_amount }}"
                                    placeholder="purchase amount" id="" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="form-label">Selling Price<span
                                        class="text-danger"><sup>*</sup></span> :</label>
                                <input type="text" name="price" value="{{ $product->price }}"
                                    placeholder="selling price" id="" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="form-label">Inside Side Dhaka<span
                                        class="text-danger"></span> :</label>
                                <input type="text" name="inside_dhaka" value="{{ $product->inside_dhaka }}" id=""
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="form-label">Outside Side Dhaka<span
                                        class="text-danger"></span> :</label>
                                <input type="text" name="outside_dhaka" value="{{ $product->outside_dhaka }}" id=""
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="form-label">Discount Type:</label>
                                <div class="row align-items-center">
                                    <div class="col-md-12">
                                        <select name="discount_type" id="" class="form-control">
                                            <option value="0">Choose Type</option>
                                            <option value="flat"
                                                {{ $product->discount_type == 'flat' ? 'selected' : '' }}>Flat</option>
                                            <option value="percentage"
                                                {{ $product->discount_type == 'percentage' ? 'selected' : '' }}>Percentage
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="form-label">Discount Amount<span class="text-danger"></span>
                                    :</label>
                                <input type="number" name="discount_amount" value="{{ $product->discount_amount }}"
                                    id="" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="form-label">Brand:</label>
                                <div class="row align-items-center">
                                    <div class="col-md-10">
                                        <select name="brand" id="" class="form-control">
                                            <option value="">Choose brand</option>
                                            <option v-for="item in brands" v-bind:value="item.id">@{{ item.title }}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <div class="btn btn-primary" data-toggle="modal" data-target="#brandModal">+
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Brand Modal start-->
                            <div class="modal fade" id="brandModal" tabindex="-1" aria-labelledby="brandModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4>Create Brand</h4>
                                            <button type="button" class="close" data-dismiss="modal">
                                                <i class="anticon anticon-close"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body text-left">
                                            <div class="alert bg-primary text-light mb-2" v-if="brand_error != ''">
                                                @{{ brand_error }}
                                            </div>

                                            <div>
                                                {{-- <div class="form-group">
                                                    <label for="" class="form-label">Logo:</label>
                                                    <input type="file" @change="uploadBrandLogo" id=""
                                                        class="form-control" accept="image/jpg,png,jpeg" size="1000">
                                                </div> --}}
                                                <div class="form-group">
                                                    <label for="" class="form-label">Title<span
                                                            class="text-danger"><sup>*</sup></span>
                                                        :</label>
                                                    <input type="text" v-model="brand_title" placeholder="brand title"
                                                        id="" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="" class="form-label">Description:</label>
                                                    <textarea v-model="brand_desc" id="" class="form-control" placeholder="brand description"></textarea>
                                                </div>
                                                <div class="text-right">
                                                    <button type="button" @click.prevent="saveBrand"
                                                        class="btn btn-sm btn-primary">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Brand Modal end-->
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="form-label">Category :</label>
                                <div class="row align-items-center">
                                    <div class="col-md-10">
                                        <select name="category" id="" class="form-control">
                                            <option value="">Choose category</option>
                                            <option v-for="item in categories" v-bind:value="item.id">
                                                @{{ item.title }}</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#categoryModal">+</button>
                                    </div>
                                </div>
                            </div>

                            <!-- Category Modal Start-->
                            <div class="modal fade" id="categoryModal" tabindex="-1"
                                aria-labelledby="categoryModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4>Create Category</h4>
                                            <button type="button" class="close" data-dismiss="modal">
                                                <i class="anticon anticon-close"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body text-left">
                                            <div class="alert bg-primary text-light mb-2" v-if="category_error != ''">
                                                @{{ category_error }}
                                            </div>

                                            <div>
                                                <div class="form-group">
                                                    <label for="" class="form-label">Title<span
                                                            class="text-danger"><sup>*</sup></span>
                                                        :</label>
                                                    <input type="text" placeholder="category title" id=""
                                                        v-model="category_title" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="" class="form-label">Description:</label>
                                                    <textarea id="" class="form-control" placeholder="category description" v-model="category_desc"></textarea>
                                                </div>
                                                <div class="text-right">
                                                    <button type="button" class="btn btn-sm btn-primary"
                                                        @click.prevent="saveCategory()">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Category Modal End-->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="" class="form-label">Short Description</label>
                                <textarea name="short_description" rows="7" class="form-control">{{ $product->short_description }}
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="textarea">Description:</label>
                                <textarea class="form-control editor" id="textarea" name="description" height="1000px">{{ $product->description }}</textarea>
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
@endsection

@section('page_js')
    <script src="{{ asset('assets/js/product/index.js') }}"></script>
    <script>
        // Summernote
        $('.editor').summernote({
            height: 300
        });

        // uploaded single image preview
        function loadFile(event) {
            var output = document.getElementById('preview');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>
    <script>
        function multipleImageLoad(event) {
            var outputContainer = document.querySelector('.multiple__image');
            outputContainer.innerHTML = ''; 
            var files = event.target.files;

            for (var i = 0; i < files.length; i++) {
                var file = files[i];
                var reader = new FileReader();

                reader.onload = function(e) {
                    outputContainer.innerHTML += '<div class="multiple__image"><img src="' + e.target.result +
                        '" alt="" class="img-fluid" width="150" height="100"></div>';
                };

                reader.readAsDataURL(file);
            }
        }

        function placeOrder() {
            alert("Order Placed Sucessfully");
        }

        function showAllFields() {
            $("#newuser").val(0);
            document.getElementById('NewUserFields').style.display = 'block';
            document.getElementById('ExistingUserFields').style.display = 'none';
            document.getElementById('ExistingUserIn').style.display = 'none';
        }

        function showLimitedFields() {
            $("#olduser").val(1);
            document.getElementById('NewUserFields').style.display = 'none';
            document.getElementById('ExistingUserFields').style.display = 'block';
            document.getElementById('ExistingUserIn').style.display = 'block';
        }

        // Global Start
        var subtotal = getData();
        document.getElementById('grandTotal').innerText = '৳ ' + (subtotal + 60);
        document.getElementById('orderAmount').innerText = subtotal + 60;
        document.getElementById('subtotal').innerText = subtotal;
        // Global end

        let checkShipping = 1;
        function showInsideDhaka() {
            //Inside
            checkShipping = 1;
            var subtotal = getData();

            document.getElementById('grandTotal').innerText = '৳ ' + (subtotal + 60);
            document.getElementById('orderAmount').innerText = subtotal + 60;
            document.getElementById('subtotal').innerText = subtotal;

            document.getElementById("insideDhakaCharge").style.display = "block";
            document.getElementById("outsideDhakaCharge").style.display = "none";
        }

        function showOutsideDhaka() {
            //Outside
            checkShipping = 2;
            var subtotal = getData();
            document.getElementById('grandTotal').innerText = '৳ ' + (subtotal + 120);
            document.getElementById('orderAmount').innerText = subtotal + 120;
            document.getElementById('subtotal').innerText = subtotal;

            document.getElementById("insideDhakaCharge").style.display = "none";
            document.getElementById("outsideDhakaCharge").style.display = "block";
        }

        function updateOrderDetails(input) {
            //Quantity Change
            let shippingCharge = 120;
            if (checkShipping == 1) {
                shippingCharge = 60;
            }
            var subtotal = getData();
            document.getElementById('grandTotal').innerText = '৳ ' + (subtotal + shippingCharge);
            document.getElementById('orderAmount').innerText = subtotal + shippingCharge;
            document.getElementById('subtotal').innerText = subtotal;
        }

        function getData() {
            var quantity = $("#CurrentQty").val();
            var discountAmount = $("#Discount").val();
            var price = parseFloat(document.getElementById('productPrice').innerText);
            var subtotal = quantity * (price - discountAmount);
            return subtotal;
        }
    </script>
@endsection
