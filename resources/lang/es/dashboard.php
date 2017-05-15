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
		'teleusuario' => [
			'title' => 'Teleusuario',
		],
		'settings' => [
			'title' => 'Configuración',
			'profile' => 'Perfil usuario',
			'change_pwd' => 'Cambio contraseña',
			'logout' => 'Desconectarse',
		],

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
			'general' => 'Información general',
			'bank' => 'Datos bancarios',
			'services' => 'Servicios',
			'invoices' => 'Facturas',
		],
		'labels' => [
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

	],

];