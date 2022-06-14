<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMontlyToursUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthly_tours_users', function (Blueprint $table) {
            $table->id('monthly_tour_user_id');
            $table->foreignId('monthly_tour_id')->references('monthly_tour_id')-> on ('monthly_tours');
            $table->foreignId('user_id')->references('user_id')->on('users');
            $table->integer('seats');
            $table->text('coment');
            $table->text('img_voucher');
            $table->float('ammount_deposited');
            $table->float('missing_ammount');
            $table->text('messagge');
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
        Schema::dropIfExists('montly_tours_users');
    }
}
