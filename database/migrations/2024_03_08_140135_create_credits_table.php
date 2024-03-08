<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credits', function (Blueprint $table) {
            $table->id('credit_id');
            $table->string('ci')->nullable();
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->float('loan')->nullable();
            $table->float('parcial_pay')->nullable();
            $table->float('interest')->nullable();
            $table->float('total_loan')->nullable();
            $table->float('to_collect')->nullable();
            $table->integer('state')->nullable();
            $table->text('limit_date')->nullable();
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
        Schema::dropIfExists('credits');
    }
}
