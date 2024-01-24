@php
    $title = 'Categories';
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
                        <a href="{{ route('categories.create') }}" class="btn btn-primary" data-toggle="modal"
                            data-target="#createModal">Create Category</a>

                        <!-- Modal -->
                        <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4>Create Category</h4>
                                        <button type="button" class="close" data-dismiss="modal">
                                            <i class="anticon anticon-close"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body text-left">
                                        <form action="{{ route('categories.store') }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="" class="form-label">Title<span
                                                        class="text-danger"><sup>*</sup></span> :</label>
                                                <input type="text" name="title" placeholder="category title"
                                                    id="" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="form-label">Description:</label>
                                                <textarea name="description" id="" class="form-control" placeholder="category description"></textarea>
                                            </div>
                                            <div class="text-right">
                                                <button type="submit" class="btn btn-sm btn-primary">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                <th>Title</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ !empty($item->description) ? $item->description : '--' }}</td>
                                    <td>
                                        <span class="badge bg-primary text-light">
                                            {{ $item->status == 1 ? 'Active' : 'In-active' }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a class="btn btn-sm btn-primary text-white" data-toggle="modal"
                                                data-target="#editModal_{{ $item->id }}">Edit</a>
                                            <a href="#" class="btn btn-sm btn-danger"
                                                onclick="document.getElementById('delete-form-{{ $item->id }}').submit();">Delete</a>

                                            <form id="delete-form-{{ $item->id }}"
                                                action="{{ route('categories.destroy', $item->id) }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>

                                            <!-- Modal -->
                                            <div class="modal fade" id="editModal_{{ $item->id }}" tabindex="-1"
                                                aria-labelledby="editModalLabel_{{ $item->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4>Edit {{ $item->title }} Category</h4>
                                                            <button type="button" class="close" data-dismiss="modal">
                                                                <i class="anticon anticon-close"></i>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body text-left">
                                                            <form action="{{ route('categories.update', $item->id) }}"
                                                                method="post" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="form-group">
                                                                    <label for="" class="form-label">Title<span
                                                                            class="text-danger"><sup>*</sup></span> :</label>
                                                                    <input type="text" name="title" value="{{ $item->title }}"
                                                                        placeholder="category title" id=""
                                                                        class="form-control" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for=""
                                                                        class="form-label">Description:</label>
                                                                    <textarea name="description" id="" class="form-control" placeholder="category description">{{ $item->description }}</textarea>
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
