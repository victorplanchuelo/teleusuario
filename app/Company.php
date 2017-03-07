<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
	public $timestamps = false;

	// Para no tener problemas indicamos el nombre de la tabla
	protected $table = 'companies';



	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'address', 'country', 'province', 'city',
		'cp', 'subject_to_taxes', 'iva', 'irpf',
		'corporation_tax'
	];

	public function users()
	{
		return $this->hasMany('App\User');
	}
}
