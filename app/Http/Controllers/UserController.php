<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getChangePassword()
    {
    	return view('dashboard.change_pwd');
    }

    public function postChangePassword(ChangePasswordRequest $request)
    {
    	//Se recupera el usuario que está con la sesión iniciada
	    $user = Auth::user();

	    $user->real_password = $request['password'];
	    $user->password = bcrypt($request['password']);
	    $user->save();

	    return back()->with('success', trans('dashboard.change_password.message.success'));

    }
}
