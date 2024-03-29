@php
    $title = 'Create Product';
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

                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" class="form-label">Title<span class="text-danger"><sup>*</sup></span>
                                    :</label>
                                <input type="text" name="title" placeholder="title" id=""
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" class="form-label">Feature Photo<span class="text-danger"><sup>*</sup></span>
                                    :</label>
                                <input type="file" name="photo" placeholder="photo" id=""
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" class="form-label">Others Photo :</label>
                                <input type="file" name="multiple_photo[]" placeholder="Multiple Photo" id=""
                                    class="form-control" multiple>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                @php
                                    $uniqueNumericId = time() . mt_rand(1000, 9999);
                                @endphp
                                <label for="" class="form-label">SKU<span class="text-danger"><sup>*</sup></span>
                                    :</label>
                                <input type="text" name="sku" placeholder="sku" id="" value="{{ $uniqueNumericId }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" class="form-label">Purchase Amount<span
                                        class="text-danger"><sup>*</sup></span> :</label>
                                <input type="text" name="purchase_amount" placeholder="purchase amount" id=""
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" class="form-label">Selling Price<span
                                        class="text-danger"><sup>*</sup></span> :</label>
                                <input type="text" name="price" placeholder="selling price" id=""
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="form-label">Discount Type:</label>
                                <div class="row align-items-center">
                                    <div class="col-md-10">
                                        <select name="discount_type" id="" class="form-control">
                                            <option value="0">Choose Type</option>
                                            <option value="flat">Flat</option>
                                            <option value="percentage">Percentage</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="form-label">Discount Amount<span
                                        class="text-danger"></span> :</label>
                                <input type="number" name="discount_amount" value="0" id=""
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="form-label">Inside Side Dhaka<span
                                        class="text-danger"></span> :</label>
                                <input type="text" name="inside_dhaka" value="60" id=""
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="form-label">Outside Side Dhaka<span
                                        class="text-danger"></span> :</label>
                                <input type="text" name="outside_dhaka" value="120" id=""
                                    class="form-control">
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
                                        <div class="btn btn-primary" data-toggle="modal" data-target="#brandModal">+</div>
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
                                <label for="" class="form-label">Category
                                    {{-- <span class="text-danger"><sup>*</sup></span> --}}
                                         :</label>
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
                                                    <button type="button" class="btn btn-sm btn-primary" @click.prevent="saveCategory()">Save</button>
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
                                <textarea name="short_description" id="" rows="7" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="textarea">Description:</label>
                                <textarea class="form-control editor" id="textarea" name="description" height="1000px"></textarea>
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
    {{-- <script>
        new Quill('#editor', {
            theme: 'snow'
        });
    </script> --}}
    <script>
        // Summernote
        $('.editor').summernote({
                height: 300
            });
    </script>
@endsection
