<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliveryNoteLine extends Model
{
	public $timestamps = false;

	// Para no tener problemas indicamos el nombre de la tabla
	protected $table = 'delivery_note_lines';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'amount', 'unit_price', 'delivery_note_id',
		'service_id', 'call'
	];

	public function delivery_note()
	{
		return $this->belongsTo('App\DeliveryNote');
	}

	public function service()
	{
		return $this->belongsTo('App\Service');
	}
}
