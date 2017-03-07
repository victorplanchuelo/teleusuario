<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContractState extends Model
{
	public $timestamps = false;

	// Para no tener problemas indicamos el nombre de la tabla
	protected $table = 'contract_states';



	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name'
	];

	public function users()
	{
		return $this->hasMany('App\User');
	}
}
