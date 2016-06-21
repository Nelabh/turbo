<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
     Schema::create('transaction', function (Blueprint $table) {
        $table->increments('id');
        $table->string('vehicle_number');
        $table->string('volume');
        $table->string('device_id');
        $table->timestamps();
        $table->foreign('device_id')->references('device_id')->on('devices')->onDelete('cascade');
     });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('transaction');
    }
}
