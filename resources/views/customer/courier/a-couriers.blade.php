@php
    $title = 'Customer Couriers';
@endphp
@section('page_css')
    <style>
        .card-image {
            max-height: 250px;
            overflow: hidden;
        }
    </style>
@endsection
@extends('layouts.app')

@section('page_content')
    <div class="col-12">
        <div class="card">
            <div class="card-header py-2">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h3 class="mb-0">{{ $title }}</h3>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach ($couriers as $key => $item)
                        @php
                            $logo = empty($item->logo) ? asset('assets/images/others/error.png') : asset('storage/' . $item->logo);
                        @endphp
                        <div class="col-lg-3 col-md-4">
                            <div class="card shadow">
                                <div class="card-image">
                                    <img class="img-fluid rounded" src="{{ $logo }}" alt="">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->name }}</h5>
                                    <div class="align-items-center">
                                        <a class="btn btn-sm btn-primary text-white" data-toggle="modal"
                                            data-target="#editModal_{{ $item->id }}">Configure</a>
                                        <!-- Modal Start-->
                                        <div class="modal fade" id="editModal_{{ $item->id }}" tabindex="-1"
                                            aria-labelledby="editModalLabel_{{ $item->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4>Configure {{ $item->name }}</h4>
                                                        <button type="button" class="close" data-dismiss="modal">
                                                            <i class="anticon anticon-close"></i>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-left">
                                                        <form action="{{ route('a-couriers.store', $item->id) }}"
                                                            method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="" class="form-label">API
                                                                    Key<span class="text-danger"><sup>*</sup></span>
                                                                    :</label>
                                                                <input type="text" name="api_key" placeholder="api key"
                                                                    id="" class="form-control" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="" class="form-label">API
                                                                    Secret<span class="text-danger"><sup>*</sup></span>
                                                                    :</label>
                                                                <input type="text" name="api_secret"
                                                                    placeholder="api secret" id=""
                                                                    class="form-control" required>
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
                                        <!-- Modal End-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
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
