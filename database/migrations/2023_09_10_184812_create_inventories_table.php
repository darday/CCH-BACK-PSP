<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->id('inventories_id');
            $table->integer('product_id');
            $table->float('stock')->nullable();
            $table->float('inWarehouse')->nullable();
            $table->float('withoutWarehouse')->nullable();
            $table->text('Observation')->nullable();
            $table->integer('status_id')->nullable();
            $table->text('varchar2')->nullable();
            $table->text('varchar3')->nullable();
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
        Schema::dropIfExists('inventories');
    }
}
