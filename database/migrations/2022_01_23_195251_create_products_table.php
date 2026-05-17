<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('sku')->unique();
            $table->integer('thumb')->nullable();
            $table->integer('image')->nullable();
            $table->string('gallery_images')->nullable();
            $table->text('choice_attributes')->nullable();
            $table->tinyInteger('has_variant')->default(0)->comment('1=has variant, 0=has no variant');
            $table->string('name');
            $table->string('slug')->unique();
            $table->integer('stock')->default(0)->nullable();
            $table->text('description')->nullable();
            $table->double('price');
            $table->double('sale_price')->default(0)->nullable();
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
