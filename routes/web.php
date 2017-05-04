<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	if (\Illuminate\Support\Facades\Auth::check()) {
		return redirect('/dashboard');
	}

	return redirect('/login');
});

Auth::routes();

Route::get('/dashboard', 'HomeController@index');
Route::get('/activate/{token}', 'Auth\RegisterController@activation');
