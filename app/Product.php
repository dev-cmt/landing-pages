<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    protected $fillable = [
        'position',
        'sku',
        'thumb',
        'image',
        'gallery_images',
        'video_url',
        'has_variant',
        'name',
        'slug',
        'stock',
        'description',
        'price',
        'sale_price',
        'is_featured',
        'is_best_sell',
        'is_new_product',
        'status',
        'is_free_delivery',
    ];

    public function get_categories()
    {
        return $this->belongsToMany(Category::class, 'category_products');
    }

    public function get_category()
    {
        return $this->hasOneThrough(Category::class, CategoryProduct::class, 'product_id', 'id', 'id', 'category_id');
    }

    public function get_thumb()
    {
        return $this->hasOne(Media::class, 'id', 'thumb');
    }

    public function get_image()
    {
        return $this->hasOne(Media::class, 'id', 'image');
    }

    public function get_gallery_images()
    {

        return $this->hasMany(Media::class, 'id', 'gallery_images');
    }
    public function get_gallery()
    {
        $ids = array_filter(explode(',', $this->gallery_images)); // remove empty values
        return Media::whereIn('id', $ids)->get();
    }

    public function getImagesAttribute()
    {
        if ($this->gallery_images) {
            $photos = explode(',', $this->gallery_images);
        } else {
            $photos = [];
        }
        $p = [];
        foreach ($photos as $photo) {
            $p[] = Media::find($photo)->file_url;
        }
        return $p;
    }

    public function get_choice_attributes()
    {
        return $this->hasMany(ProductChoiceAttribute::class, 'product_id', 'id')->with('get_choice_attribute_items', 'get_attribute');
    }

    public function get_choice_attribute_items()
    {
        return $this->hasMany(ProductChoiceAttributeItem::class, 'product_id', 'id');
    }

    public function get_variants()
    {
        return $this->hasMany(ProductAttribute::class, 'product_id', 'id');
    }

    //landing page
    public function landing_page()
    {
        return $this->hasMany(LandingPageProduct::class, 'product_id', 'id')->with('landingPage', 'landing_page_one', 'products');
    }
}
