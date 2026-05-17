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
                                            <td>Flag</td>
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
                                                        {{-- @dd($item->get_categories) --}}
                                                        @foreach ($item->get_categories as $key => $cat)
                                                            {{ $key != 0 ? ', ' : '' }}{{ $cat->category_name }}
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @if (Auth::guard('admin')->check())
                                                            <div class="d-flex align-items-center">
                                                                <input type="number"
                                                                    class="form-control form-control-sm mr-1"
                                                                    style="width: 70px;"
                                                                    value="{{ $item->position }}" min="1" max="999"
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
                                                    <td class="text-left" style="width: 135px">
                                                        <div class="custom-control custom-switch mb-1">
                                                            <input type="checkbox" class="custom-control-input product-flag-switch"
                                                                id="is_featured_{{ $item->id }}"
                                                                data-product_id="{{ $item->id }}"
                                                                data-field="is_featured"
                                                                {{ $item->is_featured == 1 ? 'checked' : '' }}>
                                                            <label class="custom-control-label"
                                                                for="is_featured_{{ $item->id }}">Feature?</label>
                                                        </div>
                                                        <div class="custom-control custom-switch mb-1">
                                                            <input type="checkbox" class="custom-control-input product-flag-switch"
                                                                id="is_best_sell_{{ $item->id }}"
                                                                data-product_id="{{ $item->id }}"
                                                                data-field="is_best_sell"
                                                                {{ $item->is_best_sell == 1 ? 'checked' : '' }}>
                                                            <label class="custom-control-label"
                                                                for="is_best_sell_{{ $item->id }}">Best Seller?</label>
                                                        </div>
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input product-flag-switch"
                                                                id="is_new_product_{{ $item->id }}"
                                                                data-product_id="{{ $item->id }}"
                                                                data-field="is_new_product"
                                                                {{ $item->is_new_product == 1 ? 'checked' : '' }}>
                                                            <label class="custom-control-label"
                                                                for="is_new_product_{{ $item->id }}">New Arrival?</label>
                                                        </div>
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
                                                <td colspan="14" class="text-center text-danger font-weight-bold">No Data
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

            $(document).on('change', '.product-flag-switch', function() {
                var self = $(this);
                var value = self.is(':checked') ? 1 : 0;
                var product_id = self.data('product_id');
                var field = self.data('field');

                $.ajax({
                    url: '{{ Auth::guard('admin')->check() ? route('admin.product.flag_update') : (Auth::guard('manager')->check() ? route('manager.product.flag_update') : '') }}',
                    type: 'POST',
                    data: {
                        _token: `{{ csrf_token() }}`,
                        product_id: product_id,
                        field: field,
                        value: value
                    },
                    success: function(response) {
                        toastr.options = {
                            "positionClass": "toast-bottom-right"
                        };
                        toastr.success(response.message || 'Flag updated successfully');
                    },
                    error: function() {
                        self.prop('checked', !value);
                        toastr.options = {
                            "positionClass": "toast-bottom-right"
                        };
                        toastr.error('Failed to update flag');
                    }
                });
            });
        });
    </script>
@endsection
