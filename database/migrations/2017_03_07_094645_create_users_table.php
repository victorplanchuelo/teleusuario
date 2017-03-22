<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->smallIncrements('id')->unsigned();
            $table->string('code',16)->unique();
            $table->string('name',128);
            $table->string('contact_phone',16);
            $table->string('connection_phone',16)->nullable();
            $table->date('birthdate');
            $table->string('email',128)->unique();
            $table->string('password',64);
            $table->string('real_password',16);
            $table->dateTime('start_date');
            $table->dateTime('end_date')->nullable();
            $table->tinyInteger('genre');

            //FK a tabla users_applications
            $table->unsignedInteger('application_id');
	        $table->foreign('application_id')->references('id')->on('user_applications');

	        $table->boolean('active')->default(1);
	        $table->string('alias',16);

	        //Los siguientes campos se recogeran por API a
	        // las tablas correspondientes (por eso no son FKs)
	        $table->tinyInteger('country')->unsigned();
	        $table->tinyInteger('province')->unsigned();
	        $table->tinyInteger('city')->unsigned();
	        ////////////////////////////////////////////////////

	        $table->string('address', 128);
	        $table->string('cp',8);
	        $table->string('nif',16);
	        $table->boolean('rec_conversations')->default(0);

	        //FK a tabla companies
	        $table->unsignedTinyInteger('company_id');
	        $table->foreign('company_id')->references('id')->on('companies');

	        //FK a tabla banks
	        $table->unsignedTinyInteger('bank_id')->nullable();
	        $table->foreign('bank_id')->references('id')->on('banks');

	        $table->string('iban', 32)->nullable();
	        $table->string('leave_reason', 128)->nullable();

	        //FK a tabla contract_states
	        $table->unsignedTinyInteger('contract_state_id');
	        $table->foreign('contract_state_id')->references('id')->on('contract_states');

	        $table->dateTime('contract_date')->nullable();

	        //Se llamará por API a tabla Responsables
	        $table->unsignedTinyInteger('responsible');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
