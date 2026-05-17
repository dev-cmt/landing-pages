@extends('backEnd.admin.layouts.master')

@section('title')
    All Orders
@endsection
@section('css')
    <style>
        @media (max-width: 576px) {
            .form-inline .form-control {
                display: inline-block;
                width: auto;
                vertical-align: middle;
            }
        }
    </style>
@endsection
@php
    $orders = $data['orders'] ?? [];
    $total_order = $data['total_order'];
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

    $couriers = \Illuminate\Support\Facades\DB::table('couriers')->where('status', 1)->pluck('courier_name', 'id');
    $query = $query ?? null;
    $courier_id = $courier_id ?? null;
    $status = $sts ?? null;
@endphp
@section('body')
    <div class="dashboard-wrapper">
        <div class="dashboard-ecommerce">
            <div class="container-fluid dashboard-content ">
                <!-- ============================================================== -->
                <!-- pageheader  -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title text-capitalize">
                                {{ $status ? str_replace('_', ' ', $status) : 'All Orders' }}</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a
                                                href="{{ Auth::guard('admin')->check() ? route('admin.home') : (Auth::guard('manager')->check() ? route('manager.home') : (Auth::guard('employee')->check() ? route('employee.home') : '')) }}"
                                                class="breadcrumb-link">Home</a></li>
                                        <li class="breadcrumb-item text-capitalize active" aria-current="page">
                                            {{ $status ? str_replace('_', ' ', $status) : 'All Orders' }}</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-md-4 mb-3">
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-6 mb-md-3 mb-3 col-custom-padding">
                        <a
                            href="{{ Auth::guard('admin')->check() ? route('admin.orders') : (Auth::guard('manager')->check() ? route('manager.orders') : (Auth::guard('employee')->check() ? route('employee.orders') : '')) }}">
                            <div class="card card-sm card-sm {{ request()->query('status') == '' ? 'border-red' : '' }}">
                                <div class="card-body">
                                    <h5 class="mb-0">Total</h5>
                                    <div class="metric-value d-inline-block">
                                        <h2 class="mb-0">{{ $total_order }}</h2>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-6 mb-md-3 mb-3 col-custom-padding">
                        <a
                            href="{{ Auth::guard('admin')->check() ? route('admin.orders', ['status' => 'pre_order']) : (Auth::guard('manager')->check() ? route('manager.orders', ['status' => 'pre_order']) : (Auth::guard('employee')->check() ? route('employee.orders', ['status' => 'pre_order']) : '')) }}">
                            <div class="card card-sm {{ $status == 'pre_order' ? 'border-red' : '' }}">
                                <div class="card-body">
                                    <h5 class="mb-0 text-primary">Pre Order</h5>
                                    <div class="metric-value d-inline-block">
                                        <h2 class="mb-0">{{ $total_pre_order }}</h2>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-6 mb-md-3 mb-3 col-custom-padding">
                        <a
                            href="{{ Auth::guard('admin')->check() ? route('admin.orders', ['status' => 'pending']) : (Auth::guard('manager')->check() ? route('manager.orders', ['status' => 'pending']) : (Auth::guard('employee')->check() ? route('employee.orders', ['status' => 'pending']) : '')) }}">
                            <div class="card card-sm  {{ $status == 'pending' ? 'border-red' : '' }}">
                                <div class="card-body">
                                    <h5 class="mb-0 text-warning">Pending</h5>
                                    <div class="metric-value d-inline-block">
                                        <h2 class="mb-0">{{ $total_pending_order }}</h2>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-6 mb-md-3 mb-3 col-custom-padding">
                        <a
                            href="{{ Auth::guard('admin')->check() ? route('admin.orders', ['status' => 'confirmed']) : (Auth::guard('manager')->check() ? route('manager.orders', ['status' => 'confirmed']) : (Auth::guard('employee')->check() ? route('employee.orders', ['status' => 'confirmed']) : '')) }}">
                            <div class="card card-sm  {{ $status == 'confirmed' ? 'border-red' : '' }}">
                                <div class="card-body">
                                    <h5 class="mb-0 text-success">Confirmed</h5>
                                    <div class="metric-value d-inline-block">
                                        <h2 class="mb-0">{{ $total_confirmed_order }}</h2>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-6 mb-md-3 mb-3 col-custom-padding">
                        <a
                            href="{{ Auth::guard('admin')->check() ? route('admin.orders', ['status' => 'hold']) : (Auth::guard('manager')->check() ? route('manager.orders', ['status' => 'hold']) : (Auth::guard('employee')->check() ? route('employee.orders', ['status' => 'hold']) : '')) }}">
                            <div class="card card-sm  {{ $status == 'hold' ? 'border-red' : '' }}">
                                <div class="card-body">
                                    <h5 class="mb-0 text-yellow">Hold</h5>
                                    <div class="metric-value d-inline-block">
                                        <h2 class="mb-0">{{ $total_hold_order }}</h2>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-6 mb-md-3 mb-3 col-custom-padding">
                        <a
                            href="{{ Auth::guard('admin')->check() ? route('admin.orders', ['status' => 'printed']) : (Auth::guard('manager')->check() ? route('manager.orders', ['status' => 'printed']) : (Auth::guard('employee')->check() ? route('employee.orders', ['status' => 'printed']) : '')) }}">
                            <div class="card card-sm  {{ $status == 'printed' ? 'border-red' : '' }}">
                                <div class="card-body">
                                    <h5 class="mb-0 text-azure">Printed</h5>
                                    <div class="metric-value d-inline-block">
                                        <h2 class="mb-0">{{ $total_printed_order }}</h2>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-6 mb-md-3 mb-3 col-custom-padding">
                        <a
                            href="{{ Auth::guard('admin')->check() ? route('admin.orders', ['status' => 'on_delivery']) : (Auth::guard('manager')->check() ? route('manager.orders', ['status' => 'on_delivery']) : (Auth::guard('employee')->check() ? route('employee.orders', ['status' => 'on_delivery']) : '')) }}">
                            <div class="card card-sm  {{ $status == 'on_delivery' ? 'border-red' : '' }}">
                                <div class="card-body">
                                    <h5 class="mb-0 text-cyan">On Delivery</h5>
                                    <div class="metric-value d-inline-block">
                                        <h2 class="mb-0">{{ $total_on_delivery_order }}</h2>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-6 mb-md-3 mb-3 col-custom-padding">
                        <a
                            href="{{ Auth::guard('admin')->check() ? route('admin.orders', ['status' => 'excel']) : (Auth::guard('manager')->check() ? route('manager.orders', ['status' => 'excel']) : (Auth::guard('employee')->check() ? route('employee.orders', ['status' => 'excel']) : '')) }}">
                            <div class="card card-sm  {{ $status == 'excel' ? 'border-red' : '' }}">
                                <div class="card-body">
                                    <h5 class="mb-0 text-green">Excel</h5>
                                    <div class="metric-value d-inline-block">
                                        <h2 class="mb-0">{{ $total_excel_order }}</h2>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-6 mb-md-3 mb-3 col-custom-padding">
                        <a
                            href="{{ Auth::guard('admin')->check() ? route('admin.orders', ['status' => 'delivered']) : (Auth::guard('manager')->check() ? route('manager.orders', ['status' => 'delivered']) : (Auth::guard('employee')->check() ? route('employee.orders', ['status' => 'delivered']) : '')) }}">
                            <div class="card card-sm  {{ $status == 'delivered' ? 'border-red' : '' }}">
                                <div class="card-body">
                                    <h5 class="mb-0 text-lime">Delivered</h5>
                                    <div class="metric-value d-inline-block">
                                        <h2 class="mb-0">{{ $total_delivered_order }}</h2>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-6 mb-md-3 mb-3 col-custom-padding">
                        <a
                            href="{{ Auth::guard('admin')->check() ? route('admin.orders', ['status' => 'cancelled']) : (Auth::guard('manager')->check() ? route('manager.orders', ['status' => 'cancelled']) : (Auth::guard('employee')->check() ? route('employee.orders', ['status' => 'cancelled']) : '')) }}">
                            <div class="card card-sm  {{ $status == 'cancelled' ? 'border-red' : '' }}">
                                <div class="card-body">
                                    <h5 class="mb-0 text-dark">Cancelled</h5>
                                    <div class="metric-value d-inline-block">
                                        <h2 class="mb-0">{{ $total_cancelled_order }}</h2>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-6 mb-md-3 mb-3 col-custom-padding">
                        <a
                            href="{{ Auth::guard('admin')->check() ? route('admin.orders', ['status' => 'bkash']) : (Auth::guard('manager')->check() ? route('manager.orders', ['status' => 'bkash']) : (Auth::guard('employee')->check() ? route('employee.orders', ['status' => 'bkash']) : '')) }}">
                            <div class="card card-sm  {{ $status == 'bkash' ? 'border-red' : '' }}">
                                <div class="card-body">
                                    <h5 class="mb-0 text-danger">Bkash</h5>
                                    <div class="metric-value d-inline-block">
                                        <h2 class="mb-0">{{ $total_bkash_order }}</h2>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-6 mb-md-3 mb-3 col-custom-padding">
                        <a
                            href="{{ Auth::guard('admin')->check() ? route('admin.orders', ['status' => 'returned']) : (Auth::guard('manager')->check() ? route('manager.orders', ['status' => 'returned']) : (Auth::guard('employee')->check() ? route('employee.orders', ['status' => 'returned']) : '')) }}">
                            <div class="card card-sm  {{ $status == 'returned' ? 'border-red' : '' }}">
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

                <div class="row mb-2">
                    <div class="col-md-2 col-12">
                        <a href="{{ Auth::guard('admin')->check() ? route('admin.orders.create') : (Auth::guard('manager')->check() ? route('manager.orders.create') : (Auth::guard('employee')->check() ? route('employee.orders.create') : '')) }}"
                            class="btn btn-success btn-sm">Add Order</a>
                    </div>
                    @if (Auth::guard('admin')->check())
                        <div class="col-md-10 col-12 mt-md-0 mt-2">
                            <div class="form-inline float-md-right">
                                <form action="{{ route('admin.order.bulk_courier') }}" method="POST"
                                    class="form-inline float-md-right" id="bulk_courier_form">
                                    @csrf
                                    <div class="form-group">
                                        <input type="hidden" name="all_ids" class="all_ids" id="all_ids">
                                        <select name="bulk_courier" id="bulk_courier" class="form-control mr-2">
                                            <option value="">Select Courier</option>
                                            @foreach ($couriers as $key => $item)
                                                <option value="{{ $key }}">
                                                    {{ $item }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </form>
                                <form>
                                    <div class="form-group">
                                        <input type="text" class="form-control mr-2"
                                            placeholder="Search By Phone Number" value="{{ $query }}"
                                            name="query">
                                        <button class="btn btn-dark btn-sm mr-1">Search</button>
                                        <a href="{{ route('admin.orders') }}" class="btn btn-info btn-sm">Reset</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endif
                    @if (Auth::guard('manager')->check())
                        <div class="col-md-10 col-12 mt-md-0 mt-2">
                            <form action="{{ route('manager.orders') }}" method="get"
                                class="form-inline float-md-right">
                                <div class="form-group">
                                    <input type="text" class="form-control mr-2" placeholder="Search By Phone Number"
                                        name="query" required>
                                    <button class="btn btn-dark btn-sm">Search</button>
                                </div>
                            </form>
                        </div>
                    @endif
                    @if (Auth::guard('employee')->check())
                        <div class="col-md-10 col-12 mt-md-0 mt-2">
                            <form action="{{ route('employee.orders') }}" method="get"
                                class="form-inline float-md-right">
                                <div class="form-group">
                                    <input type="text" class="form-control mr-2" placeholder="Search By Phone Number"
                                        name="query" required>
                                    <button class="btn btn-dark btn-sm">Search</button>
                                </div>
                            </form>
                        </div>
                    @endif
                </div>

                @if (Auth::guard('admin')->check())
                    <div class="d-flex flex-wrap align-items-center mb-3" style="gap: 10px">

                        {{-- Order Status --}}
                        <form action="{{ route('admin.orders.all.status') }}" method="post" id="all_status_form"
                            class="d-inline-flex align-items-center me-2">
                            @csrf
                            <input type="hidden" id="all_status" name="all_status">
                            <select name="status" id="status" class="form-control form-control-sm"
                                style="min-width:150px;">
                                <option value="">Select Status</option>
                                <option value="3">Pre Order</option>
                                <option value="6">Pending</option>
                                <option value="2">Confirmed</option>
                                <option value="0">Hold</option>
                                <option value="7">Printed</option>
                                <option value="8">On Delivery</option>
                                <option value="9">Excel</option>
                                <option value="1">Delivered</option>
                                <option value="4">Cancelled</option>
                                <option value="10">Bkash</option>
                                <option value="5">Returned</option>
                            </select>
                        </form>



                        {{-- Bulk Print --}}
                        <form action="{{ route('admin.orders.bulk.print') }}" method="post" id="all_print_form"
                            class="me-1">
                            @csrf
                            <button type="button" id="bulk_print_btn" class="btn btn-info btn-sm">
                                <i class="bi bi-printer"></i> Print Invoice
                            </button>
                        </form>

                        {{-- Order Export --}}
                        <form action="{{ route('admin.order.export') }}" method="post" id="order_export_form"
                            class="me-1">
                            @csrf
                            <input type="hidden" id="all_ids" class="all_ids" name="all_ord_id">
                            <button type="button" id="order_export" class="btn btn-primary btn-sm">
                                <i class="bi bi-download"></i> Order Export
                            </button>
                        </form>

                        {{-- Courier Export --}}
                        <form action="{{ route('admin.orders.courier_csv') }}" method="post" id="all_courier_csv">
                            @csrf
                            <input type="hidden" name="status" id="courier_status">
                            <input type="hidden" id="all_ord_id" name="all_ord_id">
                            <button type="button" id="redex_csv" class="btn btn-danger btn-sm">
                                Redex Export
                            </button>
                        </form>
                        <form action="{{ route('admin.orders.courier_csv') }}" method="post" id="all_courier_csv">
                            @csrf
                            <input type="hidden" name="status" id="courier_status">
                            <input type="hidden" id="all_ord_id" name="all_ord_id">
                            <button type="button" id="steadfast_csv" class="btn btn-success btn-sm me-1">
                                Steadfast Export
                            </button>

                        </form>

                    </div>
                @endif
                @if (Auth::guard('manager')->check())
                    <div class="row mb-2">
                        <div class="col-md-2 col-12">
                            <form action="{{ route('manager.orders.all.status') }}" method="post" id="all_status_form">
                                @csrf
                                <input type="hidden" id="all_status" name="all_status">
                                <select name="status" id="status" class="form-control">
                                    <option value="">Select Status</option>
                                    <option value="3">Pre Order</option>
                                    <option value="6">Pending</option>
                                    <option value="2">Confirmed</option>
                                    <option value="0">Hold</option>
                                    <option value="7">Printed</option>
                                    <option value="8">On Delivery</option>
                                    <option value="9">Excel</option>
                                    <option value="1">Delivered</option>
                                    <option value="4">Cancelled</option>
                                    <option value="10">Bkash</option>
                                    <option value="5">Returned</option>
                                </select>
                            </form>
                        </div>
                        <div class="col-md-1 col-12">
                            <form action="{{ route('manager.orders.bulk.print') }}" method="post" id="all_print_form">
                                @csrf
                                <div class="form-group">
                                    <button type="button" id="bulk_print_btn" class="btn btn-info btn-sm">Print Invoice
                                    </button>
                                </div>
                            </form>
                        </div>

                        <div class="col-md-1 col-12">
                            <form action="{{ route('manager.order.export') }}" method="post" id="order_export_form">
                                @csrf
                                <div class="form-group">
                                    <input type="hidden" id="all_ids" class="all_ids" name="all_ord_id">
                                    <button type="button" id="order_export" class="btn btn-primary btn-sm">Order
                                        Export
                                    </button>
                                </div>
                            </form>
                        </div>

                        <div class="col-md-8 col-12">
                            <form action="{{ route('manager.orders.courier_csv') }}" method="post"
                                id="all_courier_csv">
                                @csrf
                                <div class="form-group">
                                    <input type="hidden" name="status" id="courier_status">
                                    <input type="hidden" id="all_ord_id" name="all_ord_id">
                                    <button type="button" id="steadfast_csv" class="btn btn-success btn-sm">Stead Fast
                                        Export
                                    </button>
                                    <button type="button" id="redex_csv" class="btn btn-danger btn-sm">Redex Export
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                @endif
                @if (Auth::guard('employee')->check())
                    <div class="row mb-2">
                        <div class="col-md-2 col-12">
                            <form action="{{ route('employee.orders.all.status') }}" method="post"
                                id="all_status_form">
                                @csrf
                                <input type="hidden" id="all_status" name="all_status">
                                <select name="status" id="status" class="form-control">
                                    <option value="">Select Status</option>
                                    <option value="3">Pre Order</option>
                                    <option value="6">Pending</option>
                                    <option value="2">Confirmed</option>
                                    <option value="0">Hold</option>
                                    <option value="7">Printed</option>
                                    <option value="8">On Delivery</option>
                                    <option value="9">Excel</option>
                                    <option value="1">Delivered</option>
                                    <option value="4">Cancelled</option>
                                    <option value="10">Bkash</option>
                                    <option value="5">Returned</option>
                                </select>
                            </form>
                        </div>

                        <div class="col-md-1 col-12">
                            <form action="{{ route('employee.orders.bulk.print') }}" method="post" id="all_print_form">
                                @csrf
                                <div class="form-group">
                                    <button type="button" id="bulk_print_btn" class="btn btn-info btn-sm">Print Invoice
                                    </button>
                                </div>
                            </form>
                        </div>

                        <div class="col-md-1 col-12">
                            <form action="{{ route('employee.order.export') }}" method="post" id="order_export_form">
                                @csrf
                                <div class="form-group">
                                    <input type="hidden" id="all_ids" class="all_ids" name="all_ord_id">
                                    <button type="button" id="order_export" class="btn btn-primary btn-sm">Order
                                        Export
                                    </button>
                                </div>
                            </form>
                        </div>

                        <div class="col-md-8 col-12">
                            <form action="{{ route('employee.orders.courier_csv') }}" method="post"
                                id="all_courier_csv">
                                @csrf
                                <div class="form-group">
                                    <input type="hidden" name="status" id="courier_status">
                                    <input type="hidden" id="all_ord_id" name="all_ord_id">
                                    <button type="button" id="steadfast_csv" class="btn btn-success btn-sm">Stead Fast
                                        Export
                                    </button>
                                    <button type="button" id="redex_csv" class="btn btn-danger btn-sm">Redex Export
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                @endif

                <div class="row">
                    <div class="col-12">
                        <div class="card ">
                            <div class="card-body table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" id="master"></th>
                                            <th>SL.</th>
                                            <th>Invoice ID</th>
                                            <th>Customer Info</th>
                                            <th>Products</th>
                                            <th>Total</th>
                                            <th>Courier</th>
                                            <th>Date</th>
                                            <th>OTP & <br>Status</th>
                                            <th>Note</th>
                                            <th>Assigned</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php($sl = 1)
                                        @if (Auth::guard('admin')->check() || Auth::guard('manager')->check())
                                            @if ($orders->count() > 0)
                                                @foreach ($orders as $item)
                                                    <?php
                                                    $customer_phone = $item->customer_phone;
                                                    $check_duplicate = \Illuminate\Support\Facades\DB::table('orders')->where('customer_phone', $customer_phone)->count();
                                                    ?>
                                                    <tr id="tr_{{ $item->id }}"
                                                        class="{{ $check_duplicate > 1 ? 'bg-danger-light' : '' }}">
                                                        <td><input type="checkbox" class="sub_chk"
                                                                data-id="{{ $item->id }}">
                                                        </td>
                                                        <td>{{ $sl++ }}</td>
                                                        <td>
                                                            @if ($item->source == 'incomplete')
                                                                <span class="badge badge-dark">Incomplete</span>
                                                                <br>
                                                            @elseif($item->source == 'direct')
                                                                <span class="badge badge-warning">Direct</span>
                                                                <br>
                                                            @elseif($item->source == 'call')
                                                                <span class="badge badge-primary">Call</span>
                                                                <br>
                                                            @elseif($item->source == 'whatsapp')
                                                                <span class="badge badge-success">Whatsapp</span>
                                                                <br>
                                                            @elseif($item->source == 'page')
                                                                <span class="badge badge-info">Page</span>
                                                                <br>
                                                            @elseif($item->source == 'instagram')
                                                                <span class="badge badge-secondary">Instagram</span>
                                                                <br>
                                                            @elseif($item->source == 'office sale')
                                                                <span class="badge badge-danger">Office Sale</span>
                                                                <br>
                                                            @endif
                                                            @if ($item->is_landing_page == 1)
                                                                <span class="badge badge-danger">LP</span>
                                                                <br>
                                                            @endif
                                                            {{ $item->invoice_id }}
                                                        </td>
                                                        <td>
                                                            <span>{{ $item->customer_name }}</span> <br>
                                                            <a
                                                                href="tel:{{ $item->customer_phone }}"><span>{{ $item->customer_phone }}</span></a>
                                                            <br>
                                                            <span>{{ $item->customer_address }}</span>
                                                        </td>
                                                        <td>
                                                            @foreach ($item->get_products as $product)
                                                                {{ $product->qty }} x {{ $product->get_product->name }}
                                                                <br>
                                                                {{-- @dd($product->attributes) --}}
                                                                @if (is_array($product->attributes))
                                                                    <?php
                                                                    $variantOptions = collect($product->attributes ?? [])
                                                                        ->map(function ($name) {
                                                                            // underscore replace with space, capitalize first letter of each word
                                                                            return collect(explode('_', $name))->map(fn($word) => ucfirst($word))->implode(' ');
                                                                        })
                                                                        ->implode(' , ');
                                                                    ?>
                                                                    <span class="text-primary">
                                                                        {{ $variantOptions }}
                                                                    </span>

                                                                    <br>
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                        <td>{{ $web_settings->currency_sign }} {{ $item->total }}</td>
                                                        <td>
                                                            {{ $item->get_courier->courier_name ?? '---' }}
                                                            @if ($item->stead_fast_tracking_code)
                                                                <br><span class="badge badge-info">{{ $item->stead_fast_tracking_code }}</span>
                                                                <a href="{{ $item->tracking_link }}" target="_blank">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                                        class="icon icon-tabler icons-tabler-outline icon-tabler-external-link">
                                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                        <path d="M12 6h-6a2 2 0 0 0 -2 2v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-6" />
                                                                        <path d="M11 13l9 -9" />
                                                                        <path d="M15 4h5v5" />
                                                                    </svg>
                                                                </a>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            {{ date('d M, Y', strtotime($item->order_date)) }}<br>
                                                            {{ date('h:i:s A', strtotime($item->created_at)) }}
                                                        </td>
                                                        <td class="text-center">
                                                            @if ($item->is_otp_verified == 1)
                                                                <small
                                                                    style="color: white;background: limegreen;padding: 3px 5px;border-radius: 3px;white-space: nowrap">Verified</small>
                                                                <br>
                                                            @elseif($item->is_otp_verified == 0)
                                                                <small
                                                                    style="color: white;background: orangered;padding: 3px 5px;border-radius: 3px;white-space: nowrap">Unverified</small>
                                                                <br>
                                                            @endif

                                                            <span
                                                                class="badge {{ $item->status == 0 ? 'bg-yellow' : '' }} {{ $item->status == 1 ? 'bg-lime' : '' }}{{ $item->status == 2 ? 'bg-success' : '' }}{{ $item->status == 3 ? 'bg-primary' : '' }}{{ $item->status == 4 ? 'bg-dark' : '' }}{{ $item->status == 5 ? 'bg-red' : '' }}{{ $item->status == 6 ? 'bg-warning' : '' }}{{ $item->status == 7 ? 'bg-azure' : '' }}{{ $item->status == 8 ? 'bg-cyan' : '' }}{{ $item->status == 9 ? 'bg-green' : '' }} {{ $item->status == 10 ? 'bg-danger' : '' }} status_btn  btn-sm dropdown-toggle"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                                @if ($item->status == 3)
                                                                    Pre Order
                                                                @endif
                                                                @if ($item->status == 6)
                                                                    Pending
                                                                @endif
                                                                @if ($item->status == 2)
                                                                    Confirmed
                                                                @endif
                                                                @if ($item->status == 0)
                                                                    Hold
                                                                @endif
                                                                @if ($item->status == 7)
                                                                    Printed
                                                                @endif
                                                                @if ($item->status == 8)
                                                                    On Delivery
                                                                @endif
                                                                @if ($item->status == 9)
                                                                    Excel
                                                                @endif
                                                                @if ($item->status == 1)
                                                                    Delivered
                                                                @endif
                                                                @if ($item->status == 4)
                                                                    Cancelled
                                                                @endif
                                                                @if ($item->status == 10)
                                                                    Bkash
                                                                @endif
                                                                @if ($item->status == 5)
                                                                    Returned
                                                                @endif
                                                            </span>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item {{ $item->status == 3 ? 'd-none' : '' }}"
                                                                    href="{{ Auth::guard('admin')->check() ? route('admin.orders.status', [$item->id, 3]) : (Auth::guard('manager')->check() ? route('manager.orders.status', [$item->id, 3]) : '') }}">
                                                                    Pre Order</a>
                                                                <a class="dropdown-item {{ $item->status == 6 ? 'd-none' : '' }}"
                                                                    href="{{ Auth::guard('admin')->check() ? route('admin.orders.status', [$item->id, 6]) : (Auth::guard('manager')->check() ? route('manager.orders.status', [$item->id, 6]) : '') }}">
                                                                    Pending</a>
                                                                <a class="dropdown-item {{ $item->status == 2 ? 'd-none' : '' }}"
                                                                    href="{{ Auth::guard('admin')->check() ? route('admin.orders.status', [$item->id, 2]) : (Auth::guard('manager')->check() ? route('manager.orders.status', [$item->id, 2]) : '') }}">
                                                                    Confirmed</a>
                                                                <a class="dropdown-item {{ $item->status == 0 ? 'd-none' : '' }}"
                                                                    href="{{ Auth::guard('admin')->check() ? route('admin.orders.status', [$item->id, 0]) : (Auth::guard('manager')->check() ? route('manager.orders.status', [$item->id, 0]) : '') }}">
                                                                    Hold</a>
                                                                <a class="dropdown-item {{ $item->status == 7 ? 'd-none' : '' }}"
                                                                    href="{{ Auth::guard('admin')->check() ? route('admin.orders.status', [$item->id, 7]) : (Auth::guard('manager')->check() ? route('manager.orders.status', [$item->id, 7]) : '') }}">
                                                                    Printed</a>
                                                                <a class="dropdown-item {{ $item->status == 8 ? 'd-none' : '' }}"
                                                                    href="{{ Auth::guard('admin')->check() ? route('admin.orders.status', [$item->id, 8]) : (Auth::guard('manager')->check() ? route('manager.orders.status', [$item->id, 8]) : '') }}">
                                                                    On Delivery</a>
                                                                <a class="dropdown-item {{ $item->status == 9 ? 'd-none' : '' }}"
                                                                    href="{{ Auth::guard('admin')->check() ? route('admin.orders.status', [$item->id, 9]) : (Auth::guard('manager')->check() ? route('manager.orders.status', [$item->id, 9]) : '') }}">
                                                                    Excel</a>
                                                                <a class="dropdown-item {{ $item->status == 1 ? 'd-none' : '' }}"
                                                                    href="{{ Auth::guard('admin')->check() ? route('admin.orders.status', [$item->id, 1]) : (Auth::guard('manager')->check() ? route('manager.orders.status', [$item->id, 1]) : '') }}">
                                                                    Delivered</a>
                                                                <a class="dropdown-item {{ $item->status == 4 ? 'd-none' : '' }}"
                                                                    href="{{ Auth::guard('admin')->check() ? route('admin.orders.status', [$item->id, 4]) : (Auth::guard('manager')->check() ? route('manager.orders.status', [$item->id, 4]) : '') }}">
                                                                    Cancelled</a>
                                                                <a class="dropdown-item {{ $item->status == 10 ? 'd-none' : '' }}"
                                                                    href="{{ Auth::guard('admin')->check() ? route('admin.orders.status', [$item->id, 10]) : (Auth::guard('manager')->check() ? route('manager.orders.status', [$item->id, 10]) : '') }}">
                                                                    Bkash</a>
                                                                <a class="dropdown-item {{ $item->status == 5 ? 'd-none' : '' }}"
                                                                    href="{{ Auth::guard('admin')->check() ? route('admin.orders.status', [$item->id, 5]) : (Auth::guard('manager')->check() ? route('manager.orders.status', [$item->id, 5]) : '') }}">
                                                                    Returned</a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <b>O:</b> {{ $item->order_note }}<br>
                                                            <b>S:</b> {{ $item->staff_note }}
                                                        </td>
                                                        <td>{{ $item->get_assigned ? $item->get_assigned->get_employee->name : '' }}
                                                        </td>

                                                        <td class="text-center">
                                                            <a href="javascript:void(0)" class="d-block mb-1 print"
                                                                data-id="{{ $item->id }}"><i
                                                                    class="fa fa-print"></i></a>
                                                            @if (Auth::guard('admin')->check())
                                                                <a href="{{ route('admin.orders.edit', $item->id) }}"
                                                                    class="d-block mb-1">
                                                                    <i class="fa fa-edit"></i>
                                                                </a>
                                                                <a href="{{ route('admin.orders.delete', $item->id) }}"
                                                                    class="d-block mb-1"
                                                                    onclick="return confirm('Are you sure to delete this?')"><i
                                                                        class="fa fa-trash"></i></a>
                                                            @endif

                                                            @if (Auth::guard('manager')->check())
                                                                <a href="{{ route('manager.orders.edit', $item->id) }}"
                                                                    class="d-block mb-1">
                                                                    <i class="fa fa-edit"></i>
                                                                </a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="11" class="text-center text-danger font-weight-bold">No
                                                        Data Found!
                                                    </td>
                                                </tr>
                                            @endif
                                        @elseif(Auth::guard('employee')->check())
                                            @if ($orders->count() > 0)
                                                @foreach ($orders as $items)
                                                    <?php
                                                    $item = $items->get_order;
                                                    // dd($item);
                                                    $customer_phone = $item->customer_phone;
                                                    $check_duplicate = \Illuminate\Support\Facades\DB::table('orders')->where('customer_phone', $customer_phone)->count();
                                                    ?>
                                                    <tr id="tr_{{ $item->id }}"
                                                        class="{{ $check_duplicate > 1 ? 'bg-danger-light' : '' }}">
                                                        <td><input type="checkbox" class="sub_chk"
                                                                data-id="{{ $item->id }}">
                                                        </td>
                                                        <td>{{ $sl++ }}</td>
                                                        <td>
                                                            @if ($item->source == 'incomplete')
                                                                <span class="badge badge-dark">Incomplete</span>
                                                                <br>
                                                            @elseif($item->source == 'direct')
                                                                <span class="badge badge-warning">Direct</span>
                                                                <br>
                                                            @elseif($item->source == 'instagram')
                                                                <span class="badge badge-secondary">Instagram</span>
                                                                <br>
                                                            @elseif($item->source == 'whatsapp')
                                                                <span class="badge badge-success">Whatsapp</span>
                                                                <br>
                                                            @elseif($item->source == 'page')
                                                                <span class="badge badge-info">Page</span>
                                                                <br>
                                                            @elseif($item->source == 'office sale')
                                                                <span class="badge badge-danger">Office Sale</span>
                                                                <br>
                                                            @endif
                                                            @if ($item->is_landing_page == 1)
                                                                <span class="badge badge-danger">LP</span>
                                                                <br>
                                                            @endif
                                                            {{ $item->invoice_id }}
                                                        </td>
                                                        <td>
                                                            <span>{{ $item->customer_name }}</span> <br>
                                                            <a
                                                                href="tel:{{ $item->customer_phone }}"><span>{{ $item->customer_phone }}</span></a>
                                                            <br>
                                                            <span>{{ $item->customer_address }}</span>
                                                        </td>
                                                        <td>
                                                            @foreach ($item->get_products as $product)
                                                                {{ $product->qty }} x {{ $product->get_product->name }}
                                                                <br>
                                                                @if ($product->attributes)
                                                                    <?php $i = 0; ?>
                                                                    <span class="text-primary text-capitalize">
                                                                        @foreach (json_decode($product->attributes, true) as $key => $attribute)
                                                                            <?php $i++; ?>
                                                                            {{ $attribute }}{{ count(json_decode($product->attributes, true)) > $i ? ',' : '' }}
                                                                        @endforeach
                                                                    </span>
                                                                    <br>
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                        <td>{{ $web_settings->currency_sign }} {{ $item->total }}</td>
                                                        <td>
                                                            {{ $item->get_courier->courier_name ?? '---' }}
                                                            @if ($item->stead_fast_tracking_code)
                                                                <br><span class="badge badge-info">{{ $item->stead_fast_tracking_code }}</span>
                                                                <a href="{{ $item->tracking_link }}" target="_blank">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                                        class="icon icon-tabler icons-tabler-outline icon-tabler-external-link">
                                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                        <path d="M12 6h-6a2 2 0 0 0 -2 2v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-6" />
                                                                        <path d="M11 13l9 -9" />
                                                                        <path d="M15 4h5v5" />
                                                                    </svg>
                                                                </a>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            {{ date('d M, Y', strtotime($item->order_date)) }}<br>
                                                            {{ date('h:i:s A', strtotime($item->created_at)) }}
                                                        </td>
                                                        <td class="text-center">
                                                            @if ($item->is_otp_verified == 1)
                                                                <small
                                                                    style="color: white;background: limegreen;padding: 3px 5px;border-radius: 3px;white-space: nowrap">Verified</small>
                                                                <br>
                                                            @elseif($item->is_otp_verified == 0)
                                                                <small
                                                                    style="color: white;background: orangered;padding: 3px 5px;border-radius: 3px;white-space: nowrap">Unverified</small>
                                                                <br>
                                                            @endif

                                                            <span
                                                                class="badge {{ $item->status == 0 ? 'bg-yellow' : '' }} {{ $item->status == 1 ? 'bg-lime' : '' }}{{ $item->status == 2 ? 'bg-success' : '' }}{{ $item->status == 3 ? 'bg-primary' : '' }}{{ $item->status == 4 ? 'bg-dark' : '' }}{{ $item->status == 5 ? 'bg-red' : '' }}{{ $item->status == 6 ? 'bg-warning' : '' }}{{ $item->status == 7 ? 'bg-azure' : '' }}{{ $item->status == 8 ? 'bg-cyan' : '' }}{{ $item->status == 9 ? 'bg-green' : '' }} {{ $item->status == 10 ? 'bg-danger' : '' }} status_btn  btn-sm dropdown-toggle"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                                @if ($item->status == 3)
                                                                    Pre Order
                                                                @endif
                                                                @if ($item->status == 6)
                                                                    Pending
                                                                @endif
                                                                @if ($item->status == 2)
                                                                    Confirmed
                                                                @endif
                                                                @if ($item->status == 0)
                                                                    Hold
                                                                @endif
                                                                @if ($item->status == 7)
                                                                    Printed
                                                                @endif
                                                                @if ($item->status == 8)
                                                                    On Delivery
                                                                @endif
                                                                @if ($item->status == 9)
                                                                    Excel
                                                                @endif
                                                                @if ($item->status == 1)
                                                                    Delivered
                                                                @endif
                                                                @if ($item->status == 4)
                                                                    Cancelled
                                                                @endif
                                                                @if ($item->status == 10)
                                                                    Bkash
                                                                @endif
                                                                @if ($item->status == 5)
                                                                    Returned
                                                                @endif
                                                            </span>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item {{ $item->status == 3 ? 'd-none' : '' }}"
                                                                    href="{{ route('employee.orders.status', [$item->id, 3]) }}">
                                                                    Pre Order</a>
                                                                <a class="dropdown-item {{ $item->status == 6 ? 'd-none' : '' }}"
                                                                    href="{{ route('employee.orders.status', [$item->id, 6]) }}">
                                                                    Pending</a>
                                                                <a class="dropdown-item {{ $item->status == 2 ? 'd-none' : '' }}"
                                                                    href="{{ route('employee.orders.status', [$item->id, 2]) }}">
                                                                    Confirmed</a>
                                                                <a class="dropdown-item {{ $item->status == 0 ? 'd-none' : '' }}"
                                                                    href="{{ route('employee.orders.status', [$item->id, 0]) }}">
                                                                    Hold</a>
                                                                <a class="dropdown-item {{ $item->status == 7 ? 'd-none' : '' }}"
                                                                    href="{{ route('employee.orders.status', [$item->id, 7]) }}">
                                                                    Printed</a>
                                                                <a class="dropdown-item {{ $item->status == 8 ? 'd-none' : '' }}"
                                                                    href="{{ route('employee.orders.status', [$item->id, 8]) }}">
                                                                    On Delivery</a>
                                                                <a class="dropdown-item {{ $item->status == 9 ? 'd-none' : '' }}"
                                                                    href="{{ route('employee.orders.status', [$item->id, 9]) }}">
                                                                    Excel</a>
                                                                <a class="dropdown-item {{ $item->status == 1 ? 'd-none' : '' }}"
                                                                    href="{{ route('employee.orders.status', [$item->id, 1]) }}">
                                                                    Delivered</a>
                                                                <a class="dropdown-item {{ $item->status == 4 ? 'd-none' : '' }}"
                                                                    href="{{ route('employee.orders.status', [$item->id, 4]) }}">
                                                                    Cancelled</a>
                                                                <a class="dropdown-item {{ $item->status == 10 ? 'd-none' : '' }}"
                                                                    href="{{ route('employee.orders.status', [$item->id, 10]) }}">
                                                                    Bkash</a>
                                                                <a class="dropdown-item {{ $item->status == 5 ? 'd-none' : '' }}"
                                                                    href="{{ route('employee.orders.status', [$item->id, 5]) }}">
                                                                    Returned</a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <b>O:</b> {{ $item->order_note }}<br>
                                                            <b>S:</b> {{ $item->staff_note }}
                                                        </td>
                                                        <td>Self</td>
                                                        <td class="text-center">
                                                            <a href="javascript:void(0)" class="d-block mb-1 print"
                                                                data-id="{{ $item->id }}"><i
                                                                    class="fa fa-print"></i></a>
                                                            <a href="{{ route('employee.orders.edit', $item->id) }}"
                                                                class="d-block mb-1">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="11" class="text-center text-danger font-weight-bold">No
                                                        Data Found!
                                                    </td>
                                                </tr>
                                            @endif
                                        @endif
                                    </tbody>
                                </table>

                                <div class="mt-3">
                                    {{ $orders->links() }}
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
    <script>
        $('.print').on('click', function() {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '{{ Auth::guard('admin')->check() ? route('admin.orders.print') : (Auth::guard('manager')->check() ? route('manager.orders.print') : (Auth::guard('employee')->check() ? route('employee.orders.print') : '')) }}',
                type: 'POST',
                data: {
                    _token: CSRF_TOKEN,
                    id: $(this).data('id')
                },
                success: function(data) {
                    newWin = window.open("");
                    newWin.document.write(data);
                    newWin.document.close();
                }
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {


            $('#master').on('click', function(e) {
                if ($(this).is(':checked', true)) {
                    $(".sub_chk").prop('checked', true);
                } else {
                    $(".sub_chk").prop('checked', false);
                }
            });


            $('#status').on('change', function(e) {
                var allVals = [];
                $(".sub_chk:checked").each(function() {
                    allVals.push($(this).attr('data-id'));
                });

                if (allVals.length <= 0) {
                    alert("Please select row.");
                } else {
                    $('#all_status').val(allVals);
                    $('#all_status_form').submit();
                }
            });

            $('#bulk_print_btn').on('click', function(e) {
                var allVals = [];
                $(".sub_chk:checked").each(function() {
                    allVals.push($(this).attr('data-id'));
                });

                if (allVals.length <= 0) {
                    alert("Please select row.");
                } else {

                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        url: '{{ Auth::guard('admin')->check() ? route('admin.orders.bulk.print') : (Auth::guard('manager')->check() ? route('manager.orders.bulk.print') : (Auth::guard('employee')->check() ? route('employee.orders.bulk.print') : '')) }}',
                        type: 'POST',
                        data: {
                            _token: CSRF_TOKEN,
                            all_inv_id: allVals
                        },
                        success: function(data) {
                            newWin = window.open("");
                            newWin.document.write(data);
                            newWin.document.close();
                        }
                    });
                }
            });

            //courier export
            $('#steadfast_csv').on('click', function(e) {
                var allVals = [];
                $(".sub_chk:checked").each(function() {
                    allVals.push($(this).attr('data-id'));
                });

                if (allVals.length <= 0) {
                    alert("Please select row.");
                } else {
                    $('#all_ord_id').val(allVals);
                    $('#courier_status').val(1);
                    $('#all_courier_csv').submit();
                }
            });

            $('#redex_csv').on('click', function(e) {
                var allVals = [];
                $(".sub_chk:checked").each(function() {
                    allVals.push($(this).attr('data-id'));
                });

                if (allVals.length <= 0) {
                    alert("Please select row.");
                } else {
                    $('#all_ord_id').val(allVals);
                    $('#courier_status').val(2);
                    $('#all_courier_csv').submit();
                }
            });

            //bulk courier
            $('#bulk_courier').on('change', function(e) {
                var allVals = [];
                $(".sub_chk:checked").each(function() {
                    allVals.push($(this).attr('data-id'));
                });

                if (allVals.length <= 0) {
                    alert("Please select row.");
                } else {
                    $('.all_ids').val(allVals);
                    $('#bulk_courier_form').submit();
                }
            });

            //order export
            $('#order_export').on('click', function(e) {
                var allVals = [];
                $(".sub_chk:checked").each(function() {
                    allVals.push($(this).attr('data-id'));
                });

                if (allVals.length <= 0) {
                    alert("Please select row.");
                } else {
                    $('.all_ids').val(allVals);
                    $('#order_export_form').submit();
                }
            });
        });
    </script>
@endsection
