<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipmentRentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipment_rents', function (Blueprint $table) {
            $table->id('equipment_rent_id');
            $table->string('name');
            $table->text('description');
            $table->float('cost');
            $table->string('img_1');
            $table->boolean('state');
            $table->string('type');
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
        Schema::dropIfExists('equipment_rents');
    }
}
