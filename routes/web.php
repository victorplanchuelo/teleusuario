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

//Rutas por defecto para login/registro/reseteo contraseña
Auth::routes();

//Ruta de confirmación de correo electrónico (se llama desde el e-mail que se envía una vez terminado el registro)
Route::get('/activate/{token}', 'Auth\RegisterController@activation');

//Ruta para acceder a los terminos y condiciones en el registro del usuario
Route::get('/terms', 'Auth\RegisterController@getTerms');



/*
 *
 * PANEL DE CONTROL
 *
 */
//Página principal del panel de control

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {
	Route::get('/', 'HomeController@index')->name('dashboard.home');

	//Carga de tareas en la página inicial
	Route::get('/tasks', 'HomeController@getTask')->name('dashboard.tasks');
	Route::post('/tasks/note', 'HomeController@postCreateNote')->name('dashboard.tasks.create_note');
	Route::post('/tasks/send', 'HomeController@postSend')->name('dashboard.tasks.send_message');

	//Ruta para el cambio de contraseña
	Route::get('/password/change',  'UserController@getChangePassword')->name('dashboard.change_pwd');
	Route::post('/password/change',  'UserController@postChangePassword')->name('dashboard.change_pwd.edit');

	//Rutas para el perfil de usuario
	Route::get('/profile',  'UserController@getProfile')->name('dashboard.profile');
	Route::post('/profile',  'UserController@postProfile')->name('dashboard.profile.update');

	Route::group(['prefix' => 'tasks'], function() {
		Route::get('/ranking', 'UserController@getRanking')->name('dashboard.tasks.ranking');
	});

	//Rutas para el apartado mensajes
	Route::get('/messages', 'ServiceController@getMessages');
	Route::post('/messages', 'ServiceController@postMessages');
});

















//Para poder crear usuarios. Borrar cuando esté
Route::get('/insert_fake_user', 'Auth\LoginController@insertFakeUser');