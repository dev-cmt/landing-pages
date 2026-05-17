@extends('frontEnd.layouts.master')

@section('title')
    {{ $data->name }}
@endsection
@php
    $page_settings = \Illuminate\Support\Facades\DB::table('page_settings')->where('id', 1)->first();
@endphp
@section('style')
    <link rel="stylesheet" href="{{ asset('frontEnd/plugins/swiper/css/swiper-bundle.min.css') }}">
    <style>
        .swiper {
            width: 100%;
            height: auto;
            margin-left: auto;
            margin-right: auto;
        }

        .swiper-slide {
            background-size: cover;
            background-position: center;
        }

        .myMainSwiper {
            /* height: 80%; */
            width: 100%;
        }


        .mySwiper {
            box-sizing: border-box;
            padding: 10px 0;
        }



        .mySwiper .swiper-slide-thumb-active {
            opacity: 1;
        }

        .swiper-slide img {
            display: block;
            width: 100%;
            aspect-ratio: 1 / 1;
            object-fit: cover;
            /* border-radius: 8px; */
        }

        .mySwiper .swiper-slide {
            width: 25%;
            height: 100%;
            opacity: 0.3;
        }

        .custom-active {
            opacity: 1 !important;
            border: 2px solid #09ac5e;
        }

        .video-thumb-slide.custom-active {
            border: 2px solid #7f7f7f;
        }

        .video-thumb-slide.custom-active .video-thumb {
            border-color: #7f7f7f;
            background: #ececec;
        }

        .mySwiper .swiper-button-next:after,
        .mySwiper .swiper-button-prev:after {
            font-size: 30px !important;
            color: #9e9e99;
        }

        .myMainSwiper .swiper-button-next:after,
        .myMainSwiper .swiper-button-prev:after {
            font-size: 30px !important;
            color: #9e9e99;
        }

        .smallMySwiper2 .swiper-button-next:after,
        .smallMySwiper2 .swiper-button-prev:after {
            font-size: 20px !important;
            color: #9e9e99;
        }

        .smallMySwiper2 .swiper-button-next {
            height: 20px;
            margin-top: 0px;
            margin-right: -10px;
        }

        .smallMySwiper2 .swiper-button-prev {
            height: 20px;
            margin-top: 0px;
            margin-left: -10px;
        }

        .smallMySwiper2 .swiper-slide {
            opacity: 0.3;
        }



        @media screen and (max-width: 425px) {
            .desktop-row {
                display: none;
            }

            .small-row .images {
                width: 93% !important;
            }

            .small-row .swiper-wrapper {
                margin: 10px 0 !important;
            }
        }

        @media screen and (min-width: 426px) {
            .small-row {
                display: none;
            }

        }



        .images-wrapper {
            position: relative;
        }

        .images-wrapper .swiper-button-next,
        .images-wrapper .swiper-button-prev {
            color: #000;
            /* button er color */
            top: 50%;
            /* transform: translateY(-50%); */
        }

        .images-wrapper .swiper-button-next::after,
        .images-wrapper .swiper-button-prev::after {
            font-size: clamp(16px, 2vw, 20px);
            color: #9e9e99;
            font-weight: bold;
        }

        .images-wrapper .swiper-button-prev {
            left: -10px;
            /* image er baire left side */
        }

        .images-wrapper .swiper-button-next {
            right: -10px;
            /* image er baire right side */
        }

        #mainSwiper .swiper-slide {
            position: relative;
        }

        #mainSwiper,
        #mainSwiper .swiper-wrapper,
        #mainSwiper .swiper-slide,
        #mainSwiper .swiper-slide img {
            touch-action: pan-y;
        }

        #mainSwiper .zoom-indicator {
            position: absolute;
            bottom: 10px;
            right: 10px;
            background: rgba(0, 0, 0, 0.6);
            color: #fff;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
            pointer-events: none;
            /* so clicks pass through */
            z-index: 10;
        }

        .desktop-row .images {
            width: 95%;
        }

        .attributes .item .image-span {
            padding: 0;
            height: auto;
        }

        .attributes .item .image-span img {
            padding: 3px;
            aspect-ratio: 1 / 1;
        }

        .video-thumb {
            aspect-ratio: 1 / 1;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #ddd;
            cursor: pointer;
            font-size: 28px;
            color: #e62117;
            background: #f3f3f3;
        }

        .video-frame {
            width: 100%;
            aspect-ratio: 1 / 1;
            border: 0;
        }

        .jdx-pulse {
            animation-name: jdx-pulse-kf;
            animation-duration: 1.4s;
            animation-timing-function: ease-in-out;
            animation-iteration-count: infinite;
            transform-origin: center;
        }

        @keyframes jdx-pulse-kf {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.09);
            }

            100% {
                transform: scale(1);
            }
        }

        .delivery_info {
            margin-bottom: 22px;
        }

        .product-sidebar-sticky {
            position: -webkit-sticky;
            position: sticky;
            top: 20px;
            align-self: flex-start;
            display: block;
            width: 100%;
            z-index: 3;
        }

        .products-details-section,
        .products-details-section .container-95,
        .products-details-section .row {
            overflow: visible;
        }

        .products-details-section .row {
            align-items: flex-start;
        }

        .delivery_info h4 {
            font-size: 20px;
            margin-bottom: 18px;
            color: #222;
        }

        .delivery-info-list {
            display: grid;
            gap: 22px;
        }

        .delivery-info-item {
            display: flex;
            align-items: flex-start;
            gap: 16px;
        }

        .delivery-info-icon {
            flex: 0 0 54px;
            width: 54px;
            height: 54px;
            border-radius: 12px;
            border: 1px solid #e1e1e1;
            color: #667085;
            background: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }

        .delivery-info-content h5 {
            margin: 0 0 6px;
            font-size: 18px;
            font-weight: 700;
            color: #222;
            line-height: 1.2;
        }

        .delivery-info-content p {
            margin: 0;
            color: #666;
            font-size: 14px;
            line-height: 1.5;
        }

        @media screen and (max-width: 991px) {
            .product-sidebar-sticky {
                position: static;
                top: auto;
                width: 100%;
                z-index: auto;
            }

            .products-details-section,
            .products-details-section .container-95,
            .products-details-section .row {
                overflow: visible;
            }

            .products-details-section .row {
                align-items: stretch;
            }

            .delivery-info-item {
                gap: 12px;
            }

            .delivery-info-icon {
                flex-basis: 48px;
                width: 48px;
                height: 48px;
                font-size: 21px;
            }
        }
    </style>
