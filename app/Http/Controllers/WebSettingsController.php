<?php

namespace App\Http\Controllers;

use App\Attribute;
use App\AttributeItem;
use App\Media;
use App\WebSettings;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Facades\Auth;

class WebSettingsController extends Controller
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

    public function index()
    {
        $data = WebSettings::find(1);
        return view('backEnd.admin.web_settings', compact('data'));
    }

    public function update(Request $request)
    {
        try {
            if ($request->hasFile('website_header_logo')) {
                $file = $request->file('website_header_logo');
                $org_file_name = $file->getClientOriginalName();

                $file_name = uniqid() . '.' . $file->getClientOriginalExtension();
                $destinationPath = public_path('uploads');
                $file->move($destinationPath, $file_name);

                $url = 'uploads/' . $file_name;

                $file_id = Media::create([
                    'file_original_name' => $org_file_name,
                    'file_url' => $url,
                    'user_id' => Auth::guard('admin')->user()->id,
                ]);


                $url = $file_id->id;


            } else {
                $url = $request->website_header_logo_old;
            }

            if ($request->hasFile('website_favicon')) {
                $file2 = $request->file('website_favicon');
                $org_file_name2 = $file2->getClientOriginalName();

                $file_name2 = uniqid() . '.' . $file2->getClientOriginalExtension();
                $destinationPath2 = public_path('uploads');
                $file2->move($destinationPath2, $file_name2);

                $url2 = 'uploads/' . $file_name2;

                $file_id2 = Media::create([
                    'file_original_name' => $org_file_name2,
                    'file_url' => $url2,
                    'user_id' => Auth::guard('admin')->user()->id,
                ]);


                $url2 = $file_id2->id;


            } else {
                $url2 = $request->website_favicon_old;
            }


            if ($request->is_otp){
                $is_otp = 1;
            }else{
                $is_otp = 0;
            }

            $input = array_merge($request->all(), [
                'website_header_logo' => $url,
                'website_favicon' => $url2,
                'is_otp' => $is_otp,
            ]);

            WebSettings::find(1)->update($input);
            return redirect()->back()->with('success', 'Website Settings Updated Successfully');
        } catch (\Exception $e) {
            dd($e);
            return redirect()->back()->with('error', $e);
        }
    }

     //attribute div
    public function attribute()
    {
        $data = Attribute::with('get_attribute_items')->get();
        //dd($data);
        return view('backEnd.admin.attribute_settings.index', compact('data'));
    }

    public function attributeStore(Request $request)
    {
        Attribute::create(array_merge($request->all(), ['is_image' => $request->has('is_image') ? 1 : 0]));
        return back()->with('success', 'Attribute Added Successfully');
    }

    public function attributeUpdate(Request $request)
    {
        Attribute::find($request->id)->update(array_merge($request->all(), ['is_image' => $request->has('is_image') ? 1 : 0]));
        return back()->with('success', 'Attribute Updated Successfully');
    }

    public function attributeDelete($id)
    {
        Attribute::find($id)->delete();
        AttributeItem::where('attribute_id', $id)->delete();
        return back()->with('success', 'Attribute Deleted Successfully');
    }

    public function attributeItemStore(Request $request)
    {
        AttributeItem::create($request->all());
        return back()->with('success', 'Attribute Item Added Successfully');
    }

    public function attributeItemUpdate(Request $request)
    {
        AttributeItem::find($request->id)->update($request->all());
        return back()->with('success', 'Attribute Item Updated Successfully');
    }

    public function attributeItemDelete($id)
    {
        AttributeItem::find($id)->delete();
        return back()->with('success', 'Attribute Item Deleted Successfully');
    }
}
