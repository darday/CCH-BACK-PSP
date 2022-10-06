<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTourCataloguesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_catalogues', function (Blueprint $table) {
            $table->id('tour_catalogues_id');
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
            $table->string('dificulty');
            $table->float('discount');
            $table->string('discount_description');
            $table->string('contact_phone');
            $table->string('messagge_for_contact');
            $table->string('varchar_1')->nullable();
            $table->string('varchar_2')->nullable();
            $table->string('varchar_3')->nullable();
            $table->integer('last_user')->nullable();
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
        Schema::dropIfExists('tour_catalogues');
    }
}
