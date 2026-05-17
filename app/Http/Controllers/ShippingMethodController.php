<?php

namespace App\Http\Controllers;

use App\Order;
use App\ShippingMethod;
use Illuminate\Http\Request;

class ShippingMethodController extends Controller
{
    public function index()
    {
        $data = ShippingMethod::all();
        return view('backEnd.admin.shipping_methods.index', compact('data'));
    }

    public function store(Request $request)
    {
        ShippingMethod::create($request->all());
        return redirect()->route('admin.shipping_methods')->with('success', 'Shipping Method Added Successfully');
    }

    public function update(Request $request)
    {
        ShippingMethod::find($request->id)->update($request->all());
        return redirect()->route('admin.shipping_methods')->with('success', 'Shipping Method Updated Successfully');
    }

    public function defaultStatus($id, $status)
    {
        $data = ShippingMethod::get();

        if(count($data) < 2 && $status == 1)
        {
            return back()->with('error', 'Can not set default shipping method.');
        }

        $ship_method = ShippingMethod::findOrFail($id);
        

        $ship_method->is_default = $status;
        $ship_method->update();

        ShippingMethod::where('id', '!=', $id)->update(['is_default' => 0]);
        return back()->with('success', 'Default Shipping Method Set Successfully.');
    }

    public function delete($id)
    {
        $has_method = Order::where('shipping_method', $id)->first();
        if ($has_method) {
            return back()->with('warning', 'This Shipping Method Already In Order');
        } else {
            ShippingMethod::find($id)->delete();
            return back()->with('success', 'Shipping Method Deleted Successfully');
        }
    }
}