<?php

namespace App;

use App\Notifications\ResetPasswordNotification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

	/**
	 * Con esta propiedad no tiene en cuenta los campos created_at y updated_at.
	 * que se "suelen crear" normalmente en las migraciones de Laravel.
	 *
	 * @var boolean
	 */
	public $timestamps = false;

	// Para no tener problemas indicamos el nombre de la tabla
	protected $table = 'users';

	//protected $dateFormat = 'M j Y h:i:s:000A';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'name', 'contact_phone', 'connection_phone', 'birthdate',
	    'email', 'password', 'real_password', 'start_date', 'end_date', 'genre',
	    'application_id', 'active', 'alias', 'country', 'province', 'city', 'address',
	    'cp', 'nif', 'rec_conversations', 'company_id', 'bank_id', 'iban', 'leave_reason',
	    'contract_state_id','contract_date', 'responsible', 'image_path', 'thumb_path' ,
	    'remember_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'real_password',
    ];


	/**
	 * Send the password reset notification.
	 *
	 * @param  string  $token
	 * @return void
	 */
	public function sendPasswordResetNotification($token)
	{
		$this->notify(new ResetPasswordNotification($token));
	}


	/**
	 * @param $city
	 * @param $province
	 * @param $country
	 */
	public static function getPlace($city, $province, $country)
	{
		return DB::connection('sqlsrv2')
		    ->table('Paises')
		    ->join('Provincias', 'Paises.IdPais', '=', 'Provincias.PaisProvincia')
		    ->join('Poblacion', 'Provincias.IdProvincia', '=', 'Poblacion.IdProvinciaPob')
		    ->select('Poblacion.CiudadPob as ciudad', 'Provincias.NombreProvincia as provincia', 'Paises.NombrePais as pais')
		    ->where('Poblacion.IdPob', $city)
		    ->where('Provincias.IdProvincia', $province)
		    ->where('Paises.IdPais', $country)
		    ->first();
	}



	public static function setImageFromFile($file)
	{
		//Guardamos la imagen original
		$image = Storage::disk('public')->putFile('profiles/'. Auth::user()->code, $file);

		$avatarName = explode('.', explode('/',$image)[2])[0];

		//Creación de thumbnail
		$stream = Image::make(Storage::disk('public')->get($image))->fit(130, 130)->stream();
		$thumb = 'profiles/'. Auth::user()->code . '/' . $avatarName .'_thumb.' . $file->getClientOriginalExtension();
		Storage::disk('public')->put($thumb, $stream);

		//Actualizamos el path de la imagen y el thumbnail en la BBDD
		$user = User::find(Auth::user()->id);

		//Primero recuperamos el path de la imagen anterior;
		$old_image = 'public/' . $user->image_path;
		$old_thumb = 'public/' . $user->thumb_path;

		if(!is_null($user->image_path) && $user->image_path!='')
		{
			//Si ya tenia imágenes guardadas, las borramos
			Storage::delete([$old_image, $old_thumb]);
		}

		//Actualizamos la base de datos
		$user->image_path = $image;
		$user->thumb_path = $thumb;
		$user->save();

		if($image)
			return response()->json([
				'success' => 1,
				'file' => Storage::url($thumb),
			]);

		return response()->json([
			'success' => 0,
		]);
	}


	/**
	 *
	 *
	 * RELACIONES DEL MODELO
	 *
	 */


    public function application()
    {
    	return $this->hasOne(UserApplication::class);
    }

	public function services()
	{
		return $this->belongsToMany(Service::class)->withPivot(array('active', 'end_date'));
	}

	public function connections()
	{
		return $this->hasMany(Connection::class);
	}

	public function schedules()
	{
		return $this->hasMany(Schedule::class);
	}

	public function company()
	{
		return $this->belongsTo(Company::class);
	}

	public function bank()
	{
		return $this->belongsTo(Bank::class);
	}

	public function contract_state()
	{
		$this->belongsTo(ContractState::class);
	}

	public function invoices()
	{
		return $this->hasMany(Invoice::class);
	}

	public function delivery_notes()
	{
		return $this->hasMany(DeliveryNote::class);
	}

	public function tickets()
	{
		return $this->hasMany(Ticket::class);
	}

	public function comments()
	{
		return $this->hasMany(TicketComment::class);
	}
}