@endsection
@section('body')
    @php
        $videoUrl = trim((string) ($data->video_url ?? ''));
        $videoEmbedUrl = null;
        $videoWatchUrl = $videoUrl !== '' ? $videoUrl : null;

        if ($videoUrl !== '') {
            $parsedUrl = parse_url($videoUrl);
            $host = strtolower($parsedUrl['host'] ?? '');
            $path = $parsedUrl['path'] ?? '';

            if (Str::contains($host, ['youtube.com', 'youtu.be'])) {
                if (Str::contains($host, 'youtu.be')) {
                    $videoId = ltrim($path, '/');
                } else {
                    parse_str($parsedUrl['query'] ?? '', $queryParams);
                    $videoId = $queryParams['v'] ?? null;

                    if (!$videoId && Str::contains($path, '/shorts/')) {
                        $videoId = trim(Str::after($path, '/shorts/'), '/');
                    }
                }

                if (!empty($videoId)) {
                    $videoEmbedUrl = 'https://www.youtube.com/embed/' . $videoId;
                }
            } elseif (Str::contains($host, 'vimeo.com')) {
                $videoId = ltrim($parsedUrl['path'] ?? '', '/');
                if (!empty($videoId)) {
                    $videoEmbedUrl = 'https://player.vimeo.com/video/' . $videoId;
                }
            } else {
                $videoEmbedUrl = $videoUrl;
            }
        }
    @endphp

    <section>
        <div class="category_breadcrumb">
            <div class="container-fluid container-95">
                <div class="row">
                    <div class="col-12">
                        <p>
                            <a href="{{ route('home') }}">Home</a>
                            /
                            <a href="javascript:void(0);">{{ $data->name }}</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="products-details-section">
            <div class="container-fluid container-95">
                <div class="row">
                    <div class="col-md-9 col-12 mb-md-3 mb-2">
                        <div class="row">
                            <!--Item Gallary-->
                            <div class="col-md-5 col-12 desktop-row">
                                <div class="image swiper myMainSwiper">
                                    <div class="swiper-wrapper">
                                        @if ($videoEmbedUrl)
                                            <div class="swiper-slide video-slide">
                                                <iframe class="video-frame" data-src="{{ $videoEmbedUrl }}" src=""
                                                    title="Product Video" allow="autoplay; fullscreen; picture-in-picture"
                                                    allowfullscreen></iframe>
                                            </div>
                                        @endif
                                        <div class="swiper-slide">
                                            <img
                                                src="{{ $data->get_thumb ? asset($data->get_thumb->file_url) : asset('frontEnd/assets/images/image.png') }}">
                                        </div>
                                        @if (is_array($data->images))
                                            @foreach ($data->images as $img)
                                                <div class="swiper-slide">
                                                    <img src="{{ asset($img) }}">
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                @if (isset($data->get_gallery_images))
                                    @php
                                        $imagesCount =
                                            (is_array($data->images) ? count($data->images) : 0) +
                                            ($data->get_thumb ? 1 : 0) +
                                            ($videoEmbedUrl ? 1 : 0);
                                    @endphp

                                    <div class="images-wrapper relative">
                                        <div class="images swiper mySwiper">
                                            <div class="swiper-wrapper">
                                                @if ($videoEmbedUrl)
                                                    <div class="item swiper-slide video-thumb-slide custom-active">
                                                        <div class="video-thumb" title="Product Video">
                                                            <i class="fa fa-play-circle"></i>
                                                        </div>
                                                    </div>
                                                @endif
                                                <div class="item swiper-slide {{ $videoEmbedUrl ? '' : 'custom-active' }}">
                                                    <img src="{{ $data->get_thumb ? asset($data->get_thumb->file_url) : asset('frontEnd/assets/images/image.png') }}"
                                                        alt="">
                                                </div>
                                                @if (is_array($data->images))
                                                    @foreach ($data->images as $img)
                                                        <div class="item swiper-slide">
                                                            <img src="{{ asset($img) }}" alt="">
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>

                                        {{-- শুধু তখনই button show হবে যখন image ≥ 5 --}}
                                        @if ($imagesCount >= 4)
                                            <div class="swiper-button-next desktop-swiper-next"></div>
                                            <div class="swiper-button-prev desktop-swiper-prev"></div>
                                        @endif
                                    </div>

                                @endif

                            </div>
                            <div class="col-md-5 col-12 small-row">
                                <div class="image swiper smallMySwiper" id="mainSwiper">
                                    <div class="swiper-wrapper">
                                        @if ($videoEmbedUrl)
                                            <div class="swiper-slide video-slide">
                                                <iframe class="video-frame" data-src="{{ $videoEmbedUrl }}" src=""
                                                    title="Product Video" allow="autoplay; fullscreen; picture-in-picture"
                                                    allowfullscreen></iframe>
                                            </div>
                                        @endif
                                        <div class="swiper-slide">
                                            <img class="main-img"
                                                src="{{ $data->get_thumb ? asset($data->get_thumb->file_url) : asset('frontEnd/assets/images/image.png') }}">
                                        </div>
                                        @if (is_array($data->images))
                                            @foreach ($data->images as $img)
                                                <div class="swiper-slide">
                                                    <img class="main-img" src="{{ asset($img) }}">
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                @if (isset($data->get_gallery_images))
                                    @php
                                        $imagesCount =
                                            (is_array($data->images) ? count($data->images) : 0) +
                                            ($data->get_thumb ? 1 : 0) +
                                            ($videoEmbedUrl ? 1 : 0);
                                    @endphp
                                    <div class="images-wrapper relative">
                                        <div class="images swiper smallMySwiper2" id="thumbSwiper">
                                            <div class="swiper-wrapper">
                                                @if ($videoEmbedUrl)
                                                    <div class="item swiper-slide video-thumb-slide custom-active">
                                                        <div class="video-thumb" title="Product Video">
                                                            <i class="fa fa-play-circle"></i>
                                                        </div>
                                                    </div>
                                                @endif
                                                <div class="item swiper-slide {{ $videoEmbedUrl ? '' : 'custom-active' }}">
                                                    <img class="thumb-img"
                                                        src="{{ $data->get_thumb ? asset($data->get_thumb->file_url) : asset('frontEnd/assets/images/image.png') }}"
                                                        alt="">
                                                </div>
                                                @if (is_array($data->images))
                                                    @foreach ($data->images as $img)
                                                        <div class="item swiper-slide">
                                                            <img class="thumb-img" src="{{ asset($img) }}"
                                                                alt="">
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>

                                        </div>
                                        @if ($imagesCount >= 4)
                                            <div class="swiper-button-next mobile-swiper-next"></div>
                                            <div class="swiper-button-prev mobile-swiper-prev"></div>
                                        @endif
                                    </div>
                                @endif

                            </div>

                            <!--Item Detials-->
                            <div class="col-md-7 mb-3">
                                <h2 class="text-capitalize single_prod_title font-weight-bold">{{ $data->name }}</h2>
                                <h3 class="font-weight-bold single_prod_prices">
                                    @if ($data->sale_price != 0)
                                        <span class="text-dark text-muted-line-through">{{ $web_settings->currency_sign }}
                                            {{ \App\BanglaToEnglishConverter::en2bn($data->price) }}</span>
                                        <span class="text-red price-value">{{ $web_settings->currency_sign }}
                                            {{ \App\BanglaToEnglishConverter::en2bn($data->sale_price) }}</span>
                                    @else
                                        <span class="regular price-value">{{ $web_settings->currency_sign }}
                                            {{ \App\BanglaToEnglishConverter::en2bn($data->price) }}</span>
                                    @endif
                                </h3>
                                <p class="sku_text"><span>প্রোডাক্ট কোড: </span> <span
                                        class="p-0 pr-1 choice_attribute_sku">{{ $data->sku }}</span>
                                </p>

                                @if ($videoWatchUrl)
                                    <div class="mb-3">
                                        <a href="{{ $videoWatchUrl }}" target="_blank" rel="noopener noreferrer"
                                            class="btn btn-outline-danger btn-sm">
                                            <i class="fa fa-youtube-play"></i> Watch product video
                                        </a>
                                    </div>
                                @endif
                                {{-- <h4 class="single_prod_in_stock">স্টক : @if ($data->stock > 0)<span class="text-success">ইন স্টক</span> @else <span
                                        class="text-danger">স্টক আউট</span>@endif</h4> --}}

                                {{-- <div class="qty_div">
                                    <a style="color: black" href="{{route('cart.item.minus',$data->id)}}"><i class="fa fa-minus" id="qty_minus"></i></a>
                                    <input type="text" name="qty" id="qty" min="1" value="{{$qty ?? 1}}" readonly>
                                    <a style="color: black" href="{{route('cart.item.plus',$data->id)}}"><i class="fa fa-plus" id="qty_plus"></i></a>
                                </div> --}}

                                <form action="{{ route('add.cart', $data->id) }}" method="post">
                                    @csrf
                                    <div class="d-flex">
                                        <div class="qty-text-div">
                                            <span>পরিমান : </span>
                                        </div>
                                        <div class="qty_div">
                                            <div class="minus-qty-div">
                                                <i class="fa fa-minus" id="qty_minus"></i>
                                            </div>
                                            <div class="qty-div">
                                                <input type="text" name="qty" id="qty" min="1"
                                                    value="{{ $qty ?? 1 }}" readonly>
                                            </div>
                                            <div class="plus-qty-div">
                                                <i class="fa fa-plus" id="qty_plus"></i>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- @if ($data->has_variant == 1)
                                        <input type="hidden" name="choice_attributes" id="choice_attributes"
                                            class="choice_attributes">
                                        <div class="attributes mt-3">
                                            <div class="item">

                                                @foreach ($data->get_choice_attributes() as $key => $att)
                                                    <div class="row mb-2">
                                                        <div class="col-md-12 col-12">
                                                            <label class="mb-1"><b>{{ $att['attribute_name'] }}</b></label><br>
                                                            <input type="hidden" name="attribute_id[]"
                                                                value="{{ $att['attribute_id'] }}">
                                                            @php($k = 0)
                                                            @foreach ($att['values'] as $key2 => $attr_item)
                                                                <input type="radio"
                                                                    id="val_{{ $key }}{{ $key2 }}"
                                                                    name="attribute_item_id[{{ $att['attribute_id'] }}][]"
                                                                    value="{{ $attr_item }}" class="attr_checkbox"
                                                                    {{ $k == 0 ? 'checked' : '' }}>
                                                                <label class="mb-0"
                                                                    for="val_{{ $key }}{{ $key2 }}">
                                                                    <span>{{ $attr_item }}</span>
                                                                </label>
                                                                @php($k++)
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif --}}
                                    @if ($data->has_variant == 1)
                                        <input type="hidden" name="choice_attributes" id="choice_attributes"
                                            class="choice_attributes">
                                        <div class="attributes mt-3">
                                            <div class="item">
                                                @foreach ($data->get_choice_attributes as $key => $attribute)
                                                    <div class="row mb-2">
                                                        <div class="col-md-12 col-12 item-val">
                                                            <label class="mb-1"><b>{{ Str::ucfirst($attribute->get_attribute->title) }}
                                                                    :
                                                                    <strong class="item_name">
                                                                        @foreach ($attribute->get_choice_attribute_items as $item)
                                                                            @if ($loop->first)
                                                                                {{ $item->attribute_item_name }}
                                                                            @endif
                                                                        @endforeach
                                                                    </strong></b></label><br>
                                                            <input type="hidden" name="attribute_id[]"
                                                                value="{{ $attribute->get_attribute->id }}">

                                                            @foreach ($attribute->get_choice_attribute_items as $key2 => $item)
                                                                @if (isset($item->image))
                                                                    <input type="radio"
                                                                        id="val_{{ $key }}{{ $key2 }}"
                                                                        name="attribute_item_id[{{ $attribute->get_attribute->id }}][]"
                                                                        value="{{ $item->attribute_item_name }}"
                                                                        class="attr_checkbox attr_image_checkbox"
                                                                        data-image="{{ $item->image }}"
                                                                        @if ($loop->first) checked @endif>
                                                                    <label class="mb-0"
                                                                        for="val_{{ $key }}{{ $key2 }}">
                                                                        <span class="image-span">
                                                                            <img class="attr_img"
                                                                                src="{{ asset($item->image) ?? asset('frontEnd/images/no_image.png') }}"
                                                                                height="50" width="50"
                                                                                alt="{{ $item->attribute_item_name }}">
                                                                        </span>
                                                                    </label>
                                                                @else
                                                                    <input type="radio"
                                                                        id="val_{{ $key }}{{ $key2 }}"
                                                                        name="attribute_item_id[{{ $attribute->get_attribute->id }}][]"
                                                                        value="{{ $item->attribute_item_name }}"
                                                                        class="attr_checkbox"
                                                                        @if ($loop->first) checked @endif>
                                                                    <label class="mb-0"
                                                                        for="val_{{ $key }}{{ $key2 }}">
                                                                        <span>{{ $item->attribute_item_name }}</span>
                                                                    </label>
                                                                @endif
                                                            @endforeach

                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif

                                    <div class="mt-md-4 m-2">
                                        <button type="button" class="btn px-5 py-2 mr-md-2 add_cart_btn"
                                            data-has_variant="{{ 'false' }}" data-slug="{{ $data->slug }}"
                                            data-id="{{ $data->id }}" name="add_cart">কার্টে
                                            রাখুন</button>
                                        <button type="button" class="btn px-5 py-2 order_now_btn jdx-pulse"
                                            data-has_variant="{{ 'false' }}" data-slug="{{ $data->slug }}"
                                            data-id="{{ $data->id }}" name="order_now">অর্ডার করুন</button>
                                    </div>
                                </form>

                                <div class="mt-md-4 mt-3">
                                    <h4 class="font-weight-bold">ফোনে অর্ডারের জন্য ডায়াল করুন</h4>

                                    @if ($web_settings->website_phone)
                                        <h4 class="font-weight-bold">
                                            <a href="tel:{{ $web_settings->website_phone }}">
                                                <i class="fa fa-phone"></i>
                                                {{ $web_settings->website_phone }}
                                            </a>
                                        </h4>
                                    @endif

                                    @if ($web_settings->website_phone2)
                                        <h4 class="font-weight-bold">
                                            <a href="tel:{{ $web_settings->website_phone2 }}">
                                                <i class="fa fa-phone"></i>
                                                {{ $web_settings->website_phone2 }}
                                            </a>
                                        </h4>
                                    @endif

                                    @if ($web_settings->website_phone3)
                                        <h4 class="font-weight-bold">
                                            <a href="tel:{{ $web_settings->website_phone3 }}">
                                                <i class="fa fa-phone"></i>
                                                {{ $web_settings->website_phone3 }}
                                            </a>
                                        </h4>
                                    @endif
                                </div>


                                {{-- <div class="mt-md-3 mt-2">
                                    @if ($web_settings->website_phone)
                                        <h4 class="font-weight-bold">
                                            <a class="btn btn-success call-btn" href="tel:{{ $web_settings->website_phone }}">
                                                <span>কল করতে ক্লিক করুন</span><br>
                                                <i class="fa fa-phone text-warning"></i>
                                                {{ $web_settings->website_phone }}
                                            </a>
                                        </h4>
                                    @endif

                                    @if ($web_settings->website_phone2)
                                        <h4 class="font-weight-bold">
                                            <a class="btn btn-success call-btn" href="tel:{{ $web_settings->website_phone2 }}">
                                                <span>কল করতে ক্লিক করুন</span><br>
                                                <i class="fa fa-phone text-warning"></i>
                                                {{ $web_settings->website_phone2 }}
                                            </a>
                                        </h4>
                                    @endif

                                    @if ($web_settings->website_phone3)
                                        <h4 class="font-weight-bold">
                                            <a class="btn btn-success call-btn" href="tel:{{ $web_settings->website_phone3 }}">
                                                <span>কল করতে ক্লিক করুন</span><br>
                                                <i class="fa fa-phone text-warning"></i>
                                                {{ $web_settings->website_phone3 }}
                                            </a>
                                        </h4>
                                    @endif
                                </div> --}}

                                {{-- <div class="fb-share-button mt-3" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button" data-size="large">
                                    <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore"></a>
                                </div> --}}

                                @if ($shipping_methods->count() > 0 && $data->is_free_delivery == 0)
                                    <div class="col-12 mt-3 delivery_details" style="padding: 0">
                                        <table class="table" style="color:#08c !important">
                                            <tbody>
                                                @foreach ($shipping_methods as $item)
                                                    <tr>
                                                        <td style="padding-left: 0;border-bottom: 1px solid #ddd;">
                                                            {{ $item->text }}
                                                        </td>
                                                        <td style="border-bottom: 1px solid #ddd;">
                                                            <b>{{ $web_settings->currency_sign }} {{ $item->amount }}</b>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @endif
                                <h6 class="font-weight-bold text-danger mt-md-3 mt-2">
                                    {{ $web_settings->bkash_merchant_numb }}
                                </h6>
                            </div>
                        </div>

                        <!--Item Description-->
                        <div class="row">
                            <div class="col-md-12 col-12">
                                <ul class="nav nav-tabs nav-tabs-mod" id="productDetailsTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" id="product-description-tab" data-toggle="tab"
                                            href="#product-description-pane" role="tab"
                                            aria-controls="product-description-pane" aria-selected="true">পন্যের বিবরণ</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="delivery-return-policy-tab" data-toggle="tab"
                                            href="#delivery-return-policy-pane" role="tab"
                                            aria-controls="delivery-return-policy-pane" aria-selected="false">ডেলিভারি এবং রিটার্ন পলিসি</a>
                                    </li>
                                </ul>
                                <div class="tab-content tab-content-mod" id="productDetailsTabContent">
                                    <div class="tab-pane fade show active" id="product-description-pane" role="tabpanel"
                                        aria-labelledby="product-description-tab">
                                        <div>
                                            {!! $data->description !!}
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="delivery-return-policy-pane" role="tabpanel"
                                        aria-labelledby="delivery-return-policy-tab">
                                        <div>
                                            {!! $page_settings->delivery_policy !!}
                                            {{-- {!! $page_settings->return_policy !!} --}}
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-3 product-sidebar-sticky d-none d-md-block">
                        <div class="delivery_info">
                            <h4 class="font-weight-bold">ডেলিভারি তথ্য</h4>
                            <div class="delivery-info-list">
                                <div class="delivery-info-item">
                                    <div class="delivery-info-icon">
                                        <i class="fa fa-check"></i>
                                    </div>
                                    <div class="delivery-info-content">
                                        <h5>পরামর্শ</h5>
                                        <p>পণ্য ডেলিভারি নেওয়ার সময় অবশ্যই ভালোভাবে দেখে বুঝে নিন।</p>
                                    </div>
                                </div>

                                <div class="delivery-info-item">
                                    <div class="delivery-info-icon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <div class="delivery-info-content">
                                        <h5>অভিযোগ</h5>
                                        <p>পণ্য সম্পর্কে কোনো অভিযোগ থাকলে ডেলিভারি ম্যানের সামনে থাকতেই আমাদের কল করুন।</p>
                                    </div>
                                </div>

                                <div class="delivery-info-item">
                                    <div class="delivery-info-icon">
                                        <i class="fa fa-credit-card"></i>
                                    </div>
                                    <div class="delivery-info-content">
                                        <h5>পেমেন্ট</h5>
                                        <p>পণ্য বুঝে পেয়ে তারপর ডেলিভারি ম্যানকে পেমেন্ট করবেন।</p>
                                    </div>
                                </div>

                                <div class="delivery-info-item">
                                    <div class="delivery-info-icon">
                                        <i class="fa fa-tag"></i>
                                    </div>
                                    <div class="delivery-info-content">
                                        <h5>রিভিউ</h5>
                                        <p>পণ্য রিসিভ করার পর এটি সম্পর্কে একটি ভিডিও রিভিউ দিন।</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="features">
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="icon"><i class="fa fa-thumbs-up" style="color: #666"></i></td>
                                        <td class="text">100% original products</td>
                                    </tr>

                                    <tr>
                                        <td class="icon"><i class="fa fa-money" style="color: #666"></i></td>
                                        <td class="text">Pay cash on delivery</td>
                                    </tr>

                                    <tr>
                                        <td class="icon"><i class="fa fa-shopping-cart"
                                                style="color: #666;vertical-align: top"></i></td>
                                        <td class="text">Delivery within: 2-3 business days</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="feature-products d-md-block d-none">
                            <p>প্রয়োজনীয় প্রোডাক্ট</p>
                            <div class="feature-products-wrapper">
                                <table>
                                    @foreach ($feature_prod as $item)
                                        <tr>
                                            <td class="img">
                                                <a href="{{ route('single.product', [$item->slug, $item->id]) }}">
                                                    <img width="50"
                                                        src="{{ $item->get_thumb ? asset($item->get_thumb->file_url) : asset('frontEnd/images/no_image.png') }}"
                                                        alt="">
                                                </a>
                                            </td>
                                            <td class="title">
                                                <a href="{{ route('single.product', [$item->slug, $item->id]) }}"
                                                    class="text-dark">
                                                    {{ $item->name }}
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-5 related-products">
                    <div class="col-md-12">
                        <h4 class="mb-3">রিলেটেড প্রোডাক্ট</h4>
                    </div>

                    @foreach ($related_prod as $item)
                        <div class="main-product">
                            <div class="main-product-inner-wrapper text-center">
                                <a href="{{ route('single.product', [$item->slug, $item->id]) }}">
                                    <img src="{{ $item->get_image ? asset($item->get_image->file_url) : asset('frontEnd/images/no_image.png') }}"
                                        alt="{{ $item->name }}">
                                </a>
                                @if ($item->sale_price != 0)
                                    <p class="mb-0" style="text-decoration: line-through;color: #b8b8b8">
                                        {{ $web_settings->currency_sign }}
                                        {{ \App\BanglaToEnglishConverter::en2bn($item->price) }}</p>
                                    <p class="font-weight-bold mb-0" style="color: #fca204">
                                        {{ $web_settings->currency_sign }}
                                        {{ \App\BanglaToEnglishConverter::en2bn($item->sale_price) }}</p>
                                @else
                                    <p class="font-weight-bold mb-0" style="margin-top: 24px;color: #fca204">
                                        {{ $web_settings->currency_sign }}
                                        {{ \App\BanglaToEnglishConverter::en2bn($item->price) }}</p>
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
                </div>


            </div>
        </div>
    </section>
