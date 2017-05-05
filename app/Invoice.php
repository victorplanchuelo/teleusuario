<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
	public $timestamps = false;

	// Para no tener problemas indicamos el nombre de la tabla
	protected $table = 'invoices';

	//protected $dateFormat = 'M j Y h:i:s:000A';



	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'invoice_number', 'invoice_date', 'user_id',
		'iva', 'irpf', 'tax_base', 'total', 'sent',
		'received', 'paid', 'company_name', 'company_cif',
		'company_address', 'company_country', 'company_province',
		'company_city', 'company_cp', 'user_nif', 'user_name', 'user_address',
		'user_country', 'user_province', 'user_city', 'user_cp', 'user_bank_name',
		'user_iban', 'user_bank_swift', 'invoice_footer', 'payment_date', 'received_date',
		'sent_date', 'path'
	];

	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function delivery_notes()
	{
		return $this->hasMany('App\DeliveryNote');
	}
}
