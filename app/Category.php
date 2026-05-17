<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'category_name', 'is_homepage', 'status'
    ];

    public function get_products()
    {
        return $this->belongsToMany(Product::class, 'category_products')->where('status', 1)->orderBy('position', 'desc');
    }
}
