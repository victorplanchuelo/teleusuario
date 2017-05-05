<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class UserApplication extends Model
{
	public $timestamps = false;

	// Para no tener problemas indicamos el nombre de la tabla
	protected $table = 'user_applications';

	//protected $dateFormat = 'M j Y h:i:s:000A';


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


	/**
	 * @param $query
	 * @param $email
	 * @param $phone
	 * @return UserApplication
	 */
	public function scopeCheckUserApplication($query, $email, $phone)
	{
		return $query->where('email', $email)
			->orWhere('phone', $phone)
			->orderBy('id', 'desc')
			->first();
	}

	/**
	 * @param $query
	 * @param $data
	 * @return UserApplication
	 */
	public function scopeCreateUserApplication($query, $data)
	{
		// Recogemos los valores de la fecha de hoy
		$hoy = Carbon::now();


		return $query->create([
			'name' => $data['name'],
			'email' => $data['email'],
			'phone' => $data['phone'],
			'birthdate' => Carbon::parse($data['birthdate']),
			'password' => $data['password'],
			'genre'=>$data['genre'],
			'application_date' => $hoy,
			'ip' => \Request::ip(),
			'validation_token'=> $data['_token'], //$token,
			'validated_email'=>false,
		]);
	}

	public function scopeValidateToken($query,$token)
	{
		return  $query->where('validation_token', $token)
					 ->first(['validated_email', 'id']);
	}

	public function scopeUpdateValidatedEmail($query, $id)
	{
		return $query->where('id',$id)
			               ->update(['validated_email' => 1, 'validation_token' => '']);
	}
}
