<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function getChangePassword()
    {
    	return view('dashboard.change_pwd');
    }

    public function postChangePassword(ChangePasswordRequest $request)
    {

    	if(Hash::check($request['password'], Auth::user()->password))
    		return back()->with('error', trans('dashboard.change_password.message.error'));

    	//Se recupera el usuario que está con la sesión iniciada
	    $user = Auth::user();

	    $user->real_password = $request['password'];
	    $user->password = bcrypt($request['password']);
	    $user->save();

	    return back()->with('success', trans('dashboard.change_password.message.success'));

    }

    public function getProfile()
    {
    	$place = DB::connection('sqlsrv2')
		    ->table('Paises')
		    ->join('Provincias', 'Paises.IdPais', '=', 'Provincias.PaisProvincia')
		    ->join('Poblacion', 'Provincias.IdProvincia', '=', 'Poblacion.IdProvinciaPob')
		    ->select('Poblacion.CiudadPob as ciudad', 'Provincias.NombreProvincia as provincia', 'Paises.NombrePais as pais')
		    ->where('Poblacion.CMUN', Auth::user()->city)
		    ->where('Provincias.IdProvincia', Auth::user()->province)
		    ->where('Paises.IdPais', Auth::user()->country)
		    ->first();

    	//Muestra el formulario del perfil del usuario
	    return view('dashboard.profile', ['user' => Auth::user(), 'place' => $place]);
    }
}
