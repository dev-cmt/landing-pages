@extends('frontEnd.layouts.master')

@section('title')
    Searched Products
@endsection

@section('body')
    <section>
        <div class="category_breadcrumb">
            <div class="container-fluid container-95">
                <div class="row">
                    <div class="col-12">
                        <p>
                            <a href="{{ route('home') }}">Home</a>
                            /
                            Searched For "{{ $query }}"
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="main-products-section">
            <div class="container-fluid container-95">
                <div class="row m-0">
                    @if ($data->count() > 0)
                        @foreach ($data as $item)
                            {{-- @dd($item) --}}
                            <div class="main-product">
                                <div class="main-product-inner-wrapper text-center">
                                    <a href="{{ route('single.product', [$item->slug, $item->id]) }}">
                                        <img src="{{ $item->get_image ? asset($item->get_image->file_url) : asset('frontEnd/images/no_image.png') }}"
                                            alt="{{ $item->name }}">
                                    </a>
                                    @if ($item->sale_price != 0)
                                        <p class="mb-0" style="text-decoration: line-through;color: #b8b8b8">
                                            {{ $web_settings->currency_sign }}
                                            {{ \App\BanglaToEnglishConverter::en2bn($item->price) }}
                                        </p>
                                        <p class="font-weight-bold mb-0" style="color: #fca204">
                                            {{ $web_settings->currency_sign }}
                                            {{ \App\BanglaToEnglishConverter::en2bn($item->sale_price) }}
                                        </p>
                                    @else
                                        <p class="font-weight-bold mb-0" style="margin-top: 24px;color: #fca204">
                                            {{ $web_settings->currency_sign }}
                                            {{ \App\BanglaToEnglishConverter::en2bn($item->price) }}
                                        </p>
                                    @endif
                                    <p class="mb-0 prod_name"><a
                                            href="{{ route('single.product', [$item->slug, $item->id]) }}">{{ $item->name }}</a>
                                    </p>
                                    <form action="{{ route('add.cart', $item->id) }}" method="post"class="order_form">
                                        @csrf
                                        <input type="hidden" name="qty" value="1">
                                        <button type="button" class="btn btn-sm w-100 add_cart_btn"
                                            data-has_variant="{{ $item->has_variant ? 'true' : 'false' }}"
                                            data-slug="{{ $item->slug }}" data-id="{{ $item->id }}"
                                            name="add_cart">কার্টে রাখুন</button>
                                        <button type="button" class="btn btn-sm w-100 order_now_btn"
                                            data-has_variant="{{ $item->has_variant ? 'true' : 'false' }}"
                                            data-slug="{{ $item->slug }}" data-id="{{ $item->id }}"
                                            name="order_now">অর্ডার করুন</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-12 text-center py-md-5 my-md-5">
                            <h2 class="mb-md-4" style="color: red;font-weight: bold">দুঃখিত কোন পণ্য পাওয়া যায়নি</h2>
                            <a href="{{ route('home') }}" class="btn btn-success px-5"
                                style="background-color: green">হোম</a>
                        </div>
                    @endif
                </div>

                <div class="row">
                    <div class="col-12 mt-3">
                        {{ $data->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection



@section('script')
    <script>
        $(document).ready(function() {
            $('.order_now_btn').click(function(e) {
                e.preventDefault();
                // alert(4);
                var hasVariant = $(this).data('has_variant');
                var slug = $(this).data('slug');
                var id = $(this).data('id');
                if (hasVariant) {
                    window.location.href = "{{ url('/product') }}/" + slug + "/" + id;
                } else {
                    var form = $(this).closest('.order_form');
                    form.find('input[name="add_cart"]').removeAttr('name');
                    form.submit();
                }
            });
            $('.add_cart_btn').click(function(e) {
                e.preventDefault();
                // alert(4);
                var hasVariant = $(this).data('has_variant');
                var slug = $(this).data('slug');
                var id = $(this).data('id');
                if (hasVariant) {
                    window.location.href = "{{ url('/product') }}/" + slug + "/" + id;
                } else {
                    var form = $(this).closest('.order_form');
                    form.find('input[name="order_now"]').removeAttr('name');
                    form.submit();
                }
            });
        });
    </script>
@endsection
