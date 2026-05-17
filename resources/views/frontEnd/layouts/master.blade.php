<!doctype html>
<html lang="en">

<head>
    <script>window.dataLayer = window.dataLayer || [];</script>
    {!! $web_settings->gtm_head_script ?? null !!}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ config('app.name') }} - @yield('title')</title>
    <meta name="description" content="">
    <meta property="og:site_name" content="{{ env('APP_NAME') }}">
    <meta property="og:image" content="{{ asset($web_settings->get_logo->file_url) }}">
    <meta property="og:title" content="{{ env('APP_NAME') }}">
    <meta property="og:description" content="">
    <meta property="og:url" content="{{ env('APP_URL') }}">
    <meta property="og:type" content="e-commerce">
    <meta name="twitter:title" content="{{ env('APP_NAME') }}">
    <meta name="twitter:description" content="">

    <link rel="shortcut icon"
        href="{{ $web_settings->get_fav ? asset($web_settings->get_fav->file_url) : asset('frontEnd/images/no_image.png') }}">
    {{-- Google fonts --}}
    <link
        href="https://fonts.googleapis.com/css?family=Raleway:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap"
        rel="stylesheet">
    {{-- Font Awesome --}}
    <link href="{{ asset('frontEnd/plugins/font-awesome/font-awesome.css') }}" rel="stylesheet">
    {{-- Bootstrap CSS --}}
    <link rel="stylesheet" href="{{ asset('frontEnd/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontEnd/css/style.css') }}">
    {{-- Owl-Carousel --}}
    <link rel="stylesheet" href="{{ asset('frontEnd/plugins/owl-carousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontEnd/plugins/owl-carousel/owl.theme.default.min.css') }}">
    {{-- toastr --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}backEnd/assets/vendor/toastr/toastr.min.css">

    @yield('style')

    {!! $web_settings->fb_pixel ?? null !!}

    {{-- GTM HEAD --}}
    {!! $web_settings->gtm_head ?? null !!}
</head>

<body>
    @yield('fb_share')

    {{-- GTM BODY --}}
    {!! $web_settings->gtm_body ?? null !!}
    <div class="main-wrapper">
        @include('frontEnd.inc.header')

        @yield('body')

        @include('frontEnd.inc.footer')
    </div>

    {{-- <script src="{{asset('frontEnd/js/jquery.slim.min.js')}}"></script> --}}
    <script src="{{ asset('frontEnd/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('frontEnd/js/bootstrap.bundle.min.js') }}"></script>

    {{-- Owl-Carousel --}}
    <script src="{{ asset('frontEnd/plugins/owl-carousel/owl.carousel.min.js') }}"></script>

    {{-- toastr --}}
    <script src="{{ asset('/') }}backEnd/assets/vendor/toastr/toastr.min.js"></script>
    <script>
        @if (session()->has('success'))
            toastr.options = {
                "positionClass": "toast-bottom-left"
            };
            toastr.success("{{ session('success') }}");
        @endif
        @if (Session::has('error'))
            toastr.options = {
                "positionClass": "toast-bottom-left"
            };
            toastr.error("{{ session('error') }}");
        @endif
        @if (Session::has('info'))
            toastr.options = {
                "positionClass": "toast-bottom-left"
            };
            toastr.info("{{ session('info') }}");
        @endif
        @if (Session::has('warning'))
            toastr.options = {
                "positionClass": "toast-bottom-left"
            };
            toastr.warning("{{ session('warning') }}");
        @endif
    </script>

    <script>
        $('#account-btn').on('click', function() {
            $('.login-float').toggle()
        });

        $('#header-top-menu-btn').on('click', function() {
            $('.header-top-menu-m').toggle()
        });

        $('#cat_menu_mobile_btn').on('click', function() {
            $('.cat_menu_m').toggle()
        });

        $('#search_mobile_btn').on('click', function() {
            $('.search-form-m').toggle()
        });

        $('.search_btnclose').on('click', function() {
            $('.search-form-m').toggle()
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.order_now_btn').click(function(e) {
                e.preventDefault();
                var hasVariant = $(this).data('has_variant');
                var slug = $(this).data('slug');
                var id = $(this).data('id');
                if (hasVariant) {
                    window.location.href = "{{ url('/product') }}/" + slug + "/" + id;
                } else {
                    var form = $(this).closest('form');
                    $('<input>').attr({
                        type: 'hidden',
                        name: 'order_now',
                        value: 'অর্ডার করুন'
                    }).appendTo(form);
                    form.submit();
                }
            });
            $('.add_cart_btn').click(function(e) {
                e.preventDefault();
                var hasVariant = $(this).data('has_variant');
                var slug = $(this).data('slug');
                var id = $(this).data('id');
                if (hasVariant) {
                    window.location.href = "{{ url('/product') }}/" + slug + "/" + id;
                } else {
                    var form = $(this).closest('form');
                    $('<input>').attr({
                        type: 'hidden',
                        name: 'add_cart',
                        value: 'কার্টে রাখুন'
                    }).appendTo(form);
                    form.submit();
                }
            });
        });
    </script>
         @if (session()->has('api_add_to_cart'))
        <script>
            dataLayer.push({
                ecommerce: null
            }); // Clear the previous ecommerce object.
            dataLayer.push({
                event: "add_to_cart",
                ecommerce: {
                    currency: "BDT",
                    value: {{ session('api_add_to_cart')['value'] }},
                    items: {!! session('api_add_to_cart')['products'] !!}
                }
            });
        </script>
    @endif

    @yield('script')
</body>
</html>
