<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Product::class, function (Faker $faker) {
    $products = [
        'Hp laptop EliteBook',
        'Hp laptop ProBook',
        'Dell laptop Latitude',
        'Dell PC GamingPC',
        'Dell PC PersonalPC',
    ];
    $slugs = [
        'Hp-laptop-EliteBook',
        'Hp-laptop-ProBook',
        'Dell-laptop-Latitude',
        'Dell-PC-GamingPC',
        'Dell-PC-PersonalPC',
    ];
    $skus = [
        'p-00grg1',
        'p-002gr',
        'p-003fg',
        'p-004f',
        'p-005f',
    ];


    return [
        'name' => $products[count($products) - 1],
        'category_id' => 1,
        'slug' => $slugs[count($slugs) - 1],
        'sku' => $skus[ count($skus) - 1],
        //'thumb' => $faker->image('public/uploads/',180,180, null, false),
        'price' => 150,
        'sale_price' => 120,
        'status' => 1,
    ];
});
