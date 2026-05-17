@extends('frontEnd.layouts.master')

@section('title')
    About Us
@endsection

@section('body')
    <section>
        <div class="cart-section">
            <div class="container">
                <div class="row">
                    <div class="col-12 mb-md-0 mb-4">
                        <h5 class="font-weight-bold">আমাদের সম্পর্কে</h5>
                        <div class="p-2">
                            {!! $data->about_us !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
