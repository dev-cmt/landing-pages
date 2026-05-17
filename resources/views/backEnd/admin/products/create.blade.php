@extends('backEnd.admin.layouts.master')

@section('title')
    Product Create
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
                            <h2 class="pageheader-title">Product Create</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a
                                                href="{{ Auth::guard('admin')->check() ? route('admin.home') : (Auth::guard('manager')->check() ? route('manager.home') : (Auth::guard('employee')->check() ? route('employee.home') : '')) }}"
                                                class="breadcrumb-link">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Product Create</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader  -->
                <!-- ============================================================== -->

                <div class="row mb-2">
                    <div class="col-12">
                        <a href="{{ route('admin.product') }}" class="btn btn-danger btn-sm">
                            <i class="fa fa-angle-double-left"></i>
                            Back
                        </a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
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
                                    <input type="number" class="form-control auto-select-number" id="price"
                                        name="price" value="0" min="1" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6 col-12">
                                    <label for="name">Product Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>

                                <div class="form-group col-md-6 col-12">
                                    <label for="sale_price">Sale Price</label>
                                    <input type="number" class="form-control auto-select-number" id="sale_price"
                                        name="sale_price" value="0">
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
                                {{-- <div class="form-group col-md-6 col-12">
                                    <label for="size_chart">Size Chart</label>
                                    <input type="file" class="form-control" id="size_chart" name="size_chart">
                                </div> --}}
                            </div>

                            {{-- <div class="form-row" id="product-attributes">
                                <div class="form-group col-12" style="border: 1px solid #ddd;margin: 10px 0;border-radius: 5px">
                                    <h4 class="mb-1">Attributes</h4>
                                    <div class="form-row">
                                        @foreach ($attributes as $key => $attribute)
                                            <div class="form-group col-md-3 col-12">
                                                <label class="text-capitalize" for="attribute_item_id{{$key}}">{{$attribute->title}}</label>
                                                <input type="checkbox" name="attribute_id[]" class="attribute_id" value="{{$attribute->id}}">
                                                <select name="attribute_item_id[]" id="attribute_item_id{{$key}}" class="form-control select2 attribute_item_id" disabled required multiple>
                                                    @foreach ($attribute->get_items as $att_item)
                                                        <option value="{{$att_item->id}}">{{$att_item->item_title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div> --}}

                            <div class="form-row" id="product-attributes">
                                <input type="hidden" name="v_price" id="v_price">
                                <input type="hidden" name="sku" id="h_sku">
                                <div class="form-group col-12 p-2"
                                    style="border: 1px solid #ddd;margin: 10px 0;border-radius: 5px">
                                    <h4 class="mb-1">Attributes</h4>
                                    <div class="form-row attribute-row">
                                        @foreach ($attributes as $key => $attribute)
                                            <div class="form-group col-md-3 col-12">
                                                <label class="text-capitalize"
                                                    for="attribute_item_id{{ $key }}">{{ $attribute->title }}</label>
                                                <input type="checkbox" data-is_image="{{ $attribute->is_image }}"
                                                    class="attribute_id" value="{{ $attribute->id }}">
                                                <select name="attribute[{{ $attribute->id }}][]"
                                                    id="attribute_item_id{{ $key }}"
                                                    class="form-control select2 attribute_item_id" multiple disabled
                                                    required>
                                                    @foreach ($attribute->get_attribute_items as $att_item)
                                                        <option data-name="{{ $att_item->item_title }}"
                                                            value="{{ $att_item->id }}">{{ $att_item->item_title }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="card attribute-div" style="display: none;">
                                        <div class="card-header">
                                            <h5 class="mb-0">Attribute Image</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row attribute-image-container">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-10 col-12" id="attribute-table-put"></div>
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
                                    <label for="video_url">Video URL</label>
                                    <input type="text" class="form-control" id="video_url" name="video_url">
                                </div>
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
    </div>
@endsection
@section('js')
    <script src="{{ asset('backEnd/assets/vendor/summernote/js/summernote-bs4.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 300
            });
            $('.select2').select2();

            //attribute
            $('.attribute_id').on('click', function() {
                if ($(this).is(':checked', true)) {
                    $(this).parent().find('select').prop('disabled', false);
                } else {
                    $(this).parent().find('select').prop('disabled', true);
                }
            });

            $('#is_sp_sm').on('click', function() {
                if ($(this).is(':checked', true)) {
                    $('#inside_dhaka').prop('disabled', false);
                    $('#outside_dhaka').prop('disabled', false);
                } else {
                    $('#inside_dhaka').prop('disabled', true);
                    $('#outside_dhaka').prop('disabled', true);
                }
            });

            $('#sku').on('keyup', function() {
                $('#h_sku').val($(this).val());
                if ($('#sku_o').val() != $(this).val()) {
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
                                $('#form_update_btn').prop('disabled', true);
                                $('#error_msg').text('Already Exist!')
                            } else {
                                $('#form_update_btn').prop('disabled', false);
                                $('#error_msg').empty();
                            }
                        }
                    });
                }
                update_sku();
            });

            function update_sku() {
                //$('#v_prod_name').val($('#name').val());
                if ($('#sale_price').val() > 0) {
                    $('#v_price').val($('#sale_price').val());
                } else {
                    $('#v_price').val($('#price').val());
                }

                var CSRF = `{{ csrf_token() }}`;
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}",
                    },
                    type: "POST",
                    url: `{{ route('admin.product.ajax.get.combined.attributes') }}`,
                    data: $("#product-attributes").find('select, input').serialize(),
                    success: function(data) {
                        if (data) {
                            //hide_sku_stock();
                            $('#attribute-table-put').empty().html(data);
                        } else {
                            //show_sku_stock();
                            $('#attribute-table-put').empty();
                        }
                    }
                });
            }

            function updateAttributeImages() {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}",
                    },
                    type: "POST",
                    url: `{{ route('admin.product.ajax.get.color.image') }}`,
                    data: $(".attribute-row").find('input ,select').serialize(),
                    success: function(data) {
                        if (data) {
                            $('.attribute-div').show();
                            $('.attribute-image-container').empty().html(data);
                        } else {
                            $('.attribute-div').hide();
                            $('.attribute-image-container').empty();
                        }
                    }
                });


            }

            $(document).on('change', '.attribute_item_id', function() {
                updateAttributeImages();
                update_sku();
            });

            $(document).on("click", ".auto-select-number", function() {
                if ($(this).val() <= 0) {
                    $(this).select();
                }
            });

            $('#price').on('keyup', function() {
                update_sku();
            });

            $('#sale_price').on('keyup', function() {
                update_sku();
            });
        });
    </script>
@endsection
