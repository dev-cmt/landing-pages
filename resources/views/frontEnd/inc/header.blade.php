@php
    $categories = \App\Category::where('status',1)->get();
@endphp
<header>
    <div class="header-top">
        <div class="container-fluid container-95">
            <div class="row">
                <div class="col-md-6 col-7">
                    <div class="header-left">
                        <ul>
                            <li>
                                <a href="tel:{{$web_settings->website_phone}}"><span>হটলাইনঃ</span>
                                     {{\App\BanglaToEnglishConverter::en2bn($web_settings->website_phone) ?? null}}
                                </a>
                            </li>
                            <li class="d-md-inline-block d-none">
                                <a href="mailto:{{$web_settings->website_email}}"><span>ই-মেইলঃ</span> {{$web_settings->website_email}}</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-6 col-5">
                    <div class="header-right">
                        <ul>
                            <li>
                                <i class="ti ti-home"></i>
                                <a href="{{route('home')}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                         stroke-width="1.5"
                                         stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-home">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M5 12l-2 0l9 -9l9 9l-2 0"/>
                                        <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"/>
                                        <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"/>
                                    </svg>
                                    <span>হোম</span>
                                </a>
                            </li>
                            @if(Auth::guard('web')->check())
                                <li class="position-relative">
                                    <a href="{{route('customer.dashboard')}}" class="user-btn"><span class="text-uppercase"><i class="ti ti-user"></i> {{Auth::guard('web')->user()->name}}</span></a>
                                    <ul>
                                        <li><a href=""></a></li>
                                    </ul>
                                </li>
                            @else
                                <li>
                                    <a href="" class="sign-in-btn">
                                        <span>সাইন ইন</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="" class="sign-up-btn">
                                        <span>সাইন আপ</span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>

                    {{--for mobile--}}
                    <div class="header-right-m">
                        <ul>
                            <li class="position-relative">
                                @if(Auth::guard('web')->check())
                                    <a href="{{route('customer.dashboard')}}"><i class="fa fa-user" {{--id="account-btn"--}}></i></a>
                                @else
                                    <a href="" class="sign-in-btn-m">
                                        <span>সাইন ইন</span>
                                    </a>
                                @endif
                                {{--<div class="login-float">
                                    <div class="card">
                                        <div class="card-header">
                                            <p>কাস্টমার সাইন ইন</p>
                                        </div>
                                        <div class="card-body">
                                            <form action="{{route('login')}}" method="post">
                                                @csrf
                                                <div class="form-group mb-2">
                                                    <input type="text" name="email_phone" class="form-control" placeholder="ফোন নাম্বার/ই-মেইল">
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" name="password" class="form-control" placeholder="পাসওয়ার্ড">
                                                </div>
                                                <button type="submit" class="btn w-100 sign-in-btn">সাবমিট</button>
                                                <p>নতুন কাস্টমার? <a href="{{route('register')}}" style="color: red">সাইন আপ করুন</a></span>
                                            </form>
                                        </div>
                                    </div>

                                </div>--}}
                            </li>
                            <li class="position-relative">
                                <i class="fa fa-bars" id="header-top-menu-btn"></i>
                                <div class="header-top-menu-m">
                                    <ul>
                                        <li>
                                            <span class="ti ti-home"></span>
                                            <a href="{{route('home')}}">
                                                <span>হোম</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header">
        <div class="container-fluid container-95">
            <div class="row" style="display: flex;align-items: center;justify-content: center;align-content: center;">
                <div class="col-4 d-md-none cat_menu_btn_m">
                    <ul>
                        <li>
                            <i class="fa fa-bars" id="cat_menu_mobile_btn"></i>
                        </li>
                        <li>
                            <i class="fa fa-search" id="search_mobile_btn"></i>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3 col-7 logo-m">
                    <div class="logo">
                        <a href="{{route('home')}}"><img
                                src="{{$web_settings->get_logo ? asset($web_settings->get_logo->file_url) : asset('frontEnd/images/no_image.png')}}" alt=""></a>
                    </div>
                </div>

                <div class="col-md-6 d-none d-md-block">
                    <div class="search">
                        <form action="{{route('search')}}" method="get">
                            <input type="text" name="query" class="search-input" placeholder="প্রোডাক্ট সার্চ করুন..." autocomplete="off">
                            <button type="submit" class="search-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                     stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-search">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"/>
                                    <path d="M21 21l-6 -6"/>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>

                <div class="col-md-3 text-md-right text-center cart-m">
                    <div class="cart d-inline-block position-relative">
                        @if(Cart::getContent()->count() > 0)
                            <span class="badge badge-danger rounded-circle">{{Cart::getContent()->count()}}</span>
                        @endif
                        <a href="{{route('checkout')}}" class="cart-icon"><i class="fa fa-shopping-basket"></i></a>
                        {{--                        <a href="{{route('checkout')}}" class="cart-icon"><img src="{{asset('frontEnd/images/shopping-cart1.png')}}" alt=""></a>--}}
                    </div>
                </div>
            </div>
        </div>

        <div class="cat_menu_m">
            <ul>
                <li>
                    <a href="{{route('home')}}"><i class="ti ti-home"></i> হোম</a>
                </li>
                @foreach($categories as $cat)
                    <li>
                        <a href="{{route('single.category',$cat->id)}}"><i class="ti ti-caret-right"></i> {{$cat->category_name}}</a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="search-form-m">
            <form action="{{route('search')}}" method="get">
                <input type="text" name="query" class="form-control" placeholder="প্রোডাক্ট সার্চ করুন..." autocomplete="off">
                <button type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </form>
            {{--<input type="text" name="q" id="searchMf" class="form-control" value="" placeholder="সার্চ করুন" autocomplete="off"><span
                role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span>
            <button type="submit">
                <i class="fa fa-search"></i>
            </button>--}}
            <button class="search_btnclose">
                <i class="fa fa-times-circle"></i>
            </button>
        </div>
    </div>

    {{--<div class="header-bottom d-md-block d-none">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="cat_menu">
                        <ul>
                            <li>
                                <a href="{{route('home')}}">Home</a>
                            </li>
                            @foreach($categories as $cat)
                                <li>
                                    <a href="{{route('single.category',$cat->id)}}">{{$cat->category_name}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>--}}
</header>
