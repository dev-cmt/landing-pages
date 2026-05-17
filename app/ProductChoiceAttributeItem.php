<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductChoiceAttributeItem extends Model
{
    protected $fillable = [
        'product_id',
        'choice_attribute_id',
        'attribute_item_id',
        'attribute_item_name',
        'image'
    ];
    public function get_choice_attribute()
    {
        return $this->belongsTo(ProductChoiceAttribute::class, 'attribute_id', 'id');
    }

}
