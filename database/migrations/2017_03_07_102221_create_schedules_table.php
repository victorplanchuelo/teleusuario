<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->smallIncrements('id')->unsigned();

            //FK a tabla users
            $table->unsignedSmallInteger('user_id');
	        $table->foreign('user_id')->references('id')->on('users');

	        $table->unsignedTinyInteger('schedule_type');
	        $table->unsignedTinyInteger('day_of_week');
	        $table->time('start_time');
	        $table->time('end_time');
	        $table->boolean('active')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
}
