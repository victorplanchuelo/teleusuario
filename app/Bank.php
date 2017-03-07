<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
	public $timestamps = false;

	// Para no tener problemas indicamos el nombre de la tabla
	protected $table = 'banks';



	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'swift', 'code'
	];

	public function users()
	{
		return $this->hasMany('App\User');
	}
}
