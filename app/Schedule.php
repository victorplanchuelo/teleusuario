<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
	public $timestamps = false;

	// Para no tener problemas indicamos el nombre de la tabla
	protected $table = 'schedules';

	//protected $dateFormat = 'M j Y h:i:s:000A';



	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'user_id', 'schedule_type', 'day_of_week',
		'start_time', 'end_time', 'active'
	];

	public function user()
	{
		return $this->belongsTo('App\User');
	}
}
