<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Dashboard Language Lines
	|--------------------------------------------------------------------------
	|
	*/


	'title'                => 'Panel de Control',
	'welcome_message'      => 'Bienvenido/a al Panel de Control de Teleusuario',
	'level'                => 'Nivel',
	'scores'               => 'Puntuación',

	'header' => [
		'logout' => 'Desconectar',
		'code'   => 'Código',
		'profile' => 'Ver perfil',
		'change_pwd' => 'Cambiar contraseña',
	],

	'navbar' => [
		'settings' => [
			'title' => 'Configuración',
			'profile' => 'Perfil usuario',
			'change_pwd' => 'Cambio contraseña',
			'logout' => 'Desconectarse',
		],

		'tasks' => [
			'title' => 'Tareas',
			'completed_tasks' => 'Tareas completadas',
			'ranking' => 'Ranking',
		],

		'teleusuario' => [
			'title' => 'Servicios activos',
			'messages' => 'Mensajes',
			'winks' => 'Guiños',
			'chats' => 'Chats',
			'muropost' => 'Muropost',
			'publish_posts' => 'Anuncios publicados',
			'liruch_calls' => 'Llamadas Liruch',
			'erotic_calls' => 'Llamadas eróticas',
		],

	],

	'change_password' => [
		'title' => 'Cambiar Contraseña',
		'password' => 'Contraseña',
		'password_confirm' => 'Repite contraseña',
		'submit' => 'Cambiar contraseña',
		'message' => [
			'success' => 'La contraseña se cambió correctamente.',
			'error' => 'La nueva contraseña no puede ser igual a la anterior.',
			'label1' =>'¡Recuerda!',
			'label2' => 'La contraseña debe contener caracteres alfanuméricos y debe tener un tamaño mínimo de 6 caracteres',
		],
	],

	'profile' => [
		'title' => 'Perfil de usuario',

		'tabs' => [
			'general' => 'Información general',
			'bank' => 'Datos bancarios',
			'services' => 'Servicios',
			'invoices' => 'Facturas',
		],
		'labels' => [
			'upload_image' => 'Subir imagen',
			'code' => 'Código Usuario',
			'alias' => 'Alias',
			'name' => 'Nombre completo',
			'phone' => 'Teléfono contacto',
			'connection_phone' => 'Teléfono conexión',
			'email' => 'Correo Electrónico',
			'country' => 'Pais',
			'province' => 'Provincia',
			'city' => 'Población',
			'address' => 'Dirección',
			'cp' => 'Código postal',
			'genre' => [
				'title' => 'Género',
				'male' => 'Masculino',
				'female' => 'Femenino',
			],
			'leave_reason' => 'Motivo de baja',
			'birthdate' => 'Fecha nacimiento',
			'age' => 'Edad',
			'nif' => 'NIF',
			'bank' => 'Nombre del banco',
			'bank_code' => 'Código banco',
			'iban' => 'IBAN',
			'swift' => 'Swift/BIC',
			'start_date' => 'Fecha inicio',
			'end_date' => 'Fecha fin',
			'active' => 'Activo',
		],

		'fieldsets' => [
			'user_data' => 'Datos de usuario',
			'personal_data' => 'Datos personales',
		],
		'messages' => [
			'success' => 'La imagen de perfil se ha subido correctamente.',
			'error' => 'Se ha producido un error al subir la imagen de perfil.',
		],

	],

	'ranking' => [
		'title' => 'Ranking',
	],

];