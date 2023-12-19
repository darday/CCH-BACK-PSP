<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestCompleteProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_complete_products', function (Blueprint $table) {
            $table->id('request_complete_products_id');
            $table->integer('user_id');
            $table->string('detail');
            $table->date('fecha');
            $table->text("status_request")->nullable();
            $table->text("status_acquisition")->nullable();

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
        Schema::dropIfExists('request_complete_products');
    }
}
