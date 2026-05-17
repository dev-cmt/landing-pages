@extends('frontEnd.layouts.master')

@section('title')
    Order Confirmed
@endsection

@section('body')
    {{--<section class="py-5">
        <div class="cart-section">
            <div class="container-fluid container-95">
                <div class="row py-5">
                    <div class="col-12 text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="#008000" stroke-width="1.5"
                                 stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"/>
                                <path d="M9 12l2 2l4 -4"/>
                            </svg>
                        <h1 class="mb-md-4" style="color: green;font-weight: bold">Order Place Successfully</h1>
                        <p style="color: green">আপনার অর্ডারটি সফলভাবে সম্পন্ন হয়েছে আমাদের কল সেন্টার থেকে ফোন করে আপনার অর্ডারটি কনফার্ম করা হবে</p>
                        @if(session()->has('order_no'))<p style="color: red;font-weight: bold;font-size: 20px">আপনার অর্ডার নাম্বার:- <strong>{{session('order_no')??null}}</strong></p>@endif
                        <a href="{{route('home')}}" class="btn btn-success px-5" style="background-color: green">প্রোডাক্ট বাছাই করুন</a>
                    </div>
                </div>
            </div>
        </div>
    </section>--}}

    <section class="py-md-5 pb-4">
        <div class="cart-section">
            <div class="container">
                <div class="row confirm-order">
                    <div class="col-12 text-center">
                        <h1><svg xmlns="http://www.w3.org/2000/svg" width="90" height="90" viewBox="0 0 24 24" fill="none" stroke="#008000" stroke-width="2"
                                 stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"/>
                                <path d="M9 12l2 2l4 -4"/>
                            </svg> @if(session()->has('order_no'))<br> <span class="ord_no">আপনার অর্ডার নাম্বার ঃ- <strong>{{session('order_no')??null}}</strong></span>@endif <br>আপনার অর্ডারটি সফলভাবে সম্পন্ন হয়েছে</h1>
                        <p>আমাদের কল সেন্টার থেকে ফোন করে আপনার অর্ডারটি কনফার্ম করা হবে</p>
                        <a href="{{route('home')}}" class="btn btn-danger">অন্যান্য প্রোডাক্ট গুলো দেখুন</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if($purchase_data)
    <script>
    window.dataLayer = window.dataLayer || [];
    dataLayer.push({
      event: "purchase",
      action_source: "website",
      order_id: {!! json_encode((string)$purchase_data['order_id']) !!},
      event_id: {!! json_encode((string)$purchase_data['order_id']) !!},
      external_id: {!! json_encode($purchase_data['external_id']) !!},
      ecommerce: {
        transaction_id: {!! json_encode((string)$purchase_data['order_id']) !!},
        affiliation: {!! json_encode($purchase_data['affiliation']) !!},
        value: {{ $purchase_data['value'] }},
        tax: {{ $purchase_data['tax'] }},
        shipping: {{ $purchase_data['shipping'] }},
        currency: {!! json_encode($purchase_data['currency']) !!},
        items: {!! json_encode($gtm_items) !!}
      },
      customer_information: {
        first_name: {!! json_encode($purchase_data['first_name']) !!},
        last_name: {!! json_encode($purchase_data['last_name']) !!},
        phone: {!! json_encode($purchase_data['phone']) !!},
        address_1: {!! json_encode($purchase_data['address_1']) !!},
        city: {!! json_encode($purchase_data['city']) !!},
        country: "Bangladesh",
        country_code: "BD"
      },
      user_data: [{
        external_id: {!! json_encode($purchase_data['external_id']) !!},
        em: {!! json_encode($purchase_data['email'] ? hash('sha256', strtolower(trim($purchase_data['email']))) : '') !!},
        ph: {!! json_encode($purchase_data['phone'] ? hash('sha256', strtolower(trim($purchase_data['phone']))) : '') !!},
        fn: {!! json_encode($purchase_data['first_name'] ? hash('sha256', strtolower(trim($purchase_data['first_name']))) : '') !!},
        ln: {!! json_encode($purchase_data['last_name'] ? hash('sha256', strtolower(trim($purchase_data['last_name']))) : '') !!},
        ct: {!! json_encode($purchase_data['city'] ? hash('sha256', strtolower(trim($purchase_data['city']))) : '') !!},
        country: {!! json_encode(hash('sha256', 'bangladesh')) !!},
        country_code: {!! json_encode(hash('sha256', 'bd')) !!}
      }]
    });
    </script>
    @endif
@endsection
