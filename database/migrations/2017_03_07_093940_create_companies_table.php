<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
	        $table->tinyInteger('id')->unsigned()->autoIncrement();
            $table->string('name',64);
            $table->string('address',128);

            //Los siguientes campos se recogeran por API a
	        // las tablas correspondientes (por eso no son FKs)
            $table->tinyInteger('country')->unsigned();
	        $table->tinyInteger('province')->unsigned();
	        $table->tinyInteger('city')->unsigned();
	        ////////////////////////////////////////////////////

	        $table->string('cp', 8);
	        $table->boolean('subject_to_taxes')->default(0);
	        $table->decimal('iva',4,3)->nullable();
	        $table->decimal('irpf',4,3)->nullable();
	        $table->decimal('corporation_tax',4,3)->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
