<?php

namespace App\Http\Controllers;

use Dom\Attr;
use App\Media;
use App\Product;
use App\Category;
use App\Attribute;
use App\OrderProduct;
use App\AttributeItem;
use App\ProductAttribute;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\ProductChoiceAttribute;
use App\ProductAttributeVariant;
use Illuminate\Support\Facades\DB;
use App\ProductChoiceAttributeItem;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    // public function __construct()
    // {
    //     if (php_sapi_name() === 'cli' or defined('STDIN')) {

    //     } else {
    //         if (file_exists(base_path('vendor/laravel/framework/src/Illuminate/license.dat'))) {
    //             $file = fopen(base_path() . "/vendor/laravel/framework/src/Illuminate/license.dat", 'r');
    //             $read = fgets($file);
    //             fclose($file);
    //             if ($read != str_replace('www.', '', $_SERVER['SERVER_NAME'])) {
    //                 function getIPAddress()
    //                 {
    //                     if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    //                         $ip = $_SERVER['HTTP_CLIENT_IP'];
    //                     } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    //                         $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    //                     } else {
    //                         $ip = $_SERVER['REMOTE_ADDR'];
    //                     }
    //                     return $ip;
    //                 }

    //                 $ip = getIPAddress();
    //                 if ($ip == '::1') {
    //                     $ip = gethostname();
    //                 }
    //                 $client = new \GuzzleHttp\Client();
    //                 $url = 'https://license.prodevsltd.com/activation/attempt/store';
    //                 $url2 = 'http://' . $_SERVER['SERVER_NAME'];
    //                 $form_params = [
    //                     'ip' => $ip,
    //                     'parent' => $file,
    //                     'url' => $url2,
    //                 ];
    //                 $response = $client->post($url, ['form_params' => $form_params]);
    //                 $response->getBody()->getContents();
    //                 dd('This Product Is Pirated. Please Contact with ask@prodevsltd.com or www.prodevsltd.com');
    //             }
    //         } else {
    //             function getIPAddress()
    //             {
    //                 if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    //                     $ip = $_SERVER['HTTP_CLIENT_IP'];
    //                 } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    //                     $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    //                 } else {
    //                     $ip = $_SERVER['REMOTE_ADDR'];
    //                 }
    //                 return $ip;
    //             }

    //             $parent = env('APP_NAME') . ', ' . env('APP_URL');

    //             $ip = getIPAddress();
    //             if ($ip == '::1') {
    //                 $ip = gethostname();
    //             }
    //             $client = new \GuzzleHttp\Client();
    //             $url = 'https://license.prodevsltd.com/activation/attempt/store';
    //             $url2 = 'http://' . $_SERVER['SERVER_NAME'];
    //             $form_params = [
    //                 'ip' => $ip,
    //                 'parent' => $parent,
    //                 'url' => $url2,
    //             ];
    //             $response = $client->post($url, ['form_params' => $form_params]);
    //             $response->getBody()->getContents();
    //             dd('This Product Is Pirated. Please Contact with ask@prodevsltd.com or www.prodevsltd.com');
    //         }
    //     }
    // }

    public function index(Request $request)
    {
        $query = $request->input('query');
        if ($query) {
            $data = Product::with('get_thumb', 'get_variants')->where('name', 'LIKE', "%{$query}%")
                ->orWhere('sku', 'LIKE', "%{$query}%")
                ->orWhereHas('get_variants', function ($q) use ($query) {
                    $q->where('sku', 'LIKE', "%{$query}%");
                })->orderBy('id', 'desc')->paginate(25);
        } else {
            $data = Product::with('get_thumb', 'get_variants')->orderBy('id', 'desc')->paginate(25);
        }

        $categories = Category::where('status', 1)->get();
        $attributes = Attribute::with('get_attribute_items')->where('status', 1)->get();
        // dd($data);
        return view('backEnd.admin.products.index', compact('data', 'categories', 'attributes'));
    }

    public function create()
    {
        $categories = Category::where('status', 1)->get();
        $attributes = Attribute::with('get_attribute_items')->where('status', 1)->get();
        // dd($attributes);
        //dd($data);
        return view('backEnd.admin.products.create', compact('categories', 'attributes'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'sku' => 'unique:products',
        ]);
        //feature image upload
        if ($request->hasFile('image')) {
            $file_type = $request->file('image')->getClientOriginalExtension();
            if ($file_type == 'mp4') {
                $file            = $request->file('image');
                $org_file_name   = $file->getClientOriginalName();
                $file_name       = uniqid() . '.' . $file->getClientOriginalExtension();
                $destinationPath = public_path('uploads');
                $file->move($destinationPath, $file_name);

                $url = 'uploads/' . $file_name;

                $file_id = Media::create([
                    'file_original_name' => $org_file_name,
                    'file_url'           => $url,
                    'user_id'            => Auth::guard('admin')->user()->id,
                ]);

                $url  = $file_id->id;
                $url2 = $file_id->id;
            } else {
                $uniq_id         = uniqid();
                $destinationPath = public_path('uploads');
                $file1           = $request->file('image');

                $org_file_name1 = $file1->getClientOriginalName();
                $file_name      = $uniq_id . '_800x800' . '.' . $file1->getClientOriginalExtension();
                $file_name2     = $uniq_id . '_800x800' . '.' . $file1->getClientOriginalExtension();

                $img = Image::make($file1->getRealPath());
                $img->resize(800, 800, function ( /*$constraint*/) {
                    /*$constraint->aspectRatio();*/
                })->save($destinationPath . '/' . $file_name);

                $img->resize(800, 800, function ( /*$constraint*/) {
                    /*$constraint->aspectRatio();*/
                })->save($destinationPath . '/' . $file_name2);

                $url  = 'uploads/' . $file_name;
                $url2 = 'uploads/' . $file_name2;

                $file_id = Media::create([
                    'type'               => 1,
                    'file_original_name' => $org_file_name1,
                    'file_url'           => $url,
                    'user_id'            => Auth::guard('admin')->check() ? Auth::guard('admin')->user()->id : Auth::guard('manager')->user()->id,
                ]);

                $file_id2 = Media::create([
                    'type'               => 2,
                    'file_original_name' => $org_file_name1,
                    'file_url'           => $url2,
                    'user_id'            => Auth::guard('admin')->check() ? Auth::guard('admin')->user()->id : Auth::guard('manager')->user()->id,
                ]);

                $url  = $file_id->id;
                $url2 = $file_id2->id;
            }
        } else {
            $url  = null;
            $url2 = null;
        }

        //gallery image upload
        $urls = '';
        if ($request->hasFile('gallery_image')) {
            foreach ($request->file('gallery_image') as $file) {
                $uniq_id         = uniqid();
                $destinationPath = public_path('uploads');
                //$file = $request->file('gallery_image');

                $org_file_name1 = $file->getClientOriginalName();
                $file_name      = $uniq_id . '_800x800' . '.' . $file->getClientOriginalExtension();

                $img = Image::make($file->getRealPath());
                $img->resize(800, 800, function ( /*$constraint*/) {
                    /*$constraint->aspectRatio();*/
                })->save($destinationPath . '/' . $file_name);

                $url3 = 'uploads/' . $file_name;

                $file_id = Media::create([
                    'type'               => 1,
                    'file_original_name' => $org_file_name1,
                    'file_url'           => $url3,
                    'user_id'            => Auth::guard('admin')->check() ? Auth::guard('admin')->user()->id : Auth::guard('manager')->user()->id,
                ]);

                $urls .= ',' . $file_id->id;
            }
            $urls = substr($urls, 1);
        } else {
            $urls = null;
        }

        if ($request->hasFile('size_chart')) {
            $file3          = $request->file('size_chart');
            $org_file_name3 = $file3->getClientOriginalName();

            $file_name3       = uniqid() . '.' . $file3->getClientOriginalExtension();
            $destinationPath3 = public_path('uploads');
            $file3->move($destinationPath3, $file_name3);

            $url3 = 'uploads/' . $file_name3;

            $file_id3 = Media::create([
                'file_original_name' => $org_file_name3,
                'file_url'           => $url3,
                'user_id'            => Auth::guard('admin')->user()->id,
            ]);

            $url3 = $file_id3->id;
        } else {
            $url3 = null;
        }

        /*//generate slug
        $slug = Str::slug($request->name);
        if (Product::where('slug', $slug)->first()) {
            $slug = $slug . '-1';
        }*/

        //generate slug
        $slug       = Str::slug($request->name);
        $duplicates = Product::where('name', $request->name)->get();

        if ($duplicates->count() > 0) {
            $slug = $slug . '-' . ($duplicates->count() + 1);
        }

        //insert data into product table
        $input = array_merge($request->all(), [
            'slug'              => $slug,
            'thumb'             => $url2,
            'image'             => $url,
            'gallery_images'    => $urls,
            'size_chart'        => $url3,
            'has_variant'       => $request->has('attribute') ? 1 : 0,
            'is_featured'       => $request->has('is_featured') ? 1 : 0,
            'is_best_sell'      => $request->has('is_best_sell') ? 1 : 0,
            'is_new_product'    => $request->has('is_new_product') ? 1 : 0,
        ]);
        $prod_id = Product::create($input);

        // Store choice attributes
        if ($request->has('attribute')) {
            foreach ($request->attribute as $attribute_id => $item_ids) {

                //create product choice attributes
                $choiceAttribute = ProductChoiceAttribute::create([
                    'product_id' => $prod_id->id,
                    'attribute_id' => $attribute_id,
                ]);
                //create product choice attribute items
                foreach ($item_ids as $item_id) {
                    $item = AttributeItem::where([['id', $item_id], ['attribute_id', $attribute_id]])->value('item_title');
                    if ($request->attribute_images && isset($request->attribute_images[$attribute_id][$item_id])) {
                        $image = $request->attribute_images[$attribute_id][$item_id];
                        // Handle image upload
                        $uniq_id         = uniqid();
                        $destinationPath = public_path('uploads/color-images');
                        if (!file_exists($destinationPath)) {
                            mkdir($destinationPath, 0755, true);
                        }
                        $org_file_name1 = $image->getClientOriginalName();
                        $file_name      =  $item . '_' . $uniq_id . '_800x800' . '.' . $image->getClientOriginalExtension();

                        $img = Image::make($image->getRealPath());
                        $img->resize(800, 800, function ( /*$constraint*/) {
                            /*$constraint->aspectRatio();*/
                        })->save($destinationPath . '/' . $file_name);
                        $attr_url = 'uploads/color-images/' . $file_name;
                    } else {
                        $attr_url = null; // or handle default image if needed

                    }
                    ProductChoiceAttributeItem::create([
                        'product_id' => $prod_id->id,
                        'choice_attribute_id' => $choiceAttribute->id,
                        'attribute_item_id' => $item_id,
                        'attribute_item_name' => $item ? $item : null,
                        'image' => $attr_url
                    ]);
                }
            }
        }


        //insert categories
        foreach ($request->category_id as $cat) {
            DB::table('category_products')->insert([
                'category_id' => $cat,
                'product_id'  => $prod_id->id,
            ]);
        }



        //insert attributes and its items
        if ($request->variant_name) {
            $totalStock = 0;
            foreach ($request->variant_name as $key => $variantName) {
                $variantSku   = $request->variant_sku[$key];
                $variantPrice = $request->variant_price[$key];
                $variantStock = $request->variant_stock[$key];

                // Create Product Attribute
                $productVariant = ProductAttribute::create([
                    'product_id' => $prod_id->id,
                    'variant'    => strtolower($variantName),
                    'price'      => $variantPrice,
                    'stock'      => $variantStock,
                    'sku'        => strtolower(str_replace(' ', '_', $variantName)),
                ]);

                $totalStock += $variantStock;
                // Optional: Save each choice attribute item mapping
                if ($request->combination_id && isset($request->combination_id[$key])) {
                    foreach ($request->combination_id[$key] as $attrIndex => $attrValue) {
                        ProductAttributeVariant::create([
                            'product_attribute_id'    => $productVariant->id,
                            'choice_attribute_item_name' => str_replace(' ', '_', $attrValue),
                        ]);
                    }
                }
            }

            // Update product total stock
            $prod_id->update(['stock' => $totalStock]);
        }


        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.product')->with('success', 'Product Added Successfully');
        } elseif (Auth::guard('manager')->check()) {
            return redirect()->route('manager.product')->with('success', 'Product Added Successfully');
        } else {
            return back()->with('warning', 'Something Went Wrong');
        }
    }

    public function edit($id)
    {
        $data = Product::with('get_thumb', 'get_variants', 'get_choice_attributes')->find($id);
        $categories = Category::where('status', 1)->pluck('category_name', 'id');
        $p_c        = $data->get_categories()->pluck('category_name', 'categories.id');
        $prod_cat   = '';
        foreach ($p_c as $key => $item) {
            $prod_cat .= ',' . $key;
        }
        $prod_cat = substr($prod_cat, 1);
        //dd($prod_cat);
        $attributes = Attribute::with('get_attribute_items')->where('status', 1)->get();
        return view('backEnd.admin.products.edit', compact('data', 'categories', 'prod_cat', 'attributes'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $product = Product::find($id);
        if ($request->hasFile('image')) {
            $uniq_id         = uniqid();
            $destinationPath = public_path('uploads');
            $file1           = $request->file('image');

            $org_file_name1 = $file1->getClientOriginalName();
            $file_name      = $uniq_id . '_800x800' . '.' . $file1->getClientOriginalExtension();
            $file_name2     = $uniq_id . '_800x800' . '.' . $file1->getClientOriginalExtension();

            $img = Image::make($file1->getRealPath());
            $img->resize(800, 800, function ( /*$constraint*/) {
                /*$constraint->aspectRatio();*/
            })->save($destinationPath . '/' . $file_name);

            $img->resize(800, 800, function ( /*$constraint*/) {
                /*$constraint->aspectRatio();*/
            })->save($destinationPath . '/' . $file_name2);

            $url  = 'uploads/' . $file_name;
            $url2 = 'uploads/' . $file_name2;

            $file_id = Media::create([
                'type'               => 1,
                'file_original_name' => $org_file_name1,
                'file_url'           => $url,
                'user_id'            => Auth::guard('admin')->check() ? Auth::guard('admin')->user()->id : Auth::guard('manager')->user()->id,
            ]);

            $file_id2 = Media::create([
                'type'               => 2,
                'file_original_name' => $org_file_name1,
                'file_url'           => $url2,
                'user_id'            => Auth::guard('admin')->check() ? Auth::guard('admin')->user()->id : Auth::guard('manager')->user()->id,
            ]);

            $url  = $file_id->id;
            $url2 = $file_id2->id;
        } else {
            $url  = $product->image;
            $url2 = $product->thumb;
        }

        $urls = '';
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $file) {
                $uniq_id         = uniqid();
                $destinationPath = public_path('uploads');
                //$file = $request->file('gallery_image');

                $org_file_name1 = $file->getClientOriginalName();
                $file_name      = $uniq_id . '_800x800' . '.' . $file->getClientOriginalExtension();

                $img = Image::make($file->getRealPath());
                $img->resize(800, 800, function ( /*$constraint*/) {
                    /*$constraint->aspectRatio();*/
                })->save($destinationPath . '/' . $file_name);

                $url3 = 'uploads/' . $file_name;

                $file_id = Media::create([
                    'type'               => 1,
                    'file_original_name' => $org_file_name1,
                    'file_url'           => $url3,
                    'user_id'            => Auth::guard('admin')->check() ? Auth::guard('admin')->user()->id : Auth::guard('manager')->user()->id,
                ]);

                $urls .= ',' . $file_id->id;
            }
            $urls = substr($urls, 1);
        } else {
            $urls = $product->gallery_images;
        }

        if ($request->hasFile('size_chart')) {
            $file3          = $request->file('size_chart');
            $org_file_name3 = $file3->getClientOriginalName();

            $file_name3       = uniqid() . '.' . $file3->getClientOriginalExtension();
            $destinationPath3 = public_path('uploads');
            $file3->move($destinationPath3, $file_name3);

            $url3 = 'uploads/' . $file_name3;

            $file_id3 = Media::create([
                'file_original_name' => $org_file_name3,
                'file_url'           => $url3,
                'user_id'            => Auth::guard('admin')->user()->id,
            ]);

            $url3 = $file_id3->id;
        } else {
            $url3 = $product->size_chart;
        }

        /*//generate slug
        $slug = Str::slug($request->name);
        if (Product::where('slug', $slug)->first()) {
            $slug = $slug . '-1';
        }*/
        if ($request->old_name != $request->name) {
            //generate slug
            $slug       = Str::slug($request->name);
            $duplicates = Product::where('name', $request->name)->get();

            if ($duplicates->count() > 0) {
                $slug = $slug . '-' . ($duplicates->count() + 1);
            }
        } else {
            $slug = $request->old_slug;
        }

        $input = array_merge($request->all(), [
            'slug'              => $slug,
            'thumb'             => $url2,
            'image'             => $url,
            'gallery_images'    => $urls,
            'size_chart'        => $url3,
            'has_variant'       => $request->has('attribute') ? 1 : 0,
            'is_featured'       => $request->has('is_featured') ? 1 : 0,
            'is_best_sell'      => $request->has('is_best_sell') ? 1 : 0,
            'is_new_product'    => $request->has('is_new_product') ? 1 : 0,
        ]);


        $product->update($input);

        //product choice attribute update
        $product->get_choice_attributes()->delete();
        //product choice attribute items update
        $product->get_choice_attribute_items()->delete();


        //same from store
        if ($request->has('attribute')) {
            foreach ($request->attribute as $attribute_id => $item_ids) {
                // choice attributes
                $choiceAttribute = ProductChoiceAttribute::create([
                    'product_id' => $product->id,
                    'attribute_id' => $attribute_id,
                ]);
                //choice attribute items
                foreach ($item_ids as $item_id) {
                    $item = AttributeItem::where([['id', $item_id], ['attribute_id', $attribute_id]])->value('item_title');
                    // image
                    $attr_url = null;
                    if ($request->attribute_images && isset($request->attribute_images[$attribute_id][$item_id])) {
                        $image = $request->attribute_images[$attribute_id][$item_id];
                        $uniq_id         = uniqid();
                        $destinationPath = public_path('uploads/color-images');
                        if (!file_exists($destinationPath)) {
                            mkdir($destinationPath, 0755, true);
                        }
                        $org_file_name1 = $image->getClientOriginalName();
                        $file_name      =  $item . '_' . $uniq_id . '_800x800' . '.' . $image->getClientOriginalExtension();

                        $img = Image::make($image->getRealPath());
                        $img->resize(800, 800, function () {})->save($destinationPath . '/' . $file_name);
                        $attr_url = 'uploads/color-images/' . $file_name;
                    } elseif ($request->attribute_images_old && isset($request->attribute_images_old[$attribute_id][$item_id])) {
                        // Use old image if exists
                        $attr_url = $request->attribute_images_old[$attribute_id][$item_id];
                    }

                    ProductChoiceAttributeItem::create([
                        'product_id' => $product->id,
                        'choice_attribute_id' => $choiceAttribute->id,
                        'attribute_item_id' => $item_id,
                        'attribute_item_name' => $item ? $item : null,
                        'image' => $attr_url
                    ]);
                }
            }
        }




        //update data into pivot table
        Product::find($id)->get_categories()->sync($request->category_id);

        $product->get_variants()->each(function ($variant) {
            $variant->get_variant_options()->delete();
            $variant->delete();
        });



        if ($request->variant_name) {
            $totalStock = 0;

            foreach ($request->variant_name as $key => $variantName) {
                $variantSku   = strtolower(str_replace(' ', '_', $request->variant_sku[$key]));
                $variantPrice = $request->variant_price[$key];
                $variantStock = $request->variant_stock[$key];

                // Create new ProductAttribute
                $productAttribute = ProductAttribute::create([
                    'product_id' => $product->id,
                    'variant'    => strtolower($variantName),
                    'price'      => $variantPrice,
                    'stock'      => $variantStock,
                    'sku'        => $variantSku,
                ]);

                $totalStock += $variantStock;
                // Create new options if provided
                if ($request->combination_id && isset($request->combination_id[$key])) {
                    foreach ($request->combination_id[$key] as $attrIndex => $attrValue) {
                        ProductAttributeVariant::create([
                            'product_attribute_id'    => $productAttribute->id,
                            'choice_attribute_item_name' => str_replace(' ', '_', $attrValue),
                        ]);
                    }
                }
            }

            // Update total stock
            $product->update(['stock' => $totalStock]);
        }

        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.product')->with('success', 'Product Updated Successfully');
        } elseif (Auth::guard('manager')->check()) {
            return redirect()->route('manager.product')->with('success', 'Product Updated Successfully');
        } else {
            return back()->with('warning', 'Something Went Wrong');
        }
    }

    public function delete($id)
    {
        $has_prod = OrderProduct::where('product_id', $id)->first();
        if ($has_prod) {
            return back()->with('warning', 'This Product Already In Order');
        } else {
            Product::find($id)->get_categories()->detach();
            Product::find($id)->get_choice_attributes()->delete();
            Product::find($id)->get_choice_attribute_items()->delete();
            Product::find($id)->get_variants()->delete();
            Product::find($id)->delete();
            return back()->with('success', 'Product Deleted Successfully');
        }
    }

    public function skuCheck(Request $request)
    {
        $product = Product::where('sku', $request->sku)->first();
        if ($product) {
            $status = 'found';
        } else {
            $status = 'not_found';
        }
        return response()->json($status);
    }

    public function ajaxGetCombinedAttributes(Request $request)
    {
        $arrays = $request->attribute; // attribute_id => [item_id, item_id]
        if (!$arrays) return null;
        $result = [[]];
        foreach ($arrays as $attribute_id => $item_ids) {
            $tmp = [];
            $attributeName = DB::table('attributes')->where('id', $attribute_id)->value('title');
            foreach ($result as $combination) {
                foreach ($item_ids as $item_id) {
                    $itemName = DB::table('attribute_items')->where('id', $item_id)->value('item_title');
                    $tmp[] = array_merge($combination, [
                        $attributeName => $itemName,
                    ]);
                }
            }

            $result = $tmp;
        }

        $unit_price   = $request->v_price;
        $product_sku  = $request->sku;
        $combinations = $result;
        // dd($combinations);

        return view('backEnd.admin.products.partials.generate_combination', compact('combinations', 'unit_price', 'product_sku'));
    }

    public function ajaxGetCombinedAttributesEdit(Request $request)
    {
        $arrays  = $request->attribute;
        $product = Product::with('get_variants.get_variant_options')->find($request->id);

        if (!$arrays) return null;

        $result = [[]];

        foreach ($arrays as $attribute_id => $item_ids) {
            $tmp = [];
            foreach ($result as $combination) {
                foreach ($item_ids as $item_id) {
                    $itemName = DB::table('attribute_items')->where('id', $item_id)->value('item_title');
                    $tmp[] = array_merge($combination, [
                        $attribute_id => $itemName,
                    ]);
                }
            }
            $result = $tmp;
        }

        $unit_price   = $request->v_price;
        $product_sku  = $request->h_sku;
        $product_id   = $request->id;
        $combinations = $result;


        return view('backEnd.admin.products.partials.generate_combination_edit', compact(
            'combinations',
            'product',
            'unit_price',
            'product_sku',
            'product_id'
        ));
    }

    public function positionUpdate(Request $request)
    {
        //dd($request->all());
        try {
            $product = Product::find($request->product_id);
            $product->update([
                'position' => $request->position,
            ]);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function flagUpdate(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer|exists:products,id',
            'field' => 'required|in:is_featured,is_best_sell,is_new_product',
            'value' => 'required|in:0,1',
        ]);

        try {
            $product = Product::findOrFail($request->product_id);
            $field = $request->field;
            $product->update([
                $field => (int) $request->value,
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Product flag updated successfully.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong while updating flag.',
            ], 500);
        }
    }

    public function freeShippingStatus($id, $status)
    {
        Product::find($id)->update([
            'is_free_delivery' => $status,
        ]);

        return back()->with('success', 'Free Delivery Status Changed Successfully');
    }

    public function ajaxGetColorImage(Request $request)
    {
        // dd($request->all());
        $colorImages = [];
        if ($request->has('attribute')) {
            foreach ($request->attribute as $key => $attribute) {
                $is_image = Attribute::where('id', $key)->value('is_image');
                if ($is_image) {
                    $colorImages[$key] = $attribute;
                }
            }
        }
        return view('backEnd.admin.products.color-image.create', compact('colorImages'));
    }
    public function ajaxGetColorImageEdit(Request $request)
    {
        // dd($request->all());
        //product
        $product = Product::with('get_choice_attributes')->find($request->id);
        $existing_attributes = [];

        // Step 1: request theke attributes banano
        if ($request->has('attribute')) {
            foreach ($request->attribute as $attribute_id => $item_ids) {
                $is_image = Attribute::where('id', $attribute_id)->value('is_image');
                if ($is_image) {
                    $existing_attributes[$attribute_id] = [];
                    foreach ($item_ids as $item_id) {
                        $item_title = AttributeItem::where('id', $item_id)->value('item_title');
                        $existing_attributes[$attribute_id][$item_id] = [
                            'item_title' => $item_title,
                            'image' => null
                        ];
                    }
                }
            }
        }

        // Step 2: merge with old only if exists in request (so unselected ones will be removed)
        if ($product && $product->get_choice_attributes) {
            foreach ($product->get_choice_attributes as $choiceAttribute) {
                $attribute_id = $choiceAttribute->attribute_id;
                $is_image = Attribute::where('id', $attribute_id)->value('is_image');
                if ($is_image && isset($existing_attributes[$attribute_id])) {
                    foreach ($choiceAttribute->get_choice_attribute_items as $item) {
                        // only merge if same item still exists in request
                        if (isset($existing_attributes[$attribute_id][$item->attribute_item_id])) {
                            $existing_attributes[$attribute_id][$item->attribute_item_id]['image'] = $item->image;
                        }
                    }
                }
            }
        }

        //dd($existing_attributes);

        return view('backEnd.admin.products.color-image.edit', compact('existing_attributes'));
    }

    public function deleteMedia(Request $request)
    {
        // dd($request->all());
        $product = Product::findOrFail($request->product_id);
        $media = Media::findOrFail($request->media_id);
        if (!$media) {
            return response()->json(['success' => false, 'message' => 'Media not found']);
        }
        if (file_exists(public_path($media->file_url))) {
            @unlink(public_path($media->file_url));
        }
        if ($request->type == 'gallery') {
            $gallery = explode(',', $product->gallery_images);
            $gallery = array_filter($gallery, function ($id) use ($request) {
                return $id != $request->media_id;
            });
            $product->update([
                'gallery_images' => implode(',', $gallery)
            ]);
        } elseif (in_array($request->type, ['image', 'top_image', 'bottom_image'])) {
            $column = $request->type;
            $product->update([
                $column => null
            ]);
        }
        $media->delete();

        return response()->json(['success' => true, 'message' => 'Image deleted']);
    }
}
