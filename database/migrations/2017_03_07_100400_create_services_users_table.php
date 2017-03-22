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
        Schema::create('services_users', function (Blueprint $table) {
            $table->unsignedSmallInteger('user_id');
	        $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedTinyInteger('service_id');
	        $table->foreign('service_id')->references('id')->on('services');

	        $table->dateTime('start_date');
	        $table->dateTime('end_date')->nullable();
	        $table->boolean('active')->default(0);

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
        Schema::dropIfExists('services_users');
    }
}