<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $fillable = [
        'title', 'status','is_image'
    ];

    public function get_attribute_items()
    {
        return $this->hasMany(AttributeItem::class,'attribute_id','id');
    }
}
