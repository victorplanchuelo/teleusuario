<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
	        $table->integer('user_id')->unsigned();
	        $table->integer('motive_id')->unsigned();
	        $table->string('ticket_id')->unique();

	        $table->foreign('motive_id')->references('id')->on('category_motive');

	        $table->string('title');
	        $table->text('message');
	        $table->boolean('status');
	        $table->boolean('urgent');
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
        Schema::dropIfExists('tickets');
    }
}
