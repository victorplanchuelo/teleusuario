<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;

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
    	$city = Auth::user()->city;
    	$province = Auth::user()->province;
    	$country = Auth::user()->country;

    	$place = User::getPlace($city, $province, $country);

    	//Muestra el formulario del perfil del usuario
	    return view('dashboard.profile', ['user' => Auth::user(), 'place' => $place]);
    }


    public function getRanking()
    {
	    return view('dashboard.ranking');
    }
}
