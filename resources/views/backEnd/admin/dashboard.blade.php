@extends('backEnd.admin.layouts.master')

@section('title')
    Home
@endsection
@php
    $total_revenue = $data['total_revenue'] ?? [];
    $total_customer = $data['total_customer'] ?? [];
    $total_product = $data['total_product'] ?? [];
    $total_staff = $data['total_staff'] ?? [];

    $total_order = $data['total_order'] ?? [];
    $total_pre_order = $data['total_pre_order'];
    $total_pending_order = $data['total_pending_order'];
    $total_confirmed_order = $data['total_confirmed_order'];
    $total_hold_order = $data['total_hold_order'];
    $total_printed_order = $data['total_printed_order'];
    $total_on_delivery_order = $data['total_on_delivery_order'];
    $total_excel_order = $data['total_excel_order'];
    $total_delivered_order = $data['total_delivered_order'];
    $total_cancelled_order = $data['total_cancelled_order'];
    $total_bkash_order = $data['total_bkash_order'];
    $total_returned_order = $data['total_returned_order'];

    $today_all_orders = $data['today_all_orders'] ?? [];
    $today_pre_orders = $data['today_pre_orders'] ?? [];
    $today_pending_orders = $data['today_pending_orders'] ?? [];
    $today_confirmed_orders = $data['today_confirmed_orders'] ?? [];
    $today_hold_orders = $data['today_hold_orders'] ?? [];
    $today_printed_orders = $data['today_printed_orders'] ?? [];
    $today_on_delivery_orders = $data['today_on_delivery_orders'] ?? [];
    $today_excel_orders = $data['today_excel_orders'] ?? [];
    $today_delivered_orders = $data['today_delivered_orders'] ?? [];
    $today_cancelled_orders = $data['today_cancelled_orders'] ?? [];
    $today_bkash_orders = $data['today_bkash_orders'] ?? [];
    $today_returned_orders = $data['today_returned_orders'] ?? [];
    $recent_orders = $data['recent_orders'] ?? [];
@endphp
@section('css')
    <link rel="stylesheet" href="{{ asset('backEnd/assets/plugins/date-range-picker/css/jquery-ui.css') }}">
    <link rel="stylesheet"
        href="{{ asset('backEnd/assets/plugins/date-range-picker/css/jquery.comiseo.daterangepicker.css') }}">
@endsection

