<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonthlyToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthly_tours', function (Blueprint $table) {
            $table->id('monthly_tour_id');
            $table->string('tour_name');
            $table->string('tour_destiny');
            $table->text('description');
            $table->text('include');
            $table->string('img_1');
            $table->string('img_2');
            $table->boolean('state');
            $table->string('type');
            $table->float('person_cost');
            $table->float('discount');
            $table->float('income');
            $table->float('egress');
            $table->float('utility');
            $table->string('varchar_1');
            $table->string('varchar_2');
            $table->string('varchar_3');
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
        Schema::dropIfExists('monthly_tours');
    }
}
