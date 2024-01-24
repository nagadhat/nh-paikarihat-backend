@php
    $title = 'Variations';
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
                        <a href="{{ route('create_variation') }}" class="btn btn-primary">Create Variation</a>
                    </div>
                </div>
            </div>
            <div class="card-body">

                {{-- alert --}}
                <x-alert />

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>SL#</th>
                                <th>Product</th>
                                <th>Size</th>
                                <th>Weight</th>
                                <th>Color</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($variations as $key => $item)
                                @php
                                    $photo = empty($item->photo) ? asset('assets/images/others/error.png') : asset('storage/' . $item->photo);

                                    $quantity = json_decode($item->quantity);
                                    $quantityStr = implode(', ', $quantity);

                                    $price = json_decode($item->price);
                                    $priceStr = implode(', ', $price);

                                    $weight = json_decode($item->weight);
                                    $weightStr = !empty($weight) ? implode(', ', $weight) : '';

                                    $size = json_decode($item->size);
                                    $sizeStr = implode(', ', $size);

                                    $colors = json_decode($item->color);
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
                                                {{ $item->productDetails->title }}
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $sizeStr }}</td>
                                    <td>{{ $weightStr }}</td>
                                    <td>
                                        <div class="row">
                                            @foreach ($colors as $color)
                                                <span
                                                    style="display: block; width: 25px; height: 25px; margin: 4px; background-color: {{ $color }}"
                                                    class="rounded">
                                                </span>
                                            @endforeach
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-primary text-light">
                                            {{ $item->status == 1 ? 'Active' : 'In-active' }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a class="btn btn-sm btn-primary text-white"
                                                href="{{ route('edit_variation', $item->id) }}">Edit</a>
                                            <a class="btn btn-sm btn-danger text-white"
                                                href="{{ route('delete_variation', $item->id) }}">Delete</a>
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
            // init data table
            $('#table').DataTable();
        });
    </script>
@endsection
