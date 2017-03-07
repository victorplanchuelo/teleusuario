<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->smallIncrements('id')->unsigned();
            $table->unsignedSmallInteger('invoice_number');
            $table->date('invoice_date');

            //FK a tabla users
            $table->unsignedSmallInteger('user_id');
	        $table->foreign('user_id')->references('id')->on('users');

	        $table->decimal('iva',4,3);
	        $table->decimal('irpf',4,3);
	        $table->decimal('tax_base', 9,2);
	        $table->decimal('total', 9,2);
	        $table->boolean('sent')->default(0);
	        $table->boolean('received')->default(0);
	        $table->boolean('paid')->default(0);

	        $table->string('company_name',64);
	        $table->string('company_cif',16);
	        $table->string('company_address',128);

	        $table->unsignedTinyInteger('company_country');
	        $table->unsignedSmallInteger('company_province');
	        $table->unsignedInteger('company_city');

	        $table->string('company_cp',8);
	        $table->string('user_nif',16);
	        $table->string('user_name',128);
	        $table->string('user_address',128);

	        $table->unsignedTinyInteger('user_country');
	        $table->unsignedSmallInteger('user_province');
	        $table->unsignedInteger('user_city');

	        $table->string('user_cp',8);
	        $table->string('user_bank_name',64);
	        $table->string('user_iban',32);
	        $table->string('user_bank_swift',16);
	        $table->string('invoice_footer',1024);
	        $table->date('payment_date')->nullable();
	        $table->date('received_date')->nullable();
	        $table->date('sent_date')->nullable();

	        //File path, del estilo -> empresa/<id_empresa>/usuario/<id_usuario>
	        $table->string('file_path',64)->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
