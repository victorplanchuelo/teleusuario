<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Dashboard Language Lines
	|--------------------------------------------------------------------------
	|
	*/

	'title'                => 'Dashboard',
	'welcome_message'      => 'Welcome to Teleusuario Dashboard',

	'header' => [
		'logout' => 'Logout',
		'code'   => 'Code',
		'profile' => 'View profile',
		'change_pwd' => 'Change password',
	],

	'navbar' => [
		'teleusuario' => 'Teleusuario',
	],


	'change_password' => [
		'title' => 'Change Password',
		'password' => 'Password',
		'password_confirm' => 'Password confirm',
		'submit' => 'Change password',
		'message' => [
			'success' => 'Password was changed successfuly',
			'error' => 'New password cannot be the same than the old one.'
		],
	],

	'profile' => [
		'title' => 'User profile',

		'tabs' => [
			'personal' => 'Personal data',
			'bank' => 'Bank data',
			'services' => 'Services',
			'invoices' => 'Invoices',
		],

		'labels' => [
			'code' => 'User code',
			'alias' => 'Alias',
			'name' => 'Full name',
			'phone' => 'Contact phone',
			'connection_phone' => 'Connection phone',
			'email' => 'E-mail',
			'country' => 'Country',
			'province' => 'Province',
			'city' => 'City',
			'address' => 'Address',
			'cp' => 'Postal code',
			'genre' => 'Genre',
			'birthdate' => 'Birthdate',
			'age' => 'Age',
			'nif' => 'Id Number',
			'bank' => 'Bank name',
			'bank_code' => 'Bank code',
			'iban' => 'IBAN',
			'swift' => 'Swift/BIC',
		],

	],
];