<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    protected $fillable = [
        'product_id',
        'variant',
        'price',
        'sku',
        'stock',
        'image',
    ];

    public function get_variant_options()
    {
        return $this->hasMany(ProductAttributeVariant::class, 'product_attribute_id', 'id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class)->with('get_choice_attributes');
    }
}
