<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\UserApplication;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
	        'name' => 'required|max:100|regex:/^[\pL\s\-]+$/u',
	        'email' => 'required|email|unique:users',
	        'phone' => 'required|size:9|regex:/[6789][0-9]{8}/',
	        'birthdate' => 'required|date|age',
	        'password' => 'required|min:6|regex:/(^[A-Za-z0-9]+$)+/|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {

	    // Recogemos los valores de la fecha de hoy
	    $hoy = Carbon::now()->toDateString();
	    $token = str_random(10);

        return UserApplication::create([
            'name' => $data['name'],
            'email' => $data['email'],
	        'phone' => $data['phone'],
	        'birthdate' => Carbon::parse($data['birthdate'])->format('d/m/Y'),
            'password' => bcrypt($data['password']),
	        'genre'=>$data['genre'],
	        'application_date' => $hoy,
	        'ip' => \Request::ip(),
	        'validation_token'=> $token,
	        'validated_email'=>false,
	        'motive'=>'',
        ]);
    }
}
