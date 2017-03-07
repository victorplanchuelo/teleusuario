<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliveryNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_notes', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->dateTime('delivery_note_date');
            $table->string('concept',64);
            $table->unsignedInteger('amount');
            $table->decimal('price',9,2);
            $table->date('start_date');
            $table->date('end_date');

            //FK a tabla invoices
	        $table->unsignedSmallInteger('invoice_id');
	        $table->foreign('invoice_id')->references('id')->on('invoices');

	        //FK a tabla users
	        $table->unsignedSmallInteger('user_id');
	        $table->foreign('user_id')->references('id')->on('users');

	        $table->unsignedTinyInteger('delivery_note_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('delivery_notes');
    }
}
