@php
    $title = 'Edit Variation';
@endphp
@extends('layouts.app')

@section('page_content')
    <div class="col-12" v-cloak>
        <div class="card">
            <div class="card-header py-2">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h3 class="mb-0">{{ $title }}</h3>
                    </div>
                    <div class="col-md-6 text-right">
                        <button @click.prevent="increaseForm" class="btn btn-primary btn-sm">+</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                {{-- alert --}}
                <x-alert />

                <form action="{{ route('edit_variation', $variations->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @php
                        $variations_price = json_decode($variations->price);
                        $total_variation = count($variations_price);
                    @endphp
                    <input type="hidden" value='{{ $total_variation }}' id="total-variation">
                    <input type="hidden" value='{{ $variations->id }}' id="variation-id">
                    <div v-for="(number, key) in loopcounter">
                        <div class="row">
                            <div v-if="number > 1" class="col-12 text-right mb-3">
                                <button @click.prevent="decreaseForm" class="btn btn-primary btn-sm">-</button>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="form-label">Price<span
                                            class="text-danger"><sup>*</sup></span>
                                        :</label>
                                    <input type="number" name="price[]" placeholder="price" id="" v-model="variation_price[key]"
                                        class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="form-label">Quantity<span
                                            class="text-danger"><sup>*</sup></span> :</label>
                                    <input type="number" name="quantity[]" placeholder="quantity" v-model="variation_quantity[key]"
                                        id="" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <p>
                                    If the product variant type is "Size," then "Color" is an optional choice and the same
                                    applies to "Color". Conversely, if the variant type is "Weight," then "Size" and "Color"
                                    will not be considered.
                                </p>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="form-label">Size:</label>
                                    <input type="text" name="size[]" id="" class="form-control" v-model="variation_size[key]">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="form-label">Color:</label>
                                    <span class="text-danger">(HEX Code with "#")</span>
                                    <input type="text" class="form-control" name="color[]" id=""
                                        title="Choose variant color" style="height: 40px" v-model="variation_color[key]">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="form-label">Weight:</label>
                                    <input type="text" name="weight[]" id="" class="form-control" v-model="variation_weight[key]">
                                </div>
                            </div>
                        </div>
                        <hr>
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
    <script src="{{ asset('assets/js/product/variation.js') }}"></script>
    <script>
        // init select2
        $('.select2').select2();
    </script>
@endsection
