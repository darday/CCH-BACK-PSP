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
            $table->id('product_id');
            $table->integer('category_id');
            $table->integer('supplier_id');
            $table->text('description')->nullable();
            $table->float('buying_price')->nullable();
            $table->float('min_selling_price')->nullable();
            $table->float('selling_price')->nullable();
            $table->float('rent_price')->nullable();
            $table->date('entry_date')->nullable();
            $table->text('img')->nullable();

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
