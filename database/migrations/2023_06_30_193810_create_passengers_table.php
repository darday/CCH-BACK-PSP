<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePassengersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passengers', function (Blueprint $table) {
            $table->id('passenger_id');
            $table->text('ci')->unique();
            $table->text('name');
            $table->text('phone')->nullable();
            $table->text('city')->nullable();
            $table->text('correo')->nullable();
            $table->text('age')->nullable();
            $table->text('born_date')->nullable();
            $table->text('password')->nullable();

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
        Schema::dropIfExists('passengers');
    }
}
