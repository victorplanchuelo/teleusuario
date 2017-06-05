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
	'level'                => 'Level',
	'scores'               => 'Scores',

	'header' => [
		'logout' => 'Logout',
		'code'   => 'Code',
		'profile' => 'View profile',
		'change_pwd' => 'Change password',
	],

	'navbar' => [
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

		'teleusuario' => [
			'title' => 'Active services',
			'messages' => 'Messages',
			'winks' => 'Winks',
			'chats' => 'Chats',
			'muropost' => 'Muropost',
			'publish_posts' => 'Publish posts',
			'liruch_calls' => 'Liruch calls',
			'erotic_calls' => ' Erotics calls',
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
			'upload_image' => 'Upload image',
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
			'leave_reason' => 'Leave reason',
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
		'messages' => [
			'success' => 'Profile image has been upload successfully',
			'error' => 'An error has occurred uploading the profile image',
		],

	],

	'ranking' => [
		'title' => 'Ranking',
	],

	'messages' => [
		'title' => 'Messages Service',
		'form' => [
			'start_date' => 'Start date',
			'end_date' => 'End date',
			'submit' => 'Submit',
		],
	],

	'wink' => [
		'title' => 'Winks Service',
	],

	'task' => [
		'message' => [
			'conversation' => [
				'error' => [
					'code_not_valid' => 'Code has not been able to send correctly.',
					'general_error' => 'An error occurred asking for task messages.',
				],
			],
			'info' => [
				'location' => 'Location',
			],
			'create_note' => [
				'success' => 'The new note has been created successfully',
				'error' => 'An error occurred creating the new note',
			],
			'send_message' => [
				'error' => 'An error occurred sending the message.',
			],
		],
		'wink' => [
			'info' => [
				'location' => 'Location',
			],
		],
	],
];