@endsection


{{-- ============================================================
     FIXED GALLERY SCRIPTS — replace the entire @section('script')
     block in your original file with this one.
     ============================================================ --}}

@section('script')
    <script src="{{ asset('frontEnd') }}/plugins/small-zoom/panzoom.min.js"></script>
    <script src="{{ asset('frontEnd') }}/plugins/desktop-zoom/zoomsl.js"></script>
    <script src="{{ asset('frontEnd') }}/plugins/desktop-zoom/script.js"></script>
    <script src="{{ asset('frontEnd') }}/plugins/swiper/js/swiper-bundle.min.js"></script>

    {{-- ── Quantity & variant helpers (unchanged) ── --}}
    <script>
        $('#qty_plus').on('click', function() {
            var qty = parseInt($('#qty').val()) || 1;
            $('#qty').val(qty + 1);
            get_variant();
        });

        $('#qty_minus').on('click', function() {
            var qty = parseInt($('#qty').val()) || 1;
            if (qty > 1) $('#qty').val(qty - 1);
            get_variant();
        });

        $(document).ready(function() {
            var attrs = [];
            $(".attr_checkbox:checked").each(function() {
                attrs.push($(this).val());
            });
            $('.choice_attributes').val(attrs);
            get_variant();
        });

        function get_variant() {
            $('.loader-wrapper').addClass('active');
            $('.loader').addClass('active');

            var attrs = [];
            $(".attr_checkbox:checked").each(function() {
                attrs.push($(this).val());
            });

            $.ajax({
                type: "POST",
                url: `{{ route('ajax.get.variant') }}`,
                data: {
                    _token: `{{ csrf_token() }}`,
                    choice_attributes: attrs,
                    id: "{{ $data->id }}",
                    quantity: $('#qty').val()
                },
                success: function(res) {
                    $('.sku-value, .choice_attribute_sku').text(res.sku);
                    $('.price-value').text(res.price);
                    $('.sub-total-value').text(res.subtotal);
                    $('.choice_attribute_sku').val(res.choice_attributes);
                    $('#choice_attributes').val(res.choice_attributes);

                    $.each(res.item_name, function(idx, val) {
                        var formatted = val.replace(/_/g, ' ')
                            .split('-')
                            .map(function(p) {
                                return p.split(' ').map(function(w) {
                                    return w.charAt(0).toUpperCase() + w.slice(1);
                                }).join(' ');
                            }).join('-');
                        $('.item-val').eq(idx).find('.item_name').text(formatted);
                    });

                    $('.loader-wrapper').removeClass('active');
                    $('.loader').removeClass('active');
                }
            });
        }

        $(document).on('click', '.attr_checkbox', function() {
            $(this).parent().parent().find('.attribute-name-value').text($(this).val());
            get_variant();
        });
    </script>

    {{-- ══════════════════════════════════════════════════════════
         DESKTOP GALLERY  (≥ 426 px)
    ══════════════════════════════════════════════════════════ --}}
    <script>
        $(document).ready(function() {

            var hasVideo = @json((bool) $videoEmbedUrl);
            var initialIndex = 0; // always start at slide 0 (video first if present)

            /* ── 1. Init Swipers ── */
            var mainSwiperD = new Swiper(".myMainSwiper", {
                spaceBetween: 10,
                effect: "fade",
                speed: 300,
                initialSlide: initialIndex,
                allowTouchMove: true
            });

            var thumbSwiperD = new Swiper(".mySwiper", {
                slidesPerView: 4,
                spaceBetween: 10,
                initialSlide: initialIndex,
                watchSlidesProgress: true,
                watchSlidesVisibility: true,
                navigation: {
                    nextEl: ".desktop-swiper-next",
                    prevEl: ".desktop-swiper-prev"
                }
            });

            /* ── 2. Active-thumb helper ── */
            function setDesktopThumbActive(index) {
                $(".mySwiper .swiper-slide").removeClass("custom-active");
                $(".mySwiper .swiper-slide").eq(index).addClass("custom-active");
            }

            /* ── 3. Autoplay helper for video iframes ── */
            function autoplayUrl(url) {
                if (!url) return '';
                var sep = url.indexOf('?') > -1 ? '&' : '?';
                var lower = url.toLowerCase();
                if (lower.indexOf('youtube.com') > -1 || lower.indexOf('youtu.be') > -1)
                    return url + sep + 'autoplay=1&mute=1&playsinline=1&rel=0';
                if (lower.indexOf('vimeo.com') > -1)
                    return url + sep + 'autoplay=1&muted=1';
                return url + sep + 'autoplay=1&muted=1';
            }

            function syncDesktopVideo() {
                var activeIdx = mainSwiperD.activeIndex;
                var $activeSlide = $(".myMainSwiper .swiper-slide").eq(activeIdx);

                $(".myMainSwiper .video-slide iframe").each(function() {
                    var $f = $(this);
                    var isHere = $f.closest(".swiper-slide")[0] === $activeSlide[0];
                    if (isHere) {
                        var want = autoplayUrl($f.data('src'));
                        if ($f.attr('src') !== want) $f.attr('src', want);
                    } else {
                        if ($f.attr('src')) $f.attr('src', '');
                    }
                });
            }

            /* ── 4. Desktop image-zoom ── */
            function initZoom() {
                $(".myMainSwiper .swiper-slide img").trigger("destroy").removeClass("block__pic");
                var $active = $(".myMainSwiper .swiper-slide.swiper-slide-active");
                if ($active.find("iframe").length) return;
                var $img = $active.find("img");
                if (!$img.length) return;
                $img.addClass("block__pic");
                $img.imagezoomsl({
                    zoomrange: [3, 3]
                });
            }

            /* ── 5. Central "go to slide N" for desktop ── */
            var desktopLocked = false; // prevents mutual re-entrancy

            function desktopGoTo(index) {
                if (desktopLocked) return;
                desktopLocked = true;

                if (mainSwiperD.activeIndex !== index) mainSwiperD.slideTo(index);
                if (thumbSwiperD.activeIndex !== index) thumbSwiperD.slideTo(index);
                setDesktopThumbActive(index);

                setTimeout(function() {
                    desktopLocked = false;
                }, 350);
            }

            /* ── 6. Thumb slide click ── */
            $(document).on("click", ".mySwiper .swiper-slide", function() {
                desktopGoTo($(this).index());
            });

            /* ── 7. Swiper event listeners (fire AFTER transition) ── */
            mainSwiperD.on('slideChangeTransitionEnd', function() {
                desktopGoTo(mainSwiperD.activeIndex);
                initZoom();
                syncDesktopVideo();
            });

            thumbSwiperD.on('slideChange', function() {
                // only sync main when the thumb swiper moves via buttons (not click)
                if (!desktopLocked) desktopGoTo(thumbSwiperD.activeIndex);
            });

            /* ── 8. Attribute colour-image click ── */
            function normalizeUrl(url) {
                try {
                    return new URL(url, window.location.origin).href;
                } catch (e) {
                    return (url || '').toString();
                }
            }

            function desktopSlideIndexByImage(imageUrl) {
                var target = normalizeUrl(imageUrl);
                var found = -1;
                $('.mySwiper .swiper-slide img').each(function() {
                    if (normalizeUrl($(this).attr('src')) === target) {
                        found = $(this).closest('.swiper-slide').index();
                        return false;
                    }
                });
                return found;
            }

            $(document).on("click", ".attr_image_checkbox", function() {
                var colorImg = $(this).data("image");
                if (!colorImg) return;
                var url = "{{ asset('') }}" + colorImg.replace(/^\/+/, '');
                var idx = desktopSlideIndexByImage(url);
                if (idx > -1) desktopGoTo(idx);
            });

            /* ── 9. Page load ── */
            var $checked = $(".attr_image_checkbox:checked").first();
            if ($checked.length) {
                var url = "{{ asset('') }}" + ($checked.data("image") || '').replace(/^\/+/, '');
                var idx = desktopSlideIndexByImage(url);
                desktopGoTo(idx > -1 ? idx : initialIndex);
            } else {
                desktopGoTo(initialIndex);
            }

            initZoom();
            syncDesktopVideo();
        });
    </script>

    {{-- ══════════════════════════════════════════════════════════
         MOBILE GALLERY  (≤ 425 px)
    ══════════════════════════════════════════════════════════ --}}
    <script>
        $(document).ready(function() {

            var hasVideo = @json((bool) $videoEmbedUrl);
            var initialIndex = 0;

            /* ── 1. Init Swipers ── */
            var mainSwiperM = new Swiper("#mainSwiper", {
                spaceBetween: 10,
                initialSlide: initialIndex,
                allowTouchMove: true,
                touchStartPreventDefault: false,
                touchMoveStopPropagation: false,
                passiveListeners: true
            });

            var thumbSwiperM = new Swiper("#thumbSwiper", {
                slidesPerView: 4,
                spaceBetween: 10,
                initialSlide: initialIndex,
                touchStartPreventDefault: false,
                touchMoveStopPropagation: false,
                navigation: {
                    nextEl: ".mobile-swiper-next",
                    prevEl: ".mobile-swiper-prev"
                }
            });

            /* ── 2. Panzoom helpers ── */
            function destroyPanzoom(img) {
                if (!img) return;
                if (img._panzoomWheel) {
                    img.removeEventListener("wheel", img._panzoomWheel);
                    img._panzoomWheel = null;
                }
                if (img._panzoom) {
                    img._panzoom.destroy();
                    img._panzoom = null;
                }
                $(img).off("click dblclick");
            }

            function setupPanzoom(img) {
                if (!img) return;
                destroyPanzoom(img);

                var pz = Panzoom(img, {
                    maxScale: 5,
                    minScale: 1,
                    contain: 'outside',
                    touchAction: 'pan-y'
                });
                img._panzoom = pz;
                img._panzoomWheel = pz.zoomWithWheel;
                img.addEventListener("wheel", img._panzoomWheel);

                $(img).on("click", function(e) {
                    e.preventDefault();
                    pz.getScale() > 1 ? pz.reset({
                            animate: true
                        }) :
                        pz.zoomToPoint(2, e, {
                            animate: true
                        });
                });
                $(img).on("dblclick", function(e) {
                    e.preventDefault();
                    pz.getScale() > 1 ? pz.reset({
                            animate: true
                        }) :
                        pz.zoomToPoint(3, e, {
                            animate: true
                        });
                });
            }

            function clearAllPanzoom() {
                $("#mainSwiper .swiper-slide img").each(function() {
                    destroyPanzoom(this);
                });
            }

            /* ── 3. Active-thumb helper ── */
            function setMobileThumbActive(index) {
                $("#thumbSwiper .swiper-slide").removeClass("custom-active");
                $("#thumbSwiper .swiper-slide").eq(index).addClass("custom-active");
            }

            /* ── 4. Video autoplay helper ── */
            function autoplayUrl(url) {
                if (!url) return '';
                var sep = url.indexOf('?') > -1 ? '&' : '?';
                var lower = url.toLowerCase();
                if (lower.indexOf('youtube.com') > -1 || lower.indexOf('youtu.be') > -1)
                    return url + sep + 'autoplay=1&mute=1&playsinline=1&rel=0';
                if (lower.indexOf('vimeo.com') > -1)
                    return url + sep + 'autoplay=1&muted=1';
                return url + sep + 'autoplay=1&muted=1';
            }

            function syncMobileVideo() {
                var activeIdx = mainSwiperM.activeIndex;
                var $activeSlide = $("#mainSwiper .swiper-slide").eq(activeIdx);

                $("#mainSwiper .video-slide iframe").each(function() {
                    var $f = $(this);
                    var isHere = $f.closest(".swiper-slide")[0] === $activeSlide[0];
                    if (isHere) {
                        var want = autoplayUrl($f.data('src'));
                        if ($f.attr('src') !== want) $f.attr('src', want);
                    } else {
                        if ($f.attr('src')) $f.attr('src', '');
                    }
                });
            }

            /* ── 5. Zoom-indicator helpers ── */
            function addZoomHint($slide) {
                $slide.find(".zoom-indicator").remove();
                if ($slide.find("img").length) {
                    $slide.append('<div class="zoom-indicator">Click for Zoom</div>');
                }
            }

            /* ── 6. Central "go to slide N" for mobile ── */
            var mobileLocked = false;

            function mobileGoTo(index) {
                if (mobileLocked) return;
                mobileLocked = true;

                if (mainSwiperM.activeIndex !== index) mainSwiperM.slideTo(index);
                if (thumbSwiperM.activeIndex !== index) thumbSwiperM.slideTo(index);
                setMobileThumbActive(index);

                // Setup panzoom for the target slide's image
                clearAllPanzoom();
                var $slide = $("#mainSwiper .swiper-slide").eq(index);
                var img = $slide.find("img")[0];
                if (img) {
                    setupPanzoom(img);
                    addZoomHint($slide);
                }

                syncMobileVideo();
                setTimeout(function() {
                    mobileLocked = false;
                }, 350);
            }

            /* ── 7. Thumb click ── */
            $(document).on("click", "#thumbSwiper .swiper-slide", function() {
                mobileGoTo($(this).index());
            });

            /* ── 8. Main swiper swipe → sync thumb ── */
            mainSwiperM.on("slideChangeTransitionEnd", function() {
                mobileGoTo(mainSwiperM.activeIndex);
            });

            /* ── 9. Thumb swiper navigation-button change → sync main ── */
            thumbSwiperM.on("slideChange", function() {
                if (!mobileLocked) mobileGoTo(thumbSwiperM.activeIndex);
            });

            /* ── 10. Attribute colour-image click ── */
            function normalizeUrl(url) {
                try {
                    return new URL(url, window.location.origin).href;
                } catch (e) {
                    return (url || '').toString();
                }
            }

            function mobileSlideIndexByImage(imageUrl) {
                var target = normalizeUrl(imageUrl);
                var found = -1;
                $('#thumbSwiper .swiper-slide img').each(function() {
                    if (normalizeUrl($(this).attr('src')) === target) {
                        found = $(this).closest('.swiper-slide').index();
                        return false;
                    }
                });
                return found;
            }

            $(document).on("click", ".attr_image_checkbox", function() {
                var colorImg = $(this).data("image");
                if (!colorImg) return;
                var url = "{{ asset('') }}" + colorImg;
                var idx = mobileSlideIndexByImage(url);
                if (idx > -1) mobileGoTo(idx);
            });

            /* ── 11. Page load ── */
            var $checked = $(".attr_image_checkbox:checked").first();
            if ($checked.length) {
                var url = "{{ asset('') }}" + ($checked.data("image") || '');
                var idx = mobileSlideIndexByImage(url);
                mobileGoTo(idx > -1 ? idx : initialIndex);
            } else {
                mobileGoTo(initialIndex);
            }

            syncMobileVideo();
        });
    </script>
    
    <script>
        window.dataLayer = window.dataLayer || [];
        
        var productPrice = {{ (float) ($data->sale_price > 0 ? $data->sale_price : $data->price) }};
        var productId = "{!! $data->id !!}";
        var productName = {!! json_encode($data->name) !!};
        var productCategory = {!! json_encode($data->get_category ? $data->get_category->category_name : '') !!};
        var productSku = {!! json_encode($data->sku) !!};

        dataLayer.push({
            event: "view_item",
            ecommerce: {
                currency: "BDT",
                value: productPrice,
                items: [{
                    item_id: productId,
                    item_name: productName,
                    item_category: productCategory,
                    price: productPrice,
                    quantity: 1
                }]
            }
        });

        window.WC_PRODUCT_DATA = {
            item_id: productId,
            item_name: productName,
            price: productPrice,
            item_category: productCategory,
            sku: productSku,
            item_brand: "Juta Bajar"
        };

    </script>
@endsection
