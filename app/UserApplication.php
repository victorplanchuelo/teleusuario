<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserApplication extends Model
{
	public $timestamps = false;

	// Para no tener problemas indicamos el nombre de la tabla
	protected $table = 'user_applications';



	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'phone', 'birthdate', 'email', 'password',
		'validate_email', 'application_date', 'end_date', 'genre', 'ip',
		'validation_token', 'checked_by', 'motive', 'notes',
	];

	public function user()
	{
		return $this->belongsTo('App\User');
	}
}
