<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Connection extends Model
{
	public $timestamps = false;

	// Para no tener problemas indicamos el nombre de la tabla
	protected $table = 'connections';

	//protected $dateFormat = 'M j Y h:i:s:000A';



	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'user_id', 'start_date', 'end_date',
	];


	/**
	 * @param $query
	 * @param $data
	 * @return UserApplication
	 */
	public function scopeCreateConnectionApplication($query, $user_id)
	{
		// Recogemos los valores de la fecha de hoy
		$now = Carbon::now();

		return $query->create([
			'user_id' => $user_id,
			'start_date' => $now,
		]);
	}


	public function user()
	{
		return $this->belongsTo('App\User');
	}
}
