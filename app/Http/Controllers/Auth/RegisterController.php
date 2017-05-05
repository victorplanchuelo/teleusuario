<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Mail\VerificationMail;
use App\UserApplication;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Auth\RegistersUsers;
//use Carbon\Carbon;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return UserApplication
     */
    protected function create(array $data)
    {
		/*
	    // Recogemos los valores de la fecha de hoy
	    $hoy = Carbon::now();


        return UserApplication::create([
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
        ]);*/
    }

	/**
	 * Handle a registration request for the application.
	 *
	 * @param  \App\Http\Requests\RegisterRequest  $request
	 * @return \Illuminate\Http\Response
	 */
	public function register(RegisterRequest $request)
	{


		/*$registro = UserApplication::where('email', $request['email'])
			->orWhere('phone', $request['phone'])
			->orderBy('id', 'desc')
			->first();*/

		$record = UserApplication::checkUserApplication($request['email'], $request['phone'])->first();

		if(isset($record))
		{
			if($record->count())
			{
				if($record->user != null)
				{
					if($record['end_date']!=null)
					{
						//Dado de baja
						return back()
							->withInput()
							->withErrors(['errors' => trans('auth.registration.error.user_deleted')]);
					}

					//Sino, Usuario ya validado por las compañeras
					return back()
						->withInput()
						->withErrors(['errors' => trans('auth.registration.error.user_already_exist')]);
				}

				if($record['validated_email']==1)
				{
					return back()
						->withInput()
						->withErrors(['errors' => trans('auth.registration.error.pending_validate')]);
				}


				//Sino, Usuario se registró y trata de volver a registrarse
				return back()
					->withInput()
					->withErrors(['errors' => trans('auth.registration.error.pending_validate_email')]);

			}
		}

		//Si llega aquí es porque no hay registro de usuario
		//Se crea el registro de usuario y se le manda el mail
		//$user = $this->create($request->all());
		$user = UserApplication::createUserApplication($request->all());


		if(!$user)
		{
			return back()
				->withInput()
				->withErrors(['errors' => trans('auth.registration.error.created_application_user')]);
		}

		//Log::info("Se creó el usuario " . $user->name);

		//Se envia el mail
		Mail::to($user)
			->send(new VerificationMail($user));

		return redirect('/login')->with('success', trans('validation.verification_message'));
	}

	public function activation($token)
	{
		//Se supone que ha pulsado el botón de validar correo en el e-mail Enviado
		//Comprobaremos que el token enviado coincide con alguno de los usuarios
		//Si existe, modifica el validated_email y eliminaremos el token

		$user = UserApplication::validateToken($token);

		if(isset($user))
		{
			if ($user->count())
			{
				if($user['validated_email'])
				{
					//Si es true es que el email ya ha sido validado previamente
					//Mostraremos error en la pantalla de login
					return redirect('/login')
						->withErrors(['errors' => trans('auth.validated_email.error')]);
				}

				// Si llega hasta aqui quiere decir que el usuario existe, el token está correcto y el campo validated_email es false
				// Hacemos el update para eliminar el token y poner a true el validated_email
				$update_user = UserApplication::updateValidatedEmail($user['id']);

				if(!$update_user)
				{
					//Si entra aquí se habrá producido un error en la actualización
					return redirect('/login')
						->withErrors(['errors' => trans('auth.validated_email.error')]);
				}

				//Si llega es que se ha actualizado bien. Le redirigimos al login, indicando que una persona se pondrá en contacto con ella
				return redirect('/login')->with('success', trans('validation.email_validate'));
			}
		}


		//En el caso de que el count de 0, quiere decirse que no existe un usuario con ese token
		//Eso es cuando el usuario ya ha validado el correo electrónico

		return redirect('/login')
			->withErrors(['errors' => trans('validation.email_already_validate')]);
	}
}
