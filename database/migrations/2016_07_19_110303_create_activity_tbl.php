<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivityTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_tbl', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id');
            $table->string('date');
            $table->string('outcome');
            $table->string('type');
            $table->string('sales_person');
            $table->integer('flag');
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
        Schema::drop('activity_tbl');
    }
}
