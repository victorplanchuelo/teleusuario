<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create('tasks', function (Blueprint $table) {
		    $table->increments('id');
		    $table->string('name', '64');
		    $table->integer('points');
		    $table->integer('level_id')->unique();

		    $table->foreign('level_id')->references('id')->on('levels');
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
