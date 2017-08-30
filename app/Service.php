<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
	public $timestamps = false;

	// Para no tener problemas indicamos el nombre de la tabla
	protected $table = 'services';


	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'gratification', 'description', 'path',
	];

	public function users()
	{
		return $this->belongsToMany('App\User')->withPivot(array('active', 'end_date'));
	}

	public function delivery_note_lines()
	{
		return $this->hasMany('App\DeliveryNoteLine');
	}
}
