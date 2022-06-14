<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpositionToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exposition_tours', function (Blueprint $table) {
            $table->id('exposition_tour_id');
            $table->string('tour_name');
            $table->string('tour_destiny');
            $table->text('description');
            $table->text('include');
            $table->float('cost_1');
            $table->float('cost_2');
            $table->float('cost_3');
            $table->float('cost_4');
            $table->string('img_1');
            $table->string('img_2');
            $table->boolean('state');
            $table->string('type');
            $table->float('discount');
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
        Schema::dropIfExists('exposition_tours');
    }
}
