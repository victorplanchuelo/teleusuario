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

		$record = UserApplication::checkUserApplication($request['email'], $request['phone'])->get();

		if($record)
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


		//Si llega aquí es porque no hay registro de usuario
		//Se crea el registro de usuario y se le manda el mail
		//$user = $this->create($request->all());
		$user = UserApplication::createUserApplication($request->all());


		if(!$user)
		{
			return back()
				->withInput()
				->withErrors(['errors' => trans('auth.error.created_application_user')]);
		}

		Log::info("Se creó el usuario " . $user->name);

		//Se envia el mail
		Mail::to($user)
			->send(new VerificationMail($user));

		return redirect('/login')->with('success', trans('validation.verification_message'));
	}
}
