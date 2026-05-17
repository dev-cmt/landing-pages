<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductChoiceAttribute extends Model
{
    protected $fillable = [
        'product_id',
        'attribute_id'
    ];

    public function get_choice_attribute_items()
    {
        return $this->hasMany(ProductChoiceAttributeItem::class, 'choice_attribute_id', 'id');
    }
    public function get_attribute()
    {
        return $this->belongsTo(Attribute::class, 'attribute_id', 'id');
    }
}
