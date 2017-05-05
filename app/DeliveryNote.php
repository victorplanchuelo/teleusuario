<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliveryNote extends Model
{
	public $timestamps = false;

	// Para no tener problemas indicamos el nombre de la tabla
	protected $table = 'delivery_notes';

	//protected $dateFormat = 'M j Y h:i:s:000A';



	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'delivery_note_date', 'concept', 'amount',
		'price', 'start_date', 'end_date', 'invoice_id',
		'user_id', 'delivery_note_type'
	];

	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function invoice()
	{
		return $this->belongsTo('App\Invoice');
	}

	public function delivery_note_lines()
	{
		return $this->hasMany('App\DeliveryNoteLine');
	}
}
