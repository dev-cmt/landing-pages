<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderProduct;
use App\AbandonedCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IncompleteOrdersController extends Controller
{
    //index method
    public function index()
    {
        $data = AbandonedCart::latest()->paginate(10);
        return view('backEnd.admin.incomplete-orders.index', compact('data'));
    }

    public function createOrder($id)
    {
        $data = AbandonedCart::find($id);
        // dd($data);
        // order create
        $settings = DB::table('web_settings')->select('invoice_prefix')->first();
        if (Order::count() > 0) {
            $invoice_id = Order::latest('id')->first()->invoice_id;
            $invoice_id = trim($invoice_id, $settings->invoice_prefix);
            $invoice_id++;
            $invoice_id = $settings->invoice_prefix . $invoice_id;
        } else {
            $invoice_id = $settings->invoice_prefix . '1';
        }

        $order = Order::create([
            'invoice_id' => $invoice_id,
            'order_date' => date('Y-m-d'),
            'customer_name' => $data->customer_name ?? '',
            'customer_phone' => $data->customer_phone ?? '',
            'customer_address' => $data->customer_address ?? '',
            'shipping_cost' => $data->shipping_cost,
            'total' => $data->total,
            'status' => 6,
            'sub_total' => $data->subtotal,
            'discount' => $data->discount,
            'order_note' => $data->note,
            'source' => 'incomplete',
        ]);
        //order items create
        foreach (json_decode($data->abandoned_item, true) as $item) {
            // dd($item);
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $item['product_id'],
                'qty' => $item['qty'],
                'price' => $item['price'],
                'total' => $item['qty'] * $item['price'],
                'attributes' => $item['attributes'] ?? null,
            ]);
        }
        $data->delete();

        return redirect()->back()->with('success', 'Order Created Successfully From Incompleted Order');
    }

    // delete abandoned cart
    public function delete($id)
    {
        $data = AbandonedCart::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'Incomplete Order Deleted Successfully');
    }

    public function noteUpdate(Request $request)
    {
        AbandonedCart::find($request->id)->update([
            'note' => $request->note
        ]);
        return back()->with('success', 'Note Updated Successfully');
    }
}
