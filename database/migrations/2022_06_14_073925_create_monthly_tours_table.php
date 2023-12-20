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
            $table->string('dificulty');
            $table->float('person_cost');
            $table->float('group_cost');
            $table->float('discount')->nullable();
            $table->float('income')->nullable();
            $table->float('egress')->nullable();
            $table->float('utility')->nullable();
            $table->string('contact_phone');
            $table->string('messagge_for_contact');
            $table->date('departure_date');
            $table->date('return_date');
            $table->string('varchar_1')->nullable();
            $table->string('varchar_2')->nullable();
            $table->string('varchar_3')->nullable();
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
