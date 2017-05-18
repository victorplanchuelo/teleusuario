<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create('tasks_users', function (Blueprint $table) {
		    $table->increments('id');
		    $table->integer('user_id')->unique();
		    $table->foreign('user_id')->references('id')->on('users');
		    $table->integer('task_id')->unique();
		    $table->foreign('task_id')->references('id')->on('tasks');
		    $table->date('finished_at')->nullable();
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks_users');
    }
}
