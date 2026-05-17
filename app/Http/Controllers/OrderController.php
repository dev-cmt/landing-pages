<?php

namespace App\Http\Controllers;

use App\AttributeItem;
use App\Courier;
use App\CourierCity;
use App\CourierZone;
use App\Employee;
use App\Exports\OrderExport;
use App\Order;
use App\OrderAssign;
use App\OrderProduct;
use App\Product;
use App\ProductAttribute;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $courier_id = $request->input('courier_id') ?? null;
        $query = $request->input('query') ?? null;
        $sts = $request->input('status');
        if ($sts == 'pre_order') {
            $status = 3;
        } elseif ($sts == 'pending') {
            $status = 6;
        } elseif ($sts == 'confirmed') {
            $status = 2;
        } elseif ($sts == 'hold') {
            $status = 0;
        } elseif ($sts == 'printed') {
            $status = 7;
        } elseif ($sts == 'on_delivery') {
            $status = 8;
        } elseif ($sts == 'excel') {
            $status = 9;
        } elseif ($sts == 'delivered') {
            $status = 1;
        } elseif ($sts == 'cancelled') {
            $status = 4;
        } elseif ($sts == 'bkash') {
            $status = 10;
        } elseif ($sts == 'returned') {
            $status = 5;
        } else {
            $status = null;
        }

        if (Auth::guard('admin')->check()) {
            $data['total_order'] = Order::count();
            $data['total_pre_order'] = Order::where('status', 3)->count();
            $data['total_pending_order'] = Order::where('status', 6)->count();
            $data['total_confirmed_order'] = Order::where('status', 2)->count();
            $data['total_hold_order'] = Order::where('status', 0)->count();
            $data['total_printed_order'] = Order::where('status', 7)->count();
            $data['total_on_delivery_order'] = Order::where('status', 8)->count();
            $data['total_excel_order'] = Order::where('status', 9)->count();
            $data['total_delivered_order'] = Order::where('status', 1)->count();
            $data['total_cancelled_order'] = Order::where('status', 4)->count();
            $data['total_bkash_order'] = Order::where('status', 10)->count();
            $data['total_returned_order'] = Order::where('status', 5)->count();

            $data['orders'] = Order::query();

            if ($status !== null) {
                $data['orders']->where('status', $status);
            }

            if ($request->input('query')) {
                $data['orders']->where('customer_phone', 'LIKE', "%{$request->input('query')}%")->orWhere('invoice_id', 'LIKE', "%{$request->input('query')}%");
            }

            if ($request->input('courier_id')) {
                $data['orders']->where('courier_id', $request->input('courier_id'));
            }

            $data['orders'] = $data['orders']->with('get_products', 'get_courier', 'get_assigned')->orderBy('id', 'desc')->paginate(50);
            $data['orders']->appends([
                'query' => $request->input('query'),
                'status' => $request->input('status'),
                'courier_id' => $request->input('courier_id'),
            ]);
        } elseif (Auth::guard('manager')->check()) {
            $data['total_order'] = Order::count();
            $data['total_pre_order'] = Order::where('status', 3)->count();
            $data['total_pending_order'] = Order::where('status', 6)->count();
            $data['total_confirmed_order'] = Order::where('status', 2)->count();
            $data['total_hold_order'] = Order::where('status', 0)->count();
            $data['total_printed_order'] = Order::where('status', 7)->count();
            $data['total_on_delivery_order'] = Order::where('status', 8)->count();
            $data['total_excel_order'] = Order::where('status', 9)->count();
            $data['total_delivered_order'] = Order::where('status', 1)->count();
            $data['total_cancelled_order'] = Order::where('status', 4)->count();
            $data['total_bkash_order'] = Order::where('status', 10)->count();
            $data['total_returned_order'] = Order::where('status', 5)->count();

            $data['orders'] = Order::query();

            if ($status !== null) {
                $data['orders']->where('status', $status);
            }

            if ($request->input('query')) {
                $data['orders']->where('customer_phone', 'LIKE', "%{$request->input('query')}%")->orWhere('invoice_id', 'LIKE', "%{$request->input('query')}%");
            }

            if ($request->input('courier_id')) {
                $data['orders']->where('courier_id', $request->input('courier_id'));
            }
            $data['orders'] = $data['orders']->with('get_products', 'get_courier', 'get_assigned')->orderBy('id', 'desc')->paginate(50);

            $data['orders']->appends([
                'query' => $request->input('query'),
                'status' => $request->input('status'),
                'courier_id' => $request->input('courier_id'),
            ]);
        } elseif (Auth::guard('employee')->check()) {
            $data['today_all_orders'] = OrderAssign::leftJoin('orders', 'orders.id', 'order_assigns.order_id')
                ->whereDate('orders.order_date', Carbon::today())
                ->count();
            $data['today_pre_orders'] = OrderAssign::leftJoin('orders', 'orders.id', 'order_assigns.order_id')
                ->where('status', 3)
                ->whereDate('orders.order_date', Carbon::today())
                ->count();
            $data['today_pending_orders'] = OrderAssign::leftJoin('orders', 'orders.id', 'order_assigns.order_id')
                ->where('status', 6)
                ->whereDate('orders.order_date', Carbon::today())
                ->count();
            $data['today_confirmed_orders'] = OrderAssign::leftJoin('orders', 'orders.id', 'order_assigns.order_id')
                ->where('status', 2)
                ->whereDate('orders.order_date', Carbon::today())
                ->count();
            $data['today_hold_orders'] = OrderAssign::leftJoin('orders', 'orders.id', 'order_assigns.order_id')
                ->where('status', 0)
                ->whereDate('orders.order_date', Carbon::today())
                ->count();
            $data['today_printed_orders'] = OrderAssign::leftJoin('orders', 'orders.id', 'order_assigns.order_id')
                ->where('status', 7)
                ->whereDate('orders.order_date', Carbon::today())
                ->count();
            $data['today_on_delivery_orders'] = OrderAssign::leftJoin('orders', 'orders.id', 'order_assigns.order_id')
                ->where('status', 8)
                ->whereDate('orders.order_date', Carbon::today())
                ->count();
            $data['today_excel_orders'] = OrderAssign::leftJoin('orders', 'orders.id', 'order_assigns.order_id')
                ->where('status', 9)
                ->whereDate('orders.order_date', Carbon::today())
                ->count();
            $data['today_delivered_orders'] = OrderAssign::leftJoin('orders', 'orders.id', 'order_assigns.order_id')
                ->where('status', 1)
                ->whereDate('orders.order_date', Carbon::today())
                ->count();
            $data['today_cancelled_orders'] = OrderAssign::leftJoin('orders', 'orders.id', 'order_assigns.order_id')
                ->where('status', 4)
                ->whereDate('orders.order_date', Carbon::today())
                ->count();
            $data['today_bkash_orders'] = OrderAssign::leftJoin('orders', 'orders.id', 'order_assigns.order_id')
                ->where('status', 10)
                ->whereDate('orders.order_date', Carbon::today())
                ->count();
            $data['today_returned_orders'] = OrderAssign::leftJoin('orders', 'orders.id', 'order_assigns.order_id')
                ->where('status', 5)
                ->whereDate('orders.order_date', Carbon::today())
                ->count();

            $employee = Auth::guard('employee')->user();
            $data['total_order'] = Order::with('get_assigned')->whereHas('get_assigned', function ($query) use ($employee) {
                $query->where('employee_id', $employee->id);
            })->count();
            $data['total_pre_order'] = Order::with('get_assigned')->whereHas('get_assigned', function ($query) use ($employee) {
                $query->where('employee_id', $employee->id);
            })->where('status', 3)->count();
            $data['total_pending_order'] = Order::with('get_assigned')->whereHas('get_assigned', function ($query) use ($employee) {
                $query->where('employee_id', $employee->id);
            })->where('status', 6)->count();
            $data['total_confirmed_order'] = Order::with('get_assigned')->whereHas('get_assigned', function ($query) use ($employee) {
                $query->where('employee_id', $employee->id);
            })->where('status', 2)->count();
            $data['total_hold_order'] = Order::with('get_assigned')->whereHas('get_assigned', function ($query) use ($employee) {
                $query->where('employee_id', $employee->id);
            })->where('status', 0)->count();
            $data['total_printed_order'] = Order::with('get_assigned')->whereHas('get_assigned', function ($query) use ($employee) {
                $query->where('employee_id', $employee->id);
            })->where('status', 7)->count();
            $data['total_on_delivery_order'] = Order::with('get_assigned')->whereHas('get_assigned', function ($query) use ($employee) {
                $query->where('employee_id', $employee->id);
            })->where('status', 8)->count();
            $data['total_excel_order'] = Order::with('get_assigned')->whereHas('get_assigned', function ($query) use ($employee) {
                $query->where('employee_id', $employee->id);
            })->where('status', 9)->count();
            $data['total_delivered_order'] = Order::with('get_assigned')->whereHas('get_assigned', function ($query) use ($employee) {
                $query->where('employee_id', $employee->id);
            })->where('status', 1)->count();
            $data['total_cancelled_order'] = Order::with('get_assigned')->whereHas('get_assigned', function ($query) use ($employee) {
                $query->where('employee_id', $employee->id);
            })->where('status', 4)->count();
            $data['total_bkash_order'] = Order::with('get_assigned')->whereHas('get_assigned', function ($query) use ($employee) {
                $query->where('employee_id', $employee->id);
            })->where('status', 10)->count();
            $data['total_returned_order'] = Order::with('get_assigned')->whereHas('get_assigned', function ($query) use ($employee) {
                $query->where('employee_id', $employee->id);
            })->where('status', 5)->count();

            $data['orders'] = OrderAssign::query()->with('get_order');

            if ($status !== null) {
                $data['orders']->where('employee_id', Auth::guard('employee')->user()->id)->whereHas('get_order', function ($query) use ($status) {
                    $query->where('status', $status);
                });
            }

            if ($request->input('query')) {
                $phone = $request->input('query');
                $invoice_id = $request->input('query');
                $data['orders']->whereHas('get_order', function ($query) use ($phone, $invoice_id) {
                    $query->where('customer_phone', 'LIKE', "%" . $phone . "%")
                        ->orWhere('invoice_id', 'LIKE', "%" . $invoice_id . "%");
                });
            } else {
                $data['orders'] = $data['orders']->where('employee_id', Auth::guard('employee')->user()->id);
            }

            $data['orders'] = $data['orders']->orderBy('id', 'desc')->paginate(50);

            $data['orders']->appends([
                'query' => $request->input('query'),
                'status' => $request->input('status'),
                'courier_id' => $request->input('courier_id'),
            ]);

            // dd($data);
        } else {
            $data = [];
        }
        //dd($data);

        return view('backEnd.admin.orders.index', compact('data', 'courier_id', 'query', 'sts'));
    }

    // public function indexP(Request $request)
    // {
    //     //dd($request->all());
    //     $courier_id = $request->input('courier_id') ?? null;
    //     $query = $request->input('query') ?? null;
    //     $sts = $request->input('status');
    //     if ($sts == 'Processing') {
    //         $status = 2;
    //     } elseif ($sts == 'Pending Payment') {
    //         $status = 3;
    //     } elseif ($sts == 'On Hold') {
    //         $status = 0;
    //     } elseif ($sts == 'Canceled') {
    //         $status = 4;
    //     } elseif ($sts == 'Completed') {
    //         $status = 1;
    //     } elseif ($sts == 'Returned') {
    //         $status = 5;
    //     } else {
    //         $status = null;
    //     }

    //     if (Auth::guard('admin')->check()) {
    //         $data['total_order'] = Order::count();
    //         $data['total_hold_order'] = Order::where('status', 0)->count();
    //         $data['total_deliver_order'] = Order::where('status', 1)->count();
    //         $data['total_process_order'] = Order::where('status', 2)->count();
    //         $data['total_pend_pay_order'] = Order::where('status', 3)->count();
    //         $data['total_cancel_order'] = Order::where('status', 4)->count();
    //         $data['total_return_order'] = Order::where('status', 5)->count();

    //         $data['orders'] = Order::query();

    //         if ($status !== null) {
    //             $data['orders']->where('status', $status);
    //         }

    //         if ($request->input('query')) {
    //             $data['orders']->where('customer_phone', 'LIKE', "%{$request->input('query')}%");
    //         }

    //         if ($request->input('courier_id')) {
    //             $data['orders']->where('courier_id', $request->input('courier_id'));
    //         }

    //         $data['orders'] = $data['orders']->with('get_products', 'get_courier', 'get_assigned')->orderBy('id', 'desc')->paginate(50);
    //     } elseif (Auth::guard('manager')->check()) {
    //         $data['total_order'] = Order::count();
    //         $data['total_hold_order'] = Order::where('status', 0)->count();
    //         $data['total_deliver_order'] = Order::where('status', 1)->count();
    //         $data['total_process_order'] = Order::where('status', 2)->count();
    //         $data['total_pend_pay_order'] = Order::where('status', 3)->count();
    //         $data['total_cancel_order'] = Order::where('status', 4)->count();
    //         $data['total_return_order'] = Order::where('status', 5)->count();
    //         if ($request->input('query')) {
    //             $data['orders'] = Order::with('get_products', 'get_courier', 'get_assigned')
    //                 ->where('customer_phone', 'LIKE', "%{$request->input('query')}%")
    //                 ->orderBy('id', 'desc')
    //                 ->paginate(50);
    //         } else {
    //             $data['orders'] = Order::with('get_products', 'get_courier', 'get_assigned')->where('status', 2)->orderBy('id', 'desc')->paginate(50);
    //         }
    //     } elseif (Auth::guard('employee')->check()) {
    //         $data['total_order'] = OrderAssign::leftJoin('orders', 'orders.id', 'order_assigns.order_id')
    //             ->where('order_assigns.employee_id', Auth::guard('employee')->user()->id)
    //             ->count();
    //         $data['total_hold_order'] = OrderAssign::leftJoin('orders', 'orders.id', 'order_assigns.order_id')
    //             ->where([['order_assigns.employee_id', Auth::guard('employee')->user()->id], ['status', 0]])
    //             ->count();
    //         $data['total_deliver_order'] = OrderAssign::leftJoin('orders', 'orders.id', 'order_assigns.order_id')
    //             ->where([['order_assigns.employee_id', Auth::guard('employee')->user()->id], ['status', 1]])
    //             ->count();
    //         $data['total_process_order'] = OrderAssign::leftJoin('orders', 'orders.id', 'order_assigns.order_id')
    //             ->where([['order_assigns.employee_id', Auth::guard('employee')->user()->id], ['status', 2]])
    //             ->count();
    //         $data['total_pend_pay_order'] = OrderAssign::leftJoin('orders', 'orders.id', 'order_assigns.order_id')
    //             ->where([['order_assigns.employee_id', Auth::guard('employee')->user()->id], ['status', 3]])
    //             ->count();
    //         $data['total_cancel_order'] = OrderAssign::leftJoin('orders', 'orders.id', 'order_assigns.order_id')
    //             ->where([['order_assigns.employee_id', Auth::guard('employee')->user()->id], ['status', 4]])
    //             ->count();
    //         $data['total_return_order'] = OrderAssign::leftJoin('orders', 'orders.id', 'order_assigns.order_id')
    //             ->where([['order_assigns.employee_id', Auth::guard('employee')->user()->id], ['status', 5]])
    //             ->count();

    //         /*$data['orders'] = OrderAssign::with('get_order')
    //             ->where('employee_id', Auth::guard('employee')->user()->id)
    //             ->orderBy('order_id', 'desc')
    //             ->paginate(50);*/
    //         if ($request->input('query')) {
    //             $data['orders'] = DB::table('order_assigns')
    //                 ->leftJoin('orders', 'orders.id', 'order_assigns.order_id')
    //                 ->orderBy('order_id', 'desc')
    //                 ->where('customer_phone', 'LIKE', "%{$request->input('query')}%")
    //                 ->where([['orders.status', 2], ['order_assigns.employee_id', Auth::guard('employee')->user()->id]])
    //                 ->select('orders.*')
    //                 ->paginate(50);
    //         } else {
    //             $data['orders'] = DB::table('order_assigns')
    //                 ->leftJoin('orders', 'orders.id', 'order_assigns.order_id')
    //                 ->orderBy('order_id', 'desc')
    //                 ->where([['orders.status', 2], ['order_assigns.employee_id', Auth::guard('employee')->user()->id]])
    //                 ->select('orders.*')
    //                 ->paginate(50);
    //         }
    //     } else {
    //         $data = [];
    //     }
    //     //dd($data);

    //     return view('backEnd.admin.orders.index', compact('data', 'courier_id', 'query', 'sts'));
    // }

    public function create()
    {
        $products = Product::where('status', 1)->select('name', 'id', 'has_variant')->orderBy('id', 'desc')->get();
        $courier = Courier::where('status', 1)->pluck('courier_name', 'id');
        $settings = DB::table('web_settings')->select('invoice_prefix')->first();
        if (Order::count() > 0) {
            $invoice_id = Order::latest('id')->first()->invoice_id;
            $invoice_id = trim($invoice_id, $settings->invoice_prefix);
            $invoice_id++;
            $invoice_id = $settings->invoice_prefix . $invoice_id;
        } else {
            $invoice_id = $settings->invoice_prefix . '1';
        }

        return view('backEnd.admin.orders.add', compact('products', 'courier', 'invoice_id'));
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $settings = DB::table('web_settings')->select('invoice_prefix')->first();
        if (Order::count() > 0) {
            $invoice_id = Order::latest('id')->first()->invoice_id;
            $invoice_id = trim($invoice_id, $settings->invoice_prefix);
            $invoice_id++;
            $invoice_id = $settings->invoice_prefix . $invoice_id;
        } else {
            $invoice_id = $settings->invoice_prefix . '1';
        }

        //create customer account
        $check_cus = User::where('phone', $request->customer_phone)->first();
        if ($check_cus) {
            $customer_id = $check_cus;
        } else {
            $customer_id = User::create([
                'name' => $request->customer_name,
                'phone' => $request->customer_phone,
                'address' => $request->customer_address,
                'password' => Hash::make($request->customer_phone),
            ]);
        }

        $order_date = Carbon::parse($request->order_date)->format('Y-m-d');
        $inputs = array_merge($request->all(), [
            'invoice_id' => $invoice_id,
            'order_date' => $order_date,
            'customer_id' => $customer_id->id,
            'status' => $request->status,
        ]);

        $order_id = Order::create($inputs);
        //insert products
        foreach ($request->product_id as $i => $product_id) {
            $sku = $request->product_sku[$i];
            $variant = null;
            $attributes = [];
            if ($request->has('attribute_choice') && array_key_exists($sku, $request->attribute_choice)) {
                $variant = ProductAttribute::with('get_variant_options')->where('product_id', $product_id)
                    ->where('sku', $sku)
                    ->first();
                // dd($variant);\$backup_attribute = [];
                // dd($variant);

                foreach ($variant->get_variant_options as $variant_option) {
                    $attributes[] = $variant_option->choice_attribute_item_name;
                }
            }
            // dd($variant);
            $price = isset($request->price[$i]) ? str_replace(',', '', $request->price[$i]) : 0;

            OrderProduct::create([
                'order_id'    => $order_id->id,
                'product_id'  => $product_id,
                'product_sku' => $sku,
                'qty'         => $request->qty[$i],
                'price'       => $price,
                'attributes' => count($attributes) > 0 ? $attributes : null
            ]);
            //update product stock
            $product = Product::with('get_variants')->find($product_id);
            if ($product) {
                $product->decrement('stock', $request->qty[$i]);
            }
            //update product attribute stock
            if ($variant) {
                $variant->decrement('stock', $request->qty[$i]);
            }
        }

        if (Auth::guard('admin')->check()) {
            /*$a = OrderAssign::whereDate('created_at',Carbon::today())->get()->groupBy('employee_id');
            $b = Employee::get();
            if ($b->count() > 0){
                if ($a->count() == $b->count()){
                    foreach ($b as $item) {
                        $c[$item->id] = $a[$item->id]->count();
                    }
                    foreach ($c as $key => $item) {
                        if (min($c) == $item){
                            $i[$key] = $item;
                        }
                    }
                    $i = array_rand($i);
                }else{
                    foreach ($a as $key => $item) {
                        $d[$key] = $item->count();
                    }
                    foreach ($d as $key => $item) {
                        if (min($d) == $item){
                            $i[$key] = $item;
                        }
                    }
                    $i = array_rand($i);
                    //$i = Employee::latest('id')->first()->id;
                }

                OrderAssign::create([
                    'order_id' => $order_id->id,
                    'employee_id' => $i,
                ]);
            }*/
            $b = Employee::where('status', 1)->get();
            if ($b->count() > 0) {
                $i = [];
                foreach ($b as $item) {
                    $i[$item->id] = $item->name;
                }
                $selected_employee_id = array_rand($i);

                OrderAssign::create([
                    'order_id'    => $order_id->id,
                    'employee_id' => $selected_employee_id,
                ]);
            }
            return redirect()->route('admin.orders')->with('success', 'Order Created Successfully');
        } elseif (Auth::guard('manager')->check()) {
            $b = Employee::where('status', 1)->get();
            if ($b->count() > 0) {
                foreach ($b as $item) {
                    $i[$item->id] = $item->name;
                }
                $i = array_rand($i);

                OrderAssign::create([
                    'order_id' => $order_id->id,
                    'employee_id' => $i,
                ]);
            }
            return redirect()->route('manager.orders')->with('success', 'Order Created Successfully');
        } elseif (Auth::guard('employee')->check()) {
            OrderAssign::create([
                'order_id' => $order_id->id,
                'employee_id' => Auth::guard('employee')->user()->id,
            ]);
            return redirect()->route('employee.orders')->with('success', 'Order Created Successfully');
        } else {
            return back()->with('warning', 'Something Went Wrong');
        }
    }

    public function edit($id)
    {
        $products = Product::where('status', 1)->select('name', 'id', 'has_variant')->orderBy('id', 'desc')->get();
        // dd($products);
        $data = Order::with('get_products')->find($id);
        $order_products = [];
        foreach ($data->get_products as $product) {
            $order_products[] = $product->get_product->id;
        }
        $courier = Courier::where('status', 1)->pluck('courier_name', 'id');
        $courier_city = CourierCity::where([['status', 1], ['courier_id', $data->courier_id]])->pluck('city_name', 'id');
        $courier_zone = CourierZone::where([['status', 1], ['courier_id', $data->courier_id]])->pluck('zone_name', 'id');
        return view('backEnd.admin.orders.edit', compact('data', 'products', 'courier', 'courier_city', 'courier_zone', 'order_products'));
    }

    public function update(Request $request, $id)
    {
        //dd($request->all());
        if ($request->product_id) {
            if (!$request->product_id) {
                return redirect()->back()->with('error', 'Please Select A Product');
            }

            DB::transaction(function () use ($request, $id) {
                $order_date = Carbon::parse($request->order_date)->format('Y-m-d');
                $inputs = array_merge($request->all(), [
                    'order_date' => $order_date,
                    'status'     => $request->status,
                ]);

                $order = Order::findOrFail($id);
                $order->update($inputs);

                // Restore stock for old products before deleting
                $oldOrderProducts = OrderProduct::where('order_id', $order->id)->get();
                foreach ($oldOrderProducts as $oldOrderProduct) {
                    $product = Product::find($oldOrderProduct->product_id);
                    if ($product) {
                        $product->increment('stock', $oldOrderProduct->qty);
                    }
                    if ($oldOrderProduct->attribute_id) {
                        $productAttr = ProductAttribute::where('id', $oldOrderProduct->attribute_id)
                            ->first();
                        if ($productAttr) {
                            $productAttr->increment('stock', $oldOrderProduct->qty);
                        }
                    }
                }

                // Delete old order products
                OrderProduct::where('order_id', $order->id)->delete();

                // Create new order products and deduct stock
                foreach ($request->product_id as $index => $product_id) {
                    $sku        = $request->product_sku[$index];
                    // dd($sku);
                    $qty        = $request->qty[$index];
                    $variant = null;
                    $attributes = [];
                    if ($request->has('attribute_choice') && array_key_exists($sku, $request->attribute_choice)) {
                        $variant = ProductAttribute::with('get_variant_options')->where(['product_id' => $product_id, 'sku' => $sku])->first();

                        // dd($variant);
                        foreach ($variant->get_variant_options as $variant_option) {
                            $attributes[] = $variant_option->choice_attribute_item_name;
                        }
                    }
                    $price = isset($request->price[$index]) ? str_replace(',', '', $request->price[$index]) : 0;
                    OrderProduct::create([
                        'order_id'    => $order->id,
                        'product_id'  => $product_id,
                        'product_sku' => $sku,
                        'qty'         => $qty,
                        'price'       => $price,
                        'attributes' => count($attributes) > 0 ? $attributes : null
                    ]);
                }


                $product = Product::find($product_id);
                if ($product) {
                    $product->decrement('stock', $qty);
                }
                if ($variant) {
                    $variant->decrement('stock', $qty);
                }
            });

            if (Auth::guard('admin')->check()) {
                return redirect()->route('admin.orders')->with('success', 'Order Updated Successfully');
            } elseif (Auth::guard('manager')->check()) {
                return redirect()->route('manager.orders')->with('success', 'Order Updated Successfully');
            } elseif (Auth::guard('employee')->check()) {
                return redirect()->route('employee.orders')->with('success', 'Order Updated Successfully');
            } else {
                return redirect()->back()->with('warning', 'Something Went Wrong');
            }
        } else {
            return redirect()->back()->with('error', 'Please Select A Product');
        }
    }

    public function statusChange($id, $status)
    {
        $order = Order::find($id);

        if ($status == 8 && $order->status != 8) {
            //steadfast api
            if ($order->courier_id == 1) {
                //steadfast couriers entry
                $credential = DB::table('stead_fast_apis')->select('is_active', 'api_key', 'secret_key')->where('id', 1)->first();
                if ($credential->is_active == 1) {
                    $vars = [
                        'invoice' => $order->invoice_id ?? null,
                        'recipient_name' => $order->customer_name ?? null,
                        'recipient_address' => $order->customer_address ?? null,
                        'recipient_phone' => $order->customer_phone ?? null,
                        'cod_amount' => $order->total ?? 0,
                        'note' => null,
                    ];
                    $json_string = json_encode($vars);
                    //dd($json_string);
                    $headers = [
                        'Api-Key: ' . $credential->api_key,
                        'Secret-Key: ' . $credential->secret_key,
                        'Content-Type: application/json',
                    ];
                    //dd($headers);
                    $curl = curl_init();

                    curl_setopt_array($curl, array(
                        CURLOPT_URL => 'https://portal.packzy.com/api/v1/create_order',
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => '',
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 0,
                        CURLOPT_FOLLOWLOCATION => true,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => 'POST',
                        CURLOPT_POSTFIELDS => $json_string,
                        CURLOPT_HTTPHEADER => $headers,
                    ));
                    $data = curl_exec($curl);
                    curl_close($curl);

                    if (json_decode($data)->status != 200) {
                        $date = Carbon::now() . "\n";
                        $fp = fopen(base_path('storage/logs/stead_fast_entry_log.txt'), 'a'); //opens file in append mode
                        fwrite($fp, $date . json_encode($data) . "\n\n");
                        fclose($fp);
                    }

                    if (json_decode($data)->status == 200) {
                        $order->update([
                            'status' => $order->status,
                            'stead_fast_consignment_id' => json_decode($data)->status == 200 ? json_decode($data)->consignment->consignment_id : null,
                            'stead_fast_tracking_code' => json_decode($data)->status == 200 ? json_decode($data)->consignment->tracking_code : null,
                        ]);
                    }
                }
            } else {
                $order->update([
                    'status' => $status
                ]);
            }
        } else {
            $order->update([
                'status' => $status
            ]);
        }

        return back();
    }

    public function delete($id)
    {
        $order = Order::find($id);

        if ($order->status == 1) {
            return back()->with('warning', 'Completed Order Can\'t Be Deleted!');
        } else {
            OrderProduct::where('order_id', $id)->delete();
            OrderAssign::where('order_id', $id)->delete();
            $order->delete();
            return back()->with('success', 'Order Deleted Successfully');
        }
    }


    public function ajaxGetProductModal(Request $request)
    {
        // dd($request->all());
        $data = Product::with('get_choice_attributes')->find($request->id);
        // dd($data->get_choice_attributes());
        return view('backEnd.admin.orders.partial.attribute_choice', compact('data'));
    }
    public function ajaxGetProductModalEdit(Request $request)
    {
        // dd(2);
        $data = Product::with('get_choice_attributes')->find($request->id);
        return view('backEnd.admin.orders.partial.attribute_choice_edit', compact('data'));
    }

    public function ajaxGetProducts(Request $request)
    {
        $data = Product::find($request->id);
        // dd($data);
        return view('backEnd.admin.orders.partial.ajax_products', compact('data'))->render();
    }

    public function ajaxGetModalVariant(Request $request)
    {

        if (is_array($request->choice_attributes) && count($request->choice_attributes) > 0) {
            $choice_attributes = $request->choice_attributes;
            $data = Product::with('get_variants.get_variant_options')->find($request->id);
            $requestedVariant = collect($choice_attributes)
                ->map(function ($attr) {
                    return strtolower(str_replace(' ', '_', trim($attr)));
                })
                ->implode('-');
            $product_attributes = null;
            if ($data && $data->get_variants) {
                foreach ($data->get_variants as $variant) {
                    $variantKey = collect($variant->get_variant_options)
                        ->pluck('choice_attribute_item_name')
                        ->map(function ($opt) {
                            return strtolower(str_replace(' ', '_', trim($opt)));
                        })
                        ->implode('-');
                    if ($variantKey === $requestedVariant) {
                        $product_attributes = $variant;
                        break;
                    }
                }
            }
            return view('backEnd.admin.orders.partial.product_attributes', compact(
                'data',
                'product_attributes',
                'choice_attributes'
            ))->render();
        }


        //dd($product_attributes);
    }
    public function ajaxGetVariant(Request $request)
    {
        // dd($request->all());
        $quantity = $request->quantity;
        $choice_attributes = $request->choice_attributes ?? [];
        $product_id = $request->id;
        $data = Product::with('get_variants.get_variant_options')->find($product_id);
        // $requestedVariant = collect($choice_attributes);
        // dd($requestedVariant, $choice_attributes);
        $requestedVariant = collect($choice_attributes)
            ->map(function ($attr) {
                return strtolower(str_replace(' ', '_', $attr));
            })
            ->implode('-');

        $product_attribute = null;
        if ($data && $data->get_variants) {
            foreach ($data->get_variants as $variant) {
                $variantKey = collect($variant->get_variant_options)
                    ->pluck('choice_attribute_item_name')
                    ->map(function ($opt) {
                        return strtolower(str_replace(' ', '_', $opt));
                    })
                    ->implode('-');
                if ($variantKey === $requestedVariant) {
                    $product_attribute = $variant;
                    break;
                }
            }
        }
        // dd($product_attribute);
        if ($product_attribute) {
            $html = view('backEnd.admin.orders.partial.attr_checkbox', compact('data', 'product_attribute', 'choice_attributes'))->render();
            // return view('backEnd.admin.orders.attr_checkbox', compact('data', 'attributes', 'choice_attributes', 'sku', 'price', 'stock', 'quantity'))->render();

            return response()->json([
                'html' => $html,
                'product' => $data,
                'attribute' => $product_attribute,
                'quantity' => $quantity
            ]);
        }
    }

    public function printInvoice(Request $request)
    {
        $data = Order::find($request->id);
        return view('backEnd.admin.orders.invoice2', compact('data'))->render();
    }

    public function printBulkInvoice(Request $request)
    {
        $data = Order::find($request->all_inv_id);
        return view('backEnd.admin.orders.bulk_invoice', compact('data'))->render();
    }

    public function allStatusChange(Request $request)
    {
        //dd(explode(',',$request->all_status));
        foreach (explode(',', $request->all_status) as $item) {
            $order = Order::find($item);
            if ($request->status == 8 && $order->status != 8) {
                //steadfast api
                if ($order->courier_id == 1) {
                    //steadfast couriers entry
                    $credential = DB::table('stead_fast_apis')->select('is_active', 'api_key', 'secret_key')->where('id', 1)->first();
                    if ($credential->is_active == 1) {
                        $vars = [
                            'invoice' => $order->invoice_id ?? null,
                            'recipient_name' => $order->customer_name ?? null,
                            'recipient_address' => $order->customer_address ?? null,
                            'recipient_phone' => $order->customer_phone ?? null,
                            'cod_amount' => $order->total ?? 0,
                            'note' => $order->order_note ?? null,
                        ];
                        $json_string = json_encode($vars);
                        //dd($json_string);
                        $headers = [
                            'Api-Key: ' . $credential->api_key,
                            'Secret-Key: ' . $credential->secret_key,
                            'Content-Type: application/json',
                        ];
                        //dd($headers);
                        $curl = curl_init();

                        curl_setopt_array($curl, array(
                            CURLOPT_URL => 'https://portal.packzy.com/api/v1/create_order',
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_ENCODING => '',
                            CURLOPT_MAXREDIRS => 10,
                            CURLOPT_TIMEOUT => 0,
                            CURLOPT_FOLLOWLOCATION => true,
                            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                            CURLOPT_CUSTOMREQUEST => 'POST',
                            CURLOPT_POSTFIELDS => $json_string,
                            CURLOPT_HTTPHEADER => $headers,
                        ));
                        $data = curl_exec($curl);
                        curl_close($curl);

                        if (json_decode($data)->status != 200) {
                            $date = Carbon::now() . "\n";
                            $fp = fopen(base_path('storage/logs/stead_fast_entry_log.txt'), 'a'); //opens file in append mode
                            fwrite($fp, $date . json_encode($data) . "\n\n");
                            fclose($fp);
                        }

                        if (json_decode($data)->status == 200) {
                            $order->update([
                                'status' => $order->status,
                                'stead_fast_consignment_id' => json_decode($data)->status == 200 ? json_decode($data)->consignment->consignment_id : null,
                                'stead_fast_tracking_code' => json_decode($data)->status == 200 ? json_decode($data)->consignment->tracking_code : null,
                                'tracking_link' => json_decode($data)->status == 200 ? json_decode($data)->consignment->tracking_link : null,
                            ]);
                        }
                    }
                } else {
                    $order->update([
                        'status' => $request->status
                    ]);
                }
            } else {
                $order->update([
                    'status' => $request->status
                ]);
            }
        }
        //dd($request->all());
        return back()->with('success', 'Status Changed Successfully');
    }

    //courier courier_csv
    public function courierCsv(Request $request)
    {
        //        dd(explode(',',$request->all_ord_id));
        //        dd($request->all());
        if ($request->status == 1) {
            $name = 'stead_fast';
        } else {
            $name = 'redex';
        }

        $file_name = $name . '_' . date('d-M-Y') . '.xlsx';
        return Excel::download(new OrderExport(explode(',', $request->all_ord_id), $request->status), $file_name);
    }

    public function bulkCourier(Request $request)
    {
        Order::whereIn('id', explode(',', $request->all_ids))->update([
            'courier_id' => $request->bulk_courier
        ]);

        return back()->with('success', 'Courier Added Successfully');
    }

    public function orderExport(Request $request)
    {
        $name = 'orders';
        $file_name = $name . '_' . date('d-M-Y') . '.xlsx';
        return Excel::download(new OrderExport(explode(',', $request->all_ord_id), 0), $file_name);
    }
}
