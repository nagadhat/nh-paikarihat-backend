@php
    $title = 'Templates';
@endphp
@extends('layouts.app')

@section('page_content')
    {{-- alert --}}
    <x-alert />

    <div class="col-md-4">
        <div class="card">
            <div class="card-header py-2">
                <h3 class="mb-0">Template #MS01</h3>
            </div>
            <div class="card-body">
                <img src="{{ asset('assets/images/landing_page/1.png') }}" alt="" class="img-fluid rounded">
                <div class="mt-2 text-center">
                    <a href="{{ route('show_template', 1) }}" target="_blank" class="btn btn-primary">Live Preview</a>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#importModal_1">Import
                        Template</button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header py-2">
                <h3 class="mb-0">Template #MS02</h3>
            </div>
            <div class="card-body">
                <img src="{{ asset('assets/images/landing_page/2.png') }}" alt="" class="img-fluid rounded">
                <div class="mt-2 text-center">
                    <a href="{{ route('show_template', 2) }}" target="_blank" class="btn btn-primary">Live Preview</a>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#importModal_2">Import
                        Template</button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header py-2">
                <h3 class="mb-0">Template #MS03</h3>
            </div>
            <div class="card-body">
                <img src="{{ asset('assets/images/landing_page/3.png') }}" alt="" class="img-fluid rounded">
                <div class="mt-2 text-center">
                    <a href="{{ route('show_template', 3) }}" target="_blank" class="btn btn-primary">Live Preview</a>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#importModal_3">Import
                        Template</button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header py-2">
                <h3 class="mb-0">Template #MS04</h3>
            </div>
            <div class="card-body">
                <img src="{{ asset('assets/images/landing_page/4.png') }}" alt="" class="img-fluid rounded">
                <div class="mt-2 text-center">
                    <a href="{{ route('show_template', 4) }}" target="_blank" class="btn btn-primary">Live Preview</a>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#importModal_4">Import
                        Template</button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header py-2">
                <h3 class="mb-0">Template #MS05</h3>
            </div>
            <div class="card-body">
                <img src="{{ asset('assets/images/landing_page/5.png') }}" alt="" class="img-fluid rounded">
                <div class="mt-2 text-center">
                    <a href="{{ route('show_template', 5) }}" target="_blank" class="btn btn-primary">Live Preview</a>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#importModal_5">Import
                        Template</button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header py-2">
                <h3 class="mb-0">Template #MS06</h3>
            </div>
            <div class="card-body">
                <img src="{{ asset('assets/images/landing_page/6.png') }}" alt="" class="img-fluid rounded">
                <div class="mt-2 text-center">
                    <a href="{{ route('show_template', 6) }}" target="_blank" class="btn btn-primary">Live Preview</a>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#importModal_6">Import
                        Template</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Import Modal -->
    @for ($i = 0; $i <= 5; $i++)
        <div class="modal fade" id="importModal_{{ $i + 1 }}" tabindex="-1" aria-labelledby="importModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Import Template #MS{{ $i + 1 }}</h4>
                        <button type="button" class="close" data-dismiss="modal">
                            <i class="anticon anticon-close"></i>
                        </button>
                    </div>
                    <div class="modal-body text-left">
                        <form action="{{ route('my-themes.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="template_id" value="{{ $i + 1 }}">
                            <div class="form-group">
                                <label for="" class="form-label">Select Product<span
                                        class="text-danger"><sup>*</sup></span>
                                    :</label>
                                <select name="product_id" id="" class="select2">
                                    <option value="">Select Product</option>
                                    @foreach ($products as $item)
                                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Page Link<span
                                        class="text-danger"><sup>*</sup></span>
                                    :</label>
                                <span>
                                    <span class="badge bg-light">
                                        {{ auth()->user()->shop_details->username . '.' . env('APP_URL') . '/' }}
                                    </span>
                                    your_link
                                </span>
                                <input type="text" name="slug" placeholder="slug" id=""
                                    class="form-control" required>
                            </div>
                            @if ($products->count() == 0)
                                <p>
                                    To import a template, you should have atleast one active product. <a
                                        href="{{ route('products.index') }}">Click here</a> to create a product.
                                </p>
                            @endif
                            <div class="text-right">
                                <button type="submit" class="btn btn-sm btn-primary"
                                    {{ $products->count() == 0 ? 'disabled' : '' }}>Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endfor
@endsection

@section('page_js')
    <script>
        // init select2
        $('.select2').select2();
    </script>
@endsection
