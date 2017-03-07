<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Connection extends Model
{
	public $timestamps = false;

	// Para no tener problemas indicamos el nombre de la tabla
	protected $table = 'connections';

	// Para no tener problemas para los UPDATES/DELETES se debe indicar cual es el Id de la tabla
	// Ya que Eloquent por defecto busca 'id'
	protected $primaryKey = ['user_id', 'date'];



	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'user_id', 'date'
	];

	public function user()
	{
		return $this->belongsTo('App\User');
	}
}
