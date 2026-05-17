<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductAttributeVariant extends Model
{
    protected $fillable =
    [
        'product_attribute_id',
        'choice_attribute_item_name',
    ];
}
