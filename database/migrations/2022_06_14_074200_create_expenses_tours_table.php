<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses_tours', function (Blueprint $table) {
            $table->id('expense_tour_id');
            $table->foreignId('monthly_tour_id')->references('monthly_tour_id')->on ('monthly_tours');
            $table->float('quantity');
            $table->text('description');
            $table->float('unit_cost');
            $table->float('total_cost');
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
        Schema::dropIfExists('expenses_tours');
    }
}
