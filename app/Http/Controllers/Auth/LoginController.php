<?php

namespace App\Http\Controllers\Auth;

use App\Connection;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use \Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest', ['except' => 'logout']);
    }

	/**
	 * Get the login username to be used by the controller.
	 *
	 * @return string
	 */
	public function username()
	{
		return 'code';
	}

	/**
	 * Handle a login request to the application.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
	 */
	public function login(Request $request)
	{
		$this->validateLogin($request);


		if ($this->attemptLogin($request)) {
			//Si entra por aquí, quiere decirse que el usuario existe
			// por lo que hay que añadir una fila nueva por la conexión
			$connection = Connection::createConnectionApplication(Auth::user()->id);

			return $this->sendLoginResponse($request);
		}

		// If the login attempt was unsuccessful we will redirect the user back to
		// the login form.

		return $this->sendFailedLoginResponse($request);
	}

	/**
	 * Attempt to log the user into the application.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return bool
	 */
	protected function attemptLogin(Request $request)
	{

		return $this->guard()->attempt(
			$this->credentials($request), true);
	}



	/**
	 * Log the user out of the application.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function logout(Request $request)
	{

		//Antes de realizar el logout de la persona
		//guardamos la fecha en la que lo  ha realizado
		$conn = Connection::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->first();
		$conn->end_date = $now = Carbon::now();
		$conn->save();


		$this->guard()->logout();

		$request->session()->flush();

		$request->session()->regenerate();

		return redirect('/');
	}







	public function insertFakeUser()
	{
		//Creamos compañia, bancos, estados de contrato y usuario
		/*$company = \App\Company::create([
			'name' => 'Compañia Prueba 1',
			'address' => 'Avenida de Lugo 10 - 1ºI',
			'country' => 1,
			'province' => 32,
			'city' => 126, //4362
			'cp' => '28035',
			'iva' => 0.021,
			'irpf' => 0.017,
			'corporation_tax' => 0.015,
		]);

		$bank1 = \App\Bank::create([
			'name' => 'ING',
			'swift' => 'INGESMM111',
			'code' => '1465',
		]);

		$bank2 = \App\Bank::create([
			'name' => 'Bankia',
			'swift' => 'CAHMESMM123',
			'code' => '2038',
		]);

		$contract_state = \App\ContractState::create([
			'name' => 'SIN CONTRATO',
		]);*/

		/*$fecha = \Carbon\Carbon::now();

		$user_application = \App\UserApplication::where('validated_email', 1)->first();

		//dd($user_application);
		//dd(\Carbon\Carbon::createFromFormat('M d Y h:i:s:A', trim($user_application['birthdate'])));
		//dd(\Carbon\Carbon::parse($user_application['birthdate']));

		$user = \App\User::create([
			'code' => '111111',
			'name' => $user_application['name'],
			'contact_phone' => $user_application['phone'],
			'birthdate' => \Carbon\Carbon::createFromFormat('M d Y h:i:s:A',$user_application['birthdate']),
			'email' => $user_application['email'],
			'password'=> Hash::make($user_application['password']),
			'real_password' => $user_application['password'],
			'start_date' => $fecha,
			'genre' => $user_application['genre'],
			'application_id' => $user_application['id'],
			'alias' => 'Victor',
			'country' => 1,
			'province' => 32,
			'city' => 120, //4374
			'address' => 'Calle Bailén 3 - 5 Izquierda',
			'cp' => '28934',
			'nif' => '43987699S',
			'company_id' => 1,
			'bank_id' => 1,
			'contract_state_id' => 1,
			'responsible' => 1,
		]);*/
	}
}
