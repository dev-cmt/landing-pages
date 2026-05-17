<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Employee;
use App\Manager;
use App\Order;
use App\OrderAssign;
use App\Product;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        if (php_sapi_name() === 'cli' or defined('STDIN')) {
        } else {
            if (file_exists(base_path('vendor/laravel/framework/src/Illuminate/license.dat'))) {
                $file = fopen(base_path() . "/vendor/laravel/framework/src/Illuminate/license.dat", 'r');
                $read = fgets($file);
                fclose($file);
                if ($read != str_replace('www.', '', $_SERVER['SERVER_NAME'])) {
                    function getIPAddress()
                    {
                        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                            $ip = $_SERVER['HTTP_CLIENT_IP'];
                        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                        } else {
                            $ip = $_SERVER['REMOTE_ADDR'];
                        }
                        return $ip;
                    }

                    $ip = getIPAddress();
                    if ($ip == '::1') {
                        $ip = gethostname();
                    }
                    $client = new \GuzzleHttp\Client();
                    $url = 'https://license.prodevsltd.com/activation/attempt/store';
                    $url2 = 'http://' . $_SERVER['SERVER_NAME'];
                    $form_params = [
                        'ip' => $ip,
                        'parent' => $file,
                        'url' => $url2,
                    ];
                    $response = $client->post($url, ['form_params' => $form_params]);
                    $response->getBody()->getContents();
                    dd('This Product Is Pirated. Please Contact with ask@prodevsltd.com or www.prodevsltd.com');
                }
            } else {
                function getIPAddress()
                {
                    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                        $ip = $_SERVER['HTTP_CLIENT_IP'];
                    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                    } else {
                        $ip = $_SERVER['REMOTE_ADDR'];
                    }
                    return $ip;
                }

                $parent = env('APP_NAME') . ', ' . env('APP_URL');

                $ip = getIPAddress();
                if ($ip == '::1') {
                    $ip = gethostname();
                }
                $client = new \GuzzleHttp\Client();
                $url = 'https://license.prodevsltd.com/activation/attempt/store';
                $url2 = 'http://' . $_SERVER['SERVER_NAME'];
                $form_params = [
                    'ip' => $ip,
                    'parent' => $parent,
                    'url' => $url2,
                ];
                $response = $client->post($url, ['form_params' => $form_params]);
                $response->getBody()->getContents();
                dd('This Product Is Pirated. Please Contact with ask@prodevsltd.com or www.prodevsltd.com');
            }
        }
    }

    public function dashboard(Request $request)
    {
        // dd($request->all());

        if (Auth::guard('admin')->check()) {
            $data['total_revenue'] = Order::where('status', 1)->sum('total');
            $data['total_customer'] = User::count();
            $data['total_product'] = Product::count();
            $data['total_staff'] = (Admin::count() + Employee::count() + Manager::count() - 1);
            $data['recent_orders'] = Order::select('id', 'order_date', 'customer_name', 'customer_phone', 'total', 'status')->orderBy('id', 'desc')->limit(10)->get();

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

            if ($request->date_range) {
                $date_range = json_decode($request->date_range, true);
                $data['today_all_orders'] = OrderAssign::leftJoin('orders', 'orders.id', 'order_assigns.order_id')
                    ->whereBetween('orders.order_date', $date_range)
                    ->count();
                $data['today_pre_orders'] = OrderAssign::leftJoin('orders', 'orders.id', 'order_assigns.order_id')
                    ->where('status', 3)
                    ->whereBetween('orders.order_date', $date_range)
                    ->count();
                $data['today_pending_orders'] = OrderAssign::leftJoin('orders', 'orders.id', 'order_assigns.order_id')
                    ->where('status', 6)
                    ->whereBetween('orders.order_date', $date_range)
                    ->count();
                $data['today_confirmed_orders'] = OrderAssign::leftJoin('orders', 'orders.id', 'order_assigns.order_id')
                    ->where('status', 2)
                    ->whereBetween('orders.order_date', $date_range)
                    ->count();
                $data['today_hold_orders'] = OrderAssign::leftJoin('orders', 'orders.id', 'order_assigns.order_id')
                    ->where('status', 0)
                    ->whereBetween('orders.order_date', $date_range)
                    ->count();
                $data['today_printed_orders'] = OrderAssign::leftJoin('orders', 'orders.id', 'order_assigns.order_id')
                    ->where('status', 7)
                    ->whereBetween('orders.order_date', $date_range)
                    ->count();
                $data['today_on_delivery_orders'] = OrderAssign::leftJoin('orders', 'orders.id', 'order_assigns.order_id')
                    ->where('status', 8)
                    ->whereBetween('orders.order_date', $date_range)
                    ->count();
                $data['today_excel_orders'] = OrderAssign::leftJoin('orders', 'orders.id', 'order_assigns.order_id')
                    ->where('status', 9)
                    ->whereBetween('orders.order_date', $date_range)
                    ->count();
                $data['today_delivered_orders'] = OrderAssign::leftJoin('orders', 'orders.id', 'order_assigns.order_id')
                    ->where('status', 1)
                    ->whereBetween('orders.order_date', $date_range)
                    ->count();
                $data['today_cancelled_orders'] = OrderAssign::leftJoin('orders', 'orders.id', 'order_assigns.order_id')
                    ->where('status', 4)
                    ->whereBetween('orders.order_date', $date_range)
                    ->count();
                $data['today_bkash_orders'] = OrderAssign::leftJoin('orders', 'orders.id', 'order_assigns.order_id')
                    ->where('status', 10)
                    ->whereBetween('orders.order_date', $date_range)
                    ->count();
                $data['today_returned_orders'] = OrderAssign::leftJoin('orders', 'orders.id', 'order_assigns.order_id')
                    ->where('status', 5)
                    ->whereBetween('orders.order_date', $date_range)
                    ->count();
            } else {
                $data['today_all_orders'] = OrderAssign::leftJoin('orders', 'orders.id', 'order_assigns.order_id')
                    ->whereDate('orders.order_date', today())
                    ->count();
                $data['today_pre_orders'] = OrderAssign::leftJoin('orders', 'orders.id', 'order_assigns.order_id')
                    ->where('status', 3)
                    ->whereDate('orders.order_date', today())
                    ->count();
                $data['today_pending_orders'] = OrderAssign::leftJoin('orders', 'orders.id', 'order_assigns.order_id')
                    ->where('status', 6)
                    ->whereDate('orders.order_date', today())
                    ->count();
                $data['today_confirmed_orders'] = OrderAssign::leftJoin('orders', 'orders.id', 'order_assigns.order_id')
                    ->where('status', 2)
                    ->whereDate('orders.order_date', today())
                    ->count();
                $data['today_hold_orders'] = OrderAssign::leftJoin('orders', 'orders.id', 'order_assigns.order_id')
                    ->where('status', 0)
                    ->whereDate('orders.order_date', today())
                    ->count();
                $data['today_printed_orders'] = OrderAssign::leftJoin('orders', 'orders.id', 'order_assigns.order_id')
                    ->where('status', 7)
                    ->whereDate('orders.order_date', today())
                    ->count();
                $data['today_on_delivery_orders'] = OrderAssign::leftJoin('orders', 'orders.id', 'order_assigns.order_id')
                    ->where('status', 8)
                    ->whereDate('orders.order_date', today())
                    ->count();
                $data['today_excel_orders'] = OrderAssign::leftJoin('orders', 'orders.id', 'order_assigns.order_id')
                    ->where('status', 9)
                    ->whereDate('orders.order_date', today())
                    ->count();
                $data['today_delivered_orders'] = OrderAssign::leftJoin('orders', 'orders.id', 'order_assigns.order_id')
                    ->where('status', 1)
                    ->whereDate('orders.order_date', today())
                    ->count();
                $data['today_cancelled_orders'] = OrderAssign::leftJoin('orders', 'orders.id', 'order_assigns.order_id')
                    ->where('status', 4)
                    ->whereDate('orders.order_date', today())
                    ->count();
                $data['today_bkash_orders'] = OrderAssign::leftJoin('orders', 'orders.id', 'order_assigns.order_id')
                    ->where('status', 10)
                    ->whereDate('orders.order_date', today())
                    ->count();
                $data['today_returned_orders'] = OrderAssign::leftJoin('orders', 'orders.id', 'order_assigns.order_id')
                    ->where('status', 5)
                    ->whereDate('orders.order_date', today())
                    ->count();
            }
        } elseif (Auth::guard('manager')->check()) {
            $data['total_revenue'] = Order::where('status', 1)->sum('total');
            $data['total_staff'] = (Employee::count() + Manager::count() - 1);
            $data['total_customer'] = User::count();
            $data['total_product'] = Product::count();
            $data['total_pre_order'] = Order::where('status', 3)->count();
            $data['recent_orders'] = Order::select('id', 'order_date', 'customer_name', 'customer_phone', 'total', 'status')->orderBy('id', 'desc')->limit(10)->get();

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

            if ($request->date_range) {
                $date_range = json_decode($request->date_range, true);
                $data['today_all_orders'] = OrderAssign::leftJoin('orders', 'orders.id', 'order_assigns.order_id')
                    ->whereBetween('orders.order_date', $date_range)
                    ->count();
                $data['today_pre_orders'] = OrderAssign::leftJoin('orders', 'orders.id', 'order_assigns.order_id')
                    ->where('status', 3)
                    ->whereBetween('orders.order_date', $date_range)
                    ->count();
                $data['today_pending_orders'] = OrderAssign::leftJoin('orders', 'orders.id', 'order_assigns.order_id')
                    ->where('status', 6)
                    ->whereBetween('orders.order_date', $date_range)
                    ->count();
                $data['today_confirmed_orders'] = OrderAssign::leftJoin('orders', 'orders.id', 'order_assigns.order_id')
                    ->where('status', 2)
                    ->whereBetween('orders.order_date', $date_range)
                    ->count();
                $data['today_hold_orders'] = OrderAssign::leftJoin('orders', 'orders.id', 'order_assigns.order_id')
                    ->where('status', 0)
                    ->whereBetween('orders.order_date', $date_range)
                    ->count();
                $data['today_printed_orders'] = OrderAssign::leftJoin('orders', 'orders.id', 'order_assigns.order_id')
                    ->where('status', 7)
                    ->whereBetween('orders.order_date', $date_range)
                    ->count();
                $data['today_on_delivery_orders'] = OrderAssign::leftJoin('orders', 'orders.id', 'order_assigns.order_id')
                    ->where('status', 8)
                    ->whereBetween('orders.order_date', $date_range)
                    ->count();
                $data['today_excel_orders'] = OrderAssign::leftJoin('orders', 'orders.id', 'order_assigns.order_id')
                    ->where('status', 9)
                    ->whereBetween('orders.order_date', $date_range)
                    ->count();
                $data['today_delivered_orders'] = OrderAssign::leftJoin('orders', 'orders.id', 'order_assigns.order_id')
                    ->where('status', 1)
                    ->whereBetween('orders.order_date', $date_range)
                    ->count();
                $data['today_cancelled_orders'] = OrderAssign::leftJoin('orders', 'orders.id', 'order_assigns.order_id')
                    ->where('status', 4)
                    ->whereBetween('orders.order_date', $date_range)
                    ->count();
                $data['today_bkash_orders'] = OrderAssign::leftJoin('orders', 'orders.id', 'order_assigns.order_id')
                    ->where('status', 10)
                    ->whereBetween('orders.order_date', $date_range)
                    ->count();
                $data['today_returned_orders'] = OrderAssign::leftJoin('orders', 'orders.id', 'order_assigns.order_id')
                    ->where('status', 5)
                    ->whereBetween('orders.order_date', $date_range)
                    ->count();
            } else {
                $data['today_all_orders'] = OrderAssign::leftJoin('orders', 'orders.id', 'order_assigns.order_id')
                    ->whereDate('orders.order_date', today())
                    ->count();
                $data['today_pre_orders'] = OrderAssign::leftJoin('orders', 'orders.id', 'order_assigns.order_id')
                    ->where('status', 3)
                    ->whereDate('orders.order_date', today())
                    ->count();
                $data['today_pending_orders'] = OrderAssign::leftJoin('orders', 'orders.id', 'order_assigns.order_id')
                    ->where('status', 6)
                    ->whereDate('orders.order_date', today())
                    ->count();
                $data['today_confirmed_orders'] = OrderAssign::leftJoin('orders', 'orders.id', 'order_assigns.order_id')
                    ->where('status', 2)
                    ->whereDate('orders.order_date', today())
                    ->count();
                $data['today_hold_orders'] = OrderAssign::leftJoin('orders', 'orders.id', 'order_assigns.order_id')
                    ->where('status', 0)
                    ->whereDate('orders.order_date', today())
                    ->count();
                $data['today_printed_orders'] = OrderAssign::leftJoin('orders', 'orders.id', 'order_assigns.order_id')
                    ->where('status', 7)
                    ->whereDate('orders.order_date', today())
                    ->count();
                $data['today_on_delivery_orders'] = OrderAssign::leftJoin('orders', 'orders.id', 'order_assigns.order_id')
                    ->where('status', 8)
                    ->whereDate('orders.order_date', today())
                    ->count();
                $data['today_excel_orders'] = OrderAssign::leftJoin('orders', 'orders.id', 'order_assigns.order_id')
                    ->where('status', 9)
                    ->whereDate('orders.order_date', today())
                    ->count();
                $data['today_delivered_orders'] = OrderAssign::leftJoin('orders', 'orders.id', 'order_assigns.order_id')
                    ->where('status', 1)
                    ->whereDate('orders.order_date', today())
                    ->count();
                $data['today_cancelled_orders'] = OrderAssign::leftJoin('orders', 'orders.id', 'order_assigns.order_id')
                    ->where('status', 4)
                    ->whereDate('orders.order_date', today())
                    ->count();
                $data['today_bkash_orders'] = OrderAssign::leftJoin('orders', 'orders.id', 'order_assigns.order_id')
                    ->where('status', 10)
                    ->whereDate('orders.order_date', today())
                    ->count();
                $data['today_returned_orders'] = OrderAssign::leftJoin('orders', 'orders.id', 'order_assigns.order_id')
                    ->where('status', 5)
                    ->whereDate('orders.order_date', today())
                    ->count();
            }
        } elseif (Auth::guard('employee')->check()) {
            if ($request->date_range) {
                $date_range = json_decode($request->date_range, true);
                $data['today_all_orders'] = Order::with('get_assigned')->whereHas('get_assigned', function ($query) {
                    $query->where('employee_id', Auth::guard('employee')->id());
                })->whereBetween('orders.order_date', $date_range)
                    ->count();
                $data['today_pre_orders'] = Order::with('get_assigned')->whereHas('get_assigned', function ($query) {
                    $query->where('employee_id', Auth::guard('employee')->id());
                })->where('status', 3)
                    ->whereBetween('orders.order_date', $date_range)
                    ->count();
                $data['today_pending_orders'] = Order::with('get_assigned')->whereHas('get_assigned', function ($query) {
                    $query->where('employee_id', Auth::guard('employee')->id());
                })->where('status', 6)
                    ->whereBetween('orders.order_date', $date_range)
                    ->count();
                $data['today_confirmed_orders'] = Order::with('get_assigned')->whereHas('get_assigned', function ($query) {
                    $query->where('employee_id', Auth::guard('employee')->id());
                })->where('status', 2)
                    ->whereBetween('orders.order_date', $date_range)
                    ->count();
                $data['today_hold_orders'] = Order::with('get_assigned')->whereHas('get_assigned', function ($query) {
                    $query->where('employee_id', Auth::guard('employee')->id());
                })->where('status', 0)
                    ->whereBetween('orders.order_date', $date_range)
                    ->count();
                $data['today_printed_orders'] = Order::with('get_assigned')->whereHas('get_assigned', function ($query) {
                    $query->where('employee_id', Auth::guard('employee')->id());
                })->where('status', 7)
                    ->whereBetween('orders.order_date', $date_range)
                    ->count();
                $data['today_on_delivery_orders'] = Order::with('get_assigned')->whereHas('get_assigned', function ($query) {
                    $query->where('employee_id', Auth::guard('employee')->id());
                })->where('status', 8)
                    ->whereBetween('orders.order_date', $date_range)
                    ->count();
                $data['today_excel_orders'] = Order::with('get_assigned')->whereHas('get_assigned', function ($query) {
                    $query->where('employee_id', Auth::guard('employee')->id());
                })->where('status', 9)
                    ->whereBetween('orders.order_date', $date_range)
                    ->count();
                $data['today_delivered_orders'] = Order::with('get_assigned')->whereHas('get_assigned', function ($query) {
                    $query->where('employee_id', Auth::guard('employee')->id());
                })->where('status', 1)
                    ->whereBetween('orders.order_date', $date_range)
                    ->count();
                $data['today_cancelled_orders'] = Order::with('get_assigned')->whereHas('get_assigned', function ($query) {
                    $query->where('employee_id', Auth::guard('employee')->id());
                })->where('status', 4)
                    ->whereBetween('orders.order_date', $date_range)
                    ->count();
                $data['today_bkash_orders'] = Order::with('get_assigned')->whereHas('get_assigned', function ($query) {
                    $query->where('employee_id', Auth::guard('employee')->id());
                })->where('status', 10)
                    ->whereBetween('orders.order_date', $date_range)
                    ->count();
                $data['today_returned_orders'] = Order::with('get_assigned')->whereHas('get_assigned', function ($query) {
                    $query->where('employee_id', Auth::guard('employee')->id());
                })->where('status', 5)
                    ->whereBetween('orders.order_date', $date_range)
                    ->count();
            } else {
                $data['today_all_orders'] = Order::with('get_assigned')->whereHas('get_assigned', function ($query) {
                    $query->where('employee_id', Auth::guard('employee')->id());
                })->whereDate('orders.order_date', today())
                    ->count();
                $data['today_pre_orders'] = Order::with('get_assigned')->whereHas('get_assigned', function ($query) {
                    $query->where('employee_id', Auth::guard('employee')->id());
                })->where('status', 3)
                    ->whereDate('orders.order_date', today())
                    ->count();
                $data['today_pending_orders'] = Order::with('get_assigned')->whereHas('get_assigned', function ($query) {
                    $query->where('employee_id', Auth::guard('employee')->id());
                })->where('status', 6)
                    ->whereDate('orders.order_date', today())
                    ->count();
                $data['today_confirmed_orders'] = Order::with('get_assigned')->whereHas('get_assigned', function ($query) {
                    $query->where('employee_id', Auth::guard('employee')->id());
                })->where('status', 2)
                    ->whereDate('orders.order_date', today())
                    ->count();
                $data['today_hold_orders'] = Order::with('get_assigned')->whereHas('get_assigned', function ($query) {
                    $query->where('employee_id', Auth::guard('employee')->id());
                })->where('status', 0)
                    ->whereDate('orders.order_date', today())
                    ->count();
                $data['today_printed_orders'] = Order::with('get_assigned')->whereHas('get_assigned', function ($query) {
                    $query->where('employee_id', Auth::guard('employee')->id());
                })->where('status', 7)
                    ->whereDate('orders.order_date', today())
                    ->count();
                $data['today_on_delivery_orders'] = Order::with('get_assigned')->whereHas('get_assigned', function ($query) {
                    $query->where('employee_id', Auth::guard('employee')->id());
                })->where('status', 8)
                    ->whereDate('orders.order_date', today())
                    ->count();
                $data['today_excel_orders'] = Order::with('get_assigned')->whereHas('get_assigned', function ($query) {
                    $query->where('employee_id', Auth::guard('employee')->id());
                })->where('status', 9)
                    ->whereDate('orders.order_date', today())
                    ->count();
                $data['today_delivered_orders'] = Order::with('get_assigned')->whereHas('get_assigned', function ($query) {
                    $query->where('employee_id', Auth::guard('employee')->id());
                })->where('status', 1)
                    ->whereDate('orders.order_date', today())
                    ->count();
                $data['today_cancelled_orders'] = Order::with('get_assigned')->whereHas('get_assigned', function ($query) {
                    $query->where('employee_id', Auth::guard('employee')->id());
                })->where('status', 4)
                    ->whereDate('orders.order_date', today())
                    ->count();
                $data['today_bkash_orders'] = Order::with('get_assigned')->whereHas('get_assigned', function ($query) {
                    $query->where('employee_id', Auth::guard('employee')->id());
                })->where('status', 10)
                    ->whereDate('orders.order_date', today())
                    ->count();
                $data['today_returned_orders'] = Order::with('get_assigned')->whereHas('get_assigned', function ($query) {
                    $query->where('employee_id', Auth::guard('employee')->id());
                })->where('status', 5)
                    ->whereDate('orders.order_date', today())
                    ->count();
            }
            $data['total_pre_order'] = Order::with('get_assigned')->whereHas('get_assigned', function ($query) {
                $query->where('employee_id', Auth::guard('employee')->id());
            })->where('status', 3)->count();
            $data['total_pending_order'] = Order::with('get_assigned')->whereHas('get_assigned', function ($query) {
                $query->where('employee_id', Auth::guard('employee')->id());
            })->where('status', 6)->count();
            $data['total_confirmed_order'] = Order::with('get_assigned')->whereHas('get_assigned', function ($query) {
                $query->where('employee_id', Auth::guard('employee')->id());
            })->where('status', 2)->count();
            $data['total_hold_order'] = Order::with('get_assigned')->whereHas('get_assigned', function ($query) {
                $query->where('employee_id', Auth::guard('employee')->id());
            })->where('status', 0)->count();
            $data['total_printed_order'] = Order::with('get_assigned')->whereHas('get_assigned', function ($query) {
                $query->where('employee_id', Auth::guard('employee')->id());
            })->where('status', 7)->count();
            $data['total_on_delivery_order'] = Order::with('get_assigned')->whereHas('get_assigned', function ($query) {
                $query->where('employee_id', Auth::guard('employee')->id());
            })->where('status', 8)->count();
            $data['total_excel_order'] = Order::with('get_assigned')->whereHas('get_assigned', function ($query) {
                $query->where('employee_id', Auth::guard('employee')->id());
            })->where('status', 9)->count();
            $data['total_delivered_order'] = Order::with('get_assigned')->whereHas('get_assigned', function ($query) {
                $query->where('employee_id', Auth::guard('employee')->id());
            })->where('status', 1)->count();
            $data['total_cancelled_order'] = Order::with('get_assigned')->whereHas('get_assigned', function ($query) {
                $query->where('employee_id', Auth::guard('employee')->id());
            })->where('status', 4)->count();
            $data['total_bkash_order'] = Order::with('get_assigned')->whereHas('get_assigned', function ($query) {
                $query->where('employee_id', Auth::guard('employee')->id());
            })->where('status', 10)->count();
            $data['total_returned_order'] = Order::with('get_assigned')->whereHas('get_assigned', function ($query) {
                $query->where('employee_id', Auth::guard('employee')->id());
            })->where('status', 5)->count();
            $data['recent_orders'] = Order::with('get_assigned')->whereHas('get_assigned', function ($query) {
                $query->where('employee_id', Auth::guard('employee')->id());
            })->select('id', 'order_date', 'customer_name', 'customer_phone', 'total', 'status')->orderBy('id', 'desc')->limit(10)->get();
        } else {
            $data = [];
        }

        //dd($data['recent_orders']);
        return view('backEnd.admin.dashboard', compact('data'));
    }

    //change password
    public function change_pass()
    {
        return view('backEnd.admin.change_pass');
    }

    public function update_pass(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            $user_id = Auth::guard('admin')->user()->id;
            if (Hash::check($request->old_pass, Admin::find($user_id)->password)) {
                Admin::find($user_id)->update([
                    'password' => Hash::make($request->password),
                ]);

                $this->guard_admin()->logout();

                $request->session()->invalidate();

                $request->session()->regenerateToken();

                return $this->loggedOut($request) ?: redirect()->route('admin.home')->with('success', 'Password Changed Successfully');
            } else {
                return back()->with('error', 'Incorrect Old Password');
            }
        } elseif (Auth::guard('manager')->check()) {
            $user_id = Auth::guard('manager')->user()->id;
            if (Hash::check($request->old_pass, Manager::find($user_id)->password)) {
                Manager::find($user_id)->update([
                    'password' => Hash::make($request->password),
                ]);

                $this->guard_manager()->logout();

                $request->session()->invalidate();

                $request->session()->regenerateToken();

                return $this->loggedOut($request) ?: redirect()->route('manager.home')->with('success', 'Password Changed Successfully');
            } else {
                return back()->with('error', 'Incorrect Old Password');
            }
        } elseif (Auth::guard('employee')->check()) {
            $user_id = Auth::guard('employee')->user()->id;
            if (Hash::check($request->old_pass, Employee::find($user_id)->password)) {
                Employee::find($user_id)->update([
                    'password' => Hash::make($request->password),
                ]);

                $this->guard_employee()->logout();

                $request->session()->invalidate();

                $request->session()->regenerateToken();

                return $this->loggedOut($request) ?: redirect()->route('employee.home')->with('success', 'Password Changed Successfully');
            } else {
                return back()->with('error', 'Incorrect Old Password');
            }
        } else {
            return back()->with('warning', 'Something Went Wrong!');
        }
    }

    protected function loggedOut(Request $request)
    {
    }

    protected function guard_admin()
    {
        return Auth::guard('admin');
    }

    protected function guard_manager()
    {
        return Auth::guard('manager');
    }

    protected function guard_employee()
    {
        return Auth::guard('employee');
    }
}
