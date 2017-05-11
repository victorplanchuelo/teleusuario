<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConnectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('connections', function (Blueprint $table) {
            //Esta tabla es muy curiosa. Tenemos como PK los campos user_id y fecha
	        //Además, user_id es una FK a la tabla usuarios
	        $table->increments('id');
        	$table->unsignedSmallInteger('user_id');
	        $table->foreign('user_id')->references('id')->on('users');

            $table->dateTime('date');

	        $table->unique(['user_id', 'date']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('connections');
    }
}
