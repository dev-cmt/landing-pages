@extends('frontEnd.layouts.master')

@section('title')
    OTP Verify
@endsection
@section('body')
    <section class="py-md-5">
        <div class="container-fluid container-95">
            <div class="row py-md-5">
                <div class="col-md-4 col-12 mx-md-auto">
                    <div class="card">
                        <div class="card-header">OTP Verification</div>
                        <div class="card-body">
                            <p style="font-weight: bold;margin-bottom: 5px;"><span style="color:red">{{$order->customer_phone}}</span> এই নাম্বার এ ওটিপি পাঠানো হয়েছে</p>
                            <p style="font-weight: bold;color: mediumseagreen;margin-bottom: 5px;">অর্ডারটি কনফার্ম করতে আপনার ফোনে আসা ওটিপি টি সাবমিট করুন</p>
                            <form action="{{route('otp.verify')}}" method="post">
                                @csrf
                                <input type="hidden" value="{{$order->id}}" name="order_id">
                                <div class="mb-3">
                                    <label for="otp">OTP Code</label>
                                    <input type="number" class="form-control" name="otp" id="otp" placeholder="Enter 4 digit OTP code" required>
                                    <span class="text-danger font-weight-bold">{{session('wrong_otp')}}</span>
                                </div>
                                <input type="submit" class="btn btn-success btn-sm" value="Submit OTP & Complete Order">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection



@section('script')
    <script>
        $(document).ready(function () {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '{{route('ajax.get.shipp.meth')}}',
                type: 'POST',
                data: {_token: CSRF_TOKEN, id: $('#shipping_method').val()},
                success: function (data) {
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

            $("#shipping_method").on('change', function () {
                if ($(this).val()) {
                    $.ajax({
                        url: '{{route('ajax.get.shipp.meth')}}',
                        type: 'POST',
                        data: {_token: CSRF_TOKEN, id: $(this).val()},
                        success: function (data) {
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


            $("#checkout_form").submit(function () {
                $("#conf_order_btn").attr("disabled", true).text('সাবমিট হচ্ছে...');
            });
        });
    </script>
@endsection
