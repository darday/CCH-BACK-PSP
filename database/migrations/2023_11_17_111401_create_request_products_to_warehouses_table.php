<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestProductsToWarehousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_products_to_warehouses', function (Blueprint $table) {
            $table->id('request_products_to_warehouses_id');
            $table->integer('user_id');
            $table->integer('quantity_products');
            $table->integer('request_complete_products_id');
            $table->integer('product_warehouses_id');
            $table->text("status")->nullable();
            $table->float('unit_price')->nullable();
            $table->float('total_price')->nullable();

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

        Schema::table('request_products_to_warehouses', function (Blueprint $table) {
            $table->dropForeign('fk_request_products_request_complete');
        });

        Schema::dropIfExists('request_products_to_warehouses');
    }
}
