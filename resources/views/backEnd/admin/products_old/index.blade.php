@extends('backEnd.admin.layouts.master')

@section('title')
    Products
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('backEnd/assets/vendor/summernote/css/summernote-bs4.css') }}">
@endsection

@section('body')
    <div class="dashboard-wrapper">
        <div class="dashboard-ecommerce">
            <div class="container-fluid dashboard-content ">
                <!-- ============================================================== -->
                <!-- pageheader  -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Products</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a
                                                href="{{ Auth::guard('admin')->check() ? route('admin.home') : (Auth::guard('manager')->check() ? route('manager.home') : (Auth::guard('employee')->check() ? route('employee.home') : '')) }}"
                                                class="breadcrumb-link">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Products</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader  -->
                <!-- ============================================================== -->

                <div class="row mb-3">
                    <div class="col-12">
                        <a href="{{ route('admin.product.create') }}" class="btn btn-success btn-sm">Add Product</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body border-bottom py-3">
                                <div class="d-flex justify-content-end">
                                    <form action=""
                                        class="d-flex flex-md-row flex-column align-items-end justify-content-end">
                                        <input type="text"
                                            class="form-control form-control-sm small-search mb-md-0 mb-1 mr-md-1"
                                            name="query" aria-label="Search..." placeholder="Type Here..."
                                            value="{{ request()->query('query') }}">
                                        <div class="mb-md-0 mb-1 d-flex">
                                            <button class="btn btn-info btn-sm mr-1" type="submit">Search</button>
                                            <a href="{{ route('admin.product') }}"
                                                class="btn btn-dark btn-sm d-flex align-items-center justify-content-center"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-refresh">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4" />
                                                    <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4" />
                                                </svg></a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card-body table-responsive">
                                <table class="table table-bordered table-striped text-center">
                                    <thead>
                                        <tr>
                                            <td>SL.</td>
                                            <td>Image</td>
                                            <td>Product Name</td>
                                            <td>Category Name</td>
                                            <td>Position</td>
                                            <td>SKU</td>
                                            <td>Stock</td>
                                            <td>Price</td>
                                            <td>Sale Price</td>
                                            <td>Attributes</td>
                                            <td>Free Delivery?</td>
                                            <td>Status</td>
                                            <td>Actions</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php($i = 1)
                                        @if ($data->count() > 0)
                                            @foreach ($data as $item)
                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td>
                                                        <img width="30"
                                                            src="{{ $item->get_thumb ? asset($item->get_thumb->file_url) : asset('frontEnd/images/no_image.png') }}"
                                                            alt="">
                                                    </td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>
                                                        @foreach ($item->get_categories as $key => $cat)
                                                            {{ $key != 0 ? ', ' : '' }}{{ $cat->category_name }}
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @if (Auth::guard('admin')->check())
                                                            <div class="d-flex align-items-center">
                                                                <input type="number"
                                                                    class="form-control form-control-sm mr-1"
                                                                    value="{{ $item->position }}" min="1"
                                                                    name="new_stock">
                                                                <i class="fa fa-check position_update_btn"
                                                                    style="cursor:pointer;"
                                                                    data-product_id="{{ $item->id }}"></i>
                                                            </div>
                                                        @endif
                                                    </td>
                                                    <td>{{ $item->sku }}</td>
                                                    <td>{{ $item->stock }}</td>
                                                    <td>{{ $web_settings->currency_sign }} {{ $item->price }}</td>
                                                    <td>{{ $web_settings->currency_sign }} {{ $item->sale_price }}</td>
                                                    <td class="text-left">
                                                        @if ($item->has_variant)
                                                            @foreach ($item->get_choice_attributes as $key => $attribute)
                                                                <b>{{ Str::ucfirst($attribute->get_attribute->title) }}:
                                                                </b>
                                                                @foreach ($attribute->get_choice_attribute_items as $key2 => $item_val)
                                                                    {{ $key2 > 0 ? ', ' : '' }}{{ $item_val->attribute_item_name }}
                                                                @endforeach
                                                                <br>
                                                            @endforeach
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($item->is_free_delivery == 1)
                                                            <a onclick="return confirm('Do you want to change status?')"
                                                                href="{{ Auth::guard('admin')->check() ? route('admin.product.free.shipping.status', [$item->id, 0]) : (Auth::guard('manager')->check() ? route('manager.product.free.shipping.status', [$item->id, 0]) : '') }}"
                                                                class="badge badge-success">Yes</a>
                                                        @elseif($item->is_free_delivery == 0)
                                                            <a onclick="return confirm('Do you want to change status?')"
                                                                href="{{ Auth::guard('admin')->check() ? route('admin.product.free.shipping.status', [$item->id, 1]) : (Auth::guard('manager')->check() ? route('manager.product.free.shipping.status', [$item->id, 1]) : '') }}"
                                                                class="badge badge-danger">No</a>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($item->status == 1)
                                                            <span class="badge badge-success">Published</span>
                                                        @else
                                                            <span class="badge badge-danger">Unpublished</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ Auth::guard('admin')->check() ? route('admin.product.edit', $item->id) : (Auth::guard('manager')->check() ? route('manager.product.edit', $item->id) : '') }}"
                                                            class="mr-1">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <a href="{{ Auth::guard('admin')->check() ? route('admin.product.delete', $item->id) : (Auth::guard('manager')->check() ? route('manager.product.delete', $item->id) : '') }}"
                                                            onclick="return confirm('Are You Sure To Delete This?')"><i
                                                                class="fa fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="13" class="text-center text-danger font-weight-bold">No Data
                                                    Found!</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>

                                <div class="mt-3">
                                    {{ $data->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- add modal --}}
    <div class="modal fade" id="add_prod" tabindex="-1" data-backdrop="static" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add New Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form
                        action="{{ Auth::guard('admin')->check() ? route('admin.product.store') : (Auth::guard('manager')->check() ? route('manager.product.store') : '') }}"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6 col-12">
                                <label for="category_id">Product Category <span class="text-danger">*</span></label>
                                <select name="category_id[]" id="category_id" class="form-control select2" multiple
                                    required>
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6 col-12">
                                <label for="price">Regular Price <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="price" name="price" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6 col-12">
                                <label for="name">Product Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>

                            <div class="form-group col-md-6 col-12">
                                <label for="sale_price">Sale Price</label>
                                <input type="text" class="form-control" id="sale_price" name="sale_price"
                                    min="0" value="0">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6 col-12">
                                <label for="sku">SKU <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="sku" name="sku" required>
                                <span class="text-danger" id="error_msg"></span>
                            </div>

                            <div class="form-group col-md-6 col-12">
                                <label for="stock">Stock</label>
                                <input type="number" name="stock" id="stock" class="form-control" min="0"
                                    value="0">
                            </div>

                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6 col-12">
                                <label for="image">Feature Image</label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label for="gallery_image">Gallery Image</label>
                                <input type="file" class="form-control" id="gallery_image" name="gallery_image[]"
                                    multiple>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-12"
                                style="border: 1px solid #ddd;margin: 10px 0;border-radius: 5px">
                                <h4 class="mb-1">Attributes</h4>
                                <div class="form-row">
                                    @foreach ($attributes as $key => $attribute)
                                        <div class="form-group col-md-3 col-12">
                                            <label class="text-capitalize"
                                                for="attribute_item_id{{ $key }}">{{ $attribute->title }}</label>
                                            <input type="checkbox" name="attribute_id[]" class="attribute_id"
                                                value="{{ $attribute->id }}">
                                            <select name="attribute_item_id[]" id="attribute_item_id{{ $key }}"
                                                class="form-control select2" disabled required multiple>
                                                @foreach ($attribute->get_attribute_items as $att_item)
                                                    <option value="{{ $att_item->id }}">{{ $att_item->item_title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-12">
                                <label for="description">Product Description</label>
                                <textarea name="description" id="description" class="summernote"></textarea>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6 col-12">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1">Published</option>
                                    <option value="0">Unpublished</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group text-center mt-2">
                            <input type="submit" class="btn btn-success" id="form_add_btn" value="Add">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('backEnd/assets/vendor/summernote/js/summernote-bs4.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.summernote').summernote();
            $('.select2').select2();

            //attribute
            $('.attribute_id').on('click', function() {
                if ($(this).is(':checked', true)) {
                    $(this).parent().find('select').prop('disabled', false);
                } else {
                    $(this).parent().find('select').prop('disabled', true);
                }
            });

            $('#sku').on('keyup', function() {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: '{{ route('admin.product.sku_check') }}',
                    type: 'POST',
                    data: {
                        _token: CSRF_TOKEN,
                        sku: $(this).val()
                    },
                    success: function(data) {
                        if (data == 'found') {
                            $('#form_add_btn').prop('disabled', true);
                            $('#error_msg').text('Already Exist!')
                        } else {
                            $('#form_add_btn').prop('disabled', false);
                            $('#error_msg').empty();
                        }
                    }
                });
            });

            $(document).on('click', '.position_update_btn', function() {
                var position = $(this).siblings().val();
                var product_id = $(this).data('product_id');

                var CSRF_TOKEN = `{{ csrf_token() }}`;
                $.ajax({
                    url: '{{ route('admin.product.position_update') }}',
                    type: 'POST',
                    data: {
                        _token: CSRF_TOKEN,
                        position: position,
                        product_id: product_id
                    },
                    success: function(data) {
                        if (data == 1) {
                            toastr.options = {
                                "positionClass": "toast-bottom-right"
                            };
                            toastr.success("Stock Updated Successfully");
                        } else {
                            toastr.options = {
                                "positionClass": "toast-bottom-right"
                            };
                            toastr.error("Something Went Wrong");
                        }
                    }
                });

            });
        });
    </script>
@endsection
