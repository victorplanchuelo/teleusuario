<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Support\Facades\Validator;

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

    public function postProfile(Request $request)
    {
	    $file = $request->file('file');


	    // Double check file validity
	    if(!$file->isValid())
		    return response()->json([
			    'success' => 0,
		    ]);;


	    $messages = [
		    'file.required' => trans('validation.custom.profile_image.required'),
		    'file.image' => trans('validation.custom.profile_image.image'),
		    'file.max' => trans('validation.custom.profile_image.max'),
		    'file.mime' => trans('validation.custom.profile_image.mime'),
	    ];

	    $validator = Validator::make($request->all(), [
		    'file' => 'required|image|mimes:jpg,png,jpeg|max:2048', //2048 (2Mb) o 5120 (5MB)
	    ], $messages);

	    if ($validator->fails()) {
	    	return response()->json([
	    		'success' => 0,
			    'error' => $validator->errors()->all(),
		    ]);
	    }

	    return User::setImageFromFile($file);

    }


    public function getRanking()
    {
	    return view('dashboard.ranking');
    }
}
