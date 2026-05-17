@extends('frontEnd.layouts.master')

@section('title')
    Home
@endsection

@section('style')
    <style>
        .category-section {
            width: 100%;
            background: linear-gradient(90deg, #0aa95f 0%, #098f52 100%);
            box-shadow: 0 2px 8px 0 #0000001a;
            margin-bottom: 10px;
        }

        .category-section .container-95 {
            width: 100% !important;
            max-width: 100%;
            padding-left: 14px;
            padding-right: 14px;
        }

        .category-menu {
            width: 100%;
            padding: 10px 0;
        }

        .category-menu ul {
            list-style: none;
            margin: 0 auto;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            flex-wrap: nowrap;
            gap: 8px;
            overflow-x: auto;
            white-space: nowrap;
            -ms-overflow-style: none;
            scrollbar-width: none;
            -webkit-overflow-scrolling: touch;
            width: fit-content;
            max-width: 100%;
        }

        .category-menu ul li {
            flex: 0 0 auto;
            display: flex;
        }

        .category-menu ul::-webkit-scrollbar {
            display: none;
            width: 0;
            height: 0;
        }

        .category-menu ul li a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 8px 12px;
            border-radius: 30px;
            /* background: #ffffff26;
            border: 1px solid #ffffff42; */
            color: #ffffff;
            font-size: 15px;
            font-family: "Ador-SemiBold";
            line-height: 1;
            text-align: center;
        }

        .category-menu ul li a:hover {
            text-decoration: none;
            color: #c2c2c2;
            /* border-color: #ffffff;
            background: #ffffff; */
        }

        .slider-top-menu {
            width: 100%;
            border: 0;
            border-radius: 0;
            margin-bottom: 10px;
            box-shadow: 0 2px 8px 0 #0000001a;
            padding: 10px 14px;
        }

        .slider-top-menu ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            gap: 8px;
            overflow-x: auto;
            white-space: nowrap;
            scrollbar-width: thin;
            scrollbar-color: #ffffff7a transparent;
        }

        .slider-top-menu ul li a {
            display: inline-flex;
            align-items: center;
            padding: 8px 12px;
            border-radius: 30px;
            background: #ffffff26;
            border: 1px solid #ffffff42;
            color: #ffffff;
            font-size: 15px;
            font-family: "Ador-SemiBold";
            line-height: 1;
        }

        .slider-top-menu ul li a:hover {
            text-decoration: none;
            color: #098f52;
            border-color: #ffffff;
            background: #ffffff;
        }

        @media (max-width: 767.98px) {
            .category-section {
                margin-bottom: 8px;
            }

            .category-section .container-95 {
                padding-left: 10px;
                padding-right: 10px;
            }

            .category-menu {
                padding: 8px 0;
            }

            .category-menu ul {
                justify-content: flex-start;
                margin: 0 auto;
                width: fit-content;
                max-width: 100%;
                flex-wrap: nowrap;
                overflow-x: auto;
                overflow-y: hidden;
                white-space: nowrap;
                -webkit-overflow-scrolling: touch;
            }

            .category-menu ul li {
                flex: 0 0 auto;
            }

            .category-menu ul li a {
                font-size: 14px;
                padding: 7px 5px;
            }

            .slider-top-menu {
                margin-bottom: 8px;
                padding: 8px 10px;
            }

            .slider-top-menu ul li a {
                font-size: 14px;
                padding: 7px 10px;
            }
        }
    </style>
@endsection

