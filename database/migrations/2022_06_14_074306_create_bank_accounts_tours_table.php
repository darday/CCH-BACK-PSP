<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankAccountsToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_accounts_tours', function (Blueprint $table) {
            $table->id('bank_account_tour_id');
            $table->foreignId('bank_accounts_id')->references('bank_accounts_id')->on ('bank_accounts');
            $table->foreignId('monthly_tour_id')->references('monthly_tour_id')->on ('monthly_tours');
            $table->float('utility');
            $table->float('money_before_tour');
            $table->float('money_after_tour');
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
        Schema::dropIfExists('bank_accounts_tours');
    }
}
