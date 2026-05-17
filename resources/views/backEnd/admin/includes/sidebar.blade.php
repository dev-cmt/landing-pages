<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">

                    <li class="nav-item">
                        @if(Auth::guard('admin')->check())
                            <a class="nav-link {{request()->is('admin') ? "active" : ""}}" href="{{route('admin.home')}}">
                                <i class="fas fa-fw fa-desktop"></i>
                                Dashboard
                            </a>
                        @elseif(Auth::guard('manager')->check())
                            <a class="nav-link {{request()->is('manager') ? "active" : ""}}" href="{{route('manager.home')}}">
                                <i class="fas fa-fw fa-desktop"></i>
                                Dashboard
                            </a>
                        @elseif(Auth::guard('employee')->check())
                            <a class="nav-link {{request()->is('employee') ? "active" : ""}}" href="{{route('employee.home')}}">
                                <i class="fas fa-fw fa-desktop"></i>
                                Dashboard
                            </a>
                        @endif
                    </li>

                    <li class="nav-item">
                        @if(Auth::guard('admin')->check())
                            <a class="nav-link {{request()->is('admin-customers*') ? "active" : ""}}" href="{{route('admin.customers')}}">
                                <i class="fas fa-fw fa-users"></i>
                                Customers
                            </a>
                        @endif
                    </li>

                    <li class="nav-item">
                        @if(Auth::guard('admin')->check())
                            <a class="nav-link {{request()->is('admin-orders*') || request()->is('admin-orders*') ? "active" : ""}}" href="{{route('admin.orders')}}">
                                <i class="fas fa-fw fa-cart-plus"></i>
                                Orders
                            </a>
                        @elseif(Auth::guard('manager')->check())
                            <a class="nav-link {{request()->is('manager-orders*') || request()->is('manager-p_orders*') ? "active" : ""}}"
                               href="{{route('manager.orders')}}">
                                <i class="fas fa-fw fa-cart-plus"></i>
                                Orders
                            </a>
                        @elseif(Auth::guard('employee')->check())
                            <a class="nav-link {{request()->is('employee-orders*') || request()->is('employee-orders*') ? "active" : ""}}"
                               href="{{route('employee.orders')}}">
                                <i class="fas fa-fw fa-cart-plus"></i>
                                Orders
                            </a>
                        @endif
                    </li>
                    <li class="nav-item" style="position: relative;">
                        @if (Auth::guard('admin')->check())
                            <a class="nav-link {{ request()->is('admin-incomplete-orders*') ? 'active' : '' }}"
                               href="{{ route('admin.incomplete.orders') }}">
                                <i class="fas fa-fw fa-cart-plus"></i>
                                Inc. Orders
                                @php
                                    $incomplete_orders = \App\AbandonedCart::count();
                                @endphp
                                @if ($incomplete_orders > 0)
                                    <span class="badge badge-danger" style="position: absolute; right: 10px;">
                                        {{ $incomplete_orders }}
                                    </span>
                                @endif
                            </a>
                        @elseif (Auth::guard('manager')->check())
                            <a class="nav-link {{ request()->is('manager-incomplete-orders*') ? 'active' : '' }}"
                               href="{{ route('manager.incomplete.orders') }}">
                                <i class="fas fa-fw fa-cart-plus"></i>
                                Inc. Orders
                                @php
                                    $incomplete_orders = \App\AbandonedCart::count();
                                @endphp
                                @if ($incomplete_orders > 0)
                                    <span class="badge badge-danger" style="position: absolute; right: 10px;">
                                        {{ $incomplete_orders }}
                                    </span>
                                @endif
                            </a>
                        @elseif (Auth::guard('employee')->check())
                            <a class="nav-link {{ request()->is('employee-incomplete-orders*') ? 'active' : '' }}"
                               href="{{ route('employee.incomplete.orders') }}">
                                <i class="fas fa-fw fa-cart-plus"></i>
                                Inc. Orders
                                @php
                                    $incomplete_orders = \App\AbandonedCart::count();
                                @endphp
                                @if ($incomplete_orders > 0)
                                    <span class="badge badge-danger" style="position: absolute; right: 10px;">
                                        {{ $incomplete_orders }}
                                    </span>
                                @endif
                            </a>

                        @endif
                    </li>
                    <li class="nav-item">
                        @if(Auth::guard('admin')->check())
                            <a class="nav-link {{request()->is('admin-product*') ? "active" : ""}}" href="{{route('admin.product')}}">
                                <i class="fas fa-fw fa-box"></i>
                                Product
                            </a>
                        @elseif(Auth::guard('manager')->check())
                            <a class="nav-link {{request()->is('manager-product*') ? "active" : ""}}" href="{{route('manager.product')}}">
                                <i class="fas fa-fw fa-box"></i>
                                Product
                            </a>
                        @endif
                    </li>

                    <li class="nav-item">
                        @if(Auth::guard('admin')->check())
                            <a class="nav-link {{request()->is('admin-category*') ? "active" : ""}}" href="{{route('admin.category')}}">
                                <i class="fas fa-fw fa-list-ul"></i>
                                Category
                            </a>
                        @endif
                    </li>

                    <li class="nav-item">
                        @if(Auth::guard('admin')->check())
                            <a class="nav-link {{request()->is('admin-slider*') ? "active" : ""}}" href="{{route('admin.sliders')}}">
                                <i class="fas fa-fw fa-film"></i>
                                Sliders
                            </a>
                        @endif
                    </li>

                    <li class="nav-item">
                        @if(Auth::guard('admin')->check())
                            <a class="nav-link {{request()->is('admin-media*') ? "active" : ""}}" href="{{route('admin.media')}}">
                                <i class="fas fa-fw fa-images"></i>
                                Media
                            </a>
                        @endif
                    </li>

                    <li class="nav-item">
                        @if(Auth::guard('admin')->check())
                            <a class="nav-link {{request()->is('admin-courier*') ? "active" : ""}}" href="#" data-toggle="collapse" aria-expanded="true"
                               data-target="#submenu-1"
                               aria-controls="submenu-1">
                                <i class="fas fa-fw fa-truck"></i>
                                Courier
                            </a>
                            <div id="submenu-1" class="collapse submenu {{request()->is('admin-courier*') ? "show" : ""}}" style="">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link {{request()->is('admin-courier') ? "active" : ""}}" href="{{route('admin.courier')}}">Courier</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{request()->is('admin-courier-city*') ? "active" : ""}}" href="{{route('admin.courier.city')}}">City</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{request()->is('admin-courier-zone*') ? "active" : ""}}" href="{{route('admin.courier.zone')}}">Zone</a>
                                    </li>
                                </ul>
                            </div>
                        @elseif(Auth::guard('manager')->check())
                            <a class="nav-link {{request()->is('manager-courier*') ? "active" : ""}}" href="#" data-toggle="collapse" aria-expanded="true"
                               data-target="#submenu-1"
                               aria-controls="submenu-1">
                                <i class="fas fa-fw fa-truck"></i>
                                Courier
                            </a>
                            <div id="submenu-1" class="collapse submenu {{request()->is('manager-courier*') ? "show" : ""}}" style="">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link {{request()->is('manager-courier') ? "active" : ""}}" href="{{route('manager.courier')}}">Courier</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{request()->is('manager-courier-city*') ? "active" : ""}}" href="{{route('manager.courier.city')}}">City</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{request()->is('manager-courier-zone*') ? "active" : ""}}" href="{{route('manager.courier.zone')}}">Zone</a>
                                    </li>
                                </ul>
                            </div>
                        @endif
                    </li>

                    <li class="nav-item">
                        @if(Auth::guard('admin')->check())
                            <a class="nav-link {{request()->is('admin-shipping_methods*') ? "active" : ""}}" href="{{route('admin.shipping_methods')}}">
                                <i class="fas fa-fw fa-truck-moving"></i>
                                Shipping Methods
                            </a>
                        @endif
                    </li>

                    <li class="nav-item">
                        @if(Auth::guard('admin')->check())
                            <a class="nav-link {{request()->is('admin-roles*') ? "active" : ""}}" href="{{route('admin.roles')}}">
                                <i class="fas fa-fw fa-user"></i>
                                User
                            </a>
                        @elseif(Auth::guard('manager')->check())
                            <a class="nav-link {{request()->is('manager-roles*') ? "active" : ""}}" href="{{route('manager.roles')}}">
                                <i class="fas fa-fw fa-user"></i>
                                User
                            </a>
                        @endif
                    </li>

                    {{--<li class="nav-item">
                        <a class="nav-link {{request()->is('admin-request*') ? "active" : ""}}" href="{{route('admin.request_index')}}">
                            <i class="fas fa-fw fa-paper-plane"></i>
                            {{translate('Requests')}}
                            @php
                                $unseen = \App\CustomerQuery::where('is_seen',0)->get()->count();
                            @endphp
                            @if($unseen > 0)
                                <span class="badge badge-danger">{{$unseen}}</span>
                            @endif
                        </a>

                    </li>--}}

                    @if(Auth::guard('admin')->check())
                        <li class="nav-item">
                            <a class="nav-link {{request()->is('admin-settings*') ? "active" : ""}}" href="#" data-toggle="collapse" aria-expanded="true"
                               data-target="#submenu-2"
                               aria-controls="submenu-2">
                                <i class="fas fa-cogs"></i>
                                Settings
                            </a>
                            <div id="submenu-2" class="collapse submenu {{request()->is('admin-settings*') ? "show" : ""}}" style="">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link {{request()->is('admin-settings-web') ? "active" : ""}}" href="{{route('admin.settings.web')}}">Web</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{request()->is('admin-settings-steadfast-api') ? "active" : ""}}"
                                           href="{{route('admin.settings.stead_fast.api')}}">Stead Fast API</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{request()->is('admin-settings-page') ? "active" : ""}}" href="{{route('admin.settings.page')}}">Page</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{request()->is('admin-settings-attribute') ? "active" : ""}}" href="{{route('admin.settings.attribute')}}">Attributes</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endif
                </ul>
            </div>
        </nav>
    </div>
</div>
