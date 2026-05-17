@extends('backEnd.admin.layouts.master')

@section('title', 'Landing Themes')

@section('body')

    <div class="dashboard-wrapper">
        <div class="dashboard-ecommerce">
            <div class="container-fluid dashboard-content">
                <!-- pageheader -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Landing Themes</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}" class="breadcrumb-link">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Landing Themes</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <button class="btn btn-success btn-sm mb-3 add-btn">
                            <i class="fas fa-plus"></i> Add Theme
                        </button>
                        <div class="card">
                            <div class="card-body table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%">SL</th>
                                            <th style="width: 15%">Image</th>
                                            <th style="width: 25%">Title</th>
                                            <th style="width: 20%">Category</th>
                                            <th style="width: 20%">Slug</th>
                                            <th class="text-center" style="width: 15%">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php($i = 1)
                                        @forelse ($themes as $item)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>
                                                    @if ($item->imageFile)
                                                        <img src="{{ asset($item->imageFile->file_url) }}" width="80" class="rounded">
                                                    @endif
                                                </td>
                                                <td>{{ $item->title }}</td>
                                                <td>{{ optional($item->category)->title }}</td>
                                                <td>{{ $item->slug }}</td>
                                                <td class="text-center">
                                                    <button class="btn btn-info btn-sm mb-1 edit-btn"
                                                        data-id="{{ $item->id }}" data-title="{{ $item->title }}"
                                                        data-category_id="{{ $item->category_id }}"
                                                        data-image="{{ $item->imageFile ? asset($item->imageFile->file_url) : '' }}">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </button>
                                                    <a href="{{ route('admin.landing.theme.delete', $item->id) }}"
                                                        class="btn btn-danger btn-sm mb-1"
                                                        onclick="return confirm('Delete this?')">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-danger text-center fw-bold">No Data Found!</td>
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
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Add Theme</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ route('admin.landing.theme.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

                        <div class="form-group mb-3">
                            <label class="form-label required">Title</label>
                            <input type="text" class="form-control" name="title" required>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label required">Category</label>
                            <select name="category_id" class="form-control">
                                @foreach ($categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label">Image</label>
                            <input type="file" name="image" class="form-control-file">
                        </div>

                        <button type="submit" class="btn btn-success btn-sm">Save</button>

                    </div>
                </form>

            </div>
        </div>
    </div>


    {{-- Edit Modal --}}
    <div class="modal fade" id="edit-modal">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Edit Theme</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ route('admin.landing.theme.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="id" id="id_e">

                    <div class="modal-body">

                        <div class="form-group mb-3">
                            <label class="form-label required">Title</label>
                            <input type="text" class="form-control" name="title" id="title_e" required>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label required">Category</label>
                            <select name="category_id" id="category_id_e" class="form-control">
                                @foreach ($categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- IMAGE PREVIEW --}}
                        <div class="mb-3">
                            <label>Current Image</label>
                            <div id="edit-image-preview"></div>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label">Image (Optional)</label>
                            <input type="file" name="image" class="form-control-file">
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
                $("#category_id_e").val($(this).data("category_id"));

                let imageUrl = $(this).data("image");

                if (imageUrl) {
                    $("#edit-image-preview").html(`
                    <img src="${imageUrl}" width="120" class="rounded border">
                `);
                } else {
                    $("#edit-image-preview").html(`<span class="text-muted">No Image</span>`);
                }

                $("#edit-modal").modal('show');
            });

        });
    </script>
@endsection
