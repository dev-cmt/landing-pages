@extends('frontEnd.layouts.master')

@section('title')
    Checkout
@endsection

@section('body')
    @if (\Cart::getContent()->count() > 0)
        <section>
            <div class="cart-section">
                <div class="container-fluid container-95">
                    <div class="row">
                        <div class="col-md-5 col-12 mb-md-0 mb-4">
                            <div class="card">
                                <h5 class="font-weight-bold card-header">কাস্টমার ইনফরমেশন</h5>
                                <div class="card-body p-2">
                                    <p class="text-center">অর্ডারটি কনফার্ম করতে আপনার নাম, ঠিকানা, মোবাইল নাম্বার, লিখে
                                        <span class="text-danger">অর্ডার কনফার্ম করুন</span> বাটনে ক্লিক করুন
                                    </p>
                                    <form action="{{ route('place.order') }}" method="post" id="checkout_form"
                                        class="checkout_form">
                                        @csrf
                                        <input type="hidden" name="shipping_cost" id="shipping_cost">
                                        <div class="form-group">
                                            <label for="customer_name">আপনার নাম <span class="text-danger">*</span></label>
                                            <input type="text"
                                                class="form-control @error('customer_name')is-invalid @enderror"
                                                id="customer_name" name="customer_name"
                                                placeholder="আপনার সম্পূর্ণ নাম লিখুন" value="{{ old('customer_name') }}"
                                                required>
                                            @error('customer_name')
                                                <span class="text-danger font-weight-bold">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="customer_phone">আপনার মোবাইল নাম্বার <span
                                                    class="text-danger">*</span></label>
                                            <input type="number"
                                                class="form-control @error('customer_phone') is-invalid @enderror"
                                                id="customer_phone" name="customer_phone"
                                                placeholder="+88 ছাড়া ১১ সংখ্যার মোবাইল নাম্বার লিখুন" minlength="11"
                                                maxlength="11" required value="{{ old('customer_phone') }}">
                                            @error('customer_phone')
                                                <span class="text-danger font-weight-bold">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="customer_address">আপনার ঠিকানা <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="customer_address"
                                                name="customer_address" placeholder="আপনার ঠিকানা লিখুন"
                                                value="{{ old('customer_address') }}" required>
                                        </div>

                                        <div class="form-group" id="area_section">
                                            <label for="shipping_method">আপনার এরিয়া সিলেক্ট করুন <span
                                                    class="text-danger">*</span></label>
                                            <select name="shipping_method" id="shipping_method" class="form-control"
                                                required>
                                                @foreach ($shipping_methods as $item)
                                                    <option value="{{ $item->id }}">{{ $item->text }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-success w-100 mb-2" style="height: 50px"
                                            id="conf_order_btn">অর্ডার কনফার্ম করুন
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-7 col-12">
                            <div class="card">
                                <h5 class="font-weight-bold card-header">অর্ডার ইনফরমেশন</h5>
                                <div class="card-body p-2 table-responsive">
                                    <table class="cart_table table table-bordered table-striped text-center mb-0">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Product Name & Image</th>
                                                <th>Price</th>
                                                <th>Qty</th>
                                                <th>Sub Total</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach (\Cart::getContent()->sort() as $item)
                                                {{-- @dd($item) --}}
                                                <tr>
                                                    <td>
                                                        <a href="{{ route('cart.item.delete', $item->id) }}"><i
                                                                class="fa fa-trash-o text-danger"></i></a>
                                                    </td>
                                                    <td class="text-left">
                                                        <img width="35"
                                                            src="{{ $item->associatedModel->get_image ? $item->associatedModel->get_image->file_url : 'default-image-url.jpg' }}"
                                                            alt="Product image">
                                                        <a style="font-size: 16px"
                                                            href="{{ route('single.product', [$item->associatedModel->slug, $item->associatedModel->id]) }}">{{ $item->name }}</a>
                                                        @if (count($item->attributes) > 0)
                                                            @php
                                                                $attrText = explode(',', $item->attributes[0]);
                                                                $attrText = collect($attrText)
                                                                    ->map(function ($item) {
                                                                        return str_replace('_', ' ', ucfirst($item));
                                                                    })
                                                                    ->implode(', ');
                                                                // dd($attrText);
                                                            @endphp
                                                            <span style="font-size: 14px"
                                                                class="text-danger text-capitalize">
                                                                {{ $attrText }}
                                                            </span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $item->price }}</td>
                                                    <td width="15%" class="cart_qty">
                                                        <a href="{{ route('cart.item.minus', $item->id) }}"><i
                                                                class="fa fa-minus" id="qty_minus"></i></a>
                                                        <input type="text" name="qty" id="qty" min="1"
                                                            value="{{ $item->quantity }}" readonly>
                                                        <a href="{{ route('cart.item.plus', $item->id) }}"><i
                                                                class="fa fa-plus" id="qty_plus"></i></a>
                                                    </td>
                                                    <td>{{ $item->getPriceSum() }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="4" class="text-right pr-2">Net Total</th>
                                                <td><span id="net_total">{{ \Cart::getTotal() }}</span></td>
                                            </tr>
                                            <tr>
                                                <th colspan="4" class="text-right pr-2">Shipping Cost</th>
                                                <td>
                                                    <span id="cart_shipping_cost">0</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th colspan="4" class="text-right pr-2">Grand Total</th>
                                                <td>
                                                    <span id="grand_total"></span>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>

                                <div class="card-footer">
                                    <a href="{{ route('home') }}" class="btn btn-info btn-sm "
                                        style=" display: inline-flex; gap: 5px; align-items: center;">
                                        <i class="fa fa-angle-left"></i> Back To Shopping
                                    </a>
                                    <a href="{{ route('cart.clear') }}" class="btn btn-danger btn-sm float-right">Cart
                                        Clear</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @else
        <section class="py-md-5">
            <div class="cart-section">
                <div class="container-fluid container-95">
                    <div class="row py-md-5">
                        <div class="col-12 text-center">
                            <h1 class="mb-md-4">কোন প্রোডাক্ট নেই</h1>
                            <a href="{{ route('home') }}" class="btn btn-info px-5">প্রোডাক্ট বাছাই করুন</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection



@section('script')
    <script>
        $(document).ready(function() {
            $('#customer_phone').on('blur', function() {
                var phone = $(this).val();
                var name = $('#customer_name').val();
                var address = $('#customer_address').val();
                var shipping_method = $('#shipping_method').val();
                var shipping_cost = $('#shipping_cost').val();
                var data = {
                    phone: phone,
                    name: name,
                    address: address,
                    shipping_method: shipping_method,
                    shipping_cost: shipping_cost
                };

                if (phone.length == 11) {
                    $.ajax({
                        url: '{{ route('abandoned.cart') }}',
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            data: data
                        },
                        success: function(data) {
                            // console.log(data)
                        }
                    });
                }
            });


            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '{{ route('ajax.get.shipp.meth') }}',
                type: 'POST',
                data: {
                    _token: CSRF_TOKEN,
                    id: $('#shipping_method').val()
                },
                success: function(data) {
                    $("#cart_shipping_cost").text(data);
                    $("#shipping_cost").val(data);
                    if (data == 0) {
                        $('#area_section').css('display', 'none')
                    } else {
                        $('#area_section').css('display', 'block')
                    }
                    calculate();
                }
            });

            $("#shipping_method").on('change', function() {
                if ($(this).val()) {
                    $.ajax({
                        url: '{{ route('ajax.get.shipp.meth') }}',
                        type: 'POST',
                        data: {
                            _token: CSRF_TOKEN,
                            id: $(this).val()
                        },
                        success: function(data) {
                            $("#cart_shipping_cost").text(data);
                            $("#shipping_cost").val(data);
                            calculate();
                        }
                    });
                } else {
                    $("#cart_shipping_cost").text(0);
                    $("#shipping_cost").val(0);
                    calculate();
                }

            });

            function calculate() {
                var net_total = parseFloat($('#net_total').text());
                var cart_shipping_cost = parseFloat($('#cart_shipping_cost').text());
                $('#grand_total').text(net_total + cart_shipping_cost);
            }


            $("#checkout_form").submit(function() {
                $("#conf_order_btn").attr("disabled", true).text('সাবমিট হচ্ছে...');
            });
        });
    </script>

    <script>
        window.dataLayer = window.dataLayer || [];
        dataLayer.push({
            event: "begin_checkout",
            ecommerce: {
                currency: "BDT",
                value: {{ (float) \Cart::getTotal() }},
                items: {!! json_encode($gtm_items) !!}
            }
        });
    </script>

@endsection