@section('body')
    {{-- @dd(4) --}}
    <section class="category-section">
        <div class="container-fluid container-95 px-0 px-md-2">
            <div class="category-menu">
                <ul>
                    @foreach ($categories as $cat)
                        <li>
                            <a href="{{ route('single.category', $cat->id) }}">
                                {{ $cat->category_name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>

    <section>
        <div class="slider">
            <div class="container-fluid container-95 px-0 px-md-2">
                <div class="row mx-0">
                    <div class="col-12 px-0">
                        <div id="home_slider" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                @if (count($sliders) > 1)
                                    @foreach ($sliders as $key => $item)
                                        <li data-target="#home_slider" data-slide-to="{{ $key }}"
                                            @if ($key == 0) class="active" @endif></li>
                                    @endforeach
                                @endif
                            </ol>
                            <div class="carousel-inner">
                                @foreach ($sliders as $key => $item)
                                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                        <a href="{{ $item->slider_url }}"><img
                                                src="{{ $item->get_img ? asset($item->get_img->file_url) : asset('frontEnd/images/no_image.png') }}"
                                                class="d-block w-100" alt=""></a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="hot-deals mt-md-4">
            <div class="container-fluid container-95">
                <div class="row">
                    <div class="col-12">
                        <div class="hot-deals-inner-wrapper">
                            <div class="row">
                                <div class="col-12">
                                    <h4 class="mb-3">
                                        হট ডিল
                                        <a href="{{ route('all.hot.deals') }}">সবগুলো দেখুন <i
                                                class="fa fa-angle-right"></i></a>
                                    </h4>
                                </div>
                            </div>

                            <div class="owl-carousel mb-3">
                                @foreach ($hot_deal_1 as $item)
                                    <?php
                                    $percentage = round(100 - ($item->sale_price / $item->price) * 100);
                                    ?>
                                    <div class="hot-deals-product">
                                        <div class="main-product-inner-wrapper text-center">
                                            <div class="discount">
                                                <div class="discount-wrapper">
                                                    <img src="{{ asset('frontEnd/images/flash-deal-percentage.png') }}"
                                                        alt="">
                                                    <span>{{ $percentage }}%</span> <br>
                                                    <span>ছাড়</span>
                                                </div>
                                            </div>
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
                                            <form action="{{ route('add.cart', $item->id) }}"
                                                method="post"class="order_form">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if (count($category_products) > 0)
        @foreach ($category_products as $category)
            @if (count($category->get_products) > 0)
                <div class="main-products-section">
                    <div class="container-fluid container-95">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="mb-3">
                                    {{ $category->category_name }}
                                    <a href="{{ route('single.category', $category->id) }}">সবগুলো দেখুন <i
                                            class="fa fa-angle-right"></i></a>
                                </h4>
                            </div>
                        </div>
                        <div class="row m-0">
                            @foreach ($category->get_products()->take(12)->get() as $item)
                                @if ($item)
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
                                            <form action="{{ route('add.cart', $item->id) }}"
                                                method="post" class="order_form">
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
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    @endif

    @if (count($featured_products) > 0)
        <div class="main-products-section">
            <div class="container-fluid container-95">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="mb-3">ফিচার প্রোডাক্ট</h4>
                    </div>
                </div>
                <div class="row m-0">
                    @foreach ($featured_products as $item)
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
                                <form action="{{ route('add.cart', $item->id) }}" method="post" class="order_form">
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
                </div>
            </div>
        </div>
    @endif

    @if (count($best_sell_products) > 0)
        <div class="main-products-section">
            <div class="container-fluid container-95">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="mb-3">বেস্ট সেল</h4>
                    </div>
                </div>
                <div class="row m-0">
                    @foreach ($best_sell_products as $item)
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
                                <form action="{{ route('add.cart', $item->id) }}" method="post" class="order_form">
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
                </div>
            </div>
        </div>
    @endif

    @if (count($new_products) > 0)
        <div class="main-products-section">
            <div class="container-fluid container-95">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="mb-3">নিউ প্রোডাক্ট</h4>
                    </div>
                </div>
                <div class="row m-0">
                    @foreach ($new_products as $item)
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
                                <form action="{{ route('add.cart', $item->id) }}" method="post" class="order_form">
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
                </div>
            </div>
        </div>
    @endif


    {{-- <section>
        <div class="main-products-section">
            <div class="container-fluid container-95">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="mb-3">প্রয়োজনীয় প্রোডাক্ট</h4>
                    </div>
                </div>
                <div class="row m-0">
                    @foreach ($products as $item)
                        <div class="main-product">
                            <div class="main-product-inner-wrapper text-center">
                                <a href="{{route('single.product',[$item->slug,$item->id])}}">
                                    <img src="{{$item->get_image ? asset($item->get_image->file_url) : asset('frontEnd/images/no_image.png')}}" alt="{{$item->name}}">
                                </a>
                                @if ($item->sale_price != 0)
                                    <p class="mb-0" style="text-decoration: line-through;color: #b8b8b8">{{$web_settings->currency_sign}} {{$item->price}}</p>
                                    <p class="font-weight-bold mb-0" style="color: #fca204">{{$web_settings->currency_sign}} {{$item->sale_price}}</p>
                                @else
                                    <p class="font-weight-bold mb-0" style="margin-top: 24px;color: #fca204">{{$web_settings->currency_sign}} {{$item->price}}</p>
                                @endif
                                <p class="mb-0 prod_name"><a href="{{route('single.product',[$item->slug,$item->id])}}">{{$item->name}}</a></p>
                                <form action="{{route('add.cart',$item->id)}}" method="post">
                                    @csrf
                                    <input type="hidden" name="qty" value="1">
                                    <input type="submit" class="btn btn-sm w-100 mb-2 order_now_btn" name="order_now" value="অর্ডার করুন">
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="row mt-md-4 mt-2">
                    <div class="col-12">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
@endsection



@section('script')
    <script>
        $(document).ready(function() {
            $(".owl-carousel").owlCarousel({
                margin: 20,
                loop: true,
                dots: false,
                autoplay: true,
                autoplayTimeout: 6000,
                autoplayHoverPause: true,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 2,
                        nav: true
                    },
                    600: {
                        items: 3,
                        nav: false
                    },
                    1000: {
                        items: 6,
                        nav: true,
                        loop: false
                    }
                }
            });

            $('.owl-nav').remove();

            // Horizontal scroll with mouse wheel for category menu
            const slider = document.querySelector('.category-menu ul');
            if(slider) {
                let isDown = false;
                let isDragging = false;
                let startX;
                let scrollLeft;

                // Mouse wheel scroll
                $(slider).on('wheel', function(e) {
                    if (e.originalEvent.deltaY !== 0) {
                        e.preventDefault();
                        $(this).scrollLeft($(this).scrollLeft() + e.originalEvent.deltaY);
                    }
                });

                // Mouse drag scroll
                slider.addEventListener('mousedown', (e) => {
                    if (e.button !== 0) return; // Only left mouse button
                    isDown = true;
                    isDragging = false;
                    slider.classList.add('active');
                    startX = e.pageX - slider.offsetLeft;
                    scrollLeft = slider.scrollLeft;
                });
                
                slider.addEventListener('mouseleave', () => {
                    isDown = false;
                    slider.classList.remove('active');
                });
                
                slider.addEventListener('mouseup', () => {
                    isDown = false;
                    slider.classList.remove('active');
                });
                
                slider.addEventListener('mousemove', (e) => {
                    if (!isDown) return;
                    e.preventDefault();
                    isDragging = true;
                    const x = e.pageX - slider.offsetLeft;
                    const walk = (x - startX) * 2; // scroll-fast multiplier
                    slider.scrollLeft = scrollLeft - walk;
                });

                // Prevent click if dragging
                $(slider).find('a').on('click', function(e) {
                    if (isDragging) {
                        e.preventDefault();
                        e.stopPropagation();
                    }
                });
            }
        });
    </script>
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
