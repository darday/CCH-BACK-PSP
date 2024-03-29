<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePassengerListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passenger_lists', function (Blueprint $table) {
            $table->id('passenger_lists_id');
            $table->integer('list_id');
            $table->text('passenger_ci');
            $table->integer('seat')->nullable();
            $table->float('unit_cost')->nullable();
            $table->float('total_cost')->nullable();
            $table->float('collected')->nullable();
            $table->float('bus_extra')->nullable();
            $table->float('to_collect')->nullable();
            $table->text('bank')->nullable();
            $table->text('responsable')->nullable();
            $table->text('meeting_point')->nullable();
            $table->text('observation')->nullable();
            $table->string('passenger_type')->nullable();
            $table->text('passenger_group_leader_ci')->nullable();
            $table->string('img_cmp_1')->nullable();
            $table->string('img_cmp_2')->nullable();
            $table->integer('state')->nullable();
            $table->text('state_passenger')->nullable();

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
        Schema::dropIfExists('passenger_lists');
    }
}
