@php
    $title = 'Products';
@endphp
@extends('layouts.app')

@section('page_content')
    <div class="col-12">
        <div class="card">
            <div class="card-header py-2">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h3 class="mb-0">{{ $title }}</h3>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="{{ route('products.create') }}" class="btn btn-primary">Create Product</a>
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
                                <th>Product</th>
                                <th>SKU</th>
                                <th>Purchase Amount</th>
                                <th>Price</th>
                                <th>Discount</th>
                                {{-- <th>Stock</th> --}}
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $key => $item)
                                @php
                                    $photo = empty($item->photo) ? asset('assets/images/others/error.png') : asset('storage/products/' . $item->photo);
                                @endphp
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        <div class="row align-items-center">
                                            <div class="col-3">
                                                <img class="img-fluid rounded" src="{{ $photo }}"
                                                    style="max-width: 60px" alt="">
                                            </div>
                                            <div class="col">
                                                {{ $item->title }}
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $item->sku }}</td>
                                    <td>
                                        &#2547; {{ number_format($item->purchase_amount, 2) }}
                                    </td>
                                    <td>
                                        &#2547; {{ number_format($item->price, 2) }}
                                    </td>
                                    <td>
                                        &#2547; {{ number_format($item->discount_amount, 2) }}
                                    </td>
                                    {{-- <td>
                                        {{ $item->quantity }}
                                    </td> --}}

                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('products.edit', $item->id) }}"
                                                class="btn btn-sm btn-primary text-white">Edit</a>
                                            <a href="#" class="btn btn-sm btn-danger"
                                                onclick="document.getElementById('delete-form-{{ $item->id }}').submit();">Delete</a>

                                            <form id="delete-form-{{ $item->id }}"
                                                action="{{ route('products.destroy', $item->id) }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{-- <div class="bg__product__pagination">
            {{ $products->links() }}
        </div> --}}
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