@section('body')
    <div class="dashboard-wrapper">
        <div class="dashboard-ecommerce">
            <div class="container-fluid dashboard-content ">
                <div class="ecommerce-widget">
                    <div class="row mb-md-4 mb-3">
                        @if (Auth::guard('admin')->check() || Auth::guard('manager')->check())
                            <div class="col-12 mb-3">
                                <div class="row row-deck row-cards">
                                    <div class="col-12">
                                        <div class="row row-cards">
                                            <div class="col-sm-6 col-lg-3">
                                                <div class="card card-sm">
                                                    <div class="card-body">
                                                        <div class="row align-items-center">
                                                            <div class="col-auto">
                                                                <span class="bg-blue text-white avatar">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                                        stroke="currentColor" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                        class="icon icon-tabler icons-tabler-outline icon-tabler-currency-taka">
                                                                        <path stroke="none" d="M0 0h24v24H0z"
                                                                            fill="none" />
                                                                        <path
                                                                            d="M16.5 15.5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                                                        <path d="M7 7a2 2 0 1 1 4 0v9a3 3 0 0 0 6 0v-.5" />
                                                                        <path d="M8 11h6" />
                                                                    </svg>
                                                                </span>
                                                            </div>
                                                            <div class="col">
                                                                <div class="font-weight-medium">
                                                                    <h2 class="mb-0">{{ $total_revenue }}</h2>
                                                                    <span>Total Revenue</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6 col-lg-3">
                                                <a href="{{ route('admin.customers') }}">
                                                    <div class="card card-sm">
                                                        <div class="card-body">
                                                            <div class="row align-items-center">
                                                                <div class="col-auto">
                                                                    <span class="bg-blue text-white avatar">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="24" height="24"
                                                                            viewBox="0 0 24 24" fill="none"
                                                                            stroke="currentColor" stroke-width="2"
                                                                            stroke-linecap="round" stroke-linejoin="round"
                                                                            class="icon icon-tabler icons-tabler-outline icon-tabler-users">
                                                                            <path stroke="none" d="M0 0h24v24H0z"
                                                                                fill="none" />
                                                                            <path
                                                                                d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                                                            <path
                                                                                d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                                                            <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                                                            <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                                                                        </svg>
                                                                    </span>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="font-weight-medium">
                                                                        <h2 class="mb-0">{{ $total_customer }}</h2>
                                                                        <span>Total Customers</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>

                                            <div class="col-sm-6 col-lg-3">
                                                <a href="{{  Auth::guard('admin')->check() ? route('admin.product') : (Auth::guard('manager')->check() ? route('manager.product') : route('admin.product')) }}">
                                                    <div class="card card-sm">
                                                        <div class="card-body">
                                                            <div class="row align-items-center">
                                                                <div class="col-auto">
                                                                    <span class="bg-blue text-white avatar">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="24" height="24"
                                                                            viewBox="0 0 24 24" fill="none"
                                                                            stroke="currentColor" stroke-width="2"
                                                                            stroke-linecap="round" stroke-linejoin="round"
                                                                            class="icon icon-tabler icons-tabler-outline icon-tabler-box">
                                                                            <path stroke="none" d="M0 0h24v24H0z"
                                                                                fill="none" />
                                                                            <path
                                                                                d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5" />
                                                                            <path d="M12 12l8 -4.5" />
                                                                            <path d="M12 12l0 9" />
                                                                            <path d="M12 12l-8 -4.5" />
                                                                        </svg>
                                                                    </span>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="font-weight-medium">
                                                                        <h2 class="mb-0">{{ $total_product }}</h2>
                                                                        <span>Total Products</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>

                                            <div class="col-sm-6 col-lg-3">
                                                <a href="{{  Auth::guard('admin')->check() ? route('admin.orders') : (Auth::guard('manager')->check() ? route('manager.orders') : route('employee.orders')) }}">
                                                    <div class="card card-sm">
                                                        <div class="card-body">
                                                            <div class="row align-items-center">
                                                                <div class="col-auto">
                                                                    <span class="bg-blue text-white avatar">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="24" height="24"
                                                                            viewBox="0 0 24 24" fill="none"
                                                                            stroke="currentColor" stroke-width="2"
                                                                            stroke-linecap="round" stroke-linejoin="round"
                                                                            class="icon icon-tabler icons-tabler-outline icon-tabler-shopping-cart">
                                                                            <path stroke="none" d="M0 0h24v24H0z"
                                                                                fill="none" />
                                                                            <path
                                                                                d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                                            <path
                                                                                d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                                            <path d="M17 17h-11v-14h-2" />
                                                                            <path d="M6 5l14 1l-1 7h-13" />
                                                                        </svg>
                                                                    </span>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="font-weight-medium">
                                                                        <h2 class="mb-0">{{ $total_order }}</h2>
                                                                        <span>Total Orders</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="col-md col-6 mb-3 col-custom-padding">
                            <a
                                href="{{ Auth::guard('admin')->check() ? route('admin.orders', ['status' => 'pre_order']) : (Auth::guard('manager')->check() ? route('manager.orders', ['status' => 'pre_order']) : (Auth::guard('employee')->check() ? route('employee.orders', ['status' => 'pre_order']) : '')) }}">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <h5 class="mb-0 text-primary">Pre Order</h5>
                                        <div class="metric-value d-inline-block">
                                            <h2 class="mb-0">{{ $total_pre_order }}</h2>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md col-6 mb-3 col-custom-padding">
                            <a
                                href="{{ Auth::guard('admin')->check() ? route('admin.orders', ['status' => 'pending']) : (Auth::guard('manager')->check() ? route('manager.orders', ['status' => 'pending']) : (Auth::guard('employee')->check() ? route('employee.orders', ['status' => 'pending']) : '')) }}">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <h5 class="mb-0 text-warning">Pending</h5>
                                        <div class="metric-value d-inline-block">
                                            <h2 class="mb-0">{{ $total_pending_order }}</h2>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md col-6 mb-3 col-custom-padding">
                            <a
                                href="{{ Auth::guard('admin')->check() ? route('admin.orders', ['status' => 'confirmed']) : (Auth::guard('manager')->check() ? route('manager.orders', ['status' => 'confirmed']) : (Auth::guard('employee')->check() ? route('employee.orders', ['status' => 'confirmed']) : '')) }}">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <h5 class="mb-0 text-success">Confirmed</h5>
                                        <div class="metric-value d-inline-block">
                                            <h2 class="mb-0">{{ $total_confirmed_order }}</h2>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md col-6 mb-3 col-custom-padding">
                            <a
                                href="{{ Auth::guard('admin')->check() ? route('admin.orders', ['status' => 'hold']) : (Auth::guard('manager')->check() ? route('manager.orders', ['status' => 'hold']) : (Auth::guard('employee')->check() ? route('employee.orders', ['status' => 'hold']) : '')) }}">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <h5 class="mb-0 text-yellow">Hold</h5>
                                        <div class="metric-value d-inline-block">
                                            <h2 class="mb-0">{{ $total_hold_order }}</h2>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md col-6 mb-3 col-custom-padding">
                            <a
                                href="{{ Auth::guard('admin')->check() ? route('admin.orders', ['status' => 'printed']) : (Auth::guard('manager')->check() ? route('manager.orders', ['status' => 'printed']) : (Auth::guard('employee')->check() ? route('employee.orders', ['status' => 'printed']) : '')) }}">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <h5 class="mb-0 text-azure">Printed</h5>
                                        <div class="metric-value d-inline-block">
                                            <h2 class="mb-0">{{ $total_printed_order }}</h2>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md col-6 mb-3 col-custom-padding">
                            <a
                                href="{{ Auth::guard('admin')->check() ? route('admin.orders', ['status' => 'excel']) : (Auth::guard('manager')->check() ? route('manager.orders', ['status' => 'excel']) : (Auth::guard('employee')->check() ? route('employee.orders', ['status' => 'excel']) : '')) }}">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <h5 class="mb-0 text-green">Excel</h5>
                                        <div class="metric-value d-inline-block">
                                            <h2 class="mb-0">{{ $total_excel_order }}</h2>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md col-6 mb-3 col-custom-padding">
                            <a
                                href="{{ Auth::guard('admin')->check() ? route('admin.orders', ['status' => 'delivered']) : (Auth::guard('manager')->check() ? route('manager.orders', ['status' => 'delivered']) : (Auth::guard('employee')->check() ? route('employee.orders', ['status' => 'delivered']) : '')) }}">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <h5 class="mb-0 text-lime">Delivered</h5>
                                        <div class="metric-value d-inline-block">
                                            <h2 class="mb-0">{{ $total_delivered_order }}</h2>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md col-6 mb-3 col-custom-padding">
                            <a
                                href="{{ Auth::guard('admin')->check() ? route('admin.orders', ['status' => 'cancelled']) : (Auth::guard('manager')->check() ? route('manager.orders', ['status' => 'cancelled']) : (Auth::guard('employee')->check() ? route('employee.orders', ['status' => 'cancelled']) : '')) }}">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <h5 class="mb-0 text-dark">Cancelled</h5>
                                        <div class="metric-value d-inline-block">
                                            <h2 class="mb-0">{{ $total_cancelled_order }}</h2>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md col-6 mb-3 col-custom-padding">
                            <a
                                href="{{ Auth::guard('admin')->check() ? route('admin.orders', ['status' => 'bkash']) : (Auth::guard('manager')->check() ? route('manager.orders', ['status' => 'bkash']) : (Auth::guard('employee')->check() ? route('employee.orders', ['status' => 'bkash']) : '')) }}">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <h5 class="mb-0 text-danger">Bkash</h5>
                                        <div class="metric-value d-inline-block">
                                            <h2 class="mb-0">{{ $total_bkash_order }}</h2>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md col-6 mb-3 col-custom-padding">
                            <a
                                href="{{ Auth::guard('admin')->check() ? route('admin.orders', ['status' => 'returned']) : (Auth::guard('manager')->check() ? route('manager.orders', ['status' => 'returned']) : (Auth::guard('employee')->check() ? route('employee.orders', ['status' => 'returned']) : '')) }}">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <h5 class="mb-0 text-red">Returned</h5>
                                        <div class="metric-value d-inline-block">
                                            <h2 class="mb-0">{{ $total_returned_order }}</h2>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="row mb-md-4 mb-3">
                        <div class="col-xl-5 col-lg-6 col-md-5 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center"><h5 class="mb-0">Order Summary</h5>
                                    <form action="" id="date_range_picker_form" class="d-flex">
                                        <input name="date_range" class="form-control form-control-sm" id="date_range_picker" value="{{request()->query('date_range')}}">
                                        <button type="submit" class="date_filter_button btn btn-primary ml-2">
                                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-search"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" /><path d="M21 21l-6 -6" /></svg>
                                        </button>
                                    </form>
                                </div>
                                <div class="card-body">
                                    <table class="table table-borderless custom-borderless-table">
                                        <tbody>
                                            <tr>
                                                <th class="text-dark">Orders</th>
                                                <td class="text-dark">{{ $today_all_orders }}</td>
                                            </tr>
                                            <tr>
                                                <th class="text-primary">Pre Order</th>
                                                <td class="text-primary">{{ $today_pre_orders }}</td>
                                            </tr>
                                            <tr>
                                                <th class="text-warning">Pending</th>
                                                <td class="text-warning">{{ $today_pending_orders }}</td>
                                            </tr>
                                            <tr>
                                                <th class="text-success">Confirmed</th>
                                                <td class="text-success">{{ $today_confirmed_orders }}</td>
                                            </tr>
                                            <tr>
                                                <th class="text-yellow">Hold</th>
                                                <td class="text-yellow">{{ $today_hold_orders }}</td>
                                            </tr>
                                            <tr>
                                                <th class="text-azure">Printed</th>
                                                <td class="text-azure">{{ $today_printed_orders }}</td>
                                            </tr>
                                            <tr>
                                                <th class="text-cyan">On Delivery</th>
                                                <td class="text-cyan">{{ $today_on_delivery_orders }}</td>
                                            </tr>
                                            <tr>
                                                <th class="text-green">Excel</th>
                                                <td class="text-green">{{ $today_excel_orders }}</td>
                                            </tr>
                                            <tr>
                                                <th class="text-lime">Delivered</th>
                                                <td class="text-lime">{{ $today_delivered_orders }}</td>
                                            </tr>
                                            <tr>
                                                <th class="text-dark">Cancelled</th>
                                                <td class="text-dark">{{ $today_cancelled_orders }}</td>
                                            </tr>
                                            <tr>
                                                <th class="text-danger">Bkash</th>
                                                <td class="text-danger">{{ $today_bkash_orders }}</td>
                                            </tr>
                                            <tr>
                                                <th class="text-red">Returned</th>
                                                <td class="text-red">{{ $today_returned_orders }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Recent Orders</h5>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>SL.</th>
                                                    <th>Date</th>
                                                    <th>C. Name</th>
                                                    <th>C. Phone</th>
                                                    <th>Total</th>
                                                    <th class="text-center">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (Auth::guard('admin')->check() || Auth::guard('manager')->check())
                                                    @php($i = 1)
                                                    @if ($recent_orders->count() > 0)
                                                        @foreach ($recent_orders as $item)
                                                            <tr>
                                                                <td>{{ $i++ }}</td>
                                                                <td>{{ date('d M', strtotime($item->order_date)) }}</td>
                                                                <td>{{ $item->customer_name }}</td>
                                                                <td><a
                                                                        href="tel:{{ $item->customer_phone }}">{{ $item->customer_phone }}</a>
                                                                </td>
                                                                <td>{{ $web_settings->currency_sign }} {{ $item->total }}
                                                                </td>
                                                                <td class="text-center">
                                                                    @if ($item->status == 3)
                                                                        <span class="badge bg-primary text-white">Pre
                                                                            Order</span>
                                                                    @endif
                                                                    @if ($item->status == 6)
                                                                        <span
                                                                            class="badge bg-warning text-white">Pending</span>
                                                                    @endif
                                                                    @if ($item->status == 2)
                                                                        <span
                                                                            class="badge bg-success text-white">Confirmed</span>
                                                                    @endif
                                                                    @if ($item->status == 0)
                                                                        <span
                                                                            class="badge bg-yellow text-white">Hold</span>
                                                                    @endif
                                                                    @if ($item->status == 7)
                                                                        <span
                                                                            class="badge bg-azure text-white">Printed</span>
                                                                    @endif
                                                                    @if ($item->status == 8)
                                                                        <span class="badge bg-cyan text-white">On
                                                                            Delivery</span>
                                                                    @endif
                                                                    @if ($item->status == 9)
                                                                        <span
                                                                            class="badge bg-green text-white">Excel</span>
                                                                    @endif
                                                                    @if ($item->status == 1)
                                                                        <span
                                                                            class="badge bg-lime text-white">Delivered</span>
                                                                    @endif
                                                                    @if ($item->status == 4)
                                                                        <span
                                                                            class="badge bg-dark text-white">Cancelled</span>
                                                                    @endif
                                                                    @if ($item->status == 10)
                                                                        <span
                                                                            class="badge bg-danger text-white">Bkash</span>
                                                                    @endif
                                                                    @if ($item->status == 5)
                                                                        <span
                                                                            class="badge bg-red text-white">Returned</span>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        <tr>
                                                            <td colspan="7"
                                                                class="text-danger font-weight-bold text-center">No Order
                                                                Found</td>
                                                        </tr>
                                                    @endif
                                                @else
                                                    @php($i = 1)
                                                    @if ($recent_orders->count() > 0)
                                                        @foreach ($recent_orders as $item)
                                                        {{-- @dd($item); --}}
                                                            <tr>
                                                                <td>{{ $i++ }}</td>
                                                                <td>{{ date('d M', strtotime($item->order_date)) }}
                                                                </td>
                                                                <td>{{ $item->customer_name }}</td>
                                                                <td><a
                                                                        href="tel:{{ $item->customer_phone }}">{{ $item->customer_phone }}</a>
                                                                </td>
                                                                <td>{{ $web_settings->currency_sign }}
                                                                    {{ $item->total }}</td>
                                                                <td class="text-center">
                                                                    @if ($item->status == 3)
                                                                        <span class="badge bg-dark text-white">Pre
                                                                            Order</span>
                                                                    @endif
                                                                    @if ($item->status == 6)
                                                                        <span
                                                                            class="badge bg-yellow text-white">Pending</span>
                                                                    @endif
                                                                    @if ($item->status == 2)
                                                                        <span
                                                                            class="badge bg-dark text-white">Confirmed</span>
                                                                    @endif
                                                                    @if ($item->status == 0)
                                                                        <span
                                                                            class="badge bg-warning text-white">Hold</span>
                                                                    @endif
                                                                    @if ($item->status == 7)
                                                                        <span
                                                                            class="badge bg-cyan text-white">Printed</span>
                                                                    @endif
                                                                    @if ($item->status == 8)
                                                                        <span class="badge bg-cyan text-white">On
                                                                            Delivery</span>
                                                                    @endif
                                                                    @if ($item->status == 9)
                                                                        <span
                                                                            class="badge bg-green text-white">Excel</span>
                                                                    @endif
                                                                    @if ($item->status == 1)
                                                                        <span
                                                                            class="badge bg-primay text-white">Delivered</span>
                                                                    @endif
                                                                    @if ($item->status == 4)
                                                                        <span
                                                                            class="badge bg-azure text-white">Cancelled</span>
                                                                    @endif
                                                                    @if ($item->status == 10)
                                                                        <span
                                                                            class="badge bg-danger text-white">Bkash</span>
                                                                    @endif
                                                                    @if ($item->status == 5)
                                                                        <span
                                                                            class="badge bg-lime text-white">Returned</span>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        <tr>
                                                            <td colspan="7"
                                                                class="text-danger font-weight-bold text-center">No Order
                                                                Found</td>
                                                        </tr>
                                                    @endif
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('backEnd/assets/plugins/date-range-picker/js/jquery.min.js') }}"></script>
    <script src="{{ asset('backEnd/assets/plugins/date-range-picker/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('backEnd/assets/plugins/date-range-picker/js/moment.min.js') }}"></script>
    <script src="{{ asset('backEnd/assets/plugins/date-range-picker/js/jquery.comiseo.daterangepicker.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#date_range_picker").daterangepicker({
                numberOfMonths: 2,
                maxDate: 0,
                rangeSplitter:' - ',
                datepickerOptions: {
                    numberOfMonths: 2,
                    maxDate: 0
                },
                onChange: true,
            });
        });
    </script>
    <script>
        $(".show_notice_btn").click(function() {
            $("#notice_desc_details").text($(this).data('desc'));
        });
    </script>
@endsection
