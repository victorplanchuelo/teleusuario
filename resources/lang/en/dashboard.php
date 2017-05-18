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
		'teleusuario' => [
			'title' => 'Teleusuario',
		],
		'settings' => [
			'title' => 'Settings',
			'profile' => 'User profile',
			'change_pwd' => 'Change password',
			'logout' => 'Logout',
		],
		'tasks' => [
			'title' => 'Tasks',
			'completed_tasks' => 'Completed Tasks',
			'ranking' => 'Ranking',
		],
	],


	'change_password' => [
		'title' => 'Change Password',
		'password' => 'Password',
		'password_confirm' => 'Password confirm',
		'submit' => 'Change password',
		'message' => [
			'success' => 'Password was changed successfuly',
			'error' => 'New password cannot be the same than the old one.',
			'label1' =>'Remember!',
			'label2' => 'Password must contain alphanumeric characters and must be at least 6 characters long',
		],
	],

	'profile' => [
		'title' => 'User profile',

		'tabs' => [
			'general' => 'General information',
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
			'genre' => [
				'title' => 'Genre',
				'male' => 'Male',
				'female' => 'Female',
			],
			'birthdate' => 'Birthdate',
			'age' => 'Age',
			'nif' => 'Id Number',
			'bank' => 'Bank name',
			'bank_code' => 'Bank code',
			'iban' => 'IBAN',
			'swift' => 'Swift/BIC',
			'start_date' => 'Start date',
			'end_date' => 'End date',
			'active' => 'Active',
		],

		'fieldsets' => [
			'user_data' => 'User data',
			'personal_data' => 'Personal data',
		],

	],

	'ranking' => [
		'title' => 'Ranking',
	],
];