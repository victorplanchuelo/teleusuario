<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_applications', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name',128);
            $table->string('phone', 16);
            $table->string('email', 128);
            $table->date('birthdate');
            $table->string('password',16);
            $table->boolean('validated_email')->default(0);
            $table->dateTime('application_date');
	        $table->dateTime('end_date')->nullable();
            $table->tinyInteger('genre');
            $table->ipAddress('ip');
            $table->string('validation_token',128);
            $table->tinyInteger('checked_by')->unsigned()->nullable();
            $table->unsignedTinyInteger('motive')->unsigned()->nullable();
            $table->string('notes',256)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_applications');
    }
}
