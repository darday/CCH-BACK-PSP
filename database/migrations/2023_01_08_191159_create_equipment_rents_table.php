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
            $table->id('equipment_rent_id')->nullable();
            $table->integer('inventories_id')->nullable();
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->float('cost')->nullable();
            $table->string('img_1')->nullable();
            $table->boolean('state')->nullable();
            $table->string('type')->nullable();
            $table->boolean('isActive')->nullable();
            $table->float('discount')->nullable();
            $table->string('discount_description')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('messagge_for_contact')->nullable();
            $table->float('cch_points')->nullable();
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
