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
                                        $photo = empty($product->photo)
                                            ? asset('assets/images/others/error.png')
                                            : asset('storage/products/' . $product->photo);
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
                        {{-- <div class="col-md-6">
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
                                                alt="" class="img-fluid" width="150" height="100">
                                        </div>
                                    @endforeach
                                </div>
                                <input type="file" name="multiple_photo[]" id="photoUpload" placeholder="photo"
                                    onchange="multipleImageLoad(event)" class="form-control" multiple>
                            </div>
                        </div> --}}
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
                                                alt="" class="img-fluid" width="150" height="100">
                                        </div>
                                    @endforeach
                                </div>
                                <input type="file" name="multiple_photo[]" id="photoUpload" placeholder="photo"
                                    onchange="multipleImageLoad(event)" class="form-control" multiple>
                                <div id="previewContainer"></div>
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
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" class="form-label">Product Type:<span
                                        class="text-danger"><sup>*</sup></span></label>
                                <div class="row align-items-center">
                                    <div class="col-md-10">
                                        <select name="product_type" id="" class="form-control">
                                            <option value="0">Choose Type</option>
                                            <option value="REG"
                                                {{ old('product_type', $product->product_type) == 'REG' ? 'selected' : '' }}>
                                                REG</option>
                                            <option value="PRE"
                                                {{ old('product_type', $product->product_type) == 'PRE' ? 'selected' : '' }}>
                                                PRE</option>
                                            <option value="PRE"
                                                {{ old('product_type', $product->product_type) == 'STO' ? 'selected' : '' }}>
                                                STO</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
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
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" class="form-label">Discount Amount<span class="text-danger"></span>
                                    :</label>
                                <input type="number" name="discount_amount" value="{{ $product->discount_amount }}"
                                    id="" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="form-label">Min Quantity :</label>
                                <input type="number" name="min_quantity" value="{{ $product->min_quantity }}" id=""class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="form-label">Max Quantity :</label>
                                <input type="number" name="max_quantity" value="{{ $product->max_quantity }}" id=""class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="form-label">Inside Side Dhaka<span
                                        class="text-danger"></span> :</label>
                                <input type="text" name="inside_dhaka" value="{{ $product->inside_dhaka }}"
                                    id="" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="form-label">Outside Side Dhaka<span
                                        class="text-danger"></span> :</label>
                                <input type="text" name="outside_dhaka" value="{{ $product->outside_dhaka }}"
                                    id="" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="form-label">Brand:</label>
                                <div class="row align-items-center">
                                    <div class="col-md-12">
                                        <select name="brand" id="" class="form-control">
                                            <option value="">Choose brand</option>
                                            <option v-for="item in brands" v-bind:value="item.id">@{{ item.title }}
                                            </option>
                                        </select>
                                    </div>
                                    {{-- <div class="col">
                                        <div class="btn btn-primary" data-toggle="modal" data-target="#brandModal">+
                                        </div>
                                    </div> --}}
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
                                <label for="" class="form-label">Category
                                    <span class="text-danger"><sup>*</sup></span>
                                    :</label>
                                <div class="row align-items-center">
                                    <div class="col-md-12">
                                        <select name="category" id="" class="form-control">
                                            <option value="0">Choose category</option>
                                            @foreach ($categories as $item)
                                                @if ($item->id != $product->id)
                                                    <option value="{{ $item->id }}"
                                                        {{ $product->category_id == $item->id ? 'selected' : 'No Category Found' }}>
                                                        {{ $item->title }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    {{-- <div class="col">
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#categoryModal">+</button>
                                    </div> --}}
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
                                <textarea name="short_description" id="" rows="7" class="form-control editor">{{ $product->short_description }}</textarea>
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

            if (files.length > 5) {
                alert("Maximum 5 images allowed");
                event.target.value = '';
                return;
            }
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
    </script>
@endsection
