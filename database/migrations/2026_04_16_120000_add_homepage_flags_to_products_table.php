<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHomepageFlagsToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->tinyInteger('is_featured')->default(0)->after('sale_price');
            $table->tinyInteger('is_best_sell')->default(0)->after('is_featured');
            $table->tinyInteger('is_new_product')->default(0)->after('is_best_sell');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['is_featured', 'is_best_sell', 'is_new_product']);
        });
    }
}
