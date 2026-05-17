<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_date',
        'invoice_id',
        'memo_number',
        'customer_id',
        'customer_name',
        'customer_phone',
        'customer_email',
        'customer_address',
        'courier_id',
        'courier_city_id',
        'courier_zone_id',
        'payment_method',
        'shipping_method',
        'shipping_cost',
        'discount',
        'sub_total',
        'total',
        'status',
        'source',
        'order_note',
        'staff_note',
        'stead_fast_consignment_id',
        'stead_fast_tracking_code',
        'tracking_link',
        'otp_code',
        'is_otp_verified',
    ];

    public function get_products()
    {
        return $this->hasMany(OrderProduct::class,'order_id','id')->with('get_product');
    }

    public function get_courier()
    {
        return $this->hasOne(Courier::class,'id','courier_id');
    }

    public function get_assigned()
    {
        return $this->hasOne(OrderAssign::class,'order_id','id');
    }
}
