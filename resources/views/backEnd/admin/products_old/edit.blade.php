@extends('backEnd.admin.layouts.master')

@section('title')
    Product Edit
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
                            <h2 class="pageheader-title">Product Edit</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a
                                                href="{{ Auth::guard('admin')->check() ? route('admin.home') : (Auth::guard('manager')->check() ? route('manager.home') : (Auth::guard('employee')->check() ? route('employee.home') : '')) }}"
                                                class="breadcrumb-link">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Product Edit</li>
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
                            action="{{ Auth::guard('admin')->check() ? route('admin.product.update', $data->id) : (Auth::guard('manager')->check() ? route('manager.product.update', $data->id) : '') }}"
                            method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="thumb_old" value="{{ $data->thumb }}">
                            <input type="hidden" name="image_old" value="{{ $data->image }}">
                            <input type="hidden" name="gallery_images_old" value="{{ $data->gallery_images }}">
                            <input type="hidden" name="size_chart_old" value="{{ $data->size_chart }}">
                            <div class="form-row">
                                <div class="form-group col-md-6 col-12">
                                    @php
                                        $prod_cat = explode(',', $prod_cat);
                                    @endphp
                                    <label for="category_id_e">Product Category <span class="text-danger">*</span></label>
                                    <select name="category_id[]" id="category_id_e" class="form-control select2" multiple
                                        required>
                                        @foreach ($categories as $key => $item)
                                            <option value="{{ $key }}"
                                                {{ in_array($key, $prod_cat) ? 'selected' : '' }}>{{ $item }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-6 col-12">
                                    <label for="price_e">Regular Price <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="price" name="price"
                                        value="{{ $data->price }}" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6 col-12">
                                    <label for="name_e">Product Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="name_e" name="name"
                                        value="{{ $data->name }}" required>
                                    <input type="hidden" name="old_name" value="{{ $data->name }}">
                                    <input type="hidden" name="old_slug" value="{{ $data->slug }}">
                                </div>

                                <div class="form-group col-md-6 col-12">
                                    <label for="sale_price_e">Sale Price</label>
                                    <input type="text" class="form-control" id="sale_price" name="sale_price"
                                        value="{{ $data->sale_price ?? 0 }}">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6 col-12">
                                    <label for="sku_e">SKU <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="sku_e" name="sku"
                                        value="{{ $data->sku }}" required>
                                    <input type="hidden" id="sku_o" value="{{ $data->sku }}">
                                    <span class="text-danger" id="error_msg"></span>
                                </div>

                                <div class="form-group col-md-6 col-12">
                                    <label for="stock_e">Stock</label>
                                    <input type="number" name="stock" id="stock_e" class="form-control"
                                        value="{{ $data->stock ?? 0 }}">
                                </div>

                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6 col-12">
                                    <label for="image_e">Feature Image</label>

                                    <div class="mb-2">
                                        <img width="50"
                                            src="{{ $data->get_thumb ? asset($data->get_thumb->file_url) : asset('frontEnd/images/no_image.png') }}"
                                            alt="">
                                    </div>

                                    <input type="file" class="form-control" id="image_e" name="image">
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label for="gallery_image_e">Gallery Image</label>
                                    <div class="mb-2">
                                        @foreach ($data->images as $photo)
                                            <img width="50"
                                                src="{{ $photo ? asset($photo) : asset('frontEnd/images/no_image.png') }}"
                                                alt="">
                                        @endforeach
                                    </div>

                                    <input type="file" class="form-control" id="gallery_image_e"
                                        name="gallery_image[]" multiple>
                                </div>

                                <div class="form-group col-md-6 col-12">
                                    <label for="size_chart">Size Chart Image</label>

                                    <div class="mb-2">
                                        <img height="100"
                                            src="{{ $data->get_size_chart ? asset($data->get_size_chart->file_url) : asset('frontEnd/images/no_image.png') }}"
                                            alt="">
                                    </div>

                                    <input type="file" class="form-control" id="size_chart" name="size_chart">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-12"
                                    style="border: 1px solid #ddd;margin: 10px 0;border-radius: 5px">
                                    <h4 class="mb-1">Attributes</h4>

                                    <div class="form-row attribute-row" id="product-attributes">
                                        <input type="hidden" name="v_price" id="v_price">
                                        <input type="hidden" name="h_sku" id="h_sku">
                                        <input type="hidden" name="id" value="{{ $data->id }}">
                                        @php
                                            $selected_attributes = $data->get_choice_attributes
                                                ->pluck('attribute_id')
                                                ->toArray();
                                            $selected_attribute_items = $data->get_choice_attribute_items
                                                ->pluck('attribute_item_id')
                                                ->toArray();
                                        @endphp
                                        {{-- @dd($selected_attributes, $selected_attribute_items) --}}
                                        @foreach ($attributes as $key => $attribute)
                                            <div class="form-group col-md-3 col-12">
                                                <label class="text-capitalize"
                                                    for="attribute_item_id{{ $key }}">{{ $attribute->title }}</label>
                                                <input type="checkbox" data-is_image="{{ $attribute->is_image }}"
                                                    class="attribute_id" value="{{ $attribute->id }}"
                                                    {{ in_array($attribute->id, $selected_attributes) ? 'checked' : '' }}>
                                                <select name="attribute[{{ $attribute->id }}][]"
                                                    id="attribute_item_id{{ $key }}"
                                                    class="form-control select2 attribute_item_id"
                                                    {{ in_array($attribute->id, $selected_attributes) ? '' : 'disabled' }}
                                                    multiple required>
                                                    @foreach ($attribute->get_attribute_items as $att_item)
                                                        <option value="{{ $att_item->id }}"
                                                            data-name="{{ $att_item->item_title }}"
                                                            {{ in_array($att_item->id, $selected_attribute_items) ? 'selected' : '' }}>
                                                            {{ $att_item->item_title }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="card attribute-div">
                                        <div class="card-header">
                                            <h5 class="mb-0">Attribute Image</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row attribute-image-container">
                                                {{-- @if (count($data->get_choice_attributes) > 0)
                                                    @foreach ($data->get_choice_attributes as $attribute)
                                                        @if ($attribute->get_attribute->is_image)
                                                            <div class="col-md-4">
                                                                <h5 class="text-capitalize">
                                                                    {{ $attribute->get_attribute->title }}
                                                                </h5>
                                                                @foreach ($attribute->get_choice_attribute_items as $key => $item)
                                                                    <div class="form-group">
                                                                        <label
                                                                            for="attribute_images{{ $attribute->get_attribute->id }}_{{ $item->attribute_item_id }}"
                                                                            class="form-label">{{ $item->attribute_item_name }}</label>
                                                                        <br>
                                                                        @if (isset($item->image))
                                                                            <img class="mb-2"
                                                                                src="{{ asset($item->image) }}"
                                                                                height="50" width="50"
                                                                                alt="">
                                                                        @endif
                                                                        <input type="hidden"
                                                                            name="attribute_images_old[{{ $attribute->get_attribute->id }}][{{ $item->attribute_item_id }}]"
                                                                            value="{{ $item->image ?? '' }}">
                                                                        <input type="file" class="form-control"
                                                                            id="attribute_images{{ $attribute->get_attribute->id }}_{{ $item->attribute_item_id }}"
                                                                            name="attribute_images[{{ $attribute->get_attribute->id }}][{{ $item->attribute_item_id }}]">
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                @endif --}}

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-10 col-12" id="attribute-table-put">
                                            @if (count($data->get_variants) > 0)
                                                <table class="table table-bordered my-2">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">
                                                                Attributes
                                                            </th>
                                                            <th class="text-center">
                                                                Price
                                                            </th>
                                                            <th class="text-center">
                                                                SKU
                                                            </th>
                                                            <th class="text-center">
                                                                Quantity
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($data->get_variants as $key => $combination)
                                                            <tr class="variant">
                                                                <td class="text-center">
                                                                    <label for=""
                                                                        class="control-label">{{ $combination->variant }}</label>
                                                                    <input type="hidden" name="variant_name[]"
                                                                        value="{{ $combination->variant }}">
                                                                </td>
                                                                <td>
                                                                    <input type="number" name="variant_price[]"
                                                                        value="{{ $combination->price ?? 0 }}"
                                                                        min="0" step="0.01"
                                                                        class="form-control auto-select-number" required>
                                                                </td>
                                                                <td>
                                                                    <input type="text" name="variant_sku[]"
                                                                        value="{{ $combination->sku }}"
                                                                        class="form-control">
                                                                </td>
                                                                <td>
                                                                    <input type="number" lang="en"
                                                                        name="variant_stock[]"
                                                                        value="{{ $combination->stock }}" min="0"
                                                                        step="1"
                                                                        class="form-control auto-select-number" required>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-12">
                                    <label for="description_e">Product Description</label>
                                    <textarea name="description" id="description_e" class="summernote">
                                        {!! $data->description !!}
                                    </textarea>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6 col-12">
                                    <label for="status_e">Status</label>
                                    <select name="status" id="status_e" class="form-control">
                                        <option value="1" {{ $data->status == 1 ? 'selected' : '' }}>Published
                                        </option>
                                        <option value="0" {{ $data->status == 0 ? 'selected' : '' }}>Unpublished
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 text-center">
                                    <input type="submit" value="Update" id="form_update_btn" class="btn btn-success">
                                </div>
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

            $('#is_sp_sm').on('click', function() {
                if ($(this).is(':checked', true)) {
                    $('#inside_dhaka').prop('disabled', false);
                    $('#outside_dhaka').prop('disabled', false);
                } else {
                    $('#inside_dhaka').prop('disabled', true);
                    $('#outside_dhaka').prop('disabled', true);
                }
            });

            $('#sku_e').on('keyup', function() {
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
                            update_sku();
                        }
                    });
                }
            });

            function update_sku() {
                //$('#v_prod_name').val($('#name').val());
                if ($('#sale_price').val() > 0) {
                    $('#v_price').val($('#sale_price').val());
                } else {
                    $('#v_price').val($('#price').val());
                }
                $('#h_sku').val($('#sku_e').val());

                var CSRF = `{{ csrf_token() }}`;
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}",
                    },
                    type: "POST",
                    url: `{{ route('admin.product.ajax.get.combined.attributes.edit') }}`,
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
                    url: `{{ route('admin.product.ajax.get.color.image.edit') }}`,
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
            updateAttributeImages();

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
