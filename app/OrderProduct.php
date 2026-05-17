<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $fillable = [
        'order_id',
        'product_id',
        'qty',
        'price',
        'attributes',
        'product_sku'
    ];

    protected $casts = [
        'attributes' => 'array'
    ];

    public function get_product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
