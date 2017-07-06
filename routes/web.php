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
	//AUN NO SON NECESARIOS YA QUE ES LA CARGA DE LA PAGINA PRINCIPAL
	//REVISAR LAS RUTAS YA QUE HAY MÁS ABAJO UN PREFIX A TASKS Y PUEDE HABER PROBLEMAS
	Route::get('/tasks', 'HomeController@getTask')->name('dashboard.tasks');
	Route::post('/tasks/note', 'HomeController@postCreateNote')->name('dashboard.tasks.create_note');
	Route::post('/tasks/send', 'HomeController@postSend')->name('dashboard.tasks.send_message');

	//Ruta para el cambio de contraseña
	Route::get('/password/change',  'UserController@getChangePassword')->name('dashboard.change_pwd');
	Route::post('/password/change',  'UserController@postChangePassword')->name('dashboard.change_pwd.edit');

	//Rutas para el perfil de usuario
	Route::get('/profile',  'UserController@getProfile')->name('dashboard.profile');
	Route::post('/profile',  'UserController@postProfile')->name('dashboard.profile.update');



	Route::group(['prefix' => 'task'], function() {
		Route::get('/ranking', 'UserController@getRanking')->name('dashboard.tasks.ranking');
	});



	Route::group(['prefix' => 'services'], function() {
		//Rutas para el apartado mensajes
		Route::get('/messages', 'ServiceController@getMessage')->name('dashboard.message');
		Route::post('/messages', 'ServiceController@postMessages')->name('dashboard.message.send_message');

		Route::group(['prefix' => 'messages'], function() {
			Route::post('/note/create', 'ServiceController@postCreateNote')->name('dashboard.message.create_note');
			Route::get('/load', 'ServiceController@getNewMessage')->name('dashboard.message.load_new_message');
			Route::post('/private-key', 'ServiceController@postSendPrivateKey')->name('dashboard.message.send_private_key');
		});


		//Rutas para los guiños
		Route::get('/winks', 'ServiceController@getWink')->name('dashboard.wink');

		//Rutas para los chats
		Route::get('/chats', 'ServiceController@getChats')->name('dashboard.chats');

		Route::group(['prefix' => 'chats'], function() {
			// ESTAS RUTAS SON LAS LLAMADAS POR AJAX DE LA PARTE DE LOS CHATS
			Route::post('/last-conn-entertainer', 'ServiceController@postLastConnEntertainer')->name('dashboard.chats.update_last_conn_entertainer');
			Route::post('/update-premium-connection', 'ServiceController@postUpdatePremiumConnection')->name('dashboard.chats.update_premium_connection');
			Route::post('/load-conversation', 'ServiceController@postLoadConversation')->name('dashboard.chats.load_conversation');
			Route::post('/videochat', 'ServiceController@postVideoChat')->name('dashboard.chats.videochat');
			Route::post('/send-message', 'ServiceController@postSendChatMessage')->name('dashboard.chats.send_message');
			Route::post('/mark-message-read', 'ServiceController@postMarkMessageAsRead')->name('dashboard.chats.mark_message_as_read');
			Route::post('/create-note', 'ServiceController@postCreateChatNote')->name('dashboard.chats.create_note');
			Route::post('/get-reversed-chat', 'ServiceController@postReversedChat')->name('dashboard.chats.get_reversed_chat');
			Route::post('/get-disconnected-reversed-chat', 'ServiceController@postDisconnectedReversedChat')->name('dashboard.chats.get_disconnected_reversed_chat');

			Route::post('/close-chat-conversation', 'ServiceController@postCloseChatConversation')->name('dashboard.chats.close_chat_conversation');
		});


		//Rutas para los novios
		Route::group(['prefix' => 'boyfriends'], function() {
			Route::get('/', 'ServiceController@getBoyfriends');
			Route::get('/load', 'ServiceController@getLoadBoyfriends')->name('dashboard.boyfriends');
			Route::post('/load/conversation', 'ServiceController@getLoadConversationBoyfriend')->name('dashboard.boyfriends.conversation');
			Route::post('/send-message', 'ServiceController@postSendMessageBoyfriends')->name('dashboard.boyfriends.send_message');
			Route::get('/open-boyfriend-chat', 'ServiceController@getLoadBoyfriendChat')->name('dashboard.boyfriends.open_boyfriend_chat');
		});


		Route::group(['prefix' => 'notifications'], function() {
			Route::get('/', 'NotificationController@index')->name('dashboard.notifications');
			Route::get('/new', 'NotificationController@create')->name('dashboard.notifications.new');
			Route::post('/new', 'NotificationController@store')->name('dashboard.notifications.store');
		});



		//Rutas para el muropost
		Route::get('/muropost', 'ServiceController@getMuropost')->name('dashboard.muropost');
	});




	Route::group(['prefix' => 'tickets'], function() {
		//RUTAS PARA EL SISTEMA DE TICKETS
		Route::get('/new', 'Tickets\TicketsController@create')->name('dashboard.tickets.new');
		Route::post('/new', 'Tickets\TicketsController@store')->name('create_ticket');

		Route::get('/my-tickets', 'Tickets\TicketsController@userTickets')->name('dashboard.tickets.list');
		Route::get('/load-motives','Tickets\TicketsController@getMotives');

		Route::post('/ticket-comment', 'Tickets\TicketCommentsController@postComment')->name('create_ticket_comment');

		Route::get('/{ticket_id}', 'Tickets\TicketsController@show');
		Route::get('/{ticket_id}/{action}', 'Tickets\TicketsController@openCloseTicket');




	});

});

















//Para poder crear usuarios. Borrar cuando esté
Route::get('/insert_fake_user', 'Auth\LoginController@insertFakeUser');