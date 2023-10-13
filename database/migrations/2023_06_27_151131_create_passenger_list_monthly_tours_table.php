<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePassengerListMonthlyToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passenger_list_monthly_tours', function (Blueprint $table) {
            $table->id('passenger_list_monthly_tours');
            $table->integer('list_id');
            $table->integer('monthly_tour_id');            
            $table->integer('status');            
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
        Schema::dropIfExists('passenger_list_monthly_tours');
    }
}
