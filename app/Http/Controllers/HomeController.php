<?php

namespace App\Http\Controllers;

use App\AbandonedCart;
use App\BanglaToEnglishConverter;
use App\LandingPage;
use App\User;
use App\Order;
use App\Slider;
use App\Product;
use App\Category;
use App\Employee;
use App\Attribute;
use App\WebSettings;
use Carbon\Carbon;
use App\OrderAssign;
use App\OrderProduct;
use App\AttributeItem;
use App\ShippingMethod;
use App\ProductAttribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function __construct()
    {
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::where('status', 1)->get();
        $category_products = Category::with('get_products')->where([['status', 1], ['is_homepage', 1]])->orderBy('id', 'desc')->get();
        $hot_deal_1 = Product::with('get_thumb')->where([['sale_price', '>', 0], ['status', 1]])->orderBy('position', 'desc')->take(12)->get();
        $hot_deal_2 = Product::with('get_thumb')->where([['sale_price', '>', 0], ['status', 1]])->orderBy('position', 'desc')->skip(12)->take(12)->get();
        $featured_products = Product::with('get_image')->where([['status', 1], ['is_featured', 1]])->orderBy('position', 'desc')->take(12)->get();
        $best_sell_products = Product::with('get_image')->where([['status', 1], ['is_best_sell', 1]])->orderBy('position', 'desc')->take(12)->get();
        $new_products = Product::with('get_image')->where([['status', 1], ['is_new_product', 1]])->orderBy('position', 'desc')->take(12)->get();
        $sliders = Slider::with('get_img')->where('status', 1)->get();
        //dd($products->get_media);
        //dd($hot_deal_1);
        return view('frontEnd.index', compact('category_products', 'hot_deal_1', 'hot_deal_2', 'categories', 'sliders', 'featured_products', 'best_sell_products', 'new_products'));
    }

    public function aboutUs()
    {
        $data = DB::table('page_settings')->where('id', 1)->first();
        return view('frontEnd.pages.about_us', compact('data'));
    }

    public function returnPolicy()
    {
        $data = DB::table('page_settings')->where('id', 1)->first();
        return view('frontEnd.pages.return_policy', compact('data'));
    }

    public function deliveryPolicy()
    {
        $data = DB::table('page_settings')->where('id', 1)->first();
        return view('frontEnd.pages.delivery_policy', compact('data'));
    }

    public function getSingleCategory($id)
    {
        /*$data = Product::with('get_thumb')->where('category_id', $id)->paginate(42);
        $cat_name = Category::find($id)->category_name;*/
        $category = Category::with('get_products')->find($id);
        $data = $category->get_products()->with('get_thumb')->paginate(42);
        $cat_name = $category->category_name;
        return view('frontEnd.single_category', compact('data', 'cat_name'));
    }

    public function getSingleProduct($slug, $id)
    {
        $data = Product::with('get_image', 'get_category')->where('id', $id)->first();
        $feature_prod = Product::with('get_thumb')->where('status', 1)->orderBy('id', 'desc')->take(3)->get();

        $category = Category::with('get_products')->find($data->get_category->id ?? null);
        if ($category) {
            $related_prod = $category->get_products()->with('get_thumb')->inRandomOrder()->take(6)->get();
        } else {
            $related_prod = [];
        }

        $shipping_methods = DB::table('shipping_methods')->where('status', 1)->get();
        $qty = \Cart::get($id)->quantity ?? 1;

        // //for conversion api
        // $order_prod[] = [
        //     'item_id' => $data->sku,
        //     'item_name' => $data->name,
        //     'price' => $data->sale_price ? number_format($data->sale_price, 2, '.', '') : number_format($data->price, 2, '.', ''),
        //     'quantity' => $qty,
        // ];

        // $api_data = [
        //     'value' => $data->sale_price ? number_format($data->sale_price, 2, '.', '') : number_format($data->price, 2, '.', ''),
        //     'products' => json_encode($order_prod),
        // ];

        // session()->put('api_view_item_data', $api_data);
        // //dd($qty);

        // dd($data);
        return view('frontEnd.single_product', compact('data', 'related_prod', 'feature_prod', 'shipping_methods', 'qty'));
    }

    public function allHotDeals()
    {
        $data = Product::with('get_thumb')->where([['sale_price', '>', 0], ['status', 1]])->paginate(42);
        return view('frontEnd.all_hot_deals', compact('data'));
    }

    public function addCart(Request $request, $id)
    {
        // dd($request->all());

        $product = Product::with('get_variants.get_variant_options', 'get_category')->find($request->id);
        if (!$product) {
            return back()->with('error', 'Product not found.');
        }
        $quantity = $request->qty ?? 1;
        $attr = null;
        $sku = null;
        $price = 0;
        $variant = null;
        // Case 1: Product has variant, request has choice_attributes
        if ($product->has_variant == 1) {
            if (empty($request->choice_attributes)) {
                return back()->with('error', 'Please select product attributes before adding to cart.');
            }

            $attributesArray = explode(',', $request->choice_attributes);
            // dd($attributesArray);

            // normalize request attributes
            $normalizedRequestAttrs = array_map(function ($attr) {
                return strtolower(trim($attr));
            }, $attributesArray);

            // dd($normalizedRequestAttrs);

            // find variant by comparing option names
            $variant = $product->get_variants->first(function ($v) use ($normalizedRequestAttrs) {
                $variantOptions = $v->get_variant_options->pluck('choice_attribute_item_name')->map(function ($name) {
                    return strtolower($name);
                })->toArray();

                // match if arrays are same (order independent)
                return count(array_diff($normalizedRequestAttrs, $variantOptions)) === 0 &&
                    count(array_diff($variantOptions, $normalizedRequestAttrs)) === 0;
            });

            if (!$variant) {
                return back()->with('error', 'Selected variant is not available.');
            }

            // matched variant
            $sku   = $variant->sku;
            $price = $variant->price;
            $attr  = implode(',', $attributesArray);
        } else {
            $price = $product->sale_price > 0 ? $product->sale_price : $product->price;
            $sku   = $product->sku;
            $attr  = null;

            if ($product->stock < 1) {
                return back()->with('error', 'Product is not available.');
            }
        }

        // Add or Update Cart
        if (\Cart::get($sku)) {
            \Cart::update($sku, [
                'quantity' => [
                    'relative' => false,
                    'value' => $quantity
                ],
                'attributes' => $attr, // previous style
            ]);
        } else {
            \Cart::add([
                'id' => $sku,
                'name' => $product->name,
                'price' => $price,
                'quantity' => $quantity,
                'attributes' => $attr, // previous style
                'associatedModel' => $product
            ]);
        }

            $carts = \Cart::getContent();

            $order_prod = [];
            $totalValue = 0;

            foreach ($carts as $cart) {

                $product = $cart->associatedModel; // যদি product model attach করা থাকে

                $order_prod[] = [
                    'item_id' => (string)$cart->id,
                    'item_name' => $cart->name,
                    'price' => (float)$cart->price,
                    'item_category' => $product && $product->get_category
                                        ? $product->get_category->category_name
                                        : '',
                    'quantity' => (int)$cart->quantity
                ];

                $totalValue += $cart->price * $cart->quantity;
            }

            $api_data = [
                'value' => $totalValue,
                'products' => json_encode($order_prod)
            ];

            session()->put('api_add_to_cart', $api_data);



        if ($request->order_now) {
            return redirect()->route('checkout')->with('success', 'Product Added Into Cart Successfully');
        } elseif ($request->add_cart) {
            return back()->with('success', 'Product Added Into Cart Successfully');
        } else {
            return back()->with('error', 'Something Went Wrong!');
        }
    }

    public function cartItemDelete($id)
    {
        \Cart::remove($id);
        return back()->with('success', 'Cart Item Deleted Successfully');
    }

    public function cartItemPlus($id)
    {
        if (\Cart::getContent()->count() > 0) {
            \Cart::update($id, array(
                'quantity' => 1,
            ));
            return back();
        } else {
            return back();
        }
    }

    public function cartItemMinus($id)
    {
        if (\Cart::getContent()->count() > 0) {
            \Cart::update($id, array(
                'quantity' => -1,
            ));
            return back();
        } else {
            return back();
        }
    }

    public function cartClear()
    {
        \Cart::clear();
        return back();
    }

    public function getShippMeth(Request $request)
    {
        $cart = \Cart::getContent();
        foreach ($cart as $item) {
        }

        if ($item->associatedModel->is_free_delivery == 1) {
            $amount = 0;
        } else {
            $amount = ShippingMethod::find($request->id)->amount;
        }
        return response()->json($amount);
    }

    public function checkout()
    {
        //dd(\Cart::getContent());
        $shipping_methods = ShippingMethod::where('status', 1)->get();

        $gtm_items = [];
        foreach (\Cart::getContent() as $item) {
            $cat_obj = $item->associatedModel->get_category;
            $cat = $cat_obj ? $cat_obj->category_name : '';
            $gtm_items[] = [
                "item_id"       => (string) $item->associatedModel->id,
                "item_name"     => $item->name,
                "item_category" => $cat,
                "price"         => (float) $item->price,
                "quantity"      => (int) $item->quantity
            ];
        }

        return view('frontEnd.checkout', compact('shipping_methods', 'gtm_items'));
    }

    public function placeOrder(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'customer_phone' => ['required', 'digits:11', 'regex:/^01[3-9][0-9]{8}$/'],
        ], [
            'customer_phone.required' => 'অনুগ্রহ করে আপনার মোবাইল নাম্বারটি দিন',
            'customer_phone.digits' => 'নাম্বারটি অবশ্যই ১১ সংখ্যার হতে হবে',
            'customer_phone.regex' => 'নাম্বারটি সঠিক নয়',
        ]);

        $carts = \Cart::getContent();
        //dd($carts);
        if ($carts->count() > 0) {
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

            //create order
            $order_input = array_merge($request->all(), [
                'invoice_id' => $invoice_id,
                'order_date' => Carbon::now()->toDateString(),
                'customer_id' => $customer_id->id,
                'sub_total' => \Cart::getSubTotal(),
                'total' => (\Cart::getTotal() + $request->shipping_cost),
                'status' => 6,
                'source' => 'direct',
            ]);
            $order_id = Order::create($order_input);

            foreach ($carts as $item) {
                $attributes = [];

                if ($item->attributes->count() > 0) {
                    $attribute_id = ProductAttribute::with('get_variant_options')
                        ->where('product_id', $item->associatedModel->id)
                        ->where('sku', $item->id)
                        ->first();

                    if ($attribute_id) {
                        foreach ($attribute_id->get_variant_options as $value) {
                            $attributes[] = $value->choice_attribute_item_name;
                        }
                    }
                }

                OrderProduct::create([
                    'order_id'    => $order_id->id,
                    'product_id'  => $item->associatedModel->id,
                    'qty'         => $item->quantity,
                    'price'       => $item->price,
                    'product_sku' => strtolower($item->id),
                    'attributes'  => count($attributes) > 0 ? $attributes : null,
                ]);
            }


            //assign employee
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

            //abandoned cart delete
            if (session()->has('abandoned_cart_id')) {
                //update abandoned cart
                $abandoned = AbandonedCart::where('id', session()->get('abandoned_cart_id'))->first();
                $abandoned->delete();
                session()->forget('abandoned_cart_id');
            }

            //total price of order
            session()->forget('order_total_amount');
            session()->put('order_total_amount', $order_id->total);

            //otp part
            $sms_settings = DB::table('web_settings')->select('sender_id', 'api_key', 'otp_message', 'is_otp')->latest()->first();
            //dd($sms_settings);
            if ($sms_settings->is_otp == 1) { //if otp system enabled then send otp and verify and then show success order
                $otp = rand(1000, 9999);
                $mgs_body = strtr($sms_settings->otp_message, [
                    '{$otp}' => $otp ?? null
                ]);

                $order_id->update([
                    'otp_code' => $otp
                ]);
                //dd($mgs_body);

                $url = "https://sms.mram.com.bd/smsapi";
                $data = [
                    "api_key" => $sms_settings->api_key,
                    "type" => "text",
                    "contacts" => "88" . $order_id->customer_phone,
                    "senderid" => $sms_settings->sender_id,
                    "msg" => $mgs_body,
                ];
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                $response = curl_exec($ch);
                curl_close($ch);
                //dd($response);

                session()->put('order_id_for_otp', $order_id->id);

                return redirect()->route('send.otp');
            } else { //else show success message
                \Cart::clear();
                session()->put('thankyou_order_id', $order_id->id);
                return redirect()->route('confirm.order')->with('success', 'Order Placed Successfully');
            }
            //clear the cart

        } else {
            return redirect()->route('home')->with('error', 'Please Select Products');
        }
    }

    public function sendOTP(Request $request)
    {
        $order = Order::find(session()->get('order_id_for_otp'));
        return view('frontEnd.otp_verify', compact('order'));
    }

    public function otpVerify(Request $request)
    {
        $order = Order::select('otp_code', 'id')->find($request->order_id);
        //dd($order);
        if ($order->otp_code == $request->otp) {
            session()->forget('order_id_for_otp');
            $order->update([
                'otp_code' => null,
                'is_otp_verified' => 1
            ]);
            \Cart::clear();
            session()->put('thankyou_order_id', $order->id);
            return redirect()->route('confirm.order')->with('success', 'Order Placed Successfully');
        } else {
            return back()->with('wrong_otp', 'Incorrect OTP');
        }
    }

    public function confirmOrder()
    {
        $order_id = session('thankyou_order_id');
        $purchase_data = null;
        $gtm_items = [];

        if ($order_id) {
            $order = \App\Order::with('get_products.get_product.get_category')->find($order_id);

            if ($order) {
                foreach ($order->get_products as $item) {
                    $product = $item->get_product;
                    $cat = ($product && $product->get_category) ? $product->get_category->category_name : '';

                    $gtm_items[] = [
                        "item_id"       => (string) $item->product_id,
                        "item_name"     => $product ? $product->name : 'Unknown Product',
                        "item_category" => $cat,
                        "price"         => (float) $item->price,
                        "quantity"      => (int) $item->qty
                    ];
                }

                $first_name = $order->customer_name ?? '';
                $phone      = preg_replace('/\D/', '', $order->customer_phone ?? '');
                $email      = $order->customer_email ?? '';
                $address_1  = $order->customer_address ?? '';
                $city       = $address_1;

                $external_id = $first_name && $phone ? hash('sha256', strtolower(trim($first_name . $phone))) : '';

                $purchase_data = [
                    'order_id' => $order->id,
                    'external_id' => $external_id,
                    'affiliation' => 'Juta Bajar',
                    'value' => (float) $order->total,
                    'tax' => 0,
                    'shipping' => (float) $order->shipping_cost,
                    'currency' => 'BDT',
                    'first_name' => $first_name,
                    'last_name' => $first_name,
                    'phone' => $phone,
                    'address_1' => $address_1,
                    'city' => $city,
                    'email' => $email,
                ];

                // Clear the session so it doesn't track twice on refresh
                session()->forget('thankyou_order_id');
            }
        }

        return view('frontEnd.order_confirmed', compact('purchase_data', 'gtm_items'));
    }

    public function search(Request $request)
    {
        //dd($request->all());
        if ($request->input('category')) {
            $query = $request->input('query');
            $data = DB::table('category_products')
                ->select('products.name', 'products.id as product_id', 'products.thumb', 'products.slug', 'products.price', 'products.sale_price', 'media.file_url', 'products.has_variant')
                ->leftJoin('products', 'products.id', 'category_products.product_id')
                ->leftJoin('media', 'media.id', 'products.image')
                ->where([['category_products.category_id', $request->input('category')], ['products.status', 1]])
                ->where('products.name', 'LIKE', "%{$query}%")
                ->paginate(35);
        } else {
            $query = $request->input('query');
            $data = Product::with('get_thumb', 'get_image')->where('name', 'LIKE', "%{$query}%")
                ->where('status', 1)
                ->paginate(35);
        }

        //dd($data);
        return view('frontEnd.searched_products', compact('data', 'query'));
    }

    public function ajaxGetVariant(Request $request)
    {
        $quantity = $request->quantity ?? 1;
        $choice_attributes = $request->choice_attributes ?? [];
        $displayVariant = '';

        $normalizedAttributes = collect($choice_attributes)
            ->map(function ($attr) {
                return strtolower(str_replace(' ', '_', trim($attr)));
            })
            ->toArray();
        $displayVariant = implode('-', $choice_attributes);
        $requestedVariant = implode('-', $normalizedAttributes);
        $product = Product::with('get_variants.get_variant_options')->find($request->id);
        $product_attributes = null;
        if ($product && $product->get_variants) {
            foreach ($product->get_variants as $variant) {
                $variantOptionsKey = collect($variant->get_variant_options)
                    ->pluck('choice_attribute_item_name')
                    ->map(function ($opt) {
                        return strtolower(str_replace(' ', '_', trim($opt)));
                    })
                    ->implode('-');

                if ($variantOptionsKey === $requestedVariant) {
                    $product_attributes = $variant;
                    break;
                }
            }
        }

        if ($product_attributes) {
            $price = $product_attributes->price;
            $sku   = $product_attributes->sku;
        } else {
            $price = $product->sale_price > 0 ? $product->sale_price : $product->price;
            $sku   = $product->sku;
        }
        return [
            'choice_attributes' => $normalizedAttributes,
            'subtotal'          => $price * $quantity,
            'price'             => "৳ " . \App\BanglaToEnglishConverter::en2bn($price),
            'sku'               => $sku,
            'item_name'         => $normalizedAttributes
        ];
    }

    public function orderAjaxGetVariant(Request $request)
    {
        // dd($request->all());
        //$product = Product::find($request->id);
        $variant = '';
        $v = '';
        /*$price = '';
        $sku = '';*/
        $quantity = $request->quantity;
        if ($request->choice_attributes) {
            foreach ($request->choice_attributes as $choice_attribute) {
                $v .= '-' . str_replace(' ', '_', $choice_attribute);
                $variant .= '-' . $choice_attribute;
            }
            $v = substr($v, 1);
            $variant = substr($variant, 1);
            // dd($variant,$v);
            $product_attributes = ProductAttribute::where([['product_id', $request->id], ['variant', strtolower($v)]])->first();
            $price = $product_attributes->price;
            //$sku = $product_attributes->sku;
        } else {
            $product = Product::find($request->id);
            if ($product->sale_price > 0) {
                $price = $product->sale_price;
            } else {
                $price = $product->price;
            }
            //$sku = $product->sku;
        }

        return [
            'choice_attributes' => $variant,
            'subtotal' => $price * $quantity,
            'price' => $price,
            //'sku' => $sku,
        ];
        //dd($product_attributes);
    }

    /*public function landingPageAbandonedCart(Request $request)
    {
        $carts = Product::whereIn('id', explode(',', $request->ids))->get();
        //dd($carts);
        $abandoned_item = [];
        foreach ($carts as $key => $item) {
            $attributes = [];
            if (count($item->attributes) > 0) {
                $variants = $item->associatedModel->get_attributes()->where('sku', $item->id)->first();
                if ($variants) {
                    foreach (explode('-', $variants->variant) as $variant) {
                        $attribute_item = AttributeItem::with('get_attribute')->where('item_title', str_replace('_', ' ', $variant))->first();
                        $attributes[$attribute_item->get_attribute->title] = $attribute_item->item_title;
                    }
                }
            }

            $abandoned_item[$item->associatedModel->id] = [
                'product_id' => $item->associatedModel->id,
                'qty' => $item->quantity,
                'price' => $item->price,
                'attributes' => count($attributes) > 0 ? json_encode($attributes) : null,
            ];
        }
        $abandoned_item = json_encode($abandoned_item);
        $input = [
            'customer_name' => $request->data['name'],
            'customer_phone' => $request->data['phone'],
            'customer_address' => $request->data['address'],
            'shipping_cost' => $request->data['shipping_cost'],
            'total' => \Cart::getTotal() + $request->data['shipping_cost'],
            'subtotal' => \Cart::getSubTotal(),
            'abandoned_item' => $abandoned_item,
        ];
        // dd(session()->get('abandoned_cart_id'));
        if (session()->has('abandoned_cart_id')) {
            $abandoned = AbandonedCart::where('id', session()->get('abandoned_cart_id'))->first();
            if ($abandoned) {
                $abandoned->update($input);
            } else {
                $id = AbandonedCart::create($input);
                session()->put('abandoned_cart_id', $id->id);
            }
        } else {
            $id = AbandonedCart::create($input);
            session()->put('abandoned_cart_id', $id->id);
        }
    }*/

    public function abandonedCart(Request $request)
    {
        // dd($request->all());

        $carts = \Cart::getContent();
        //dd($carts);
        $abandoned_item = [];
        foreach ($carts as $key => $item) {
            $attributes = [];
            if (count($item->attributes) > 0) {
                $variants = $item->associatedModel->get_attributes()->where('sku', $item->id)->first();
                if ($variants) {
                    foreach (explode('-', $variants->variant) as $variant) {
                        $attribute_item = AttributeItem::with('get_attribute')->where('item_title', str_replace('_', ' ', $variant))->first();
                        $attributes[$attribute_item->get_attribute->title] = $attribute_item->item_title;
                    }
                }
            }

            $abandoned_item[$item->associatedModel->id] = [
                'product_id' => $item->associatedModel->id,
                'qty' => $item->quantity,
                'price' => $item->price,
                'attributes' => count($attributes) > 0 ? json_encode($attributes) : null,
            ];
        }
        $abandoned_item = json_encode($abandoned_item);
        $input = [
            'customer_name' => $request->data['name'],
            'customer_phone' => $request->data['phone'],
            'customer_address' => $request->data['address'],
            'shipping_cost' => $request->data['shipping_cost'],
            'total' => \Cart::getTotal() + $request->data['shipping_cost'],
            'subtotal' => \Cart::getSubTotal(),
            'abandoned_item' => $abandoned_item,
        ];
        // dd(session()->get('abandoned_cart_id'));
        if (session()->has('abandoned_cart_id')) {
            $abandoned = AbandonedCart::where('id', session()->get('abandoned_cart_id'))->first();
            if ($abandoned) {
                $abandoned->update($input);
            } else {
                $id = AbandonedCart::create($input);
                session()->put('abandoned_cart_id', $id->id);
            }
        } else {
            $id = AbandonedCart::create($input);
            session()->put('abandoned_cart_id', $id->id);
        }
    }

    public function facebookFeed()
    {
        $products = Product::with('get_image', 'get_category')->where('status', 1)->orderBy('id', 'desc')->get();

        return response()->view('frontEnd.facebook-feed', compact('products'))
            ->header('Content-Type', 'text/xml');
    }
}
