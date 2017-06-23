<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_user', function (Blueprint $table) {
            $table->unsignedSmallInteger('user_id');
	        $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedTinyInteger('service_id');
	        $table->foreign('service_id')->references('id')->on('services');

	        $table->dateTime('start_date');
	        $table->dateTime('end_date')->nullable();
	        $table->boolean('active')->default(0);

	        $table->string('path',64);

	        $table->primary(['user_id', 'service_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_user');
    }
}
