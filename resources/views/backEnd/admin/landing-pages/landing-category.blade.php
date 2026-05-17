@extends('backEnd.admin.layouts.master')

@section('title', 'Landing Categories')

@section('body')

    <div class="dashboard-wrapper">
        <div class="dashboard-ecommerce">
            <div class="container-fluid dashboard-content">
                <!-- pageheader -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Landing Categories</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}" class="breadcrumb-link">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Landing Categories</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <button class="btn btn-success btn-sm mb-3 add-btn">
                            <i class="fas fa-plus"></i> Add Category
                        </button>
                        <div class="card">
                            <div class="card-body table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 10%">SL</th>
                                            <th style="width: 30%">Title</th>
                                            <th style="width: 30%">Slug</th>
                                            <th style="width: 10%">Status</th>
                                            <th class="text-center" style="width: 20%">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php($i = 1)
                                        @forelse($categories as $item)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $item->title }}</td>
                                                <td>{{ $item->slug }}</td>
                                                <td>
                                                    @if ($item->status == 1)
                                                        <span class="badge badge-success">Active</span>
                                                    @else
                                                        <span class="badge badge-danger">Inactive</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <button class="btn btn-info btn-sm mb-1 edit-btn"
                                                        data-id="{{ $item->id }}" data-title="{{ $item->title }}"
                                                        data-status="{{ $item->status }}">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </button>
                                                    <a href="{{ route('admin.landing.category.delete', $item->id) }}"
                                                        class="btn btn-danger btn-sm mb-1"
                                                        onclick="return confirm('Delete this?')">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center text-danger fw-bold">No Data Found!</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Add Modal --}}
    <div class="modal fade" id="add-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ route('admin.landing.category.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">

                        <div class="form-group mb-3">
                            <label class="form-label required">Title</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label required">Status</label>
                            <select name="status" class="form-control">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success">Save</button>

                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Edit Modal --}}
    <div class="modal fade" id="edit-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ route('admin.landing.category.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="id_e">

                    <div class="modal-body">

                        <div class="form-group mb-3">
                            <label class="form-label required">Title</label>
                            <input type="text" name="title" id="title_e" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label required">Status</label>
                            <select name="status" id="status_e" class="form-control">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success btn-sm">Update</button>

                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $(".add-btn").click(function() {
                $("#add-modal").modal('show');
            });

            $(".edit-btn").click(function() {
                $("#id_e").val($(this).data("id"));
                $("#title_e").val($(this).data("title"));
                $("#status_e").val($(this).data("status"));
                $("#edit-modal").modal('show');
            });
        });
    </script>
@endsection
