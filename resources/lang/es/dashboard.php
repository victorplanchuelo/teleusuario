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

	'header' => [
		'logout' => 'Desconectar',
		'code'   => 'Código',
		'profile' => 'Ver perfil',
		'change_pwd' => 'Cambiar contraseña',
	],

	'navbar' => [
		'teleusuario' => 'Teleusuario',
	],

	'change_password' => [
		'title' => 'Cambiar Contraseña',
		'password' => 'Contraseña',
		'password_confirm' => 'Repite contraseña',
		'submit' => 'Cambiar contraseña',
		'message' => [
			'success' => 'La contraseña se cambió correctamente.',
			'error' => 'La nueva contraseña no puede ser igual a la anterior.'
		],
	],

	'profile' => [
		'title' => 'Perfil de usuario',

		'tabs' => [
			'personal' => 'Datos personales',
			'bank' => 'Datos bancarios',
			'services' => 'Servicios',
		],
		'labels' => [
			'code' => 'Código Usuario',
			'alias' => 'Alias',
			'name' => 'Nombre completo',
			'phone' => 'Teléfono de contacto',
			'connection_phone' => 'Teléfono de conexión',
			'email' => 'Correo Electrónico',
			'country' => 'Pais',
			'province' => 'Provincia',
			'city' => 'Población',
			'address' => 'Dirección',
			'cp' => 'Código postal',
			'genre' => 'Género',
			'birthdate' => 'Fecha nacimiento',
			'age' => 'Edad',
			'nif' => 'NIF',
			'bank' => 'Nombre del banco',
			'bank_code' => 'Código banco',
			'iban' => 'IBAN',
			'swift' => 'Swift/BIC',
		],

	],

];