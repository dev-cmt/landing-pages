@extends('backEnd.admin.layouts.master')

@section('title')
    Edit Order
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('/') }}backEnd/assets/vendor/datetimepicker/bootstrap-datetimepicker.min.css">
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
                            <h2 class="pageheader-title">Edit Order</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a
                                                href="{{ Auth::guard('admin')->check() ? route('admin.home') : (Auth::guard('manager')->check() ? route('manager.home') : (Auth::guard('employee')->check() ? route('employee.home') : '')) }}"
                                                class="breadcrumb-link">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Edit Order</li>
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
                        <a href="{{ Auth::guard('admin')->check() ? route('admin.orders') : (Auth::guard('manager')->check() ? route('manager.orders') : (Auth::guard('employee')->check() ? route('employee.orders') : '')) }}"
                            class="btn btn-danger btn-sm">
                            <i class="fa fa-angle-double-left"></i>
                            Back
                        </a>
                    </div>
                </div>
                <form
                    action="{{ Auth::guard('admin')->check() ? route('admin.orders.update', $data->id) : (Auth::guard('manager')->check() ? route('manager.orders.update', $data->id) : (Auth::guard('employee')->check() ? route('employee.orders.update', $data->id) : '')) }}"
                    method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="card">
                                <h4 class="card-header">Customer Info</h4>
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="form-group col-md-6 col-12">
                                            <label for="order_date">Order Date <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control datetimepicker" id="order_date"
                                                name="order_date"
                                                value="{{ date('d-m-Y', strtotime($data->order_date)) ?? null }}" required>
                                        </div>

                                        <div class="form-group col-md-6 col-12">
                                            <label for="invoice_id">Invoice ID <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="invoice_id" name="invoice_id"
                                                value="{{ $data->invoice_id ?? null }}" readonly required>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6 col-12">
                                            <label for="customer_name">Customer Name <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="customer_name"
                                                name="customer_name" value="{{ $data->customer_name ?? null }}" required>
                                        </div>

                                        <div class="form-group col-md-6 col-12">
                                            <label for="customer_phone">Customer Phone <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="customer_phone"
                                                name="customer_phone" value="{{ $data->customer_phone ?? null }}" required>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-12">
                                            <label for="customer_address">Customer Address <span
                                                    class="text-danger">*</span></label>
                                            <textarea name="customer_address" id="customer_address" class="form-control" required>{{ $data->customer_address ?? null }}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-12">
                                            <label for="courier_id">Courier Name</label>
                                            <select name="courier_id" id="courier_id" class="form-control select2">
                                                <option value="">Select A Courier</option>
                                                @foreach ($courier as $key => $item)
                                                    <option value="{{ $key }}"
                                                        {{ $data->courier_id == $key ? 'selected' : '' }}>
                                                        {{ $item }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-12">
                                            <label for="city_id">City Name</label>
                                            <select name="courier_city_id" id="city_id" class="form-control select2">
                                                @foreach ($courier_city as $key => $city)
                                                    <option value="{{ $key }}"
                                                        {{ $data->city_id == $key ? 'selected' : '' }}>{{ $city }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-12">
                                            <label for="zone_id">Zone Name</label>
                                            <select name="courier_zone_id" id="zone_id" class="form-control select2">
                                                @foreach ($courier_zone as $key => $zone)
                                                    <option value="{{ $key }}"
                                                        {{ $data->zone_id == $key ? 'selected' : '' }}>{{ $zone }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col">
                                            <label for="zone_id">Status</label>
                                            <select name="status" id="status" class="form-control" required>
                                                <option value="">Select Status</option>
                                                <option value="3" {{ $data->status == 3 ? 'selected' : '' }}>Pre Order
                                                </option>
                                                <option value="6" {{ $data->status == 6 ? 'selected' : '' }}>Pending
                                                </option>
                                                <option value="2" {{ $data->status == 2 ? 'selected' : '' }}>
                                                    Confirmed</option>
                                                <option value="0" {{ $data->status == 0 ? 'selected' : '' }}>Hold
                                                </option>
                                                <option value="7" {{ $data->status == 7 ? 'selected' : '' }}>Printed
                                                </option>
                                                <option value="8" {{ $data->status == 8 ? 'selected' : '' }}>On
                                                    Delivery</option>
                                                <option value="9" {{ $data->status == 9 ? 'selected' : '' }}>Excel
                                                </option>
                                                <option value="1" {{ $data->status == 1 ? 'selected' : '' }}>
                                                    Delivered</option>
                                                <option value="4" {{ $data->status == 4 ? 'selected' : '' }}>
                                                    Cancelled</option>
                                                <option value="10" {{ $data->status == 10 ? 'selected' : '' }}>Bkash
                                                </option>
                                                <option value="5" {{ $data->status == 5 ? 'selected' : '' }}>Returned
                                                </option>
                                            </select>
                                        </div>

                                        <div class="form-group col">
                                            <label for="source">Source <span class="text-danger">*</span> </label>
                                            <select name="source" id="source" class="form-control" required>
                                                @if ($data->source == 'direct')
                                                    <option {{ $data->source == 'direct' ? 'selected' : '' }}
                                                        {{ $data->source == 'direct' ? 'disabled' : '' }} value="direct">
                                                        Direct
                                                    </option>
                                                @elseif($data->source == 'incomplete')
                                                    <option {{ $data->source == 'incomplete' ? 'selected' : '' }}
                                                        {{ $data->source == 'incomplete' ? 'disabled' : '' }}
                                                        value="incomplete">
                                                        Incomplete
                                                    </option>
                                                @else
                                                    <option value="">Select Source</option>
                                                    <option {{ $data->source == 'call' ? 'selected' : '' }}
                                                        value="call">Call</option>
                                                    <option {{ $data->source == 'whatsapp' ? 'selected' : '' }}
                                                        value="whatsapp">Whatsapp</option>
                                                    <option {{ $data->source == 'page' ? 'selected' : '' }}
                                                        value="page">Page</option>
                                                    <option {{ $data->source == 'instagram' ? 'selected' : '' }}
                                                        value="instagram">Instagram</option>
                                                    <option {{ $data->source == 'office sale' ? 'selected' : '' }}
                                                        value="office sale">Office Sale</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="card">
                                <h4 class="card-header">Product Info</h4>
                                <div class="card-body">
                                    <div class="table-responsive mb-3">
                                        <table class="table table-bordered text-center">
                                            <thead>
                                                <tr>
                                                    <th class="text-left">SKU</th>
                                                    <th class="text-left">Product Name</th>
                                                    <th>Qty</th>
                                                    <th>Price</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody id="prod_row">
                                                @foreach ($data->get_products as $key => $item)
                                                    {{-- @dd($item->get_attribute) --}}
                                                    @if (isset($item->get_product) && $item->get_product->has_variant == 1)
                                                        <tr>
                                                            <?php
                                                            // dd(5);
                                                            $attribute_options = [];
                                                            $sku_check = false;
                                                            // @dd($item->backup_attribute);
                                                            if ($item->get_product->has_variant == 1 && is_array($item->attributes) && count($item->attributes) > 0) {
                                                                $attribute_options = $item->attributes;
                                                                // dd($attribute_options);
                                                                $variant = App\ProductAttribute::select('sku', 'stock', 'price')
                                                                    ->where([
                                                                        'product_id' => $item->product_id,
                                                                        'sku' => $item->product_sku,
                                                                    ])
                                                                    ->first();
                                                            
                                                                // dd($variant);
                                                                if ($variant) {
                                                                    $sku_check = true;
                                                                    $sku = $variant->sku;
                                                                    $stock = $variant->stock;
                                                                    $price = $variant->price;
                                                                } else {
                                                                    $sku_check = false;
                                                                    $sku = $item->get_product->sku;
                                                                    $stock = $item->get_product->stock;
                                                                    $price = $item->get_product->sale_price > 0 ? $item->get_product->sale_price : $item->get_product->price;
                                                                }
                                                            } else {
                                                                $sku_check = true;
                                                                $sku = $item->get_product->sku;
                                                                $stock = $item->get_product->stock;
                                                                $price = $item->get_product->sale_price > 0 ? $item->get_product->sale_price : $item->get_product->price;
                                                            }
                                                            ?>
                                                            <input type="hidden" value="1" class="stock_status">
                                                            <input type="hidden" name="product_id[]" id="product_id"
                                                                class="product_id" value="{{ $item->product_id }}">
                                                            <input type="hidden" name="product_sku[]" id="product_sku"
                                                                class="product_sku" value="{{ $sku }}">
                                                            <td class="text-left sku">
                                                                <span class="sku-name">{{ $sku }}</span>
                                                                <br>
                                                                <small
                                                                    class="text-success stock_in {{ $stock > 0 ? 'd-block' : 'd-none' }}">Stock
                                                                    In</small>
                                                                <small
                                                                    class="text-danger stock_out {{ $stock <= 0 ? 'd-block' : 'd-none' }}">Stock
                                                                    Out</small>
                                                            </td>
                                                            <td class="text-left">
                                                                {!! $sku_check == false
                                                                    ? '<span style="color:red;">' .
                                                                        \Illuminate\Support\Str::limit($item->get_product->name, 45) .
                                                                        ' (' .
                                                                        implode(', ', $attribute_options) .
                                                                        ')</span>'
                                                                    : \Illuminate\Support\Str::limit($item->get_product->name, 45) !!}
                                                                @if ($item->get_product->has_variant == 1)
                                                                    <br>
                                                                    @foreach ($item->get_product->get_choice_attributes as $attrKey => $item2)
                                                                        <small><b>{{ ucfirst($item2->get_attribute->title) }}:</b></small><br>

                                                                        <?php
                                                                        $choiceItems = $item2->get_choice_attribute_items ?? [];
                                                                        $variantOption = [];
                                                                        // @dd($item->backup_attribute);
                                                                        if (is_array($item->attributes) && count($item->attributes) > 0) {
                                                                            // dd($item->attributes);
                                                                            $variantOption = collect($item->attributes ?? [])
                                                                                ->map(function ($name) {
                                                                                    return strtolower($name);
                                                                                })
                                                                                ->toArray();
                                                                        }
                                                                        // dd($variantOption);
                                                                        ?>
                                                                        @foreach ($choiceItems as $optKey => $value)
                                                                            {{-- @dd($value) --}}
                                                                            <input type="radio"
                                                                                name="attribute_choice[{{ $sku }}][{{ $item2->get_attribute->title }}]"
                                                                                class="attr_checkbox"
                                                                                value="{{ $value->attribute_item_name }}"
                                                                                {{ in_array(str_replace(' ', '_', strtolower($value->attribute_item_name)), $variantOption) ? 'checked' : '' }}
                                                                                id="attribute_choice_{{ $sku }}{{ $attrKey }}{{ $optKey }}"
                                                                                required>

                                                                            <label class="mb-0 small"
                                                                                for="attribute_choice_{{ $sku }}{{ $attrKey }}{{ $optKey }}">
                                                                                {{ $value->attribute_item_name }}
                                                                            </label>
                                                                        @endforeach
                                                                        <br>
                                                                    @endforeach
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <input style="width: 60px;border: 1px solid #ddd;"
                                                                    min="1" type="number"
                                                                    class="form-control qty" name="qty[]"
                                                                    id="qty2" value="{{ $item->qty ?? 1 }}">
                                                                <input type="hidden" name="price[]" id="price"
                                                                    class="price" value="{{ $price }}">
                                                                <input type="hidden" name="total_price[]"
                                                                    class="total_price"
                                                                    value="{{ $price * ($item->qty ?? 1) }}">
                                                            </td>
                                                            <td class="total_price_display">
                                                                {{ $price * ($item->qty ?? 1) }}


                                                            </td>
                                                            <td><i class="fa fa-trash remove_btn text-danger"
                                                                    style="cursor: pointer"></i></td>
                                                        </tr>
                                                    @else
                                                        <tr>

                                                            <input type="hidden" value="1" class="stock_status">
                                                            <input type="hidden" name="product_id[]" id="product_id"
                                                                class="product_id" value="{{ $item->product_id }}">
                                                            <input type="hidden" name="product_sku[]" id="product_sku"
                                                                class="product_sku"
                                                                value="{{ $item->get_product->sku }}">
                                                            <td class="text-left sku">
                                                                <span
                                                                    class="sku-name">{{ $item->get_product->sku }}</span>
                                                                <br>
                                                                {{-- <small
                                                                    class="text-success stock_in {{ $stock > 0 ? 'd-block' : 'd-none' }}">Stock
                                                                    In</small>
                                                                <small
                                                                    class="text-danger stock_out {{ $stock <= 0 ? 'd-block' : 'd-none' }}">Stock
                                                                    Out</small> --}}
                                                            </td>
                                                            <td class="text-left">
                                                                {{ \Illuminate\Support\Str::limit($item->get_product->name, 45) }}

                                                            </td>
                                                            <td>
                                                                <input style="width: 60px;border: 1px solid #ddd;"
                                                                    min="1" type="number"
                                                                    class="form-control qty" name="qty[]"
                                                                    id="qty2" value="{{ $item->qty ?? 1 }}">
                                                                <input type="hidden" name="price[]" id="price"
                                                                    class="price" value="{{ $item->price }}">
                                                                <input type="hidden" name="total_price[]"
                                                                    class="total_price"
                                                                    value="{{ $item->price * ($item->qty ?? 1) }}">
                                                            </td>
                                                            <td class="total_price_display">
                                                                {{ $item->price * ($item->qty ?? 1) }}


                                                            </td>
                                                            <td><i class="fa fa-trash remove_btn text-danger"
                                                                    style="cursor: pointer"></i></td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                            <tbody>
                                                <tr>
                                                    <td colspan="5">
                                                        <div class="form-row">
                                                            <div class="form-group col-12 text-left">
                                                                {{-- @dd($order_products); --}}
                                                                <select id="product" class="form-control select2">
                                                                    <option value="">Select A Product</option>
                                                                    @foreach ($products as $key => $item)
                                                                        <option value="{{ $item->id }}"
                                                                            data-variant="{{ $item->has_variant }}">
                                                                            {{ $item->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="form-group row" style="padding: 6px 0;">

                                        <div class="form-group col-6 mb-0">
                                            <input type="text" class="form-control" id="memo_number"
                                                name="memo_number" value="{{ $data->memo_number ?? null }}"
                                                placeholder="Memo Number">
                                        </div>

                                        <label for="sub_total" class="col-md-2 col-form-label text-right">Sub
                                            Total</label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" id="sub_total" name="sub_total"
                                                min="0" value="{{ $data->sub_total ?? 0 }}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group row" style="padding: 6px 0;">
                                        <label for="shipping_cost"
                                            class="offset-md-6 col-md-2 col-form-label text-right">Delivery</label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" id="shipping_cost" min="0"
                                                name="shipping_cost" value="{{ $data->shipping_cost ?? 0 }}">
                                        </div>
                                    </div>

                                    <div class="form-group row" style="padding: 6px 0;">
                                        <label for="discount"
                                            class="offset-md-6 col-md-2 col-form-label text-right">Discount</label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" id="discount" min="0"
                                                name="discount" value="{{ $data->discount ?? 0 }}">
                                        </div>
                                    </div>

                                    <div class="form-group row" style="padding: 6px 0;">
                                        <label for="total"
                                            class="offset-md-6 col-md-2 col-form-label text-right">Total</label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" id="total" min="0"
                                                name="total" value="{{ $data->total ?? 0 }}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-12">
                                            <textarea name="order_note" id="order_note" class="form-control" placeholder="Order Note">{{ $data->order_note }}</textarea>
                                        </div>
                                        <div class="form-group col-12">
                                            <textarea name="staff_note" id="staff_note" class="form-control" placeholder="Staff Note">{{ $data->staff_note }}</textarea>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-12 text-center">
                                            <input type="submit" value="Update" class="btn btn-success w-100">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal for Product Variant -->
    <div class="modal fade" id="productVariant" tabindex="-1" role="dialog" aria-labelledby="productVariantLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productVariantLabel">Select Product Variant</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="variantOptions">
                        <!-- Variant options will be dynamically loaded here -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="saveVariantSelection">Add</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('/') }}backEnd/assets/vendor/datetimepicker/moment.min.js"></script>
    <script src="{{ asset('/') }}backEnd/assets/vendor/datetimepicker/bootstrap-datetimepicker.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.datetimepicker').datetimepicker({
                icons: {
                    next: 'fa fa-angle-right',
                    previous: 'fa fa-angle-left'
                },
                format: 'DD-MM-YYYY',
                defaultDate: new Date(),
            });

            $('.select2').select2();

            $('#product').on('change', function() {
                $('.loader').css('display', 'block');
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                var has_variant = $(this).find(':selected').data('variant');
                // alert(has_variant);
                if (has_variant == 1) {
                    $('#productVariant').modal('show');
                    var product_id = $(this).val();
                    $.ajax({
                        url: '{{ route('admin.ajax.get.product.modal.edit') }}',
                        type: 'POST',
                        data: {
                            _token: CSRF_TOKEN,
                            id: product_id
                        },
                        success: function(data) {
                            $('#variantOptions').html(data);
                        }
                    });
                } else {
                    $.ajax({
                        url: '{{ Auth::guard('admin')->check() ? route('admin.ajax.get.products') : (Auth::guard('manager')->check() ? route('manager.ajax.get.products') : (Auth::guard('employee')->check() ? route('employee.ajax.get.products') : '')) }}',
                        type: 'POST',
                        data: {
                            _token: CSRF_TOKEN,
                            id: $(this).val()
                        },
                        success: function(data) {
                            $('#prod_row').append(data);
                            finalCalc();
                            $('.loader').css('display', 'none');
                        }
                    });
                }

            });


            $('#productVariant').on('click', '#saveVariantSelection', function() {
                var choice_attributes = [];
                $('#variantOptions input[type="radio"]:checked').each(function() {
                    choice_attributes.push($(this).val());
                });

                var product_id = $('#product').val();
                var qty = $('#qty2').val();
                $.ajax({
                    url: '{{ route('admin.ajax.get.modal.variant') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: product_id,
                        choice_attributes: choice_attributes,
                        qty: qty,
                    },
                    success: function(data) {
                        if (data) {
                            $('.no-product').css('display', 'none');
                        } else {
                            $('.no-product').css('display', 'table-row');
                        }
                        $('#prod_row').append(data);
                        finalCalc();
                        // $('#productVariant').modal('hide');
                        $('.loader').css('display', 'none');
                    }
                });

                $('#productVariant').modal('show');

            });



            $("#courier_id").on('change', function() {
                $('.loader').css('display', 'block');
                $("#city_id").empty();
                $("#city_id").append('<option value="">Select A City</option>');
                $("#zone_id").empty();
                $("#zone_id").append('<option value="">Select A Zone</option>');
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: '{{ Auth::guard('admin')->check() ? route('admin.courier.ajax.get.cities') : (Auth::guard('manager')->check() ? route('manager.courier.ajax.get.cities') : (Auth::guard('employee')->check() ? route('employee.courier.ajax.get.cities') : '')) }}',
                    type: 'POST',
                    data: {
                        _token: CSRF_TOKEN,
                        id: $(this).val()
                    },
                    success: function(data) {
                        $("#city_id").empty();
                        $("#city_id").append('<option value="">Select A City</option>');
                        $.each(data, function(index, value) {
                            $("#city_id").append(new Option(value, index));
                        });
                        $('.loader').css('display', 'none');
                    }
                });


            });


            $("#city_id").on('change', function() {
                $('.loader').css('display', 'block');
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: '{{ Auth::guard('admin')->check() ? route('admin.courier.ajax.get.zones') : (Auth::guard('manager')->check() ? route('manager.courier.ajax.get.zones') : (Auth::guard('employee')->check() ? route('employee.courier.ajax.get.zones') : '')) }}',
                    type: 'POST',
                    data: {
                        _token: CSRF_TOKEN,
                        id: $(this).val()
                    },
                    success: function(data) {
                        $("#zone_id").empty();
                        $("#zone_id").append('<option value="">Select A Zone</option>');
                        $.each(data, function(index, value) {
                            $("#zone_id").append(new Option(value, index));
                        });
                        $('.loader').css('display', 'none');
                    }
                });
            });
        });
    </script>
    <script>
        function calcSubTotal() {
            var result = 0;
            $('.total_price').each(function() {
                var price = parseFloat($(this).val().replace(/,/g, '')) || 0;
                result += price;
            });
            $('#sub_total').val(result.toFixed(2)); // comma na thakle
            return result;
        }

        function finalCalc() {
            var sub_total = calcSubTotal();
            var shipping_cost = parseFloat($('#shipping_cost').val().replace(/,/g, '')) || 0;
            var discount = parseFloat($('#discount').val().replace(/,/g, '')) || 0;

            var total = (sub_total + shipping_cost) - discount;
            $('#total').val(total.toFixed(2));
        }

        $(document).on('keyup change', '.qty', function() {
            var qty = parseInt($(this).val()) || 0;
            var price = parseFloat($(this).closest('tr').find('.price').val().replace(/,/g, '')) || 0;
            var total_price = qty * price;
            $(this).closest('tr').find('.total_price').val(total_price.toFixed(2));


            $(this).closest('tr').find('td.total_price_display').text(total_price.toFixed(2));

            finalCalc();
        });


        $(document).on('keyup change', '#shipping_cost, #discount', function() {
            var val = $(this).val().replace(/,/g, ''); // comma remove
            val = parseFloat(val) || 0;

            finalCalc();
        });

        $(document).on('click', '.remove_btn', function() {
            $(this).closest("tr").remove();
            finalCalc();
        });

        $('form').on('submit', function() {
            $('#sub_total, #shipping_cost, #discount, #total').each(function() {
                var val = $(this).val().toString().replace(/,/g, '');
                $(this).val(val);
            });
        });


        $(document).on('click', '.attr_checkbox', function() {
            $('.loader').css('display', 'block');
            var choice_attributes = [];
            $(this).closest('td').find('.attr_checkbox:checked').each(function() {
                choice_attributes.push($(this).val());
            });

            var product_id = $(this).closest('td').parent().find('.product_id').val();
            var quantity = $(this).closest('td').parent().find('.qty').val();

            var that = $(this);
            var parent = that.closest('tr');
            var CSRF = `{{ csrf_token() }}`;
            $.ajax({
                type: "POST",
                url: `{{ route('admin.ajax.get.variant') }}`,
                data: {
                    _token: CSRF,
                    choice_attributes: choice_attributes,
                    id: product_id,
                    quantity: quantity
                },
                success: function(res) {
                    // console.log(res);
                    parent.find('.product_sku').val(res.attribute.sku);
                    //stock
                    if (res.attribute.stock > 0) {
                        parent.find('.stock_in').removeClass('d-none').addClass('d-block');
                        parent.find('.stock_out').removeClass('d-block').addClass('d-none');
                    } else {
                        parent.find('.stock_out').removeClass('d-none').addClass('d-block');
                        parent.find('.stock_in').removeClass('d-block').addClass('d-none');
                    }

                    that.closest('td').parent().find('.total_price', that).text(res.attribute.price *
                        quantity).val(res.attribute.price * quantity);
                    that.closest('td').parent().find('.total_price_display', that).text(res.attribute
                        .price *
                        quantity).val(res.attribute.price * quantity);
                    that.closest('td').parent().find('.price', that).text(res.attribute.price).val(res
                        .attribute
                        .price);
                    parent.find('.sku .sku-name').text(res.attribute.sku);


                    if (res) {
                        $('.no-product').css('display', 'none');
                    } else {
                        $('.no-product').css('display', 'table-row');
                    }
                    that.closest('td').html(res.html);
                    finalCalc();
                    // $('#productVariant').modal('hide');
                    // $('.loader').css('display', 'none');
                }
            });

        });
    </script>
@endsection
