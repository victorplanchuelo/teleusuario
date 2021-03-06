<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceUser extends Model
{
	public $timestamps = false;

	// Para no tener problemas indicamos el nombre de la tabla
	protected $table = 'service_user';

	// Para no tener problemas para los UPDATES/DELETES se debe indicar cual es el Id de la tabla
	// Ya que Eloquent por defecto busca 'id'
	protected $primaryKey = ['user_id', 'service_id'];

	//protected $dateFormat = 'M j Y h:i:s:000A';



	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'user_id', 'service_id', 'start_date', 'end_date', 'active'
	];
}
