<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->id('participant_id');
            $table->foreignId('monthly_tour_id');
            $table->string('name');
            $table->string('last_name');
            $table->integer('seats');
            $table->string('city');
            $table->string('comments');
            $table->float('ammount_deposited');
            $table->float('missing_amount');
            $table->string('responsable');
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
        Schema::dropIfExists('participants');
    }
}
